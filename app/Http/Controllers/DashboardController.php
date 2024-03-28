<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DashboardController extends Controller
{
    //index dashboard function
    public function index(){
        return view('dashboard.index');
    }

    public function admin_list() {
        //'all_users' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
    }

    public function all_events() {
        //'all_users' => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
        $events = Event::all();

        return view('dashboard.all_events', compact('events'));
    }
}
