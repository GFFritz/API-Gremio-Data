<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Players;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index() {
        $players = Players::all();

        return response()->json($players);
    }

    public function store(Request $request) {
        $validate = [
            'name' =>           ['string', 'required'],
            'age' =>            ['integer', 'required'],
            'country' =>        ['string', 'required'],
            'nickname' =>       ['string'],
            'height' =>         ['string', 'required'],
            'number' =>         ['integer', 'required'],
            'foot' =>           ['integer', 'required'],
            'position' =>       ['string', 'required'],
            'former_clubs' =>   ['string'],
        ];

        $data = $request->validate($validate);

        $player = Players::create($data);

        return response()->json([
            'message' => "Jogador salvo com sucesso",
            'player' => $player
        ]);
    }

    public function update(Request $request, Players $player)
    {
        $data = $request->validate([
            'name' => ['string'],
            'age' => ['integer'],
            'country' => ['string'],
            'nickname' => ['string'],
            'height' => ['string'],
            'number' => ['integer'],
            'foot' => ['integer'],
            'position' => ['string'],
            'former_clubs' => ['string']
        ]);

        $player->update($data);

        return response()->json([
            'message' => "Jogador salvo com sucesso",
            'campeonato' => $player
        ]);
    }

    public function destroy(Players $player)
    {
        $player->active = 0;
        $player->save();

        return response()->json([
            'message' => "Jogador desativado com sucesso"
        ]);
    }
}
