@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                    <div class="d-flex">
                       <a class="btn btn-primary mr-2" href="{{ route('categories.index') }}"> Back</a>
                        Category
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="/categories">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}"  autocomplete="category_name" autofocus>

                                @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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