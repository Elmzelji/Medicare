@extends('layouts.app')

@section('content')
<div class="border-b sm:rounded mb-6 w-3/4 mx-auto">
  <div class="w-full">
    <document-show :patient="{{json_encode($patient)}}" :history="{{json_encode($history)}}" class="w-full">
      @csrf
    </document-show>
  </div>
</div>
@endsection
