@extends('layouts.app')

@section('content')
<div class="sm:rounded mb-6 sm:w-3/4 mx-auto">
  <div class="border-b ">
    <patient-infos patient="{{$patient}}" medical_doc_url="{{route('create_document_page', $patient->id)}}" back_url="{{route('patients_page')}}">
      @csrf
    </patient-infos>
  </div>
  <div class="mt-6 flex flex-col sm:flex-row justify-between">

    @foreach ($docs as $doc)

    <a href="{{route('show_document_page', $doc->id)}}" class="w-full bg-white sm:max-w-sm rounded overflow-hidden shadow-lg leading-relaxed py-6">
      <div class="flex items-center justify-between px-6">
        <div class="text-gray-700 text-sm font-semibold underline">{{ Carbon\Carbon::parse($doc->created_at)->format('d-m-Y') }}</div>
        <p class="font-bold text-xl">
          {{$doc->weight}}Kg
        </p>
      </div>

      <?php
        $ATCDS= json_decode($doc->ATCD, true);
        $EXCVS= json_decode($doc->EXCV, true);
        $CAFS= json_decode($doc->CAF, true);
      ?>

      @if(count($ATCDS) > 0)
      <div class="px-6 py-4">
        <div class="text-gray-700 font-semibold text-base ml-2">ATCD:</div>
        <div class="mt-2">

          @foreach ($ATCDS as $atcd)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{$atcd['name']}}</span>
          @endforeach

        </div>
      </div>
      @endif

      @if(count($EXCVS) > 0)
      <div class="px-6 py-4">
        <div class="text-gray-700 font-semibold text-base ml-2">EXCV:</div>
        <div class="mt-2">
          @foreach ($EXCVS as $excvs)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{$excvs['name']}}</span>
          @endforeach
        </div>
      </div>
      @endif


      @if(count($CAFS) > 0)
      <div class="px-6 py-4">
        <div class="text-gray-700 font-semibold text-base ml-2">CAF:</div>
        <div class="mt-2">
          @foreach ($CAFS as $cafs)
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{$cafs['name']}}</span>
          @endforeach
        </div>
      </div>
      @endif

    </a>

    @endforeach

  </div>
</div>
@endsection
