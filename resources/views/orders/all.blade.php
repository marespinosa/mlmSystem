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


        @if(count($orders) > 0)
        <table class="table table-striped" width="100%">
            <thead>
              <tr>
                <th scope="col">Tracking Number</th>
                <th scope="col">Name</th>
                <th scope="col">Total Order</th>
                <th scope="col">Date</th>
                <th scope="col">Process</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->tracking_no }}</td>
                        <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ date('Y-m-d', strtotime($order->created_at)) }}</td>
                        <td><a href="/orders/index?users_id={{ $order->users_id }}">View Order</a></td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>

    @else
        <p>No orders found.</p>
    @endif


</div>

   



   

@endsection


   
