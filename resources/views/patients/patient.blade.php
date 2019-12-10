@extends('layouts.app')

@section('content')
<div class="sm:rounded mb-6 sm:w-3/4 mx-auto">
  <div class="border-b ">
    <patient-infos patient="{{$patient}}" medical_doc_url="{{route('create_document_page', $patient->id)}}" back_url="{{route('patients_page')}}">
      @csrf
    </patient-infos>
  </div>
  <div class="">
    tess
  </div>
</div>
@endsection
