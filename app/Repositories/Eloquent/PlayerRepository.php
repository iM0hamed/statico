<?php

namespace App\Repositories\Eloquent;

use App\Models\Player;
use App\Repositories\Interfaces\IPlayerRepository;

class PlayerRepository extends BaseRepository implements IPlayerRepository
{
    protected $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    public function getPaginated($limit)
    {
        return $this->model->paginate($limit);
    }

    public function getFreeRosters()
    {
        return $this->model->with('team')->whereDoesntHave('team')->get();
    }

    public function getAvailableRosters($team)
    {
        return $this->model->whereHas('team', function($query) use ($team){
            $query->where('team_id', $team->id);
        })->orDoesntHave('team')->get();
    }
}