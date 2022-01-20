<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewEventController extends Controller
{
    //
    public function event_get()
    {
        return view('newevent');
    }

    public function event_post(Request $req)
    {
        $post_data = $req->input('title');
        $event = [
            'user_id' => $req->user()->id,
            'title' => $req->input('title'),
            'place' => $req->input('place'),
            'bigin_date' => date('Y/m/d H:i:s', strtotime($req->input('bigin_date'))),
            'end_date' => date('Y/m/d H:i:s', strtotime($req->input('end_date'))),
            'is_impotant' => (boolean) $req->input('is_impotant'),
        ];
        
        DB::table('events')->insert($event);
        return view('event_add_success');
    }
}
