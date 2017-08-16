<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\PlayerRepository;

class TeamController extends Controller {


    /**
     * The player repository instance.
     *
     * @var PlayerRepository
     */

    protected $players;

    public function __construct(PlayerRepository $players) {
        $this->players = $players;
    }

	/**
     * Fetch all teams
     * @param Request $request
     * @return View
     */

    public function index(Request $request) {
        return view('team.index', [
            'teams' => Team::get(),
        ]);
    }


	/**
     * Fetch all players for given team
     * @param Request $request
     * @return View
     */

    public function details(Request $request, Team $team) { 
        return view('team.details', [
            'team' => ['name'=> $team->name],
            'players' => $this->players->forTeam($team),
        ]);
    }

}
