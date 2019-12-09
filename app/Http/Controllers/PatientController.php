<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Response;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function patientsindex() {
      return view('patients.patients');
    }
    public function patientshow($id) {
      $patient = Patient::findOrFail($id);
      return view('patients.patient', compact('patient'));
    }

    public function index(Request $request)
    {
      if ( $request->input('client') ) {
    	    return Patient::select('id', 'firstName', 'lastName', 'phoneNumber', 'gender', 'birthDate')->get();
    	}
        $columns = ['firstName', 'lastName', 'phoneNumber', 'gender', 'birthDate'];
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $dir = $request->input('dir');
        $searchValue = $request->input('search');
        $query = Patient::select('id', 'firstName', 'lastName', 'phoneNumber', 'gender', 'birthDate')->orderBy($columns[$column], $dir);
        if ($searchValue) {
            $query->where(function($query) use ($searchValue) {
                $query->where('lastName', 'like', '%' . $searchValue . '%')
                ->orWhere('firstName', 'like', '%' . $searchValue . '%');
            });
        }
        $patients = $query->paginate($length);
        return ['data' => $patients, 'draw' => $request->input('draw')];
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $patient = new Patient;
        $patient->firstName = $request->input('firstName');
        $patient->lastName = $request->input('lastName');
        $patient->profession = $request->input('profession');
        $patient->birthDate = $request->input('birthDate');
        $patient->addresse = $request->input('addresse');
        $patient->phoneNumber = $request->input('phoneNumber');
        $patient->sentBy = $request->input('sentBy');
        $patient->gender = $request->input('gender');
        if($patient->save()) {
          return ['data' => $patient];
        }else {
          return ['errors' => $patient, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
        }
    }

    public function show(Patient $patient)
    {
        //
    }

    public function edit(Patient $patient)
    {
        //
    }

    public function update(Request $request, $id)
    {
      $patient = Patient::findOrFail($id);
      $patient->firstName = $request->input('firstName');
      $patient->lastName = $request->input('lastName');
      $patient->profession = $request->input('profession');
      $patient->birthDate = $request->input('birthDate');
      $patient->addresse = $request->input('addresse');
      $patient->phoneNumber = $request->input('phoneNumber');
      $patient->sentBy = $request->input('sentBy');
      if($patient->save()) {
        return ['data' => $patient];
      }
    }

    public function destroy(Patient $patient)
    {
        //
    }
}
