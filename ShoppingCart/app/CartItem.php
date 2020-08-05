<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cart_items';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'order_id', 'product_name', 'product_code', 'product_description', 'product_size', 'product_image', 'product_price', 'product_qty'];
}
