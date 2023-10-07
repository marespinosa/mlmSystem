@php
    $pageTitle = 'Recent Orders';
    $WelcomeNote = 'Orders';
    $alignment = 'aligncenter';
    $user = auth()->user();

@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')


    <div class="container">

        @foreach($orders as $order)

        <div class="Trackinginfo">
        <p>Tracking Number: {{ $order->tracking_no }}</p>
        <p> Date: {{ date('Y-m-d', strtotime($order->created_at)) }}</p>
        <h5>Name: {{ $order->firstName }} {{ $order->firstName }}</h5>
        <p>Shipping Address: {{ $order->address }}, {{ $order->address2 }} {{ $order->city }}, Philippines {{ $order->zipcode }}</p>
        <p>Contact Number: {{ $order->phonenumber }}</p>

        </div>
       
        <div class="row">

            <table class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th scope="col">Order ID: {{ $order->id }}</th>
                        <th scope="col">Product Name:</th>
                        <th scope="col">Quantity:</th>
                        <th scope="col">Price per product</th>
                        <th scope="col">Sub-Total</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($order->orderItems as $item)
                    <tr>    
                        <td></td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->item_price }}</td>
                        <td>{{ $item->subtotal }}</td>
                    </tr>

                    @endforeach

                    <tr>    
                        <td colspan="4"><strong class="textalignRight">Total</strong></td>
                        <td>{{ number_format($order->total_amount, 2) }}</td>

                    </tr>

                </tbody>
                @endforeach
            </table>
            
            <div class="col-md-6">


            
            </div>
        </div>
    

   
    </div>

</div>

   



   

@endsection


   
