
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

      
      
  </div>
</div>
    
               
@endsection


