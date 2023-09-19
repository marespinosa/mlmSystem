@php
    $pageTitle = 'Products';
    $WelcomeNote = 'All Products';
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
                        <tr>
                            <td>
                                <img src="{{ Storage::url('/' . $product->featured_image) }}" width="150px" alt="{{ $product->name }}" />
                            </td>
                            <form method="POST" action="{{ route('cart.add', ['product' => $product->id]) }}">
                                @csrf
                    
                                <td><input type="hidden" name="id" value="{{ $product->id }}" class="form-control">
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control"></td>
                                <td>{{ $product->descp }}</td>
                                <td><input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control"></td>
                                <td><input type="text" name="price" value="{{ $product->price }}" class="form-control"></td>
                                <td>
                                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Add to Cart</button>
                                </td>
                            </form>
                        </tr>
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

