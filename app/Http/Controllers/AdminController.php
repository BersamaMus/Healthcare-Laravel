<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Post;
class AdminController extends Controller
{
    public function addview(){

        return view('admin.add_doctor'); // Render the add_doctor view for the admin
    }

    //Upload data from view to db
    public function upload(Request $request){
        $doctor = new Doctor; // Create a new instance of the Doctor model

        // Get the image file from the request
        $image=$request->file;

          // Generate a unique image name using the current time and file extension
        $imagename=time().'.'.$image->getClientOriginalExtension();

        // Move the image to the public folder
        $request->file->move('doctorimage', $imagename);

        // Save the image name to the database
        $doctor->image=$imagename;
         // Set other attributes of the doctor model from the request
        $doctor->name=$request->name;
        $doctor->email=$request->email;
        $doctor->phone=$request->phone;
        $doctor->specialty=$request->specialty;

        $doctor->save(); // Save the doctor data to the database

        return redirect()->back()->with('message','Doctor Added Successfully'); // Redirect back with success message
    }

    //admin can view all appointment
    public function showappointment(){
            $data=appointment::all(); // Get all appointments

        return view('admin.showappointment',compact('data')); // Render the showappointment view with the appointments data
    }

    //admin can approve appointment
    public function approved($id){

        $data=appointment::find($id); // Find the appointment by the given id
        $data->status='Approved';  // Update the status of the appointment to 'Approved'

        $data->save(); // Save the updated appointment
        return redirect()->back(); // Redirect back
}
//admin can reject appointment
    public function rejected($id){

      $data=appointment::find($id); // Find the appointment by the given id
      $data->status='Rejected'; // Update the status of the appointment to 'Rejected'

      $data->save(); // Save the updated appointment

     return redirect()->back(); // Redirect back
}
//Admin can view all doctor
public function showdoctor(){

    $data=doctor::all(); // Get all doctors

    return view('admin.showdoctor',compact('data')); // Render the showdoctor view with the doctors data
}

//admin can delete doctor
public function deletedoctor($id){
    //update table
    $data=doctor::find($id);  // Find the doctor by the given id
    $data->delete(); // Delete the doctor

    return redirect()->back();// Redirect back
}
//admin can update doctor
public function updatedoctor($id){
    $data=doctor::find($id);
    return view('admin.update_doctor',compact('data'));
}
//admin edit new data and save to db
public function editdoctor(Request $request, $id){
    $doctor=doctor::find($id); // Find the doctor by the given id

    // Update the doctor attributes from the request
    $doctor->name=$request->name;
    $doctor->email=$request->email;
    $doctor->phone=$request->phone;
    $doctor->specialty=$request->specialty;

    $image=$request->file;
    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        // Move the image to the public folder
        $request->file->move('doctorimage', $imagename);

        // Save the image name to the database
        $doctor->image=$imagename;
    }

    $doctor->save(); // Save the updated doctor


    return redirect()->back()->with('message','Doctor Updated Successfully'); // Redirect back with success message
}

//Post
//Admin can add new post
public function addpost(){

    return view('admin.add_post'); // Render the add_post view for the admin
}

//upload post to db
public function uploadpost(Request $request){
    $post = new Post; // Create a new instance of the Post model

    // Get the image file from the request
    $image=$request->file;

    // Generate a unique image name using the current time and file extension
    $imagename=time().'.'.$image->getClientOriginalExtension();

    // Move the image to the public folder
    $request->file->move('post', $imagename);

     // Save the image name to the database
    $post->image=$imagename;
  // Set other attributes of the post model from the request
    $post->title=$request->title;
    $post->name=$request->name;
    $post->link=$request->link;
    $post->save(); // Save the post data to the database

    return redirect()->back()->with('message','Post Added Successfully'); // Redirect back with success message
}

//Admin can view all post
public function showpost(){

    $post=Post::all(); // Get all posts

    return view('admin.showpost',compact('post')); // Render the showpost view with the posts data
}
//Admin can delete post
public function deletepost($id){

    $data=Post::find($id); // Find the post by the given id
    $data->delete(); // Delete the post

    return redirect()->back(); // Redirect back
}
//Admin can update post
public function updatepost($id){
    $data=Post::find($id); // Find the post by the given id
    return view('admin.update_post',compact('data')); // Render the update_post view with the post data
}

public function editpost(Request $request, $id){
    $data=Post::find($id); // Find the post by the given id
// Update the post attributes from the request
    $data->title=$request->title;
    $data->name=$request->name;
    $data->link=$request->link;

    $image=$request->file;
    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        // Move the image to the public folderr
        $request->file->move('post', $imagename);

        // Save the image name to the database
        $data->image=$imagename;
    }

    $data->save();// Save the updated post


    return redirect()->back()->with('message','Post Updated Successfully'); // Redirect back with success message
}

}
