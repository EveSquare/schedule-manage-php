<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Events;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EventDetailController extends Controller
{
    //
    public function event_detail_get($id)
    {
        $events = Events::find($id);

        return view('event_detail', [
            'events' => $events
        ]);
    }

    public function event_detail_post(Request $req, $id)
    {
        $event = Events::find($id);

        if($req->has('del')) {
            $event->delete();
        }

        if($req->has('update')) {
            $event->title = $req->input('title');
            $event->place = $req->input('place');
            $event->bigin_date = date('Y/m/d H:i:s', strtotime($req->input('bigin_date')));
            $event->end_date = date('Y/m/d H:i:s', strtotime($req->input('end_date')));
            $req->is_impotant = $req->input('is_impotant');
            $event->save();
        }

        $events = Events::orderBy('bigin_date')->get();

        return view('home', [
            'events' => $events,
        ]);
    }
}
