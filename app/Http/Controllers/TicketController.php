<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function index(Movie $movie)
    {
        $tickets = Ticket::where('movie_id', $movie->id)->get();

        return view('tickets', [
            'tickets' => $tickets,
            'movie' => $movie,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
            'id' => 'required|exists:movies,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $ticket = new Ticket();
        $ticket->customer_name = $request->customer_name;
        $ticket->seat_number = $request->seat_number;
        $ticket->movie_id = $request->id;
        $ticket->is_checked_in = 0;
        $ticket->check_in_time = null;
        $ticket->save();

        return redirect()->route('movies.tickets', ['movie' => $request->id])->with('success', 'Ticket successfully booked!');
    }


    public function checkIn($id)
    {
        $ticket = Ticket::findOrFail($id);

        // menandakan sudah check-in
        $ticket->is_checked_in = 1;
        $ticket->check_in_time = now(); // menyimpan waktu check-in
        $ticket->save();

        return redirect()->route('movies.tickets', ['movie' => $ticket->movie_id])->with('success', 'Ticket successfully checked in!');
    }

    
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        
        $ticket->delete();

        return redirect()->route('movies.tickets', ['movie' => $ticket->movie_id])->with('success', 'Ticket successfully deleted!');
    }


    public function edit(Ticket $ticket)
    {
        $movies = Movie::all();
        
        return view('edit', compact('ticket', 'movies'));
    }


    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
            'movie_id' => 'required|exists:movies,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // memperbarui data
        $ticket->customer_name = $request->customer_name;
        $ticket->seat_number = $request->seat_number;
        $ticket->movie_id = $request->movie_id;
        $ticket->save();

        return redirect()->route('movies.tickets', ['movie' => $ticket->movie_id])->with('success', 'Ticket successfully updated!');
    }
}
