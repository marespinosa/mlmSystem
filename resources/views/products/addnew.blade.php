@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Adding a Product';
    $alignment = 'aligncenter';
@endphp

@extends('products.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div class="container-fluid">

        <div class="container">
            <div class="cardProducts o-hidden border-0 shadow-lg my-5">
             
                <form action="{{ route('products.addnew') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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

                    <label for="featured_image">Upload Image:</label>
                    <div id="image-preview" style="width: 150px;"></div>
                    <input type="file" name="featured_image" accept="image/*" multiple>
                    
                    @error('featured_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  
                </div>
           

              <div class="form-group">
                <label for="productCategory">Product Category:</label>
                <select name="category" class="border-raduis width100">
                    <option value="Beauty Products">Beauty Products</option>
                    <option value="Food Supplements">Food Supplements</option>
                    <option value="Home Care Products">Home Care Products</option>
                    <option value="Cosmetics and Scent">Cosmetics and Scent</option>
                </select>
              </div>
              <div class="row">
                <div class="form-group prodt">
                    <label for="price">Price for Member</label>
                    <input type="number" name="price" value="{{ old('price') }}" id="price" class="form-control" required>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                
                  
                </div>
    

                <div class="form-group prodt">
                    <label for="stockistprice">Price for Stockist</label>
                    <input type="number" name="stockistprice" value="{{ old('stockistprice') }}" id="stockistprice" class="form-control" required>
                    @error('stockistprice')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror 
                    
                </div>

                <div class="form-group prodt">
                    <label for="srp">SRP</label>
                    <input type="number" name="srp" value="{{ old('srp') }}" id="srp" class="form-control" required>
                    @error('srp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group prodt">
                    <label for="sku">SKU</label>
                    <input type="text" name="sku" id="sku" class="form-control">

                </div>


                <div class="form-group prodt">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Create Product</button>
               </div>
              </form>
        </div>
    </div>
                        <div class="container">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Products Category</h1>
                            </div>
                        <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-header">Cosmetics and Scent</div>
                                <div class="card-body">
                                  <a href="/products/cosmetics">
                                  <button type="button" class="btn btn-success">View</button>
                                </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card mb-3" style="max-width: 18rem;">
                                  <div class="card-header">Beauty Products</div>
                                  <div class="card-body"> 
                                    <a href="/products/beautypro">
                                      <button type="button" class="btn btn-success">View</button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            <div class="col-md-3">
                              <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-header">Food Supplements</div>
                                <div class="card-body">
                                 
                                  <a href="/products/foodcup">
                                  <button type="button" class="btn btn-success">View</button>
                                </a>
                                </div>
                              </div>
                            </div>
                              <div class="col-md-3">
                                <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-header">Home Care Products</div>
                                    <div class="card-body">
                                        <a href="/products/homecare">
                                    <button type="button" class="btn btn-success">View</button>
                                </a>
                                </div>
                            </div>`
                        </div>
                    </div>
                </div>
            </div>   
          </div>  
   <!-- /.container-fluid -->

    
@endsection

</div>

