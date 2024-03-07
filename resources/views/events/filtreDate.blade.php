<x-app-layout>

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
            
            @endif
        </div>
    </div>

<x-footer/>
</x-app-layout>