<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Repositories\Interfaces\IPlayerRepository;
use App\Repositories\Interfaces\IRoleRepository;

class PlayerController extends Controller
{
    private $playerRepository;
    private $roleRepository;

    public function __construct(IPlayerRepository $playerRepository, IRoleRepository $roleRepository)
    {
        $this->middleware('auth:admin');
        $this->playerRepository = $playerRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $title = 'Players';
        $players = $this->playerRepository->getPaginated(6);

        return view('pages.admin.players.index', compact('title', 'players'));
    }

    public function create()
    {
        $title = 'Register Player';
        $roles = $this->roleRepository->getAll();

        return view('pages.admin.players.create', compact('title', 'roles'));
    }

    public function store(PlayerStoreRequest $request)
    {
        $this->playerRepository->store($request->all());

        return redirect(route('players'))->with('status', 'New player has been registered');
    }

    public function update($slug, PlayerUpdateRequest $request)
    {
        $this->playerRepository->updateBySlug($slug, $request->all());

        return redirect(route('players.detail', $slug))->with('status', 'Profile updated successfully.');
    }

    public function show($slug)
    {
        $title = 'Player Overview';
        $player = $this->playerRepository->getBySlug($slug, ['roles', 'image']);

        return view('pages.admin.players.show', compact('player', 'title'));
    }

    public function setting($slug)
    {
        $title = 'Player Profile Setting';
        $player = $this->playerRepository->getBySlug($slug, ['roles']);

        return view('pages.admin.players.setting', compact('title', 'player'));
    }
}
