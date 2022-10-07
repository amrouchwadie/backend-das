<?php

namespace App\Http\Controllers;

use App\Models\annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    public function getannee()
    {
        $annees = annee::all();
        return response()->json($annees, 200);
    }
    public function getanneeById($id)
    {
        $annees = annee::find($id);
        if (is_null($annees)) {
            return response()->json(['message' => 'annee not found'], 404);
        }
        return response()->json(annee::find($id), 200);
    }
    public function addannee(Request $request)
    {
        $annees = annee::create($request->all());
        return response()->json($annees, 201);
    }
    public function updateannee(Request $request, $id)
    {
        $annees = annee::find($id);
        if (is_null($annees)) {
            return response()->json(['message' => 'annee not found'], 404);
        }
        $annees->update($request->all());
        return response()->json($annees, 200);
    }

    public function deleteannee(Request $request, $id)
    {
        $annees = annee::find($id);
        if (is_null($annees)) {
            return response()->json(['message' => 'annee not found'], 404);
        }
        $annees->delete();
        return response()->json($annees, 204);
    }
}
