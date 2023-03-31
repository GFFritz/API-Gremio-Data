<?php

namespace App\Http\Controllers\ApiControllers;

use App\Enums\ChampionshipsEnum;
use BenSampo\Enum\Rules\EnumValue;
use App\Http\Controllers\Controller;
use App\Models\Matches;
use Illuminate\Http\Request;

class MatchesController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.sanctum');
    }

    public function index() {
        $matches = Matches::all();

        return response()->json($matches);
    }

    public function store(Request $request) {
        $validate = [
            'season' =>         ['integer', 'required'],
            'championship' =>   ['integer', 'required', new EnumValue(ChampionshipsEnum::class, false)],
            'team' =>           ['string', 'required'],
            'home_goals' =>     ['integer', 'required'],
            'visitor_goals' =>  ['integer', 'required'],
        ];

        $data = $request->validate($validate);

        $match = Matches::create($data);

        return response()->json([
            'message' => "Partida salva com sucesso",
            'match' => $match
        ]);
    }

    public function update(Request $request, Matches $match)
    {
        $validate = [
            'season' =>         ['integer', 'required'],
            'championship' =>   ['integer', 'required', new EnumValue(ChampionshipsEnum::class, false)],
            'team' =>           ['string', 'required'],
            'home_goals' =>     ['integer', 'required'],
            'visitor_goals' =>  ['integer', 'required'],
        ];

        $data = $request->validate($validate);

        $match = $match->update($data);

        return response()->json([
            'message' => "Partida salva com sucesso",
            'partida' => $data
        ]);
    }
}
