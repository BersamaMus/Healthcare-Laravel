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

            <form action="{{url('upload_post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Title:</label>
                    <input type="text" style="color: black;" name="title" placeholder="Insert Post Title">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Author:</label>
                    <input type="text" style="color: black;" name="name" placeholder="Insert Author Name">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Link:</label>
                    <input type="tel" style="color: black;" name="link" placeholder="Insert Link">
                </div>

                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Post Image:</label>
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
