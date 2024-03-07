<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Not yet validation events') }}
        </h2>
    </x-slot>

    @if(isset($events))

    <div class="home-category_tiles_block_component__wrapper">
        <div class="home-category_tiles_block_component__tiles">
            @foreach($events as $event)
            <div class="home-category_tile_component__root">
                <div class="home-category_tile_component__tileDetail">
                  <h2>
                    <a class="home-category_tile_component__tileTitle" title="View After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: link&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}"><p>{{$event->titre}}</p></a>
                  </h2>

                  <p class="home-category_tile_component__tileSubtitle">{{$event->organisateurs->name}}</p>
              
                  <a class="home-category_tile_component__tileLink" title="Newest After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: newest&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}">total places: {{$event->places_number}}</a>
                  <a class="home-category_tile_component__tileLink" title="Bestselling After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: bestsellers&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}">{{$event->category->category_name}}</a>
                </div>
                <a class="home-category_tile_component__tileArt" title="View After Effects" href="{{route('showDetails', $event->id)}}">
                  <div class="home-category_tile_component__imageIconWrapper">
                    <picture class="home-category_tile_component__imageWrapper" style="max-height: 250px">
                      <img src="{{asset(''. $event->image)}}">
                    </picture>
                    <div class="home-category_tile_component__tileIcon">
                      <img alt="Avatar" width="64" height="64" loading="lazy" src="{{asset(''. $event->organisateurs->avatar)}}">
                    </div>
                  </div>
                </a>
                <div class="flex flex-row justify-center items-center">
                    <form action="{{route('validEvent', $event->id)}}" method="GET">
                        @csrf
                        <button class="home-category_tile_component__tileLink">valid</button>
                    </form>
                    <form action="{{route('invalidEvent', $event->id)}}" method="get">
                        @csrf
                        <button class="home-category_tile_component__tileLink">invalid</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
      <div>No new events to validat yet</div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invalid events') }}
        </h2>
      </div>
    </div>

    @if(isset($invalidEvents))

      <div class="home-category_tiles_block_component__wrapper">
        <div class="home-category_tiles_block_component__tiles">
            @foreach($invalidEvents as $event)
            <div class="home-category_tile_component__root">
                <div class="home-category_tile_component__tileDetail">
                  <h2>
                    <a class="home-category_tile_component__tileTitle" title="View After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: link&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}"><p>{{$event->titre}}</p></a>
                  </h2>

                  <p class="home-category_tile_component__tileSubtitle">{{$event->organisateurs->name}}</p>
              
                  <a class="home-category_tile_component__tileLink" title="Newest After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: newest&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}">total places: {{$event->places_number}}</a>
                  <a class="home-category_tile_component__tileLink" title="Bestselling After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: bestsellers&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}">{{$event->category->category_name}}</a>
                </div>
                <a class="home-category_tile_component__tileArt" title="View After Effects" href="{{route('showDetails', $event->id)}}">
                  <div class="home-category_tile_component__imageIconWrapper">
                    <picture class="home-category_tile_component__imageWrapper" style="max-height: 250px">
                      <img src="{{asset(''. $event->image)}}">
                    </picture>
                    <div class="home-category_tile_component__tileIcon">
                      <img alt="Avatar" width="64" height="64" loading="lazy" src="{{asset(''. $event->organisateurs->avatar)}}">
                    </div>
                  </div>
                </a>
                <div class="flex flex-row justify-center items-center">
                    <form action="{{route('validEvent', $event->id)}}" method="GET">
                        @csrf
                        <button class="home-category_tile_component__tileLink">valid</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
      </div>

      @else
      <div>No invalid events to validat yet</div>
      @endif

  <x-footer/>

</x-app-layout>
