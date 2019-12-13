<?php


Route::get('/', 'publicController@index')->name('frontpage');

Auth::routes();

Route::resource('apipatients', 'PatientController');
Route::resource('apidocs', 'MedicalHistoryController');
Route::resource('settings', 'SettingsController');

Route::post('settings/heading/{id}', 'SettingsController@updateHeading')->name('update_settings');
Route::post('settings/testimonial/{id}', 'SettingsController@updateTestimonial')->name('update_testimonial_settings');
Route::post('settings/about/{id}', 'SettingsController@updateAbout')->name('update_about_settings');


Route::post('settings/auto/{id}/{type}', 'SettingsController@updateAuto')->name('update_AUTO');


Route::post('settings/cabinet/{id}', 'SettingsController@updateCabinet')->name('update_cabinet_settings');



// Patients Routes
Route::get('/patients', 'PatientController@patientsindex')->name('patients_page');
Route::get('/patients/show/{id}', 'PatientController@patientshow')->name('patient_page');

//Medical histories Routes
Route::get('/medical/docs', 'MedicalHistoryController@mhindex')->name('documents_page');
Route::get('/medical/patient/{id}/new', 'MedicalHistoryController@mhcreate')->name('create_document_page');
Route::get('/medical/doc/{id}', 'MedicalHistoryController@mhshow')->name('show_document_page');



Route::get('/dashboard', 'HomeController@index')->name('dashboard');
