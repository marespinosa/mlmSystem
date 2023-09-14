@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Add New Product';
    $alignment = 'aligncenter';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div class="container">
        <form action="{{ route('products.addnew') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="row">
                <div class="col-4">
                    <div class="form-group featured-image">
                        <label for="featured_image">Featured Images:</label>
                        <div id="image-preview"></div>
                        <input type="file" name="featured_image[]" accept="image/*" multiple>
                    </div>
                </div>

                <div class="col-8">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                            </div>
                
                            <div class="form-group">
                                <label for="descp">Description</label>
                                <textarea name="descp" value="{{ old('descp') }}" id="descp" class="form-control" required></textarea>
                            </div>
                
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" value="{{ old('price') }}" id="price" class="form-control" step="0.01" required>
                            </div>
                
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" name="sku" id="sku" class="form-control">
                            </div>
                
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>

                               <button type="submit" class="btn btn-primary">Create Product</button>
                            
                        </div>

                       
                    </div>      
            
                </form>

                       
                        
            
                   
            
        


       
    
            </div>

</div>
    
@endsection

</div>

