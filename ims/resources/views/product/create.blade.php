<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
  <body>
  	<div class="container">
      @if(isset($product))
        <h1>Edit Product</h1>
      @else
        <h1>Add Product</h1>
      @endif
  		
      <div class="col-md-2"></div>
      <div class="col-md-8">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group" >
                    @foreach($errors->all() as $error)
                        <li class="list-group-list" >
                        {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ isset($product) ? route('products.update',$product->id) : route('products.store') }}" enctype="multipart/form-data">
          @csrf
          @if(isset($product))
            @method('PUT')
          @endif
          <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="{{ isset($product) ? $product->product_name : '' }}" placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="product_code">Product Code</label>
            <input type="text" name="product_code" id="product_code" class="form-control" value="{{ isset($product) ? $product->product_code : '' }}" placeholder="Product Code">
          </div>
          <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" rows="5" cols="5" name="description" id="description" placeholder="Description">{{ isset($product) ? $product->product_description : '' }}</textarea>
          </div>
          @if(isset($product))
          <div class="form-group">
            <img src="{{ asset('storage/'.$product->logo) }}" alt="product" width="100" height="100">
          </div>
          @endif
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">@if(isset($product)) Update @else Add @endif</button>
          </div>

        </form>
      </div>
  	</div>
    

 
  </body>
</html>