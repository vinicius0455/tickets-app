<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tickets=Ticket::all();
        return view('tickets.index')->with('tickets',$tickets);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        $ticket=new Ticket();
        $ticket->title=$validatedData['title'];
        $ticket->description=$validatedData['description'];
        $ticket->status=$validatedData['status']; 
        $ticket->save();
        return redirect()->route('tickets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit')->with('tickets',$ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
