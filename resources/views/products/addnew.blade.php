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
                        <input type="file" name="featured_image" accept="image/*" multiple>
                        
                        @error('featured_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="col-8">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            </div>
                
                            <div class="form-group">
                                <label for="descp">Description</label>
                                <textarea name="descp" value="{{ old('descp') }}" id="descp" class="form-control" required></textarea>
                                @error('descp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                
                            <div class="form-group">
                                <label for="stockistprice">Price for Stockist</label>
                                <input type="number" name="stockistprice" value="{{ old('stockistprice') }}" id="stockistprice" class="form-control" required>
                                @error('stockistprice')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            </div>

                            <div class="form-group">
                                <label for="price">Price for Member</label>
                                <input type="number" name="price" value="{{ old('price') }}" id="price" class="form-control" required>
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            </div>

                            <div class="form-group">
                                <label for="srp">SRP</label>
                                <input type="number" name="srp" value="{{ old('srp') }}" id="srp" class="form-control" required>
                                @error('srp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            
                            </div>
                
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" name="sku" id="sku" class="form-control">
                            </div>
                
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                                @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                              <label class="padding-left">Category</label>
                                <select name="category" class="border-raduis width100">
                                    <option value="Beauty Products">Beauty Products</option>
                                    <option value="Food Supplements">Food Supplements</option>
                                    <option value="Home Care Products">Home Care Products</option>
                                    <option value="Cosmetics and Scent">Cosmetics and Scent</option>
                                </select>
                               
                            </div>

                               <button type="submit" class="btn btn-primary">Create Product</button>
                            
                        </div>

                       
                    </div>      
            
                </form>

                       
                        
            
                   
            
        


       
    
            </div>

</div>
    
@endsection

</div>

