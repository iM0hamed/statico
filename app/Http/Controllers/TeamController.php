<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create() 
    {
        $title = 'Create Team';

        $players = Player::all();

        return view('pages.admin.teams.create', compact('title', 'players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:teams|string|regex:/^[\pL\s\-]+$/u',
            'description' => 'required|regex:/^[\pL\s\-]+$/u',
            'players' => 'array'
        ]);

        $request['slug'] = Str::slug($request->name);

        $team = Team::create($request->all());

        if ($request->players != null) {
            $team->players()->attach($request->players);
        }

        return redirect(route('teams'))->with('status', 'Team created successfully.');
    }

    public function show($slug)
    {
        $team = Team::with('players')->where('slug', $slug)->first();
        $title = $team->name;

        return view('pages.admin.teams.show', compact('team', 'title'));
    }
}
