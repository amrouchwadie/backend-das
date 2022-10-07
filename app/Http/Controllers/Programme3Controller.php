<?php

namespace App\Http\Controllers;

use App\Models\Programme3;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\Programme3Import;
class Programme3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProgramme()
    {
        $programme3s = Programme3::all();
        return response()->json($programme3s, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgrammeById($id)
    {
        $programme3s = Programme3::find($id);
        if (is_null($programme3s)) {
            return response()->json(['message' => 'programme not found'], 404);
        }
        return response()->json(Programme3::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProgramme(Request $request)
    {
        $programme3s = Programme3::create($request->all());
        return response()->json($programme3s, 201);
    }

    public function updateProgramme(Request $request, $id)
    {
        $programme3s = Programme3::find($id);
        if (is_null($programme3s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme3s->update($request->all());
        return response()->json($programme3s, 200);
    }

    public function deleteProgramme(Request $request, $id)
    {
        $programme3s = Programme3::find($id);
        if (is_null($programme3s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme3s->delete();
        return response()->json($programme3s, 204);
    }

    public function rechercheInti(Request $request)
    {

        $query = Programme3::query();

        $data = $request->input('search_inti');
        if ($data) {
            $query->whereRaw("Programme3 LIKE '%" . $data . "%'");
        }


        return $query->get();
    }

    public function rechercheProg(Request $request)
    {
        $query = Programme3::query();
        $data = $request->input('search_progr');
        if ($data) {
            $query->whereRaw("programme3 LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheEnn(Request $request)
    {
        $query = Programme3::query();
        $data = $request->input('search_enn');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function rechercheIntitu(Request $request)
    {
        $query = Programme3::query();
        $data = $request->input('search_intutle');
        if ($data) {
            $query->whereRaw("intitule LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function typeprojet(Request $request)
    {
        $query = Programme3::query();
        $data = $request->input('search_typeprojet');
        if ($data) {
            $query->whereRaw("typeprojet LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function getlastid()
    {
        $programme1s = Programme3::latest('id')->first();
        return response()->json($programme1s, 200);
    }

    public function fileImport(Request $request)
    {
        $imports =  Excel::import(new Programme3Import, $request->file);
        return response()->json($imports, 202);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme3  $programme3
     * @return \Illuminate\Http\Response
     */
    public function show(Programme3 $programme3)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme3  $programme3
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme3 $programme3)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme3  $programme3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme3 $programme3)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme3  $programme3
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme3 $programme3)
    {
        //
    }
}
