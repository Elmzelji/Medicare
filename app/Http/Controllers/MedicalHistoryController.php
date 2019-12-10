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
        //
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
