@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <a href="{{route('posts.create')}}" class="btn btn-dark btn-sm">New Post</a>
        </div>
    <div class="col-sm-8"> 
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1 class="text-center">Admin Dashboard</h1>
<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Post Title</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Banner</th>
      <th scope="col">Comments</th>
      <th scope="col">Date Created</th>
      <th>Delete</th>
       <th>Edit</th>
        <th>Live Preview</th>
    </tr>
  </thead>
  <tbody>
  @foreach($post as $p)
  <tr>
      <td>{{$p->id}}</td>
       <td>{{$p->title}}</td>
        <td>{{$p->user->name}}</td>
         <td>{{$p->category}}</td>
         <td><img src="storage/{{$p->image}}" class="img-fluid" alt="banner"/></td>
         <td> <span class="badge badge-pill badge-success">{{count($p->comments)}}</span></td>
         <td>{{$p->created_at}}</td>
         <td>
     <form action="{{ route('posts.destroy', $p->id) }}" method="POST">
         
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete</button>
      </form>
            
        </td>
        <td>
           <a href="{{route('posts.edit',$p->id)}}" class="btn btn-warning">Edit</a>  
        </td>
             <td>
  
                 <a href="{{route('blog.full_blog',$p->id)}}" class="btn btn-primary" target="_blank">Live Preview</a> 
             </td>
  </tr>
  
  @endforeach
  </tbody>
</table>
</div>
<br><br>
{{ $post->links() }}
</div> 
        </div>

</div>


@endsection