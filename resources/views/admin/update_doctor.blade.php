<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">

              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">

              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
            <div class="container" style="padding-top: 100px; display: flex; flex-direction: column; align-items: center;">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-bs-dismiss="alert">
                        X
                    </button>

                </div>
                @endif

                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 15px; display: flex; align-items: center;">
                        <label style="margin-right: 5px;">Doctor Name:</label>
                        <input type="text" style="color: black;" name="name" placeholder="Insert Doctor Name" value="{{$data->name}}">
                    </div>
                    <div style="padding: 15px; display: flex; align-items: center;">
                        <label style="margin-right: 5px;">Doctor Email:</label>
                        <input type="text" style="color: black;" name="email" placeholder="Insert Doctor Email" value="{{$data->email}}">
                    </div>
                    <div style="padding: 15px; display: flex; align-items: center;">
                        <label style="margin-right: 52px;">Phone:</label>
                        <input type="tel" style="color: black;" name="phone" placeholder="Insert Phone Number" value="{{$data->phone}}">
                    </div>

                    <div style="padding: 15px; display: flex; align-items: center;">
                        <label style="margin-right: 29px;">Specialty:</label>
                        <select name="speciality" style="color: black;">
                            <option>--Select--</option>
                            <option value="Internal Medicine" {{ $data->specialty == "Internal Medicine" ? 'selected' : '' }}>Internal Medicine</option>
                            <option value="Pediatrics" {{ $data->specialty == "Pediatrics" ? 'selected' : '' }}>Pediatrics</option>
                            <option value="Dermatology" {{ $data->specialty == "Dermatology" ? 'selected' : '' }}>Dermatology</option>
                            <option value="Orthopedics" {{ $data->specialty == "Orthopedics" ? 'selected' : '' }}>Orthopedics</option>
                            <option value="Cardiology" {{ $data->specialty == "Cardiology" ? 'selected' : '' }}>Cardiology</option>
                            <option value="Neurology" {{ $data->specialty == "Neurology" ? 'selected' : '' }}>Neurology</option>
                            <option value="ENT" {{ $data->specialty == "ENT" ? 'selected' : '' }}>ENT (Ear, Nose, and Throat)</option>
                            <option value="Psychiatry" {{ $data->specialty == "Psychiatry" ? 'selected' : '' }}>Psychiatry</option>
                        </select>
                    </div>
                    <div style="padding: 15px; display: flex; align-items: center;">
                        <label style="margin-right: 5px;">Old Image:</label>
                        <img style="height: 300px;width: 300px;" src="doctorimage/{{$data->image}}" alt="">
                    </div>

                    <div style="padding: 15px; display: flex; align-items: center;">

                        <input type="file" name="file" value="">
                    </div>

                    <div align="center" style="padding: 15px;">
                        <input type="submit" style="background-color: #00D9A5" class="btn btn-success" >
                    </div>
                </form>
            </div>
        </div>



    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
