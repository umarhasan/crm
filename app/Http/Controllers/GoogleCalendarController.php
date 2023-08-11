<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;

class GoogleCalendarController extends Controller
{
    public function connect()
    {
       
        dd(Event::get());
    }

}
