@extends('layouts.app')

@section('content')
<div class="border-b sm:rounded mb-6 w-3/4 mx-auto">
  <div>
    <patient-infos patient="{{$patient}}" back_url="{{route('patients_page')}}">
      @csrf
    </patient-infos>
  </div>
</div>
@endsection
