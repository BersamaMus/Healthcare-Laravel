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
    public function redirect() //user will go to home and admin will go to admin home
    {   //If user is logged in
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){ //if user is not admin
                $doctor = doctor::all(); // Get all doctors
                $post = post::all(); // Get all posts
                return view('user.home',compact('doctor','post')); // Render user home view with doctors and posts data
            }

            else{
                return view('admin.home'); //// Redirect to admin home view
            }
        }

        else{
            return redirect()->back(); //// Redirect to back if user is not logged in
        }
    }

    public function index(){//display data to User home

        if(Auth::id()){
            return redirect('home'); // Redirect to home if user is already logged in
        }

        else{
        // Get all doctors
        $doctor = doctor::all();

        // Get all posts
        $post = post::all();

        //Return data to Home
        return view('user.home',compact('doctor','post')); // Render user home view with doctors and posts data
        }
    }

    //User can make appointment
    public function appointment(Request $request){
        $data = new appointment;// Create a new instance of Appointment model

        // Set appointment data from the request
        $data->name=$request->name;
        $data->email=$request->email;
        $data->date=$request->date;
        $data->phone=$request->phone;
        $data->message=$request->message;
        $data->doctor=$request->doctor;
        $data->status='In progress';

        if(Auth::id())  // If user is logged in
        {
            $data->user_id=Auth::user()->id; // Set the user_id of the appointment to the authenticated user's id
        }
        $data->save(); // Save the appointment data to the database

        return redirect()->back()->with('message','Appointment Request Successful. We will contact with you soon'); // Redirect back with success message
    }

    //User can view their appointment
    //If not logged in cannot use this function
    public function myappointment(){

        if(Auth::id()) // If user is logged in
        {
            $userid=Auth::user()->id;  // Get the user's id from the authentication

            $appoint=appointment::where('user_id',$userid)->get(); // Get appointments for the user
            return view('user.my_appointment',compact('appoint')); // Render my_appointment view with the appointments data

        }
       else{
        return redirect()->back(); // Redirect back if user is not logged in
       }
    }

    //User can cancel their appointment in my appointment
    public function cancel_appoint($id){
        $data=appointment::find($id); // Find the appointment by the given id
        $data->delete(); // Delete the appointment
        return redirect()->back();  // Redirect back
    }
}
