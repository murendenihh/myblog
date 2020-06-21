@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
            @endif
            <div class="card mt-5">
                
                <div class="card-header">
                    Contact us
                </div>
                <div class="card-body">
                    
               
    <div class="contact-wraper">
        <form action="{{route('contacts.store')}}" method="POST">
         @csrf
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="first_name" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="last_name" placeholder="Your last name.." required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email.." required>
    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>

    <input type="submit" value="Submit">

  </form>
</div> 
                     </div>
  </div>         
        </div>
        
    </div>
</div>
@endsection
