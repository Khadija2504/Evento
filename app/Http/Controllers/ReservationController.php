<?php

namespace App\Http\Controllers;

use App\Http\Requests\reservetionRequest;
use App\Models\Event;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserve(reservetionRequest $request, $id){

        $validated = $request->validated();
        $events = Event::where('id', $id)->get();
        $ticket_number = mt_rand(10000, 99999);
        $validated['ticket_number'] = $ticket_number;
        foreach ($events as $event){
            $acceptation = $event->acceptation;
        }
        if($acceptation == 'auto'){
            $accepte = $validated['status'] = 'valid';
        } elseif($acceptation == 'manuelle'){
            $accepte = $validated['status'] = 'notYet';
        }
        $reservetionCount = Event::withCount('reservation')->where('id', $id)->get();
        
        reservation::create($validated);
        $event = Event::where('id', $id)->get();
        foreach($event as $eventPlace){
            $places_number = $eventPlace->places_number;
        }
        foreach($reservetionCount as $reservation){
            // dd($reservation->reservation_count + 1);
            if($reservation->reservation_count + 1 > $places_number || $reservation->reservation_count + 1 == $places_number){
                $updateEvent = Event::where('id', $id);
                $updateEvent->update([
                    'status' => 'notAvailable',
                ]);
            }
        }
        return redirect()->back();
    }
    
    public function myTickets(){
        $user_id = Auth::user()->id;
        $reservations = reservation::with('event')->where('id_user', $user_id)->get();
        return view('myTickets', compact('reservations'));
    }
}