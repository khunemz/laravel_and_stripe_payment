<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $timestamps = false;
    protected $table = 'cart';

    // product_id => product.id
    public function product()
    {
      return $this->belongsTo(Product::class);
    }
}
