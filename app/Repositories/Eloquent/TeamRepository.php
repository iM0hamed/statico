<?php

namespace App\Repositories\Eloquent;

use App\Models\Team;
use App\Models\TeamImage;
use App\Repositories\Interfaces\ITeamRepository;

use Illuminate\Support\Str;

class TeamRepository extends BaseRepository implements ITeamRepository
{
    protected $model;
    protected $imageInstance;
    
    public function __construct(Team $model, TeamImage $imageInstance)
    {
        $this->model = $model;
        $this->imageInstance = $imageInstance;
    }

    public function getPaginated($limit)
    {
        return $this->model->paginate($limit);
    }

    public function getBySlug($slug)
    {
        $data = $this->model->where('slug', $slug)->with('image')->first();
        return $data;
    }

    public function updateBySlug($slug, $attributes)
    {
        $data = $this->getBySlug($slug);
        $data->update($attributes);

        if (isset($attributes['logo'])) {
            $this->updateLogo($data, $attributes['logo']);
        }

        return $data;
    }

    public function syncPlayers($teamSlug, array $players)
    {
        $this->getBySlug($teamSlug)->players()->sync($players);
    }

    public function store(array $attributes)
    {
        $attributes['slug'] = Str::slug($attributes['name']);

        $team = $this->model->create($attributes);

        $team->players()->attach($attributes['players']);
        
        if (isset($attributes['logo'])) {
            $this->uploadLogo($team, $attributes['logo']);
        }

        return $team;
    }

    public function uploadLogo($team, $image)
    {
        $path = $image->store('logo', 'public');
        
        $createdImage = $this->imageInstance->create([ 'team_id' => $team->id, 'image' => $path ]);

        $team->image()->save($createdImage);
    }

    public function updateLogo($team, $image)
    {
        $path = $image->store('logo', 'public');

        $team->image->update([ 'image' => $path ]);
    }
}