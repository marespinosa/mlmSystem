@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Checkout Page';
    $alignment = 'aligncenter';
    $user = auth()->user();

@endphp

@extends('cart.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')


    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 order-md-2 mb-4">

            </div>
        </div>
    </div>

   




      
    </div>

   

@endsection


   
