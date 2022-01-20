<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Events;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function home_get(Request $req)
    {
        if ($req->user()) {
            $user_id = $req->user()->id;
        } else {
            return redirect()->route("login");
        }

        $events = Events::where('user_id', $user_id)
            // ->whereDate('bigin_date', '<=', Carbon::now())
            // ->whereRaw('DATE(bigin_date) > DATE(?)', '2021-11-10 10:00:00')
            ->orderBy('bigin_date')
            ->get();
        // var_dump($events);
        return view('home', [
            'events' => $events,
        ]);
    }
}
