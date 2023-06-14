<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Post;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function redirect()
    {   //If user is logged in
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){ //if user is not admin
                $doctor = doctor::all();
                $post = post::all();
                return view('user.home',compact('doctor','post'));
            }

            else{
                return view('admin.home'); //admin will redirect
            }
        }

        else{
            return redirect()->back(); //else will just go to normal home
        }
    }

    public function index(){

        if(Auth::id()){
            return redirect('home');

        }

        else{
        //Display Doctor at Home
        $doctor = doctor::all();

        //Display Post at Home
        $post = post::all();

        //Return data to Home
        return view('user.home',compact('doctor','post'));
        }
    }

    public function appointment(Request $request){
        $data = new appointment;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message','Appointment Request Successful. We will contact with you soon');
    }

    //View appointment at home

    public function myappointment(){

        if(Auth::id())
        {
            $userid=Auth::user()->id; //get id from auth
            //if user id match then it will return appointment
            $appoint=appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appoint'));

        }
       else{
        return redirect()->back();
       }
    }
    //based on id it will delete the appointment
    public function cancel_appoint($id){
        $data=appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
