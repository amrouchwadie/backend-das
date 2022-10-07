<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaisirEnMiseEnOuvre;

use function PHPUnit\Framework\isFalse;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\isTrue;

class SaisirEnMiseEnOuvreController extends Controller
{
    public function allSuivis()
    {
        $SaisirEnMiseEnOuvres = SaisirEnMiseEnOuvre::all();
        return response()->json($SaisirEnMiseEnOuvres, 200);
    }

    public function getSuivisbyId($id)
    {
        $SaisirEnMiseEnOuvres = SaisirEnMiseEnOuvre::find($id);
        if (is_null($SaisirEnMiseEnOuvres)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(SaisirEnMiseEnOuvre::find($id), 200);
    }

    public function addSuivis(Request $request)
    {
        $SaisirEnMiseEnOuvres = SaisirEnMiseEnOuvre::create($request->all());
        return response()->json($SaisirEnMiseEnOuvres, 201);
    }

    public function updateSuivis(Request $request, $id)
    {
        $SaisirEnMiseEnOuvres = SaisirEnMiseEnOuvre::find($id);
        if (is_null($SaisirEnMiseEnOuvres)) {
            return response()->json(['message' => 'Suivi not found'], 404);
        }
        $SaisirEnMiseEnOuvres->update($request->all());
        return response()->json($SaisirEnMiseEnOuvres, 200);
    }

    public function deleteSuivis(Request $request, $id)
    {
        $SaisirEnMiseEnOuvres = SaisirEnMiseEnOuvre::find($id);

        $SaisirEnMiseEnOuvres->delete();
        return response()->json($SaisirEnMiseEnOuvres, 204);
    }

    public function recherche(Request $request)
    {
        $query = SaisirEnMiseEnOuvre::query();
        $data = $request->input('search_suivi');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheRef(Request $request)
    {
        $query = SaisirEnMiseEnOuvre::query();
        $data = $request->input('search_ref');
        if ($data) {
            $query->whereRaw("reference LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function rechercheSec(Request $request)
    {
        $query = SaisirEnMiseEnOuvre::query();
        $data = $request->input('search_sec');
        if ($data) {
            $query->whereRaw("secteur LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheInti(Request $request)
    {
        $query = SaisirEnMiseEnOuvre::query();
        $data = $request->input('search_inti');
        if ($data) {
            $query->whereRaw("intitule LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
}
