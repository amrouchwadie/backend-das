<?php

namespace App\Http\Controllers;

use App\Models\Programme4;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\Programme4Import;

class Programme4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgramme()
    {
        $programme4s = Programme4::all();
        return response()->json($programme4s, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgrammeById($id)
    {
        $programme4s = Programme4::find($id);
        if (is_null($programme4s)) {
            return response()->json(['message' => 'programme not found'], 404);
        }
        return response()->json(Programme4::find($id), 200);
    }

    public function rechercheInti(Request $request)
    {

        $query = Programme4::query();

        $data = $request->input('search_inti');
        if ($data) {
            $query->whereRaw("Programme4 LIKE '%" . $data . "%'");
        }


        return $query->get();
    }

    public function rechercheProg(Request $request)
    {
        $query = Programme4::query();
        $data = $request->input('search_progr');
        if ($data) {
            $query->whereRaw("programme LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheEnn(Request $request)
    {
        $query = Programme4::query();
        $data = $request->input('search_enn');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function rechercheIntitu(Request $request)
    {
        $query = Programme4::query();
        $data = $request->input('search_intutle');
        if ($data) {
            $query->whereRaw("intitule LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function typeprojet(Request $request)
    {
        $query = Programme4::query();
        $data = $request->input('search_typeprojet');
        if ($data) {
            $query->whereRaw("typeprojet LIKE '%" . $data . "%'");
        }
        return $query->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProgramme(Request $request)
    {
        $programme4s = Programme4::create($request->all());
        return response()->json($programme4s, 201);
    }

    public function updateProgramme(Request $request, $id)
    {
        $programme4s = Programme4::find($id);
        if (is_null($programme4s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme4s->update($request->all());
        return response()->json($programme4s, 200);
    }

    public function deleteProgramme(Request $request, $id)
    {
        $programme4s = Programme4::find($id);
        if (is_null($programme4s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme4s->delete();
        return response()->json($programme4s, 204);
    }

    public function getlastid()
    {
        $programme1s = Programme4::latest('id')->first();
        return response()->json($programme1s, 200);
    }

    public function fileImport(Request $request)
    {
        $imports =  Excel::import(new Programme4Import, $request->file);
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
     * @param  \App\Models\Programme4  $programme4
     * @return \Illuminate\Http\Response
     */
    public function show(Programme4 $programme4)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme4  $programme4
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme4 $programme4)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme4  $programme4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme4 $programme4)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme4  $programme4
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme4 $programme4)
    {
        //
    }
}
