@php
    $pageTitle = 'HBWW International - Login';
    $WelcomeNote = 'Reset Password';
@endphp

@extends('auth.layouts')

@section('content')

<div class="container">
    <div class="row justify-content-center">
       <div class="col-xl-10 col-lg-12 col-md-9">
         <div class="card o-hidden border-0 shadow-lg my-5">
             <div class="card-body p-0">
                 <div class="row">
                   <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{ asset('images/bannerfor.png') }});">

                   </div>
                      <div class="col-lg-6">
                         <div class="p-5">
                              <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                              

                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
        
                              </div>
            <form method="POST" action="{{ route('password.email') }}">
             @csrf
             <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
             </div>
 
          

             <button type="submit" class="btn btn-primary btn-user btn-block border-raduis">
                {{ __('Send Password Reset Link') }}
            </button>


             <hr>
             </form>

             <div class="text-center">
                <a class="small" href="/login">Login</a>
            </div>
            <div class="text-center">
                <a class="small" href="/register">Create an Account!</a>
            </div>
                         
                
@endsection

        

            