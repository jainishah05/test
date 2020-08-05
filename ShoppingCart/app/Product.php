<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['name','product_code','featured','recommended','description', 'color','price'];

    /**
     * @var array
     */

    public function product_images()
    {
    	return $this->hasMany('App\ProductImage');
    }

    public function attributes()
    {
    	return $this->hasMany('App\ProductAttribute');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }
}
