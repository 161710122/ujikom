<?php

namespace App;
use App\product;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $table = 'product_images';
    protected $fillable = array('id_product','foto');

    public $timestamps = true;

    public function product ()
    {
        return $this->belongsTo('App\product','id_product');
    }
}
