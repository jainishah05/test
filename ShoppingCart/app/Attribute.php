<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attribute_values()
    {
        return $this->hasMany('App\AttributeValue');
    }
}
