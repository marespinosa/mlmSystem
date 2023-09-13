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
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="featured_image">Profile Picture:</label>
                        <input type="file" name="featured_image" id="profilePic" accept="images/*">
                    </div>
                </div>

                <div class="col-8">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                
                            <div class="form-group">
                                <label for="descp">Description</label>
                                <textarea name="descp" id="descp" class="form-control" required></textarea>
                            </div>
                
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                            </div>
                
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" name="sku" id="sku" class="form-control" required>
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

