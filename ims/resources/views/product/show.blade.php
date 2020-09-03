<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Product Show</title>
  </head>
  <body>
    <div class="container">
      <h1>Product Details</h1>
      <a href="{{ route('products.index') }}" class="btn btn-info btn-sm">Back</a>

      <table class="table table-bordered mt-3">
        <tbody>
            <tr>
              <td>Name</td>
              <td>{{ $product->product_name }}</td>
            </tr>
            <tr>
              <td>Code</td>
              <td>{{ $product->product_code }}</td>
            </tr>
            <tr>
              <td>Description</td>
              <td>{{ $product->product_description }}</td>
            </tr>
            <tr>
              <td>Image</td>
              <td><img src="{{ asset('storage/'.$product->logo) }}" alt="product" width="120" height="120"></td>
            </tr>
        </tbody>
      </table>

    </div>
    

 
  </body>
</html>