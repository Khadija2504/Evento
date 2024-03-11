<x-app-layout>

    <div class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <div class="pt-24">
            <div class=" text-center container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              
              <div class=" ml-20 text-yellow-50 text-4xl">Event details</div>
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

        @if(session()->has('reservation'))
            <div class="bg-green-100 border text-center border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('reservation') }}</span>
            </div>
        @endif
        
    <div class="md:flex flex flex-wrap items-start justify-center py-12 2xl:px-20 md:px-6 px-4 mt-10 mb-10">
        
        @foreach($events as $event)
        <div class="xl:w-2/6 lg:w-2/5 w-80 md:block hidden">
          <img class="w-full" alt="image of a girl posing" src="{{asset(''. $event->image)}}" />
        </div>
        <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
          <div class="border-b border-gray-200 pb-6">
            <p class="text-sm leading-none text-gray-600 dark:text-gray-300 ">{{$event->status}}</p>
            <h1 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 text-gray-800 dark:text-white mt-2">{{$event->titre}}</h1>
          </div>
          @role('utilisateur')
            @if (Auth::user()->reserve == 'active')
                <form action="{{route('reservetion', $event->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id_user" value="{{$organisateur}}" required>
                    <input type="hidden" name="id_event" value="{{$event->id}}" required>
                    <input type="hidden" name="ticket_number" value="0" required>
                    <input type="hidden" name="status" value="notYet" required>
                    <button class="dark:bg-white gradient dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                    <svg class="mr-3 text-white dark:text-gray-900" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.02301 7.18999C7.48929 6.72386 7.80685 6.12992 7.93555 5.48329C8.06425 4.83666 7.9983 4.16638 7.74604 3.55724C7.49377 2.94809 7.06653 2.42744 6.51835 2.06112C5.97016 1.6948 5.32566 1.49928 4.66634 1.49928C4.00703 1.49928 3.36252 1.6948 2.81434 2.06112C2.26615 2.42744 1.83891 2.94809 1.58665 3.55724C1.33439 4.16638 1.26843 4.83666 1.39713 5.48329C1.52583 6.12992 1.8434 6.72386 2.30968 7.18999L4.66634 9.54749L7.02301 7.18999Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.66699 4.83333V4.84166" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M13.69 13.8567C14.1563 13.3905 14.4738 12.7966 14.6025 12.15C14.7312 11.5033 14.6653 10.8331 14.413 10.2239C14.1608 9.61476 13.7335 9.09411 13.1853 8.72779C12.6372 8.36148 11.9926 8.16595 11.3333 8.16595C10.674 8.16595 10.0295 8.36148 9.48133 8.72779C8.93314 9.09411 8.5059 9.61476 8.25364 10.2239C8.00138 10.8331 7.93543 11.5033 8.06412 12.15C8.19282 12.7966 8.51039 13.3905 8.97667 13.8567L11.3333 16.2142L13.69 13.8567Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.333 11.5V11.5083" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    reserve your ticket for this event
                    </button>
                </form>
            @endif
            @endrole
          <div>
            <p class="text-base leading-4 mt-7 text-gray-600 dark:text-gray-300">Location: {{$event->lieu}}</p>
            <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">date: {{$event->date}}</p>
            <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">Places number: {{$event->places_number}}</p>
            @foreach($reservetionCount as $reservations)
                <p class="text-base leading-4 mt-4 text-gray-600 dark:text-gray-300">available places: {{$event->places_number - $reservations->reservation_count}}</p>
            @endforeach
            <p class="md:w-96 text-base leading-normal text-gray-600 dark:text-gray-300 mt-4"></p>
          </div>
          <div>
            @role('organisateur')
            <div class="border-t border-b py-4 mt-7 border-gray-200">
              <div data-menu class="flex justify-between items-center cursor-pointer">
                <p class="text-base leading-4 text-gray-800 dark:text-gray-300">
                    @if($organisateur == $event->id_organisateur)
                        <form action="{{route('editEventForm', $event->id)}}" method="GET">
                            <button type="submit">edit</button>
                        </form>
                    @endif
                </p>
              </div>
            </div>
            <div class="border-t border-b py-4 mt-7 border-gray-200">
                <div data-menu class="flex justify-between items-center cursor-pointer">
                  <p class="text-base leading-4 text-gray-800 dark:text-gray-300">
                      @if($organisateur == $event->id_organisateur)
                          <form action="{{route('statistics', $event->id)}}" method="GET">
                              <button type="submit">Statistics</button>
                          </form>
                      @endif
                  </p>
                </div>
              </div>
            @endrole
          </div>
        </div>
        <p class="xl:pr-48 text-base lg:leading-tight leading-normal text-gray-600 dark:text-gray-300 mt-7" style="margin-left: 10%; margin-right: 10%;">{{$event->description}}</p>
        @endforeach
      </div>
      <x-footer/>
</x-app-layout>