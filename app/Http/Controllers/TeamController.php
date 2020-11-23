<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRosterUpdateRequest;
use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Repositories\Interfaces\IPlayerRepository;
use App\Repositories\Interfaces\ITeamRepository;

class TeamController extends Controller
{
    private $teamRepository;
    private $playerRepository;

    public function __construct(ITeamRepository $teamRepository, IPlayerRepository $playerRepository)
    {
        $this->middleware('auth:admin');
        $this->teamRepository = $teamRepository;
        $this->playerRepository = $playerRepository;
    }

    public function index()
    {
        $title = 'Teams';
        $teams = $this->teamRepository->getPaginated(6);

        return view('pages.admin.teams.index', compact('title', 'teams'));
    }

    public function create() 
    {
        $title = 'Create Team';

        $players = $this->playerRepository->getFreeRosters();

        return view('pages.admin.teams.create', compact('title', 'players'));
    }

    public function store(TeamStoreRequest $request)
    {
        $this->teamRepository->store($request->all());

        return redirect(route('teams'))->with('status', 'Team created successfully.');
    }

    public function setting($slug)
    {
        $team = $this->teamRepository->getBySlug($slug);
        $title = 'Team Setting';

        return view('pages.admin.teams.setting', compact('team', 'title'));
    }

    public function updateSetting(TeamUpdateRequest $request, $slug)
    {
        $this->teamRepository->updateBySlug($slug, $request->all());

        return redirect(route('teams.detail', $slug))->with('status', 'Team updated successfully.');
    }

    public function roster($slug)
    {
        $team = $this->teamRepository->getBySlug($slug);
        $title = 'Manage Roster';

        $players = $this->playerRepository->getAvailableRosters($team);

        return view('pages.admin.teams.roster', compact('team', 'title', 'players'));
    }

    public function updateRoster(TeamRosterUpdateRequest $request, $slug)
    {
        $this->teamRepository->syncPlayers($slug, $request->players);

        return redirect(route('teams.detail', $slug))->with('status', 'Roster updated successfully.');
    }

    public function show($slug)
    {
        $team = $this->teamRepository->getBySlug($slug, ['players.image']);
        $title = $team->name;

        return view('pages.admin.teams.show', compact('team', 'title'));
    }

    public function destroy($slug)
    {
        $this->teamRepository->destroy($slug);

        return redirect(route('teams'));
    }
}
