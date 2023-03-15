<?php

namespace App\Http\Controllers\ApiControllers;

use App\Models\Championship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChampionshipController extends Controller
{
    public function index() {
        $championships = Championship::all();

        return response()->json($championships);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required']
        ]);

        $championship['name'] = $data['name'];
        $championship = Championship::create($championship);

        return response()->json([
            'message' => "Campeonato salvo com sucesso",
            'campeonato' => $championship
        ]);
    }

    public function update(Request $request, Championship $championship)
    {
        $data = $request->validate([
            'name' => ['string', 'max:255']
        ]);

        $championship->update($data);

        return response()->json([
            'message' => "Campeonato salvo com sucesso",
            'campeonato' => $championship
        ]);
    }

    public function destroy(Championship $championship)
    {
        $championship->delete();

        return response()->json([
            'message' => "Campeonato deletado com sucesso"
        ]);
    }
}
