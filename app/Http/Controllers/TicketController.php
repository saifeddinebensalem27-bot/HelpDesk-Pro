<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['category', 'submitter'])->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'priority'    => ['required', 'in:low,medium,high,critical'],
        ]);

        Ticket::create([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'priority'    => $request->priority,
            'status'      => 'in_progress',
            'user_id'     => Auth::id(),
        ]);

        return redirect('/tickets');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.status', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status'      => ['required', 'in:open,in_progress,resolved,closed'],
        ]);

        $ticket->update($request->only([
            'status',
        ]));

        return redirect('/tickets');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/tickets');
    }
}