<?php

namespace App\Http\Controllers;

use App\Models\PDH;
use Illuminate\Http\Request;

class PDHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPdh()
    {
        $pdhs = PDH::all();
        return response()->json($pdhs,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
        public function addPdh(Request $request)
        {
          

    $pdfhs = PDH::where('annee', $request['annee'])->first();

        if ($pdfhs) {
            $response['status'] = 0;
            $response['message'] = 'Email Exists';
            $response['code'] = 409;
        }else{
            $pdfhs = PDH::create([
                'annee' => $request->annee,
          
            ]);
            $response['status'] = 1;
            $response['message'] = 'Sucess';
            $response['code'] = 200;
            return response()->json($response);
        }

     

    

            // $pdfhs = PDH::all();
            //     $pdhs = PDH::create([
            //         'annee' => $request->annee,
            //         'progres' => $request->progres,
            //         'actionpdh' => $request->actionpdh,
            //         'priorite' => $request->priorite,
            //     ]);
            //     $response['status'] = 1;
            //     $response['message'] = 'Sucess';
            //     $response['code'] = 200;
            //     return response()->json($response);
            
    
           
    
        
            
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
     * @param  \App\Models\PDH  $pDH
     * @return \Illuminate\Http\Response
     */
    public function getPdhById($id)
    {
        $pdhs = PDH::find($id);
        return response()->json($pdhs, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PDH  $pDH
     * @return \Illuminate\Http\Response
     */

     public function getLastyear()
     {
         $pdfhs = PDH::latest('annee')->first();
        // $pdfhs = PDH::latest()->first();
        return response()->json($pdfhs, 200,);
     }

    public function edit(PDH $pDH)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PDH  $pDH
     * @return \Illuminate\Http\Response
     */
    public function updatePDH(Request $request, $id)
    {
        $pdhs = PDH::find($id);
        if (is_null($pdhs)) {
            return response()->json(['message' => 'PDH not found'], 404);
        }
        $pdhs->update($request->all());
        return response()->json($pdhs, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PDH  $pDH
     * @return \Illuminate\Http\Response
     */

     public function pdhUpd(Request $request,$id){

      $pdhs = PDH::where('annee','=',$id)->first();
        if (is_null($pdhs)) {
            return response()->json(['message' => 'PDH not found'], 404);
         }
         $pdhs->update($request->all());
        return response()->json($pdhs,200);
     }


    public function annefindit($id){
    $pdhs = PDH::where('annee','=',$id)->first();
    return response()->json($pdhs, 200);
    }

    public function recherche(Request $request)
    {
        $query = PDH::query();
        $data = $request->input('search_annee');
        if ($data) {
            $query->whereRaw("annee LIKE '%" . $data . "%'");
        }
        return $query->get();
    }

}
