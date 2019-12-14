@extends('layouts.app')

@section('content')
<div class="border-b sm:rounded mb-6 w-full sm:w-3/4 mx-auto">
  <div>
    <patient-create back_url="{{route('patients_page')}}">
      @csrf
    </patient-create>
  </div>
</div>
@endsection
