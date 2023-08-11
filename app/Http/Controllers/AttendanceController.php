<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        try 
        {
            $data['attendance'] = Attendance::get();
            return view('attendance.index',$data);
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    
    public function create(Request $request)
    {
        try 
        {
            $time = date('H:i:s');
            $day = date('D');

            $current_time = date("H:i:s");
            $grace_time = strtotime('+15 minutes', strtotime($current_time));
            $date = date("H:i:s", $grace_time);
            print_r($date);die;

            Attendances::create([
                'user_id'=>$user_id,
                'attendance'=>'Absent',
                'time_in'=>'00:00:00',
                'time_out'=>'00:00:00',
            ]);

            $data['attendance'] = Attendance::get();
            return view('attendance.index',$data);
        } 
        catch (\Exception $e) 
        {
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
}
