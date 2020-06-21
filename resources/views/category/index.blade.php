@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <a href="{{route('categories.create')}}" class="btn btn-dark btn-sm">New Category</a>
        </div>
    <div class="col-sm-8"> 
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1 class="text-center">Categories</h1>
<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Author</th>
      <th scope="col">Date Created</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
       @foreach($cat as $category)
      <tr>
      
      <td>{{$category->id}}</td>   
      <td>{{$category->category_name}}</td>
      <td>{{auth()->user()->name}}</td>
      <td>{{$category->created_at}}</td>
<!--      <td><a href="/categories/{{$category->id}}" class="btn btn-danger">Delete</a></td>-->
      <td>
     <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete</button>
      </form>
      </td>
    </tr> 
    @endforeach
  </tbody>
</table>
    </div>
<br><br>
{{ $cat->links() }}
</div> 
        </div>

</div>


@endsection