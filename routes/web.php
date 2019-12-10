<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('apipatients', 'PatientController');
Route::resource('apidocs', 'MedicalHistoryController');


// Patients Routes
Route::get('/patients', 'PatientController@patientsindex')->name('patients_page');
Route::get('/patients/show/{id}', 'PatientController@patientshow')->name('patient_page');

//Medical histories Routes
Route::get('/medical/docs', 'MedicalHistoryController@mhindex')->name('documents_page');
Route::get('/medical/patient/{id}/new', 'MedicalHistoryController@mhcreate')->name('create_document_page');
Route::get('/medical/doc/{id}', 'MedicalHistoryController@mhshow')->name('show_document_page');



Route::get('/dashboard', 'HomeController@index')->name('dashboard');
