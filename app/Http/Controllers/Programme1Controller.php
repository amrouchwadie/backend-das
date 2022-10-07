<?php

namespace App\Http\Controllers;

use App\Models\Programme1;
use App\Models\Programme2;
use App\Models\Programme3;
use App\Models\Programme4;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\Programme1Import;
use App\Models\PDH;
use App\Models\Planificationppdh;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class Programme1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgramme()
    {
        $programme1s = Programme1::all();
        return response()->json($programme1s, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProgrammeById($id)
    {
        $programme1s = Programme1::find($id);
        if (is_null($programme1s)) {
            return response()->json(['message' => 'programme not found'], 404);
        }
        return response()->json(Programme1::find($id), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProgramme(Request $request)
    {
        $programme1s = Programme1::create($request->all());
        return response()->json($programme1s, 201);
    }

    public function updateProgramme(Request $request, $id)
    {
        $programme1s = Programme1::find($id);
        if (is_null($programme1s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme1s->update($request->all());
        return response()->json($programme1s, 200);
    }

    public function deleteProgramme(Request $request, $id)
    {
        $programme1s = Programme1::find($id);
        if (is_null($programme1s)) {
            return response()->json(['message' => 'Programme not found'], 404);
        }
        $programme1s->delete();
        return response()->json($programme1s, 204);
    }

    public function fileImport(Request $request)
    {
        $imports =  Excel::import(new Programme1Import, $request->file);
        return response()->json($imports, 202);
    }


    public function rechercheInti(Request $request)
    {

        $query = Programme1::query();
        $querys = Programme2::query();
        $queryse = Programme3::query();
        $queryses = Programme3::query();

        $data = $request->input('search_prog');
        if ($data) {
            $query->WhereRaw("programme1 LIKE '%" . $data . "%'");
        } elseif ($data) {
            $querys->WhereRaw("programme2 LIKE '%" . $data . "%'");
        } elseif ($data) {
            $queryse->WhereRaw("programme3 LIKE '%" . $data . "%'");
        } elseif ($data) {
            $queryses->WhereRaw("programme4 LIKE '%" . $data . "%'");
        }


        return  [
            $query->get(),
            $querys->get(),
            $queryse->get(),
            $queryses->get(),
        ];
    }

    public function rechercheAnnee(Request $request)
    {

        $keyword = $request->input('search_annn');
        $result1 = Programme1::where('annee', 'LIKE', '%' . $keyword . '%')

            ->orderBy('id', 'desc');

        $result2 = Programme2::where('annee', 'LIKE', '%' . $keyword . '%')

            ->orderBy('id', 'desc');

        $result3 = Programme3::where('annee', 'LIKE', '%' . $keyword . '%')

            ->orderBy('id', 'desc');

        $result4 = Programme4::where('annee', 'LIKE', '%' . $keyword . '%')

            ->orderBy('id', 'desc');



        return response()->json([
            $result1->get(),
            $result2->get(),
            $result3->get(),
            $result4->get(),
        ], 200);
    }

    public function rechercheProg(Request $request)
    {
        $query = Programme1::query();
        $data = $request->input('search_progr');
        if ($data) {
            $query->whereRaw("programme1 LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function rechercheEnn(Request $request)
    {
        $query = Programme1::query();
        $data = $request->input('search_enn');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }
    public function rechercheIntitu(Request $request)
    {
        $query = Programme1::query();
        $data = $request->input('search_intutle');
        if ($data) {
            $query->whereRaw("intitule LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

    public function typeprojet(Request $request)
    {
        $query = Programme1::query();
        $data = $request->input('search_typeprojet');
        if ($data) {
            $query->whereRaw("typeprojet LIKE '%" . $data . "%'");
        }
        return $query->get();
    }


    public function getlastid()
    {
        $programme1s = Programme1::latest('id')->first();
        return response()->json($programme1s, 200);
    }

    public function rechercheProgrammes(Request $request)
    {
        $keyword = $request->input('search_program');
        $result1 = Programme1::where('programme1', 'LIKE', '%' . $keyword . '%')
            ->orWhere('annee', 'LIKE', '%' . $keyword . '%')
            ->orderBy('id', 'desc');

        $result2 = Programme2::where('programme2', 'LIKE', '%' . $keyword . '%')
            ->orWhere('annee', 'LIKE', '%' . $keyword . '%')
            ->orderBy('id', 'desc');

        $result3 = Programme3::where('programme3', 'LIKE', '%' . $keyword . '%')
            ->orWhere('annee', 'LIKE', '%' . $keyword . '%')
            ->orderBy('id', 'desc');

        $result4 = Programme4::where('programme4', 'LIKE', '%' . $keyword . '%')
            ->orWhere('annee', 'LIKE', '%' . $keyword . '%')
            ->orderBy('id', 'desc');

        return response()->json([
            $result1->get(),
            $result2->get(),
            $result3->get(),
            $result4->get(),
        ], 200);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme1  $programme1
     * @return \Illuminate\Http\Response
     */
    public function show(Programme1 $programme1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme1  $programme1
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme1 $programme1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme1  $programme1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme1 $programme1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme1  $programme1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programme1 $programme1)
    {
        //
    }

    public function getcountProgramme1()
    {
        $programme1s = Programme1::count();
        return response()->json($programme1s, 200);
    }

    public function getcountProgramme2()
    {
        $programme2s = Programme2::count();
        return response()->json($programme2s, 200);
    }
    public function getcountProgramme3()
    {
        $programme3s = Programme3::count();
        return response()->json($programme3s, 200);
    }
    public function getcountProgramme4()
    {
        $programme4s = Programme4::count();
        return response()->json($programme4s, 200);
    }

    public function getcountPdh()
    {
        $pdhs = PDH::count();
        return response()->json($pdhs, 200);
    }

    public function getcountsppdh()
    {
        $sppdhs = Planificationppdh::count();
        return response()->json($sppdhs, 200);
    }

    public function uploadContentWithPackage(Request $request)
    {
        if ($request->file) {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
            $fileSize = $file->getSize(); //Get size of uploaded file in bytes
            //Checks to see that the valid file types and sizes were uploaded
            $this->checkUploadedFileProperties($extension, $fileSize);

            $import = new Programme1Import();
            Excel::import($import, $request->file);

            //Return a success response with the number if records uploaded
            return response()->json([
                'message' => $import->data->count() . " records successfully uploaded"
            ]);
        } else {
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
    }
    public function checkUploadedFileProperties($extension, $fileSize): void
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            } else {
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
            }
        } else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }
}
