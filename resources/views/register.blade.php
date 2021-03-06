@extends('master')
@section('content')

<div class="container custom-login">
    <div class="row">
        {{-- col-sm-offset-4 This will make the code center --}}
        <div class="col-sm-4 col-sm-offset-4"> 
            <form action="registerUser" method="POST">
              @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control"
                    name="name" placeholder="Username">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control"
                   name="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" 
                  name="password" placeholder="Password">
                </div>
                
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection