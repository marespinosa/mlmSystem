
@php
    $pageTitle = 'HBWW International - Profile';
    $WelcomeNote = 'Profile';
    $alignment = 'alignleft';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    <div class="container-fluid">   
        
        @include('admin.title')

      


        <section>
            <div class="container py-5">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">

                  @if(auth()->user()->profile_picture)
                      <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture"  class="rounded-circle img-fluid" style="width: 150px;">
                  @else
                      <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}"  class="rounded-circle img-fluid" style="width: 150px;">
                  @endif

                  
                       <h5 class="my-3"> {{ $user->name }}  {{ $user->lastname }}</h5>
                      <p class="mb-0">Your Sponsored Id: <strong>{{ $user->generatedId }}</strong></p>
                    </div>
                  </div>
                  <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-5">
                          <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-13">
                          <p class="text-muted mb-0">{{ $user->status }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-5">
                          <p class="mb-0">Birthday</p>
                        </div>
                        <div class="col-sm-13">
                          <p class="text-muted mb-0"> 
                            @php
                                $inputDate = $user->birthday;
                                $timestamp = strtotime($inputDate);
                                $outputDate = date('F d, Y', $timestamp);
                                echo $outputDate; 
                            @endphp
                                    
                        </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-5">
                          <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-13">
                          <p class="text-muted mb-0">{{ $user->gender }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-5">
                          <p class="mb-0">Nationality</p>
                        </div>
                        <div class="col-sm-13">
                          <p class="text-muted mb-0">{{ $user->nationality }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0"> {{ $user->name }}  {{ $user->lastname }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Mobile</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $user->phoneNumber }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{ $user->presentAddress }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="text-center">Levels Acheived</p>
                    

                  </div>
                         
                    <section class="container">
                            <div class="p-btn">
                                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="/settings">Settings</a>
              
                                <a class="btn btn-primary btn-xl rounded-pill mt-5" id="myButton" href="settings/password">Change Password</a>
                            </div>
                    </section>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </section>
      
    


               
@endsection


