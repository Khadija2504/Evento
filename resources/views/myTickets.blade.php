<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach($reservations as $reservation)
                        <img src="{{asset(''. $reservation->event->image)}}" alt="">
                        <p>{{$reservation->event->titre}}</p>
                        <div>{{$reservation->event->description}}</div>
                        <div>nombre des places restant: {{$reservation->places_number}}</div>
                        <div>La date de l'evenement:{{$reservation->date}}</div>
                        <div>lieu:{{$reservation->lieu}}</div>
                        <div>ticket number : {{$reservation->ticket_number}}</div>
                        <div>status: {{$reservation->status}}</div>

                        @if($reservation->status == 'valid')
                            download as pdf
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div>
        
    </div>

</x-app-layout>
