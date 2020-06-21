@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
    <div class="col-sm-8"> 
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1 class="text-center">Dis-Approved Comments</h1>
<div class="table-responsive">
<table class="table">
    
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
       <th scope="col">Comment</th>
      <th scope="col">Date</th>
     
      <th>Approve</th>
      <th>Delete</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach($disapprove as $dis)
  <tr>
      <td>{{$dis->id}}</td>
       <td>{{$dis->name}}</td>
       <td>{{$dis->message}}</td>
       <td>{{$dis->created_at}}</td>
        <td>
             <a href="/comments/{{$dis->id}}" class="btn btn-success">Approve</a>
             </td>
         <td>
     <form action="{{ route('comments.destroy', $dis->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete</button>
      </form>
            
        </td>
        <td>
    <a href="{{route('blog.full_blog',$dis->post_id)}}" class="btn btn-primary" target="_blank">Preview</a> 
             </td>
  </tr>
  
  @endforeach
  </tbody>
</table>
</div>
{{ $disapprove->links() }}
<br><br>
<h1 class="text-center">Approved Comments</h1>
<div class="table-responsive">
<table class="table">
    
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
       <th scope="col">Comment</th>
       <th  scope="col">Approved By</th>
      <th scope="col">Date</th>
     
      <th  scope="col">Revert Approve</th>
      <th  scope="col">Delete</th>
      <th  scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
  @foreach($approve as $appr)
  <tr>
      <td>{{$appr->id}}</td>
       <td>{{$appr->name}}</td>
       <td>{{$appr->message}}</td>
       <td>{{auth()->user()->name}}</td>
       <td>{{$appr->created_at}}</td>
        <td>
             <a href="/comments/{{$appr->id}}" class="btn btn-success">Approve</a>
             </td>
         <td>
     <form action="{{ route('comments.destroy', $appr->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Delete</button>
      </form>
            
        </td>
        <td>
    <a href="{{route('blog.full_blog',$appr->post_id)}}" class="btn btn-primary" target="_blank">Preview</a> 
             </td>
  </tr>
  
  @endforeach
  </tbody>
</table>
</div>
{{ $approve->links() }}
</div> 
        </div>

</div>


@endsection



