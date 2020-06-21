@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12 col-sm-12 col-lg-8">
            <h1>Complete responsive cms blog developed with Laravel</h1>
            @foreach($posts as $post)
            <div class="card" style="">
                 <img src="storage/{{$post->image}}" class="card-img-top img-thumbnail img-fluid" alt="{{$post->title}}">
                <div class="card-header">
                    <h2 class="text-info">{{$post->title}}<span class="badge badge-pill badge-primary ml-5">comments: {{count($post->comments)}}</span></h2>
                </div>

                <div class="card-body">
                 <h5 class="card-title">Category: {{$post->category}}<span> Published on: {{$post->created_at}}</span> </h5>  
                  
                 <p class="card-text font-weight-normal">
                     <?php
                      if(strlen($post->message) > 150){
                          $post->message = substr($post->message, 0, 150)."......";
                          echo $post->message;
                      } else {
                          echo $post->message;
                      }
                     ?>
                 </p>
                  <a href="/blog/{{$post->id}}" class="btn btn-primary">Learn More</a>  
                    
                </div>
            </div>
            <br><br>
            @endforeach
            <br>
            {{ $posts->links() }}
        </div>
        <div class="col-sm-12 col-xs-12 col-md-8 col-lg-3 mt-5">
   <div class="card mb-3 mt-5 ml-md-3" style="">
  <img src="storage/uploads/murex.jpg" class="card-img-top rounded" alt="Murendeni">
  <div class="card-body">
    <h5 class="card-title">Murendni Tshililo</h5>
    <p class="card-text">Web developer who is passionate about web technologies.</p>
  </div>
   <div class="card-header font-weight-bold bg-primary">
    Skills
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">PHP</li>
    <li class="list-group-item">SQL</li>
    <li class="list-group-item">MYSQL</li>
    <li class="list-group-item">Laravel</li>
  </ul>
  <div class="card-body">
    <a href="http://murex-portfolio.epizy.com" class="card-link">Portfolio</a>
    <a href="http://murexcv.epizy.com" class="card-link">CV</a>
  </div>
</div>
   <div class="card mb-3 ml-md-3" style="">
       <div class="card-header  bg-primary"><h3>Recent Posts</h3></div>
     @foreach($latest_posts as $latest)       
  
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="storage/{{$latest->image}}" class="card-img mt-2" alt="{{$latest->title}}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <a href="/blog/{{$latest->id}}" class="">{{$latest->title}}</a> </h5>
       <p class="card-text"><small class="text-muted">{{$latest->created_at}}</small></p>
      </div>
    </div>
  </div>

     @endforeach
     </div>
        </div>
    </div>
</div>
@endsection
