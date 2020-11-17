<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = 'Players';
        $players = Player::with('team')->paginate(6);

        return view('pages.admin.players.index', compact('title', 'players'));
    }
}
