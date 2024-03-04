<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventReuest;
use App\Models\Categorie;
use App\Models\Event;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function dashboard() {
        $events = Event::where('validation', "valid")->where('status', "available")->get();
        $organisateur = auth::user()->id;
        return view('dashboard', compact('events', 'organisateur'));
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
        return view('events.listEvents', compact('events'));
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

}
