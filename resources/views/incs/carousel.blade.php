<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
     
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="/storage/post_images/{{$carousel_one->post_pic}}" alt=""/>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>{{$carousel_one->title}}</h1>
            <p>{!!Str::limit($carousel_one->content, 50)!!}</p>
            <p><a class="btn btn-lg btn-primary" href="/single/{{$carousel_one->id}}">Read More</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="/storage/post_images/{{$carousel_two->post_pic}}" alt=""/>
        <div class="container">
          <div class="carousel-caption">
            <h1>{{$carousel_two->title}}</h1>
            <p>{!!Str::limit($carousel_two->content, 50)!!}</p>
            <p><a class="btn btn-lg btn-primary" href="/single/{{$carousel_two->id}}">Read more</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <img src="/storage/post_images/{{$carousel_three->post_pic}}" alt=""/>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>{{$carousel_three->title}}</h1>
            <p>{!!Str::limit($carousel_three->content, 50)!!}</p>
            <p><a class="btn btn-lg btn-primary" href="/single/{{$carousel_three->id}}">Read More</a></p>
          </div>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>