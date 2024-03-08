<x-app-layout>
    <div>
        @foreach($users as $user)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <p>{{$user->name}}</p>
            <p>{{$user->identifiant_unique}}</p>
            <p>{{$user->email}}</p>
        </div>
        @if($user->status == 'disactive')
        
        <form action="{{route('userActive', $user->id)}}" method="GET">
            @csrf
            <button>Active</button>
        </form>
        @else

        <form action="{{route('userDisactive', $user->id)}}">
            @csrf
            <button>Disactive</button>
        </form>

        @endif
        @endforeach
    </div>
</x-app-layout>