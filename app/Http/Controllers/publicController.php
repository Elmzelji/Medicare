<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class publicController extends Controller
{
  public function index () {
      $settings= Settings::all()->first();
      return view('welcome', compact('settings'));
  }
}
