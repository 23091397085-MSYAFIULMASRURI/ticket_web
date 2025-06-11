<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    // Contoh di AdminReportController
    public function index()
    {
        $reports = Ticket::select(
            'event_id',
            'type',
            'price',
            DB::raw('SUM(quantity - available_tickets) as sold_quantity'),
            DB::raw('SUM((quantity - available_tickets) * price) as total_revenue')
        )
            ->with('event')
            ->groupBy('event_id', 'type', 'price')
            ->get()
            ->map(function ($ticket) {
                return (object)[
                    'event_title' => $ticket->event->title ?? 'Unknown',
                    'type' => $ticket->type,
                    'price' => $ticket->price,
                    'sold_quantity' => $ticket->sold_quantity,
                    'total_revenue' => $ticket->total_revenue,
                ];
            });

        return view('admin.reports.index', compact('reports'));
    }
}
