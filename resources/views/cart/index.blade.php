@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Starter Kit - Products';
    $alignment = 'aligncenter';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="hbwwinternational.shop.html" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-sm text-white-50"></i> See All Products</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($cartItems) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>${{ $item['price'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Your cart is empty.</p>
                @endif

                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
        </div>
    </div>
    
@endsection

</div>

