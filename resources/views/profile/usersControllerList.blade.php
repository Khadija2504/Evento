<x-app-layout>

    <div class="grid grid-cols-6 gap-5 p-20 ">
        @foreach($users as $user)
        <div
            class="col-span-6 mt-5 bg-opacity-50 border border-gray-100 rounded shadow-lg cursor-pointer bg-gradient-to-b from-gray-200 backdrop-blur-20 to-gray-50 md:col-span-3 lg:col-span-2 ">
            <div class="flex flex-row px-2 py-3 mx-3">

                <div class="flex flex-col mt-1 mb-2 ml-4">
                    <div class="text-sm text-gray-600">{{$user->name}}</div>
                    <div class="flex w-full mt-1">
                        <div class="mr-1 text-xs text-blue-700 cursor-pointer font-base">
                            {{$user->email}}
                        </div>
                        <div class="text-xs text-gray-600">
                            • {{$user->identifiant_unique}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center px-2 mx-3 my-2 text-sm font-medium text-gray-400">
                <img class="w-[300px] h-[300px] rounded-full shadow-2xl object-cover"
                    src="{{asset('' . $user->avatar)}}">

            </div>

            <div class="mb-5 border-t border-gray-50">
                <div class="flex flex-wrap justify-start mx-5 mt-6 text-xs sm:justify-center ">
                    @if($user->status == 'disactive')
        
                    <form action="{{route('userActive', $user->id)}}" method="GET">
                        @csrf
                        <button class="text-white ml-5 right-2.5 bottom-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2" style="background: linear-gradient(90deg, #d53369 0%, #daae51 100%);" type="submit">Active account</button>
                    </form>
                    @else

                    <form action="{{route('userDisactive', $user->id)}}">
                        @csrf
                        <button class="text-white ml-5 right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2" style="background: linear-gradient(90deg, #d53369 0%, #daae51 100%);" type="submit">Disactive account</button>
                    </form>

                    @endif

                    @if ($user->reserve == 'disactive')
                        <form action="{{route('userReservationActive', $user->id)}}" method="GET">
                            @csrf
                            <button class="text-white ml-5 right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2" style="background: linear-gradient(90deg, #d53369 0%, #daae51 100%);" type="submit">Active reservation</button>
                        </form>

                    @else
                        <form action="{{route('userReservationDisactive', $user->id)}}" method="GET">
                            @csrf
                            <button class="text-white ml-5 right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2" style="background: linear-gradient(90deg, #d53369 0%, #daae51 100%);" type="submit">Disactive reservation</button>
                        </form>
                    @endif
                </div>

            </div>

        </div>
        @endforeach
    </div>
</x-app-layout>