<x-app-layout>
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>Filtre par</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                @foreach ($categories as $category)
                    <form action="{{route('filtre', $category->id)}}">
                        <button type="submit">{{$category->category_name}}</button>
                    </form>
                @endforeach
            </x-slot>
        </x-dropdown>
    </div>

    <div class="home-category_tiles_block_component__wrapper">
        <div class="home-category_tiles_block_component__tiles">
            @if(isset($eventsResult))
            @foreach($eventsResult as $event)
            <div class="home-category_tile_component__root">
                <div class="home-category_tile_component__tileDetail">
                  <h2>
                    <a class="home-category_tile_component__tileTitle" title="View After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: link&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}"><p>{{$event->titre}}</p></a>
                  </h2>
              
                  <p class="home-category_tile_component__tileSubtitle">{{$event->organisateurs->name}}</p>
              
                  <a class="home-category_tile_component__tileLink" title="Newest After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: newest&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}">total places: {{$event->places_number}}</a>
                  <a class="home-category_tile_component__tileLink" title="Bestselling After Effects" data-action="analytics-event#send" data-analytics-event="{&quot;eventLabel&quot;:&quot;after-effects-project-files: bestsellers&quot;,&quot;eventAction&quot;:&quot;click;link&quot;,&quot;hitType&quot;:&quot;event&quot;,&quot;eventCategory&quot;:&quot;Block interaction;Category&quot;}" href="{{route('showDetails', $event->id)}}">{{$event->category->category_name}}</a>
                  @role('organisateur')
                        @if($id_organisateur == $event->id_organisateur)
                            <form action="{{route('editEventForm', $event->id)}}" method="GET">
                                <button class="home-category_tile_component__tileLink" type="submit">edit</button>
                            </form>
                        @endif
                    @endrole
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
            </div>
            @endforeach
            @else
                <div>No result</div>
            @endif
        </div>
    </div>

<x-footer/>
</x-app-layout>