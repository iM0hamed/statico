<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'rosters');
    }

    public function availablePlayers()
    {
        $exceptionId = array();
        $listId = DB::table('rosters')->get('player_id')->toArray();
        
        foreach ($listId as $key => $value) {
            array_push($exceptionId, $value->player_id);
        }

        dd($exceptionId);

        return Player::whereDoesntHave('id', $listId)->get();
    }
}
