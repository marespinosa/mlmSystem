@php
    $pageTitle = 'HBWW International - Dashboard';
    $WelcomeNote = 'Dashboard';
    $alignment = 'alignleft';
@endphp

@extends('admin.layouts')


@section('content')
    @include('admin.sidebar')
    @include('admin.main-content-db')
    @include('admin.sub-content')

@endsection