<?php
use App\User;

Auth::loginUsingId(3);

Route::get('/', function () {
  $user = Auth::user();
  return view('cart', compact('user'));
});


Route::post('/', function () {
    $total = Auth::user()->cart->sum(function ($cart) {
        return $cart->product->price * $cart->quantity;
    });
    Auth::user()->charge($total * 100, ['source' => Input::get('stripeToken')]);
    return 'Charged';
});


Route::get('subscribe', function () {
  $user = Auth::user();
  return view('subscribe' , compact('user'));
});

Route::post('subscribe' , function () {
  Auth::user()->subscription('monthlyPremium')->withCoupon('special')->create(Input::get('stripeToken'));
  return 'Subscribed for one premium month';
});

Route::get('swap' , function () {
  Auth::user()->subscription('monthly')->swapAndInvoice();
  /* Auth::user->subscription()->decrementAndInvoice(); //in case you want to to decrease number in subscription */
  return 'Swapped to monthly';
});

Route::get('coupon', function() {
  Auth::user()->applyCoupon('special');
  return 'Coupon applied';
});

Route::get('cancel', function () {
  Auth::user()->subscription()->cancel();
  return 'Canceled';
});

Route::get('invoices', function () {
  $invoices = Auth::user()->invoices(); //not single invoice
  return view('invoices' , compact('invoices'));
});

Route::get('invoice/{id}', function ($id) {
  $invoice = Auth::user()->findInvoiceOrFail($id);

  return $invoice->view([
    'vendor' => 'Store subscription',
    'product' => 'Subscription'
    ]);
});

Route::get('invoice/{id}/download', function ($id) {
  $invoice = Auth::user()->findInvoiceOrFail($id);

  return $invoice->download([
    'vendor' => 'Store subscription',
    'product' => 'Subscription'
    ]);
});


