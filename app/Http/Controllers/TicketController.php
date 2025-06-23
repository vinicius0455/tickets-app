<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tickets = Ticket::all();
        return view('tickets.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $devices = $this->getDevices();
        return view('tickets.create', compact('devices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'endpoint' => 'required',
            'status' => 'required',
        ]);
        $ticket = new Ticket();
        $ticket->title = $validatedData['title'];
        $ticket->description = $validatedData['description'];
        $ticket->endpoint = $validatedData['endpoint'];
        $ticket->status = $validatedData['status'];
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
        $devices = $this->getDevices();
        return view('tickets.edit', compact('devices'))->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'endpoint' => 'required',
            'status' => 'required',
        ]);
        $ticket->title = $validatedData['title'];
        $ticket->description = $validatedData['description'];
        $ticket->endpoint = $validatedData['endpoint'];
        $ticket->status = $validatedData['status'];
        $ticket->save();
        return redirect()->route('tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
        $ticket->delete();
        return redirect()->route('tickets.index');
    }

     private function getDevices()
    {
        $accessToken = $this->getAccessToken();

        $orgId = env('ACTION1_ORG_ID');

        return Cache::remember('action1_devices', 300, function () use ($accessToken, $orgId) {
            $response = Http::withToken($accessToken)
                ->get("https://app.eu.action1.com/api/3.0/endpoints/managed/{$orgId}");

            return json_decode($response->body());
        });
    }
    
    private function getAccessToken()
    {
        return Cache::remember('action1_token', 300, function () {
            $response = Http::post('https://app.eu.action1.com/api/3.0/oauth2/token', [
                'client_id' => env('ACTION1_CLIENT_ID'),
                'client_secret' => env('ACTION1_SECRET'),
            ]);

            return $response->json()['access_token'] ?? null;
        });
    }
}
