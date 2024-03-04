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
                    @foreach($events as $event)
                        <img src="{{asset(''. $event->image)}}" alt="">
                        <p>{{$event->titre}}</p>
                        <div>{{$event->description}}</div>
                        <div>nombre des places restant: {{$event->places_number}}</div>
                        <div>La date de l'evenement:{{$event->date}}</div>
                        <div>lieu:{{$event->lieu}}</div>

                        <form action="{{route('validEvent', $event->id)}}" method="GET">
                            @csrf
                            <button>valid</button>
                        </form>

                        <form action="{{route('invalidEvent', $event->id)}}" method="get">
                            @csrf
                            <button>invalid</button>
                        </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div>
        
    </div>

</x-app-layout>
