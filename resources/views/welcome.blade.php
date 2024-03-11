<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/category.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .gradient {
              background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            }
          </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="pt-24">
        <div class="shrink-0 flex items-center absolute left-20 top-1">
            <img class="block h-28 w-auto fill-current" src="../imgs/OIP-removebg-preview.png" alt="logo">
        </div>
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
          <!--Left Col-->
          <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
            <p class="uppercase tracking-loose w-full">Do you love funy events?</p>
            <h1 class="my-4 text-5xl font-bold leading-tight">
              You are in the right way!
            </h1>
            <p class="leading-normal text-2xl mb-8">
              Evento is the best web site to make your events and reserve for the events that you are interested in!
            </p>
          </div>
          <!--Right Col-->
          <div class="w-full md:w-3/5 py-6 text-center">
            @if (Route::has('login'))
                <div class="hidden absolute top-8 right-6 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <img class="w-full md:w-4/5 z-50" src="../imgs/bg_stack.png" />
          </div>
        </div>
      </div>
      <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path
                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
              ></path>
            </g>
          </g>
        </svg>
      </div>
    </div>
    @if($events->Count() > 0)

    <div class="home-category_tiles_block_component__wrapper mb-20 mt-20">
        <div class="home-category_tiles_block_component__tiles">
            @foreach($events as $event)
            <div class="home-category_tile_component__root">
                <div class="home-category_tile_component__tileDetail">
                  <h2>
                    <a class="home-category_tile_component__tileTitle" title="View After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: link&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{ route('login') }}"><p>{{$event->titre}}</p></a>
                  </h2>
              
                  <p class="home-category_tile_component__tileSubtitle">{{$event->organisateurs->name}}</p>
              
                  <a class="home-category_tile_component__tileLink" title="Newest After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: newest&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}"href="{{ route('login') }}">total places: {{$event->places_number}}</a>
                  <a class="home-category_tile_component__tileLink" title="Bestselling After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: bestsellers&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}"href="{{ route('login') }}">{{$event->category->category_name}}</a>
                  @foreach($reservetionCount as $reservations)
                    <a >Nombre des places restant: {{$event->places_number - $reservations->reservation_count}}</a>
                  @endforeach
                </div>
                <a class="home-category_tile_component__tileArt" title="View After Effects" href="{{ route('login') }}">
                  <div class="home-category_tile_component__imageIconWrapper">
                    <picture class="home-category_tile_component__imageWrapper" style="max-height: 200px">
                      <img src="{{asset(''. $event->image)}}">
                    </picture>
                    <div class="home-category_tile_component__tileIcon">
                      <img alt="Avatar" width="64" height="64" loading="lazy" src="{{asset(''. $event->organisateurs->avatar)}}">
                    </div>
                  </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div>No result</div>
    @endif
    <div class="flex items-center justify-center"> {{$events->links()}} </div>

    <div>
        
    </div>

    <x-footer/>
    </body>
</html>

