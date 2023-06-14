<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div>
            <table class="table table-hover table-dark">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Image</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($post as $posts )


                  <tr>
                    <th scope="row">{{$posts->title}}</th>
                    <td>{{$posts->name}}</td>
                    <td><a href="{{$posts->link}}">{{$posts->link}}</a></td>
                    <td> <img style="max-width: 100%;max-height: 100%;"src="post/{{$posts->image}}" alt=""></td>
                    <td><a class="btn btn-success" onclick="return confirm('Are you sure to update this?')"href="{{url('updatepost',$posts->id)}}">Update</a></td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"href="{{url('deletepost',$posts->id)}}">Delete</a></td>
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
