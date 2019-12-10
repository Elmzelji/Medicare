<?php

namespace App\Http\Controllers;

use App\MedicalHistory;
use App\Patient;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mhcreate($id) {
      $patient = Patient::findOrFail($id);
      $count_docs = $patient->histories()->count();
      return view('MH.create', compact('patient', 'count_docs'));
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $doc = new MedicalHistory();

        $doc->Reference= $request->input('Reference');
        $doc->patient_id= $request->input('patient_id');
        $doc->weight= $request->input('weight');
        $doc->ATCD= json_encode($request->input('ATCD'));
        $doc->EXCV= json_encode($request->input('EXCV'));
        $doc->CAF= json_encode($request->input('CAF'));

        if($doc->save()) {
          return ['data' => $doc];
        }else {
          return ['errors' => $doc, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
        }
    }


    public function show(MedicalHistory $medicalHistory)
    {
        //
    }


    public function edit(MedicalHistory $medicalHistory)
    {
        //
    }

    public function update(Request $request, MedicalHistory $medicalHistory)
    {
        //
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
