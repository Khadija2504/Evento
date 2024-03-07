<x-app-layout>

    @foreach($reservations as $reservation)
    <div class="mx-auto mt-40 mb-10 flex items-center justify-center px-8">
        <div class="flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
          <div class="w-full h-64 bg-top bg-cover rounded-t" style="background-image: url({{asset(''. $reservation->event->image)}})"></div>
          <div class="flex flex-col w-full md:flex-row">
              <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase rounded md:flex-col md:items-center md:justify-center md:w-1/4" style="background: linear-gradient(90deg, #d53369 0%, #daae51 100%)">
                  <div class="md:text-20">{{$reservation->event->lieu}}</div>
                  <div class="md:text-20">{{$reservation->event->date}}</div>
                  <div class="md:text-xl">{{$reservation->event->category->category_name}}</div>
              </div>
              <div class="p-4 font-normal text-gray-800 md:w-3/4">
                  <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">{{$reservation->event->titre}}</h1>
                  <p class="leading-normal">{{$reservation->status}}</p>
                  <div class="w-1/2">
                    reserved at: {{$reservation->created_at}}
                  </div>
                  <div class="flex flex-row items-center mt-4 text-gray-700">
                        <div class="w-1/2">
                            N :{{$reservation->ticket_number}}
                      </div>
                      <div class="w-1/2 flex justify-end">
                            @if ($reservation->status == 'valid')
                                <form action="{{route('generate', $reservation->id)}}" method="GET">
                                    @csrf
                                    <button type="submit">
                                        <svg class="w-8 h-8 mr-2 -ml-1 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z"></path>
                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                        </svg>
                                    </button>
                                </form>
                            @endif
                      </div>

                      <div class="flex flex-row justify-center items-center">
                        <form action="{{route('validReservation', $reservation->id)}}" method="GET">
                            @csrf
                            <button class="home-category_tile_component__tileLink">valid</button>
                        </form>
                        <form action="{{route('invalidReservation', $reservation->id)}}" method="get">
                            @csrf
                            <button class="home-category_tile_component__tileLink">invalid</button>
                        </form>
                    </div>

                  </div>
              </div>
          </div>
      </div>
    </div>
    @endforeach

    <div>
        
    </div>

<x-footer/>

</x-app-layout>
