<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventReuest;
use App\Models\Categorie;
use App\Models\Event;
use App\Models\reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function dashboard() {
        $events = Event::where('validation', "valid")->where('status', "available")->with('organisateurs', 'category')->orderBy('date', 'desc')->paginate(9);
        foreach($events as $event){
            $reservetionCount = Event::withCount('reservation')->where('id', $event->id)->get();
        }
        $organisateur = Auth::user()->id;
        $categories = Categorie::all();
        $music = Categorie::where('category_name', 'Music Concerts')->get();
        $health = Categorie::where('category_name', 'Health & Wellness Events')->get();
        $art = Categorie::where('category_name', 'Art Exhibitions')->get();
        $food = Categorie::where('category_name', 'Food Festivals')->get();
        $workshops = Categorie::where('category_name', 'Workshops')->get();
        if(isset($reservetionCount)){
            return view('dashboard', compact('events', 'organisateur', 'categories', 'music', 'health', 'art', 'food', 'workshops', 'reservetionCount'));
        }
        return view('dashboard', compact('events', 'organisateur', 'categories', 'music', 'health', 'art', 'food', 'workshops'));
    }

    public function addEventForm(){
        $categories = Categorie::all();
        $organisateur = Auth::user()->id;
        return view('events.addEvent', compact('categories', 'organisateur'));
    }

    public function addEvent(EventReuest $request){
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'imgs/images/';
            $file->move($path, $file_name);
            $validated['image'] = $path . '/' . $file_name;
        }
        Event::create($validated);
        return redirect()->route('dashboard');
    }

    public function showDetails($id){
        $organisateur = auth::user()->id;
        $events = Event::where('id', $id)->get();
        return view('events.eventDetails', compact('events', 'organisateur'));
    }

    public function editForm($id){
        $events = Event::where('id', $id)->get();
        $categories = Categorie::all();
        $organisateur = Auth::user()->id;
        return view('events.editEvent', compact('events', 'categories', 'organisateur'));
    }

    public function editEvent(EventReuest $request, $id){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'imgs/images/';
            $file->move($path, $file_name);
            $validated['image'] = $path . '/' . $file_name;
        }
        $event = Event::where('id', $id);
        $event->update($validated);
        return redirect()->back();
    }

    public function listEventsDomand(){
        $events = Event::where('validation', "notYet")->get();
        $invalidEvents = Event::where('validation', "invalid")->get();
        return view('events.listEvents', compact('events', 'invalidEvents'));
    }

    public function validEvent($id){
        $events = Event::where('id', $id);
        $events->update([
            'validation' => 'valid',
        ]);
        return redirect()->back();
    }

    public function invalidEvent($id){
        $events = Event::where('id', $id);
        $events->update([
            'validation' => 'invalid',
        ]);
        return redirect()->back();
    }

    public function myEvents(){
        $id_organisateur = Auth::user()->id;
        // dd($id_organisateur);
        $myEvents = Event::where('validation', "valid")->where('status', "available")->where('id_organisateur', $id_organisateur)->with('organisateurs', 'category')->get();
        return view('events.myEvents', compact('myEvents', 'id_organisateur'));
    }
    
    public function search(Request $request){
        $search = $request->input('search');
        $eventsResult = Event::where('titre', 'like', "%$search%")->where('validation', "valid")->where('status', "available")->with('organisateurs', 'category')->get();
        $id_organisateur = Auth::user()->id;
       
        return view('events.search', compact('eventsResult', 'id_organisateur'));
    }

    public function filtre($id){
        $eventsResult = Event::where('category_id', $id)->where('status', "available")->where('validation', "valid")->get();
        $categories = Categorie::all();
        return view('events.filtre', compact('eventsResult', 'categories'));
    }

    public function filtreDate($date){
        // dd($date);
        if($date == 'thisDay'){
            $eventsResult = Event::whereDate('date', Carbon::today())->where('status', "available")->where('validation', "valid")->get();
        } elseif($date == 'thisWeek'){
            $eventsResult = Event::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', "available")->where('validation', "valid")->get();
        } elseif($date == 'thisMonth'){
            $eventsResult = Event::whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->where('status', "available")->where('validation', "valid")->get();
        }else{
            $eventsResult = Event::whereBetween('date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->where('status', "available")->where('validation', "valid")->get();
        }
        return view('events.filtreDate', compact('eventsResult'));
    }
    public function deleteEvent($id){
        $events = Event::where('id', $id);
        $erservetion = reservation::where('id_event', $id);
        $erservetion->delete();
        $events->delete();
        return redirect()->back();
    }

    public function statisticsReservation($id){
        $events = Event::where('id', $id)->get();
        $reservationCount = reservation::where('id_event', $id)->count();
        $validReaervationCount = reservation::where('id_event', $id)->where('status', "valid")->count();
        $invalidReaervationCount = reservation::where('id_event', $id)->where('status', "invalid")->count();
        // foreach($events as $event){
        //     dd($event);
        // }
        return view('events.statistics', compact('events','reservationCount', 'validReaervationCount', 'invalidReaervationCount'));
    }

    public function statisticsEvents(){
        $validEvents = Event::where('validation', "invalid")->count();
        $invalidEvents = Event::where('validation', "invalid")->count();
        $availableEvents = Event::where('status', "available")->count();
        $unavailableEvents = Event::where('status', "notAvailable")->count();
        return view('events.statisticsEvents', compact('invalidEvents', 'validEvents', 'availableEvents', 'unavailableEvents'));
    }
}