<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\Programme2Import;
use App\Models\Programme2;
use Illuminate\Http\Request;

class Programme2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgramme()
    {
        $programme2s = Programme2::all();
        return response()->json($programme2s, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgrammeById($id)
    {
        $programme2s = Programme2::find($id);
        if (is_null($programme2s)) {
            return response()->json(['message' => 'programme not found'], 404);
        }
        return response()->json(Programme2::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProgramme(Request $request)
    {
        $programme2s = Programme2::create($request->all());
        return response()->json($programme2s, 201);
    }

    public function updateProgramme(Request $request, $id)
    {
        $programme2s = Programme2::find($id);
        if (is_null($programme2s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme2s->update($request->all());
        return response()->json($programme2s, 200);
    }

    public function deleteProgramme(Request $request, $id)
    {
        $programme2s = Programme2::find($id);
        if (is_null($programme2s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme2s->delete();
        return response()->json($programme2s, 204);
    }

    public function rechercheInti(Request $request)
    {

        $query = Programme2::query();

        $data = $request->input('search_inti');
        if ($data) {
            $query->whereRaw("programme2 LIKE '%" . $data . "%'");
        }


        return $query->get();
    }

    public function rechercheProg(Request $request)
    {
        $query = Programme2::query();
        $data = $request->input('search_progr');
        if ($data) {
            $query->whereRaw("programme1 LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheEnn(Request $request)
    {
        $query = Programme2::query();
        $data = $request->input('search_enn');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function rechercheIntitu(Request $request)
    {
        $query = Programme2::query();
        $data = $request->input('search_intutle');
        if ($data) {
            $query->whereRaw("intitule LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function typeprojet(Request $request)
    {
        $query = Programme2::query();
        $data = $request->input('search_typeprojet');
        if ($data) {
            $query->whereRaw("typeprojet LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    

    public function getlastid()
    {
        $programme1s = Programme2::latest('id')->first();
        return response()->json($programme1s, 200);
    }

    public function fileImport(Request $request)
    {
        $imports =  Excel::import(new Programme2Import, $request->file);
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
     * @param  \App\Models\Programme2  $programme2
     * @return \Illuminate\Http\Response
     */
    public function show(Programme2 $programme2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme2  $programme2
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme2 $programme2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme2  $programme2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme2 $programme2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme2  $programme2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme2 $programme2)
    {
        //
    }
}
