<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'team_id'];

    protected $table = 'team_images';

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}
