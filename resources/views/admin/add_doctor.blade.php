<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
    label
    {
        display:inline-block;
        width: 200px;
    }
    </style>
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
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
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

            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Doctor Name:</label>
                    <input type="text" style="color: black;" name="name" placeholder="Insert Doctor Name">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Doctor Email:</label>
                    <input type="text" style="color: black;" name="email" placeholder="Insert Doctor Email">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Phone:</label>
                    <input type="tel" style="color: black;" name="phone" placeholder="Insert Phone Number">
                </div>

                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Specialty:</label>
                    <select name="specialty" style="color: black;">
                        <option>--Select--</option>
                        <option value="Internal Medicine">Internal Medicine</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Orthopedics">Orthopedics</option>
                        <option value="Cardiology">Cardiology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="ENT">ENT (Ear, Nose, and Throat)</option>
                        <option value="Psychiatry">Psychiatry</option>
                        <option value="Gynecology">Gynecology</option>
                    </select>
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Doctor Image:</label>
                    <input type="file" name="file">
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
