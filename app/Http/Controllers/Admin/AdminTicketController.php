<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $events = Event::all(); // Ambil semua event

        return view('admin.tickets.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'available_tickets' => 'required|integer|min:0',
        ]);

        Ticket::create([
            'event_id' => $request->event_id,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'available_tickets' => $request->available_tickets,
        ]);

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket created.');
    }


    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $events = Event::all(); // Pastikan ini ditambahkan

        return view('admin.tickets.edit', compact('ticket', 'events'));
    }


    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'available_tickets' => 'required|integer|min:0',
        ]);

        $ticket->update([
            'event_id' => $request->event_id,
            'type' => $request->type,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'available_tickets' => $request->available_tickets,
        ]);

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket updated successfully.');
    }


    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket deleted.');
    }
}
