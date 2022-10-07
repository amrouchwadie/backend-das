<?php

namespace App\Http\Controllers;

use App\Models\Commun;
use Illuminate\Http\Request;
use App\Models\Douar;

class CommunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcommun()
    {
        $communs = Commun::all();
        return response()->json($communs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcommunById($id)
    {
        $communs = Commun::find($id);
        if (is_null($communs)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json(Commun::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcommun(Request $request)
    {
        $communs = Commun::create($request->all());
        return response()->json($communs, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commun  $commun
     * @return \Illuminate\Http\Response
     */
    public function updatecommun(Request $request, $id)
    {
        $communs = Commun::find($id);
        if (is_null($communs)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $communs->update($request->all());
        return response()->json($communs, 200);
    }


    public function deletecommun(Request $request, $id)
    {
        $communs = Commun::find($id);
        if (is_null($communs)) {
            return response()->json(['message' => 'data not found'], 404);
        }
        $communs->delete();
        return response()->json($communs, 204);
    }


    public function ShowCommunDouarbyId($id)
    {

        $communs = Commun::all();
        $douars = Douar::where('commun_id', "=", $id)->get();
        // $products = $prod->categories;
        $communs = Commun::findOrFail($id);
        return response()->json([
            $communs,
            $douars
        ], 204);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commun  $commun
     * @return \Illuminate\Http\Response
     */
    public function edit(Commun $commun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commun  $commun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commun $commun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commun  $commun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commun $commun)
    {
        //
    }
}
