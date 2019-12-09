@extends('layouts.public')

@section('content')

     <!-- Hero -->
    <section class="mt-16">
        <div class="flex justify-between items-center">

            <div class="w-full">
                <h1 class="text-3xl sm:text-5xl font-bold leading-relaxed">Dr. Ibrahim Amzil</h1>
                <p class="w-full sm:w-2/3 min-w-0 text-lg font-medium leading-relaxed mt-8">Maintenir le corps en bonne santé est un devoir, sinon nous ne serons pas capables de garder notre esprit fort et clair.</p>
                <div class="mt-10">
                    <a href="#" class="uppercase bg-doc_primary text-white text-sm font-semibold shadow-md px-6 py-2">Fixer un rendez-vous</a>
                </div>
            </div>
            <img class="hidden sm:inline  sm:w-full" src="{{URL('/images/hero_bg.svg')}}">

        </div>
    </section>

    <!-- Testimonial -->
    <section class="mt-32">
        <div class="flex-row sm:flex">
            <div class="shadow-lg bg-white p-6 w-full">

                <div class="flex justify-between items-start">
                    <div class="flex">
                        <img src="https://randomuser.me/api/portraits/men/61.jpg" alt="user_1" class="w-16">
                        <div class="self-center ml-4">
                            <h1 class="font-medium">Hassna Lazar</h1>
                            <h2 class="text-doc_primary mt-2">CEO, PrettyDopeDesigns</h2>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="fill-current text-doc_primary w-12"><path d="M0 4v12h8c0 4.41-3.586 8-8 8v4c6.617 0 12-5.383 12-12V4H0zM20 4v12h8c0 4.41-3.586 8-8 8v4c6.617 0 12-5.383 12-12V4H20z"/></svg>
                </div>

                <p class="leading-relaxed mt-4">
                    “Dr Amzil sans hesiter il est a l'ecoute pas de retard sur les rdv il est top”
                </p>

            </div>

            <div class="shadow-lg bg-white p-6 mt-6 sm:mt-0 sm:ml-6 w-full">

                <div class="flex justify-between items-start">
                    <div class="flex">
                        <img src="https://randomuser.me/api/portraits/women/13.jpg" alt="user_2" class="w-16">
                        <div class="self-center ml-4">
                            <h1 class="font-medium">Ouafae Raïssi</h1>
                            <h2 class="text-doc_primary mt-2">Founder, ImpactNation</h2>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="fill-current text-doc_primary w-12"><path d="M0 4v12h8c0 4.41-3.586 8-8 8v4c6.617 0 12-5.383 12-12V4H0zM20 4v12h8c0 4.41-3.586 8-8 8v4c6.617 0 12-5.383 12-12V4H20z"/></svg>
                </div>

                <p class="leading-relaxed mt-4">
                    “Excellent médecin et s'il dépasse ses compétences, il vous orientera vers le bon spécialiste.”
                </p>

            </div>
        </div>
    </section>

    <!-- How it works -->
    <section class="mt-32">
        <h1 class="uppercase text-2xl font-semibold">Nos services</h1>
        <div class="border-b-2 border-doc_primary mt-2 w-12"></div>

        <div class="flex-row sm:flex mt-6">
            <div class="bg-white shadow-lg p-4 bg-right-bottom bg-30 bg-no-repeat" style="background-image: url('{{URL('/images/DecorationJuju.png')}}');">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="uppercase font-semibold text-sm">Step 1</h1>
                        <p class="uppercase mt-4 text-doc_primary text-base font-medium">Upload Data</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-12"><path d="M15.213 6.639c-.276 0-.546.025-.809.068C13.748 4.562 11.716 3 9.309 3c-2.939 0-5.32 2.328-5.32 5.199 0 .256.02.508.057.756a3.567 3.567 0 00-.429-.027C1.619 8.928 0 10.51 0 12.463S1.619 16 3.617 16H8v-4H5.5L10 7l4.5 5H12v4h3.213C17.856 16 20 13.904 20 11.32c0-2.586-2.144-4.681-4.787-4.681z"/></svg>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    Upload your customer data or connect your store
                </p>
            </div>

            <div class="bg-white shadow-lg p-4 mt-4 sm:mt-0 sm:ml-4 bg-right-bottom bg-30 bg-no-repeat" style="background-image: url('{{URL('/images/DecorationJuju.png')}}');">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="uppercase font-semibold text-sm">Step 2</h1>
                        <p class="uppercase mt-4 text-doc_primary text-base font-medium">Pick template</p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-12"><path d="M19.398 7.415l-7.444-1.996L10.651.558c-.109-.406-.545-.642-.973-.529L.602 2.461c-.428.114-.686.538-.577.944l3.23 12.051c.109.406.544.643.971.527l3.613-.967-.492 1.838c-.109.406.149.83.577.943l8.11 2.174c.428.115.862-.121.972-.529l2.97-11.084c.108-.406-.15-.83-.578-.943zM1.633 3.631l7.83-2.096 2.898 10.818-7.83 2.096L1.633 3.631zm14.045 14.832L8.864 16.6l.536-2.002 3.901-1.047c.428-.113.688-.537.578-.943l-1.508-5.627 5.947 1.631-2.64 9.851z"/></svg>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    Upload your customer data or connect your store
                </p>
            </div>

            <div class="bg-white shadow-lg p-4 mt-4 sm:mt-0 sm:ml-4 bg-right-bottom bg-30 bg-no-repeat" style="background-image: url('{{URL('/images/DecorationJuju.png')}}');">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="uppercase font-semibold text-sm">Step 3</h1>
                        <p class="uppercase mt-4 text-doc_primary text-base font-medium">Generate</p>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-12"><path d="M11 0H3a1 1 0 00-1 1v12a1 1 0 001 1h5v2h2v-2H8.001v-2H10v-2H8v2H4V2h6v4h2V1a1 1 0 00-1-1zM8 7v1h2V6H9a1 1 0 00-1 1zm4 13h2v-2h-2v2zm0-12h2V6h-2v2zM8 19a1 1 0 001 1h1v-2H8v1zm9-13h-1v2h2V7a1 1 0 00-1-1zm-1 14h1a1 1 0 001-1v-1h-2v2zm0-8h2v-2h-2v2zm0 4h2v-2h-2v2z"/></svg>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    Upload your customer data or connect your store
                </p>
            </div>
        </div>
    </section>

    <!-- Use case -->
    <!-- <section class="mt-32">
        <h1 class="uppercase text-2xl font-semibold">Who is doctag for</h1>
        <div class="border-b-2 border-doc_primary mt-2 w-12"></div>

        <div class="flex-row sm:flex mt-6">
            <div class="bg-white shadow-lg p-4 w-full">
                <div class="">
                    <div>
                        <p class="uppercase mt-4 text-doc_primary text-base font-semibold">eCommerce brands</p>
                    </div>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    a great way to level up your shipping and fulfillment strategy.
                </p>
            </div>

            <div class="bg-white shadow-lg p-4 mt-4 sm:mt-0 sm:ml-4 w-full">
                <div class="">
                    <div>
                        <p class="uppercase mt-4 text-doc_primary text-base font-semibold">Small Business</p>
                    </div>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    increase the exposure that the insert receives.
                </p>
            </div>

            <div class="bg-white shadow-lg p-4 mt-4 sm:mt-0 sm:ml-4 w-full">
                <div class="">
                    <div>
                        <p class="uppercase mt-4 text-doc_primary text-base font-semibold">Starups</p>
                    </div>
                </div>
                <p class="leading-relaxed font-medium mt-4">
                    The average conversion rate for docage insert marketing programs is .35%.
                </p>
            </div>

        </div>
    </section> -->

    <!-- Story -->
    <section class="mt-32">
        <h1 class="uppercase text-2xl font-semibold">MON HISTOIRE</h1>
        <div class="border-b-2 border-doc_primary mt-2 w-12"></div>

        <div class="flex-row sm:flex sm:justify-between mt-6">
            <div class="p-4 w-full">


                <div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-10"><path d="M17.924 17.315c-.057.174-.193.367-.416.432-.161.047-5.488 1.59-5.652 1.633-.469.125-.795.033-1.009-.156-.326-.287-4.093-2.85-8.845-3.092-.508-.025-.259-1.951 1.193-1.951.995 0 3.904.723 4.255.371.271-.272.394-1.879-.737-4.683L4.438 4.232a1.045 1.045 0 011.937-.781L8.361 8.37c.193.48.431.662.69.562.231-.088.279-.242.139-.709L7.144 2.195A1.043 1.043 0 017.796.871a1.042 1.042 0 011.325.652l1.946 5.732c.172.504.354.768.642.646.173-.073.161-.338.115-.569l-1.366-5.471a1.045 1.045 0 112.027-.506l1.26 5.042c.184.741.353 1.008.646.935.299-.073.285-.319.244-.522l-.872-4.328a.95.95 0 011.86-.375l.948 4.711.001.001v.001l.568 2.825c.124.533.266 1.035.45 1.527 1.085 2.889.519 5.564.334 6.143z"/></svg>
                        <h1 class="font-semibold text-lg ml-2">Qui suis-je ?</h1>
                    </div>

                    <p class="mt-2 leading-relaxed text-justify">Hi! I’m Youssef ELMZELJI — passionate entrepeneur that loves user experience. Building things people want makes me happy!</p>
                    <p class="mt-4 leading-relaxed text-justify">I’ve started doctag because I as an eCommerce brand owner, i know how special the unboxing moment is for shoppers. Including a docage insert in the box means your message is part of that magic moment. docage inserts – especially nice ones – get read. Maybe it’s because they remind us of the gift cards that come along with presents.</p>
                </div>
            </div>
            <div class="hidden sm:inline w-32"></div>
            <div class="p-4 w-full">

                <div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current text-doc_primary w-10"><path d="M19.753 10.909c-.624-1.707-2.366-2.726-4.661-2.726-.09 0-.176.002-.262.006l-.016-2.063 3.525-.607c.115-.019.133-.119.109-.231-.023-.111-.167-.883-.188-.976-.027-.131-.102-.127-.207-.109-.104.018-3.25.461-3.25.461l-.013-2.078c-.001-.125-.069-.158-.194-.156l-1.025.016c-.105.002-.164.049-.162.148l.033 2.307s-3.061.527-3.144.543c-.084.014-.17.053-.151.143.019.09.19 1.094.208 1.172.018.08.072.129.188.107l2.924-.504.035 2.018c-1.077.281-1.801.824-2.256 1.303-.768.807-1.207 1.887-1.207 2.963 0 1.586.971 2.529 2.328 2.695 3.162.387 5.119-3.06 5.769-4.715 1.097 1.506.256 4.354-2.094 5.98-.043.029-.098.129-.033.207l.619.756c.08.096.206.059.256.023 2.51-1.73 3.661-4.515 2.869-6.683zm-7.386 3.188c-.966-.121-.944-.914-.944-1.453 0-.773.327-1.58.876-2.156a3.21 3.21 0 011.229-.799l.082 4.277c-.385.131-.799.185-1.243.131zm2.427-.553l.046-4.109c.084-.004.166-.01.252-.01.773 0 1.494.145 1.885.361.391.217-1.023 2.713-2.183 3.758zm-8.95-7.668a.196.196 0 00-.196-.145h-1.95a.194.194 0 00-.194.144L.008 16.916c-.017.051-.011.076.062.076h1.733c.075 0 .099-.023.114-.072l1.008-3.318h3.496l1.008 3.318c.016.049.039.072.113.072h1.734c.072 0 .078-.025.062-.076-.014-.05-3.083-9.741-3.494-11.04zm-2.618 6.318l1.447-5.25 1.447 5.25H3.226z"/></svg>
                        <h1 class="font-semibold text-lg ml-2">What’s up with the name?</h1>
                    </div>
                    <p class="mt-2 leading-relaxed text-justify">doctag is a combinition of two words, “docaging ” and “Tag”.<br> We’re already shipping the box. It’s unlikely that the few extra grams of weight from the docage insert are going to cost us any more, so why not exploit this.</p>
                    <p class="mt-4 leading-relaxed text-justify">docage inserts are an easy way to increase loyalty and attract new customers. They work even for small online crafters and shops because they’re so affordable. All you need is a few seconds and doctag will complete the reste.</p>
                </div>
            </div>

        </div>
    </section>


@endsection
