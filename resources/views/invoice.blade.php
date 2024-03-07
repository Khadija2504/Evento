<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        
    </style>
    <title>Document</title>
</head>
<body>
    
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
                          <img src="{{asset(''. $reservation->event->organisateurs->avatar)}}" alt="" class="w-8">
                            @if ($reservation->status == 'valid')
                            <div>Dowload</div>
                            @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    @endforeach

</body>
</html>