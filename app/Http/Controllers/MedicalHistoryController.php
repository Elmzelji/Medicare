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
    public function mhshow($id) {
      $history = MedicalHistory::findOrFail($id);
      $patient = Patient::findOrFail($history->patient_id);

      return view('MH.show', compact('history', 'patient'));
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
        $doc->note= $request->input('note');
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

    public function update(Request $request, $id)
    {
      $history = MedicalHistory::findOrFail($id);
      $history->weight= $request->input('weight');
      $history->ATCD= json_encode($request->input('ATCD'));
      $history->EXCV= json_encode($request->input('EXCV'));
      $history->CAF= json_encode($request->input('CAF'));
      $history->note= $request->input('note');
      if($history->save()) {
        return ['data' => $history];
      }else {
        return ['errors' => $history, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
      }
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        //
    }
}
