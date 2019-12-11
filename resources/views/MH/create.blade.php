@extends('layouts.app')

@section('content')
<div class="border-b sm:rounded mb-6 sm:w-3/4 mx-auto">
  <div class="w-full">
    <document-create :patient="{{json_encode($patient)}}" :count_docs="{{$count_docs}}" class="w-full">
      @csrf
    </document-create>
  </div>
</div>
@endsection
