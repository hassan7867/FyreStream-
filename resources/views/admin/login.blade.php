@extends('layout.admin.login')

@section('content')
<div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="account-col text-center">
                    <h1>Admin Panel</h1>
                    <h3>Log into your account</h3>
                     <form class="form-horizontal" id="login-form" role="form" method="POST" action="{{ route('admin-login') }}">
                         {{ csrf_field() }}
                        <div class="form-group row">
                            <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group row">
                            <input type="password" name="password" class="form-control" placeholder="Passowrd" required="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block ">Login</button><!-- 
                        <p>Admin &copy; 2020</p> -->
                    </form>
                </div>
                </div>
                <div class="col-md-4"></div>
                
            </div>
        </div>
@endsection
