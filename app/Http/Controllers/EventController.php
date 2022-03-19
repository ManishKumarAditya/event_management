<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index() {
        return view('event_management');
    }

    public function show() {
        $event =  Event::find(4);
        $tickets =  $event->tickets()->get();
        return $tickets;
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'event_name'            => ['required', 'string', 'max:255'],
            'event_description'     => ['required', 'string', 'max:255'],
            'start_date'            => ['required', 'date_format:Y-m-d'],
            'end_date'              => ['required', 'date_format:Y-m-d'],
            'organizer'             => ['required', 'string', 'max:255'],
            'ticket_id'             => ['required'],
            'ticket_no'             => ['required'],
            'ticket_price'          => ['required'],
        ]);

        $event = Event::create([
            'event_name'            => $request['event_name'],
            'event_description'     => $request['event_description'],
            'start_date'            => $request['start_date'],
            'end_date'              => $request['end_date'],
            'organizer'             => $request['organizer']
        ]);

        $ticket_id = $request->ticket_id;
        $ticket_no = $request->ticket_no;
        $ticket_price = $request->ticket_price;

        for($i =0; $i < count($ticket_no); $i++){

            $data_save = [
                'ticket_id' => $ticket_id[$i],
                'ticket_no' => $ticket_no[$i],
                'ticket_price' => $ticket_price[$i],
            ];

            $event->tickets()->create($data_save);
        }
        return redirect()->back();
    }

}
