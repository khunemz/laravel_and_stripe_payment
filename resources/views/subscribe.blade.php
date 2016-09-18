<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Subscribe</title>
</head>
<body>
  <h2>Subscription </h2>
   <div>
      <form action="/subscribe" method="POST">
        <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_dM2a4RjmA7LdXB4txSJHqQyq"
          data-amount="999"
          data-name="Store"
          data-description="Premium Monthly Subscription"
          data-email="{{$user->email}}"
          data-description="Widget"
          data-locale="auto"
          data-zip-code="false">
        </script>
      </form>
    </div>
</body>
</html>