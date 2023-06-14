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

            <form action="{{url('editpost',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Title:</label>
                    <input type="text" style="color: black;" name="title" placeholder="Insert Title" value="{{$data->title}}">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Author Name:</label>
                    <input type="text" style="color: black;" name="name" placeholder="Insert Author Name" value="{{$data->name}}">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Link:</label>
                    <input type="text" style="color: black;" name="link" placeholder="Insert Link" value="{{$data->link}}">
                </div>
                <div style="padding: 15px; display: flex; align-items: center;">
                    <label style="margin-right: 5px;">Old Image:</label>
                    <img style="height: 300px;width: 300px;" src="post/{{$data->image}}" alt="">
                </div>

                <div style="padding: 15px; display: flex; align-items: center;">
                    <input type="file" name="file" value="">
                </div>

                <div align="center" style="padding: 15px;">
                    <input type="submit" style="background-color: #00D9A5" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- container-scroller -->
@include('admin.script')
</body>
</html>
