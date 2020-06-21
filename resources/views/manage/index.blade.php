
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            
        </div>
    <div class="col-sm-8"> 
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1 class="text-center">Manage Admin</h1>
<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created By</th>
      <th scope="col">Date Created</th>
      <th>Delete</th>
       
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
  <tr>
      <td>{{$user->id}}</td>
       <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
         <td>{{auth()->user()->name}}</td>
         <td>{{$user->created_at}}</td>
        
         <td>
    <form action="/manage/{{$user->id}}" method="POST">
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
{{ $users->links() }}
</div> 
        </div>

</div>


@endsection