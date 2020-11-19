<?php

namespace App\Repositories\Eloquent;

use App\Models\Team;
use App\Repositories\Interfaces\ITeamRepository;

use Illuminate\Support\Str;

class TeamRepository extends BaseRepository implements ITeamRepository
{
    protected $model;
    
    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    public function getPaginated($limit)
    {
        return $this->model->paginate($limit);
    }

    public function getBySlug($slug)
    {
        $data = $this->model->where('slug', $slug)->first();
        return $data;
    }

    public function updateBySlug($slug, $attributes)
    {
        $data = $this->getBySlug($slug);
        $data->update($attributes);

        return $data;
    }

    public function syncPlayers($teamSlug, array $players)
    {
        $this->getBySlug($teamSlug)->players()->sync($players);
    }

    public function store(array $attributes)
    {
        $attributes['slug'] = Str::slug($attributes['name']);

        $data = $this->store($attributes)->players()->attach($attributes['players']);

        return $data;
    }
}