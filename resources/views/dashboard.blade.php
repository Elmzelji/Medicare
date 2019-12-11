@extends('layouts.app')

@section('content')
    <div class="flex items-center mt-12">
        <div class="w-full">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <div class="flex-grow container mx-auto pt-6 pb-8">
                <div class="bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow mb-6">
                  <div class="border-b px-6">
                    <div class="flex justify-between -mb-px">
                      <div class="lg:hidden text-blue-dark py-4 text-lg">
                        Statistiques
                      </div>
                      <div class="hidden lg:flex">
                        <h1 class="appearance-none py-4 text-blue-dark border-b border-blue-dark mr-6">
                            Statistiques
                        </h1>
                      </div>
                    </div>
                  </div>

                  <dashboard-stats patients="{{$patients_year}}" prescriptions="0" atcd="0">
                  </dashboard-stats>

                  <div class="hidden lg:flex">
                    <div class="w-1/3 text-center py-8">
                      <a href="{{route('patients_page')}}">
                        <div class="border-r">
                          <div class="text-grey-darker mb-2">
                            <span class="text-5xl">{{$patients_year}}</span>
                          </div>
                          <div class="text-sm uppercase text-grey tracking-wide">
                            Patient
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="w-1/3 text-center py-8">
                      <a href="#">
                        <div class="border-r">
                          <div class="text-grey-darker mb-2">
                              <span class="text-5xl">0</span>
                          </div>
                          <div class="text-sm uppercase text-grey tracking-wide">
                            Ordonnances
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="w-1/3 text-center py-8">
                      <a href="#">
                        <div>
                          <div class="text-grey-darker mb-2">
                            <span class="text-5xl">{{$histories}}</span>
                          </div>
                          <div class="text-sm uppercase text-grey tracking-wide">
                            Antécédents
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="flex flex-wrap -mx-4">
                  <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
                    <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
                      <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px">
                          <h3 class="text-blue-dark py-4 font-normal text-lg">Dernier patient</h3>
                        </div>
                      </div>

                      @if($patients->count() > 0)





                      @foreach ($patients->sortByDesc('created_at')->take(5) as $patient)


                      <a href="{{ route('patient_page',  $patient->id) }}" class="flex-grow flex px-6 py-6 text-grey-darker items-center border-b -mx-4">
                        <div class="w-2/5 xl:w-1/4 px-4 flex items-center">
                          <div class="rounded-full bg-orange inline-flex mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 fill-current text-doc_text"><path d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM192 40c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm96 304c0 4.4-3.6 8-8 8h-56v56c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8v-56h-56c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h56v-56c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v56h56c4.4 0 8 3.6 8 8v48zm0-192c0 4.4-3.6 8-8 8H104c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h176c4.4 0 8 3.6 8 8v16z"/></svg>
                          </div>
                          <span class="text-lg">{{$patient->firstName}}</span>
                        </div>
                        <div class="hidden md:flex lg:hidden xl:flex w-1/4 px-4 items-center">
                          {{$patient->lastName}}
                          <div class="bg-pink-600 h-2 w-2 rounded-full ml-2"></div>
                        </div>
                        <div class="flex w-3/5 md:w/12">
                          <div class="w-1/2 px-4">
                            <div class="text-right">
                              <?php
                                $history = $patient->histories()->get()->sortByDesc('created_at')->first();
                              ?>
                              @if(is_null($history))
                                <p>N/a</p>
                              @else
                                {{$history->weight}}Kg
                              @endif
                            </div>
                          </div>
                          <div class="w-1/2 px-4">
                            <div class="text-right text-grey">
                              {{$patient->created_at}}
                            </div>
                          </div>
                        </div>
                      </a>


                      @endforeach

                        <div class="px-6 py-4">
                          <div class="text-center text-grey">
                            Nombre total de patients ce mois-ci &asymp; {{$patients->count()}}
                          </div>
                        </div>

                      @else

                      <div class="text-center px-6 py-4">
                          <div class="py-8">
                            <div class="mb-4">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="inline-block fill-current text-grey h-16 w-16"><path d="M96 224a64 64 0 10-64-64 64.06 64.06 0 0064 64zm224 32a112 112 0 10-112-112 111.94 111.94 0 00112 112zm32 96c0-19.1 3.92-37.17 10.09-54.17A152.75 152.75 0 01320 304c-24.6 0-47.6-6-68.5-16h-8.3A115.23 115.23 0 00128 403.2V432a48 48 0 0048 48h241c-39.22-29.19-65-75.47-65-128zm-178.9-77.4A63.81 63.81 0 00128 256H64a64.06 64.06 0 00-64 64v32a32 32 0 0032 32h65.9a146.64 146.64 0 0175.2-109.4zM512 224a128 128 0 10128 128 128 128 0 00-128-128zm64 144a5.33 5.33 0 01-5.33 5.33h-37.34v37.34A5.33 5.33 0 01528 416h-32a5.33 5.33 0 01-5.33-5.33v-37.34h-37.34A5.33 5.33 0 01448 368v-32a5.33 5.33 0 015.33-5.33h37.34v-37.34A5.33 5.33 0 01496 288h32a5.33 5.33 0 015.33 5.33v37.34h37.34A5.33 5.33 0 01576 336z"/></svg>
                            </div>
                            <p class="text-2xl text-grey-darker font-medium mb-4">Il n'y a pas encore de patients</p>
                            <p class="text-grey max-w-xs mx-auto mb-6">Vos 5 derniers patients seront ici.</p>
                          </div>
                      </div>


                    @endif

                    </div>
                  </div>
                  <div class="w-full lg:w-1/2 px-4">
                    <div class="bg-white border-t border-b sm:rounded sm:border shadow">
                      <div class="border-b">
                        <div class="flex justify-between px-6 -mb-px">
                          <h3 class="text-blue-dark py-4 font-normal text-lg">Dernières prescriptions</h3>
                        </div>
                      </div>
                      <div>
                        <div class="text-center px-6 py-4">
                          <div class="py-8">
                            <div class="mb-4">
                              <svg class="inline-block fill-current text-grey h-16 w-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11.933 13.069s7.059-5.094 6.276-10.924a.465.465 0 0 0-.112-.268.436.436 0 0 0-.263-.115C12.137.961 7.16 8.184 7.16 8.184c-4.318-.517-4.004.344-5.974 5.076-.377.902.234 1.213.904.959l2.148-.811 2.59 2.648-.793 2.199c-.248.686.055 1.311.938.926 4.624-2.016 5.466-1.694 4.96-6.112zm1.009-5.916a1.594 1.594 0 0 1 0-2.217 1.509 1.509 0 0 1 2.166 0 1.594 1.594 0 0 1 0 2.217 1.509 1.509 0 0 1-2.166 0z"/></svg>
                            </div>
                            <p class="text-2xl text-grey-darker font-medium mb-4">Pas de prescriptions récentes.</p>
                            <p class="text-grey max-w-xs mx-auto mb-6">Les dernières prescriptions seront affichées ici.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </div>

@endsection
