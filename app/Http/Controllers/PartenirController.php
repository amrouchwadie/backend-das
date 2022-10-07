<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenir;

class PartenirController extends Controller
{

    public function getPartenir()
    {
        $partenirs = Partenir::all();
        return response()->json($partenirs, 200);
    }

    public function getPartenirById($id)
    {
        $partenirs = Partenir::find($id);
        if (is_null($partenirs)) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        return response()->json(Partenir::find($id), 200);
    }

    public function addPartenir(Request $request)
    {
        $partenirs = Partenir::create($request->all());
        return response()->json($partenirs, 201);
    }
    public function updatePartenir(Request $request, $id)
    {
        $partenirs = Partenir::find('annee');
        if (is_null($partenirs)) {
            return response()->json(['message' => 'Partenir not found'], 404);
        }
        $partenirs->update($request->all());
        return response()->json($partenirs, 200);
    }
    public function deletePartenir(Request $request, $id)
    {
        $partenirs = Partenir::find($id);
        if (is_null($partenirs)) {
            return response()->json(['message' => 'Partenir not found'], 404);
        }
        $partenirs->delete();
        return response()->json($partenirs, 204);
    }
}
