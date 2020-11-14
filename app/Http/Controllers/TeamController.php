<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = 'Teams';
        $teams = Team::paginate(6);

        return view('pages.admin.teams.index', compact('title', 'teams'));
    }

    public function create(Request $request) 
    {
        return view('pages.admin.teams.create');
    }

    public function show($slug)
    {
        $team = Team::with('players')->where('slug', $slug)->first();
        $title = $team->name;

        return view('pages.admin.teams.show', compact('team', 'title'));
    }
}
