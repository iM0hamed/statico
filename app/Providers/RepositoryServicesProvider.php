<?php

namespace App\Providers;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\PlayerRepository;
use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\TeamRepository;
use App\Repositories\Interfaces\IBaseRepository;
use App\Repositories\Interfaces\IPlayerRepository;
use App\Repositories\Interfaces\IRoleRepository;
use App\Repositories\Interfaces\ITeamRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(ITeamRepository::class, TeamRepository::class);
        $this->app->bind(IPlayerRepository::class, PlayerRepository::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
