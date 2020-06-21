@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
<!--        <div class="col-sm-2">
             
        </div>-->
       
        <div class="col-md-8">
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
                <div class="card-header">
                    <div class="d-flex">
                       <a class="btn btn-primary mr-2" href="{{ route('posts.index') }}"> Back</a>
                       Edit Post 
                    </div>
                    
                 </div>
         
                <div class="card-body">
                    
                    <form method="POST" action="{{route('posts.update',$p->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{old('title',$p->title)}}" autofocus>

                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                               
                                <select id="category" name="category" class="form-control" autofocus>
                                    
                                    @foreach($cat_list as $cat)
                                    <option value="{{old('category',$cat->category_name)}}" <?= ($p->category == $cat->category_name)?"selected" :"";  ?>>{{$cat->category_name}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" autofocus>

                             </div>
                        </div>
                         <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">Post</label>

                            <div class="col-md-6">
                              
                                <textarea id="post" name="post" rows="4" cols="20" class="form-control" autocomplete="post" autofocus>
                                 {{old('post',$p->message)}}
                                </textarea>
                                
                            </div>
                        </div>
                       

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>


@endsection