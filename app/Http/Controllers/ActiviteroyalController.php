<?php

namespace App\Http\Controllers;

use App\Models\Activiteroyal;
use Illuminate\Http\Request;

class ActiviteroyalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getActiviteroyal()
    {
        $activiteroyals = Activiteroyal::all();
        return response()->json($activiteroyals, 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getActiviteroyalById($id)
    {
        $activiteroyals = Activiteroyal::find($id);
        if (is_null($activiteroyals)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        return response()->json(Activiteroyal::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addActiviteroyal(Request $request)
    {
        $activiteroyals = Activiteroyal::create($request->all());
        return response()->json($activiteroyals, 201);
    }

    public function updateActiviteroyal(Request $request, $id)
    {
        $activiteroyals = Activiteroyal::find($id);
        if (is_null($activiteroyals)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $activiteroyals->update($request->all());
        return response()->json($activiteroyals, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activiteroyal  $activiteroyal
     * @return \Illuminate\Http\Response
     */
    public function deleteActiviteroyal(Request $request, $id)
    {
        $activiteroyals = Activiteroyal::find($id);
        if (is_null($activiteroyals)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $activiteroyals->delete();
        return response()->json($activiteroyals, 204);
    }

    public function searchvisite(Request $request)
    {
        $query = Activiteroyal::query();
        $data = $request->input('search_visite');
        if ($data) {
            $query->whereRaw("typeactivite LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function recherchecommun(Request $request)
    {
        $query = Activiteroyal::query();
        $data = $request->input('search_commun');
        if ($data) {
            $query->whereRaw("commun LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    
    public function recherchecsector(Request $request)
    {
        $query = Activiteroyal::query();
        $data = $request->input('search_sector');
        if ($data) {
            $query->whereRaw("secteur LIKE '%" . $data . "%'");
        }
        return $query->get();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activiteroyal  $activiteroyal
     * @return \Illuminate\Http\Response
     */
    public function edit(Activiteroyal $activiteroyal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activiteroyal  $activiteroyal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activiteroyal $activiteroyal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activiteroyal  $activiteroyal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activiteroyal $activiteroyal)
    {
        //
    }
}
