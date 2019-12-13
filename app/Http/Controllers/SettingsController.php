<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;


class SettingsController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index() {
    $settings = Settings::findOrFail('1');
    return view('settings', compact('settings'));
  }
  public function updateHeading(Request $request, $id) {
    $settings = Settings::findOrFail($id);
    $settings->title = $request->input('title');
    $settings->title_heading = $request->input('title_heading');
    $settings->subtitle_heading = $request->input('subtitle_heading');
    $settings->cta_text = $request->input('cta_text');
    $settings->cta_link = $request->input('cta_link');
    if($settings->save()) {
      return redirect()->route('settings.index');

    }else {
      return ['errors' => $settings, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
    }
  }

  public function updateTestimonial(Request $request, $id) {
    $settings = Settings::findOrFail($id);
    $settings->testemonial_1_text = $request->input('testemonial_1_text');
    $settings->testemonial_1_img_link = $request->input('testemonial_1_img_link');
    $settings->testemonial_1_profession = $request->input('testemonial_1_profession');
    $settings->testemonial_1_provider = $request->input('testemonial_1_provider');

    $settings->testemonial_2_text = $request->input('testemonial_2_text');
    $settings->testemonial_2_img_link = $request->input('testemonial_2_img_link');
    $settings->testemonial_2_profession = $request->input('testemonial_2_profession');
    $settings->testemonial_2_provider = $request->input('testemonial_2_provider');

    if($settings->save()) {
      return redirect()->route('settings.index');

    }else {
      return ['errors' => $settings, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
    }
  }

  public function updateAbout(Request $request, $id) {
    $settings = Settings::findOrFail($id);
    $settings->about_heading_left = $request->input('about_heading_left');
    $settings->about_text_left = $request->input('about_text_left');

    $settings->about_heading_right = $request->input('about_heading_right');
    $settings->about_text_right = $request->input('about_text_right');

    if($settings->save()) {
      return redirect()->route('settings.index');

    }else {
      return ['errors' => $settings, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
    }
  }

  public function updateAuto(Request $request, $id, $type) {
    $settings = Settings::findOrFail($id);
    if($type == "ATCD"){
      $settings->ATCD = json_encode($request->get("data"));
    }
    if($type == "EXCV"){
      $settings->EXCV = json_encode($request->get("data"));
    }
    if($type == "CAF"){
      $settings->CAF = json_encode($request->get("data"));
    }
    if($settings->save()) {
      return ['data' => $type];

    }else {
      return ['errors' => $settings, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
    }
  }

  public function updateCabinet(Request $request, $id) {
    $settings = Settings::findOrFail($id);
    $settings->cabinet_price = $request->input('cabinet_price');
    if($settings->save()) {
      return redirect()->route('settings.index');

    }else {
      return ['errors' => $settings, 'message'=>'Quelque chose s\'est mal passé, vérifiez à nouveau les données fournies.'];
    }
  }
}
