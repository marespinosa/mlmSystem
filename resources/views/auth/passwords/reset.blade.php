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
                   <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url({{ asset('images/bannerad.png') }});">

                   </div>
                      <div class="col-lg-6">
                         <div class="p-5">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">{{ $WelcomeNote }}</h1>
                              </div>

                              <div class="card-body">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
            
                                    <input type="hidden" name="token" value="{{ $token }}">
            
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
        
                 


@endsection


