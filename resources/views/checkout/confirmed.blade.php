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
                @php

                $countSales = 0;

                @endphp

                
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                </h4>

                <ul class="list-group mb-3">

                @foreach ($cartDetails as $item)
         


                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-muted">{{ $item['quantity'] }} x </small>
                            <small class="text-muted">{{ $item['price'] }}</small>
                        </div>
                        <span class="text-muted">{{ $item['subtotal'] }}</span>
                    </li>
                    @endforeach
                 
                   
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (PHP)</span>
                        <strong>PHP {{ $total }}</strong>
        
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Stokies Contract ID">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Contract Id</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">

            </div>
        </div>
    </div>

   


    

        



      
    </div>

   

@endsection


   
