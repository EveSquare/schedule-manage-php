<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Events;
use Illuminate\Database\Eloquent\ModelNotFoundException;

require("CalenderFunction.php");

class MonthlyEventController extends Controller
{
    //
    public function monthly_events(Request $req)
    {
        $user_id = $req->user()->id;
        $events = Events::where('user_id', $user_id)->get();
        $result = formatTemplate($events);
        return view('monthly_events', [
            'result' => $result,
        ]);
    }
}
