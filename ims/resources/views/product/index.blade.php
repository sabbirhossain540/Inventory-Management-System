<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Product List</title>
  </head>
  <body>
  	<div class="container">
  		<h1>Product List</h1>
    	<a href="{{ route('products.create') }}" class="btn btn-info btn-sm">Add Product</a>

      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Logo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
            <tr>
              <!-- <th scope="row">1</th> -->
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->product_code }}</td>
              <td><img src="{{ asset('storage/'.$product->logo) }}" alt="product" width="60" height="60"></td>
              <td><a href="{{ route('products.show',$product->id) }}" class="btn btn-sm btn-info mr-1">View</a><a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a><a href="" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>

  	</div>
    

 
  </body>
</html>