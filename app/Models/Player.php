<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Player extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'player';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'in_game_id',
        'in_game_nickname',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'pivot'
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     * 
     * protected $with = ['team'];
     */

    public function team()
    {
        return $this->belongsToMany(Team::class, 'rosters');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'players_roles');
    }

    public function image()
    {
        return $this->hasOne(PlayerImage::class);
    }
}
