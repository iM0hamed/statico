<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\Interfaces\IRoleRepository;

class RoleRepository extends BaseRepository implements IRoleRepository
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }
}