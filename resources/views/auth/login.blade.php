@php
    $pageTitle = 'HBWW International - Login';
    $WelcomeNote = 'Welcome Back!';
@endphp



@extends('auth.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-xl-10 col-lg-12 col-md-9">
         <div class="card o-hidden border-0 shadow-lg my-5">
             <div class="card-body p-0">
                 <div class="row">
                   <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{ asset('images/bannerad.png') }});">
 

                   </div>
                      <div class="col-lg-6">
                         <div class="p-5">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">{{ $WelcomeNote }}</h1>
                              </div>
         <form action="{{ route('authenticate') }}" method="post">
             @csrf
             <div class="form-group">
                 <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="username">
                 @if ($errors->has('username'))
                         <span class="text-danger">{{ $errors->first('username') }}</span>
                 @endif
             </div>
 
             <div class="form-group">
                 <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                     @if ($errors->has('password'))
                     <span class="text-danger">{{ $errors->first('password') }}</span>
                 @endif
             </div>
 
             <div class="form-group">
                 <div class="custom-control custom-checkbox small">
                     <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                     <label class="custom-control-label" for="customCheck">Remember Me</label>
                 </div>
             </div>
             
             <input type="submit" class="btn btn-primary btn-user btn-block border-raduis" value="Login">
             
             <hr>
             </form>
                         
                 
             <div class="text-center">
                 <a class="small" href="#">Forgot Password?</a>
             </div>
             <div class="text-center">
                 <a class="small" href="register">Create an Account!</a>
             </div>


@endsection