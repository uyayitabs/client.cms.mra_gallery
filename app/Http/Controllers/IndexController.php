<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Photo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {        
        $eventIds = Photo::select('event_id')->distinct()->pluck('event_id')->toArray();
        $events = Event::whereIn('id', $eventIds)->get();

        if ($request->query('event_id')) {
            $event = Event::find($request->query('event_id')) ?? $events->first();
        } else {
            $event = $events->first();
        }

        $photos = Photo::where('event_id', $event->id)->where('is_public', true)->get(); 
        return view('index', compact('events', 'event', 'photos'));
    }
}
