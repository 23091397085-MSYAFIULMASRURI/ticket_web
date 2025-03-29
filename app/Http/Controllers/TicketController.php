<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Menampilkan daftar tiket
    public function index()
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $tickets = Ticket::with('event')->latest()->paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    // Form untuk membuat tiket baru
    public function create()
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $events = Event::all();
        return view('tickets.create', compact('events'));
    }

    // Menyimpan tiket ke database
    public function store(Request $request)
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'available_tickets' => 'required|integer|min:1',
        ]);

        $ticket = new Ticket();
        $ticket->fill($request->all());
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan.');
    }


    public function show($id)
    {
        $event = Event::with('tickets')->findOrFail($id);
        return view('events.show', compact('event'));
    }



    // Menampilkan form edit tiket
    public function edit(Ticket $ticket)
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $events = Event::all();
        return view('tickets.edit', compact('ticket', 'events'));
    }

    // Mengupdate tiket
    public function update(Request $request, Ticket $ticket)
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'available_tickets' => 'required|integer|min:1',
        ]);

        $ticket->fill($request->all());
        $ticket->save();

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    // Menghapus tiket
    public function destroy(Ticket $ticket)
    {
        if (!Auth::check() || !isset(Auth::user()->role) || (Auth::user()->role !== 'admin' && Auth::user()->role !== 'organizer')) {
            abort(403, 'Anda tidak memiliki izin.');
        }

        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
