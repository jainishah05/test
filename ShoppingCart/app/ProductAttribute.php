<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'product_attributes';

    /**
     * @var array
     */
    protected $fillable = ['attribute_id', 'product_id','attribute_value', 'price' ,'quantity','sku'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    } 
}
