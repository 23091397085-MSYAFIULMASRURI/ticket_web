<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event-list', compact('events'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer') {
            abort(403, 'Anda tidak memiliki izin.');
        }
        return view('event.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer') {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create([
            'organizer_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'location' => $request->location,
        ]);

        return redirect()->route('event-list')->with('success', 'Event berhasil ditambahkan.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $event->organizer_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin.');
        }
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $event->organizer_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update($request->all());
        return redirect()->route('event-list')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if (Auth::user()->role !== 'admin' && $event->organizer_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $event->delete();
        return redirect()->route('event-list')->with('success', 'Event berhasil dihapus.');
    }
}
