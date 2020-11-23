<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'player_id'];

    protected $table = 'player_images';

    public function players()
    {
        return $this->belongsTo(Player::class);
    }
}
