<x-app-layout>
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
                        @if($organisateur == $event->id_organisateur)
                            <form action="{{route('editEventForm', $event->id)}}" method="GET">
                                <button type="submit">edit</button>
                            </form>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>