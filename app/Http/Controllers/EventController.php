<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
    {


    //To Show all events
    public function index() {
        $events = Event::all();

        return view('events.index', compact('events'));
        //return view('events.index', [          
           
            // 'heang' => 'Latest Events',
            //'events' => Event::latest()->filter(request(['tag', 'search']))->simplePaginate(2)//This will use the Prev and Next buttons to Paginate
            //'events' => Event::latest()->filter(request(['tag', 'search']))->paginate(5)
        // ]);
    }

    //To show single event
    public function show(Event $event) {
        return view('events.show', [
            'heading' => 'Events',
            'event' => $event
        ]);
    }

    //Show create events form
    public function create() {
        return view('events.create');
    }

    //Store event Data
    public function store(Request $request) {
        //dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_and_time' => 'required|date',
            'location' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $formFields['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Event::create($formFields);

        return redirect('/')->with('message','event created succesfully');
    }

    //Show Edit event form
    public function edit(Event $event){
        //dd($event);
        return view('events.edit',[ 'event' => $event]);
    }

    //Store event Data
    public function update(Request $request, Event $event) {
        //dd($request->file('logo'));
        //Restrict unathorized access
        if($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $event->update($formFields);

        return back()->with('message','Event updated succesfully');
    }

    //Delete job posting
    public function destroy(Event $event) {
         //Restrict unathorized access
         if($event->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        $event->delete();
        return redirect('/')->with('message', 'Event Deleted Successfully');
    }
    //Manage Events
    public function manage() {
        $user = User::find(auth()->id());
        return view('events.manage', ['events' => $user->events()->get()]);


        //return view('events.manage', ['Events' => auth()->user()->events()->get()]); //This worked from traversy, but I'll use what I got from a forum
    }
}
