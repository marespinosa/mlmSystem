@php
    $pageTitle = 'HBWW International - Login';
    $WelcomeNote = 'Verify';
@endphp


@extends('auth.layouts')

@section('content')



<div class="container">
    <div class="row justify-content-center">
       <div class="col-xl-10 col-lg-12 col-md-9">
         <div class="card o-hidden border-0 shadow-lg my-5">
             <div class="card-body p-0">
                 <div class="row">
                      <div class="col-lg-6">
                         <div class="p-5">
                              <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">{{ $WelcomeNote }}</h1>
                              </div>

                              <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
         
                         
                 
@endsection
