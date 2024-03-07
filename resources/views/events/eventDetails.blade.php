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
                        @role('organisateur')
                        @if($organisateur == $event->id_organisateur)
                            <form action="{{route('editEventForm', $event->id)}}" method="GET">
                                <button type="submit">edit</button>
                            </form>
                        @endif
                        @endrole
                        @role('utilisateur')
                            <form action="{{route('reservetion', $event->id)}}" method="POST">
                                @csrf
                                {{-- reservetion inputs --}}
                                <input type="hidden" name="id_user" value="{{$organisateur}}" required>
                                <input type="hidden" name="id_event" value="{{$event->id}}" required>
                                <input type="hidden" name="ticket_number" value="0" required>
                                <input type="hidden" name="status" value="notYet" required>
                                <button type="submit">reserve in this event</button>
                            </form>
                        @endrole
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>