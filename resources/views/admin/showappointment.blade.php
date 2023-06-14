<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
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
        <div align="center">
        <table class="table table-hover table-dark">
            <thead class="thead-light">
              <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Date</th>
                <th scope="col">Message</th>
                <th scope="col">Status</th>
                <th scope="col">Approved</th>
                <th scope="col">Rejected</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($data as $appoints )


              <tr>
                <th scope="row">{{$appoints->name}}</th>
                <td>{{$appoints->email}}</td>
                <td>{{$appoints->phone}}</td>
                <td>{{$appoints->doctor}}</td>
                <td>{{$appoints->date}}</td>
                <td>{{$appoints->message}}</td>
                <td>{{$appoints->status}}</td>
                <td><a class="btn btn-success" onclick="return confirm('Are you sure to confirm this?')"href="{{url('approved',$appoints->id)}}">Approved</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure to reject this?')"href="{{url('rejected',$appoints->id)}}">Rejected</a></td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
