<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $currentMonth = date('m');
      $currentYear = date('Y');
      $patients = Patient::whereMonth('created_at', '=', $currentMonth)->get();
      $patients_year = Patient::whereYear('created_at', '=', $currentYear)->count();

      return view('dashboard', compact('patients', 'patients_year'));
    }
}