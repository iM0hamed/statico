<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'rosters');
    }

    public function image()
    {
        return $this->hasOne(TeamImage::class);
    }
}
