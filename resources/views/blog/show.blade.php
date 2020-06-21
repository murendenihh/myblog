
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <h1>Complete responsive cms blog developed with Laravel</h1>
            @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
            @endif
           
            @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div class="card">
                 <img src="/storage/{{$post->image}}" class="card-img-top img-thumbnail img-fluid" alt="{{$post->title}}">
                <div class="card-header">
                    <h2 class="text-info">{{$post->title}}<span class="badge badge-pill badge-primary ml-5">comments {{count($post->comments)}}</span></h2>
                </div>

                <div class="card-body">
                 <h5 class="card-title text-info">Category: {{$post->category}} <span> Published on:{{$post->created_at}} </span> </h5>  
                  
                 <p class="card-text font-weight-normal">
                   {{$post->message}} 
                   <br><br>
              <div class="d-flex p-2 bd-highlight">
                  <h3 class="text-info">Comments</h3>
                    </div>
                 @foreach($post->comments as $c)
             <div class="d-flex p-2 bd-highlight bg-info">
                 <div class="p-2 bd-highlight"><img src="/storage/uploads/avatar1.png" width="30px" height="20px" class="img-fluid" alt="avata"></div>
                  <div class="p-2 bd-highlight">
                      <h4>{{$c->name}}</h4>
                      {{$c->created_at}}<br>
                      <p class="text-wrap font-weight-normal">{{$c->message}}</p>
                  
                  </div>
             </div>       
              @endforeach
      <div class="d-flex p-2 bd-highlight">  
         
      <form action="/blog" method="POST">
       @csrf
      <legend>Share your thoughts about this post</legend>
           <input type="hidden" name="post_id" value="{{$post->id}}"> 
  <div class="form-group">
      
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
        <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="{{old('email')}}">
   
  </div>
  <div class="form-group">
       <label for="comment">Comment</label>
       <textarea class="form-control" id="comment" rows="3" name="comment"> {{old('comment')}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
                 </p>
                  
                    
                </div>
            </div>
            <br><br>
            
        </div>
    </div>
</div>
@endsection
