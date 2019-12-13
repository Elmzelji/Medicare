@extends('layouts.app')

@section('content')
<div class="bg-white p-6 mt-2">
  <div class="w-full">
    <h1 class="font-semibold text-doc_text text-2xl">Manage app</h1>
  </div>

  <div class="mt-12">
    <accord heading="Réglages de l'en-tête">
        <template v-slot:content>
          <form action="{{route('update_settings', '1')}}" method="post">
            @csrf
            <div class="flex px-10 py-6">
                <div class="w-full sm:w-1/2">
                    <div class="">
                        <div class="">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Titre:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Titre de l'application" value="{{$settings->title}}" name="title" required>
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Titre de la page d'accueil:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="title_heading" type="text" placeholder="Dr amzil ibrahim" value="{{$settings->title_heading}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Sous-titre de la page d'accueil:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="subtitle_heading" type="text" placeholder="Sous-titre de la page d'accueil" value="{{$settings->subtitle_heading}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Texte CTA de la première page:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="cta_text" type="text" placeholder="Texte CTA de la première page" value="{{$settings->cta_text}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Lien CTA de la première page:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" name="cta_link" type="text" placeholder="link to" value="{{$settings->cta_link}}">
                        </div>
                    </div>
                </div>

                <div class="hidden sm:inline mx-6"></div>

                <div class="hidden sm:flex items-end w-full sm:w-1/2">
                  <button type="submit" class="self-end bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                          <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                      <span>Sauvegarder</span>
                  </button>
                </div>
            </div>
          </form>
        </template>
    </accord>
    <accord heading="Réglages de Témoignages.">
        <template v-slot:content>
          <form action="{{route('update_testimonial_settings', '1')}}" method="post">
            @csrf
            <div class="flex flex-col sm:flex-row px-10 py-6">
                <div class="w-full sm:w-1/2">
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Témoignage 1 text:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" value="{{$settings->testemonial_1_text}}" type="text" name="testemonial_1_text" placeholder="Le text de la 1 Témoignage">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Lien d'mage Témoignage 1:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" value="{{$settings->testemonial_1_img_link}}" type="text" name="testemonial_1_img_link" placeholder="Le lien de l'image de la 1 Témoignage">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">La post de 1 témoignage:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Developer..." name="testemonial_1_profession" value="{{$settings->testemonial_1_profession}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">La nome de 1 témoignage::</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Youssef Elmzelji" name="testemonial_1_provider" value="{{$settings->testemonial_1_provider}}">
                        </div>
                    </div>
                </div>

                <div class="mx-6"></div>

                <div class="w-full sm:w-1/2">
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Témoignage 2 text:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Le text de la 2 Témoignage" name="testemonial_2_text" value="{{$settings->testemonial_2_text}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Lien d'mage Témoignage 2:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Le lien de l'image de la 2 Témoignage" name="testemonial_2_img_link" value="{{$settings->testemonial_2_img_link}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">La post de 2 témoignage:</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Developer..." name="testemonial_2_profession" value="{{$settings->testemonial_2_profession}}">
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">La nome de 2 témoignage::</h2>
                            <input class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" type="text" placeholder="Youssef Elmzelji" name="testemonial_2_provider" value="{{$settings->testemonial_2_provider}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="px-10 py-6 flex justify-end">
              <button type="submit" class="self-end bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                      <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                  <span>Sauvegarder</span>
              </button>
            </div>
          </form>
        </template>
    </accord>
    <accord heading="Réglages de A propos">
        <template v-slot:content>
          <form class="" action="{{route('update_about_settings', '1')}}" method="post">
            @csrf
            <div class="flex px-10 py-6">
                <div class="w-full">
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Présentation gauche</h2>
                            <input type="text" class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" placeholder="heading text" name="about_heading_left" value="{{$settings->about_heading_left}}">
                            <textarea class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
                              placeholder="Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book."
                              name="about_text_left">{{$settings->about_text_left}}</textarea>
                        </div>
                    </div>
                    <div class="">
                        <div class="mt-6">
                            <h2 class="font-medium uppercase text-gray-700 text-sm">Présentation droite</h2>
                            <input type="text" class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" placeholder="heading text" name="about_heading_right" value="{{$settings->about_heading_right}}">

                            <textarea class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
                              placeholder="Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book." name="about_text_right">{{$settings->about_text_right}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-10 py-6 flex justify-end">
              <button type="submit" class="self-end bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                      <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                  <span>Sauvegarder</span>
              </button>
            </div>
          </form>
        </template>
    </accord>

    <accord heading="Réglage cabinet">
      <template v-slot:content>
        <form class="" action="{{route('update_cabinet_settings', '1')}}" method="post">
          @csrf
          <div class="flex px-10 py-6">
              <div class="w-full">
                  <div class="">
                      <div class="mt-6">
                          <h2 class="font-medium uppercase text-gray-700 text-sm">Le prix de la session:</h2>
                          <input type="number" class="mt-2 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal" placeholder="heading text" name="cabinet_price" value="{{$settings->cabinet_price}}">
                      </div>
                  </div>
                  <div class="">

                  </div>
              </div>
          </div>
          <div class="px-10 py-6 flex justify-end">
            <button type="submit" class="self-end bg-doc_primary hover:bg-gray-400 hover:text-doc_text text-white font-bold py-2 px-4 rounded inline-flex items-center mx-auto">


                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                    <path d="M15.173 2H4c-1.101 0-2 .9-2 2v12c0 1.1.899 2 2 2h12c1.101 0 2-.9 2-2V5.127L15.173 2zM14 8c0 .549-.45 1-1 1H7c-.55 0-1-.451-1-1V3h8v5zm-1-4h-2v4h2V4z" /></svg>

                <span>Sauvegarder</span>
            </button>
          </div>
        </form>
      </template>
    </accord>


    <accord heading="Réglage ATCD">
      <template v-slot:content>
          <div class="">
            <input-symbole :symbols_items="{{$settings->ATCD}}" update_route="{{route('update_AUTO', ['1', 'ATCD'])}}"></input-symbole>
          </div>
      </template>
    </accord>

    <accord heading="Réglage EXCV">
      <template v-slot:content>
          <div class="">
            <input-symbole :symbols_items="{{$settings->EXCV}}" update_route="{{route('update_AUTO', ['1', 'EXCV'])}}"></input-symbole>
          </div>
      </template>
    </accord>

    <accord heading="Réglage CAF">
      <template v-slot:content>
          <div class="">
            <input-symbole :symbols_items="{{$settings->CAF}}" update_route="{{route('update_AUTO', ['1', 'CAF'])}}"></input-symbole>
          </div>
      </template>
    </accord>



  </div>

</div>


@endsection
