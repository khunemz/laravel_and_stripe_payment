
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Store</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
</head>
<body>
  

  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user->cart as $cart)
          <tr>
            <td>{{ $cart->product->name }}</td>
            <td>{{ $cart->product->price }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ $cart->product->price * $cart->quantity }}</td>
          </tr>
        @endforeach

          <tr>
            <td colspan="3" align="right"><strong>Sub total</strong></td>
            <td>{{ $subTotal = $user->cart->sum(function($cart) {
              return $cart->product->price * $cart->quantity;
            }) }}</td>
          </tr>
      </tbody>
    </table>

    <div>
      <form action="/" method="POST">
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_dM2a4RjmA7LdXB4txSJHqQyq"
          data-amount="{{$subTotal * 100 }}"
          data-name="Store"
          data-email="{{$user->email}}"
          data-description="Widget"
          data-locale="auto"
          data-zip-code="false">
        </script>
      </form>
    </div>

  </div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
</body>
</html>