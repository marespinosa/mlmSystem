@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Beauty Products';
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
                                <th>Product Name</th>
                                <th width="400px">Description</th>
                                <th>Price</th>
                                <th>Order</th>
                            </tr>
                        </thead>

                        @foreach($products as $product)
                        @if($product->category == 'Beauty Products' && $product->id != 7)
                            <tr>
                                <td>
                                    <img src="{{ Storage::url('/' . $product->featured_image) }}" width="150px" alt="{{ $product->name }}" />
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->descp }}</td>
                                <td>{{ $product->price }}</td>
                                <td><a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " href="checkout.html">Check Out</a></td>
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

