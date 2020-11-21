<?php

namespace App\Repositories\Eloquent;

use App\Models\Player;
use App\Models\PlayerImage;
use App\Repositories\Interfaces\IPlayerRepository;

use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PlayerRepository extends BaseRepository implements IPlayerRepository
{
    protected $model;
    protected $playerImage;

    public function __construct(Player $model, PlayerImage $playerImage)
    {
        $this->model = $model;
        $this->playerImage = $playerImage;
    }

    public function getPaginated($limit)
    {
        return $this->model->paginate($limit);
    }

    public function getFreeRosters()
    {
        return $this->model->with('team')->whereDoesntHave('team')->get();
    }

    public function getBySlug(string $slug, array $with = null)
    {
        $player = $this->model->where('slug', $slug);

        if (isset($with)) {
            $player->with($with);
        }

        return $player->first();
    }

    public function getAvailableRosters($team)
    {
        return $this->model->whereHas('team', function($query) use ($team){
            $query->where('team_id', $team->id);
        })->orDoesntHave('team')->get();
    }

    public function store(array $attributes)
    {
        $attributes['slug'] = Str::slug($attributes['in_game_nickname']);
        $player = $this->model->create($attributes);

        $this->attachRoles($player, $attributes['roles']);

        if (isset($attributes['photo'])) {
            $this->uploadPhoto($player, $attributes['photo']);
        }

        return $player;
    }

    public function updateBySlug($slug, array $attributes)
    {
        $player = $this->getBySlug($slug);
        $player->update($attributes);

        $this->syncRoles($slug, $attributes['roles']);

        if (isset($attributes['photo'])) {
            $this->updatePhoto($player, $attributes['photo']);
        }

        return $player;
    }

    private function syncRoles($slug, array $roles)
    {
        $this->getBySlug($slug)->roles()->sync($roles);
    }

    private function attachRoles($player, $roles)
    {
        $player->roles()->attach($roles);
    }

    private function uploadPhoto($player, $image)
    {
        $fileName = $image->store('profile', 'public');

        $this->resize($fileName);

        $storedInDatabase = $this->playerImage->create([ 'player_id' => $player->id, 'image' => $fileName ]);
        
        $player->image()->save($storedInDatabase);
    }

    private function updatePhoto($player, $image)
    {
        $fileName = $image->store('profile', 'public');

        $this->resize($fileName);

        $player->image->update([ 'image' => $fileName ]);
    }

    private function resize($image)
    {
        $resizedImage = Image::make('storage/' . $image)->resize(300, null, function($constraint) {
            $constraint->aspectRatio();
        });

        $resizedImage->save();
    }
}