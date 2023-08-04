
@php
    $pageTitle = 'HBWW International - Activate';
    $WelcomeNote = 'Activate or Deactivate ';
    $alignment = 'alignleft';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')
   
@endsection
