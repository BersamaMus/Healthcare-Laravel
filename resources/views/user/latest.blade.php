<div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">

        @foreach ($post as $posts)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Hot</a>
              </div>
              <a href="{{$posts->link}}" class="post-thumb">
                <img src="post/{{$posts->image}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{$posts->link}}">{{$posts->title}}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="../assets/img/person/person_1.jpg" alt="">
                  </div>
                  <span>{{$posts->name}}</span>
                </div>
                <span class="mai-time"></span> {{\Carbon\Carbon::parse($posts->created_at)->diffForHumans()}}

              </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="col-12 text-center mt-4 wow zoomIn">
        <!--  <a href="blog.html" class="btn btn-primary">Read More</a> -->
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->
