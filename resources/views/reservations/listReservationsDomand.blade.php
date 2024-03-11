<x-app-layout>

    <div class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="pt-24">
            <div class=" text-center container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              
              <div class=" ml-20 text-yellow-50 text-4xl">Tickets list</div>
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
                    d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                </path>
                </g>
              </g>
            </svg>
          </div>
        </div>
        @if ($reservations->Count() > 0)
            
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

    @else
    <div>No reservations yet</div>

    @endif

    <div>
        
    </div>

<x-footer/>

</x-app-layout>
