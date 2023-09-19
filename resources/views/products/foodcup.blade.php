@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Food Supplements - Products';
    $alignment = 'aligncenter';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="/products/all" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-sm text-white-50"></i> See All Products</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th width="200px">Product Name</th>
                                <th width="300px">Description</th>
                                <th>Stocks</th>
                                <th>Price</th>
                                <th>Order</th>
                            </tr>
                        </thead>

                        @foreach($products as $product)
                        @if($product->category == 'Food Supplements')
                            <tr>
                                <td>
                                    <img src="{{ Storage::url('/' . $product->featured_image) }}" width="150px" alt="{{ $product->name }}" />
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->descp }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="addcart">Add to Cart</a></td>
                            </tr>
                        @endif
                    @endforeach

                        
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- /.container-fluid -->
        </div>
    </div>
    
@endsection

</div>

