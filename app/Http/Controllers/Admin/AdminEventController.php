<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        // Ambil user dengan role organizer
        $organizers = User::where('role', 'organizer')->get();

        return view('admin.events.create', compact('organizers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);
        Event::create($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event created.');
    }

    public function show(Event $event)
    {

        return view('admin.events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $organizers = User::where('role', 'organizer')->get();

        return view('admin.events.edit', compact('event', 'organizers'));
    }


    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);
        $event->update($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }
}
