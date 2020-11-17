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

    private function teamRules($state = 'store', $value = null)
    {
        $name = 'required|regex:/^[\pL\s\-]+$/u|string|unique:teams,name';

        if ($state != 'store') {
            $name = $name . ',' . $value;
        }

        return [
            'name' => $name,
            'description' => 'required|regex:/^[\pL\s\-]+$/u'
        ];
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

        $players = Player::with('team')->whereDoesntHave('team')->get();

        return view('pages.admin.teams.create', compact('title', 'players'));
    }

    public function store(Request $request)
    {
        $request->validate($this->teamRules());

        $request['slug'] = Str::slug($request->name);

        $team = Team::create($request->all());

        if ($request->players != null) {
            $team->players()->attach($request->players);
        }

        return redirect(route('teams'))->with('status', 'Team created successfully.');
    }

    public function setting($slug)
    {
        $team = Team::where('slug', $slug)->first();
        $title = 'Team Setting';

        return view('pages.admin.teams.setting', compact('team', 'title'));
    }

    public function updateSetting(Request $request, $slug)
    {
        $team = Team::where('slug', $slug)->first();
        $request->validate($this->teamRules('update', $team->id));

        $team->update($request->all());

        return redirect(route('teams.detail', $slug))->with('status', 'Team updated successfully.');
    }

    public function roster($slug)
    {
        $title = 'Change Roster';
        $team = Team::with('players')->where('slug', $slug)->first();
        $teamId = $team->id;

        $players = Player::whereHas('team', function($query) use ($team) {
            $query->where('team_id', $team->id);
        })->orDoesntHave('team')->get();

        return view('pages.admin.teams.roster', compact('team', 'title', 'players'));
    }

    public function updateRoster(Request $request, $slug)
    {
        $team = Team::with('players')->where('slug', $slug)->first();

        $request->validate([
            'players' => 'array'
        ]);

        $team->players()->sync($request->players);


        return redirect(route('teams.detail', $slug))->with('status', 'Roster updated successfully.');
    }

    public function show($slug)
    {
        $team = Team::with('players')->where('slug', $slug)->first();
        $title = $team->name;

        return view('pages.admin.teams.show', compact('team', 'title'));
    }
}
