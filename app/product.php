<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id','nama_produk','harga','stock','slug','id_category','id_brand'];

    public $timestamps = true;

    public function category ()
    {
        return $this->belongsTo('App\category','id_category');
    }

    public function brand ()
    {
        return $this->belongsTo('App\brand','id_brand');
    }

    public function product_image ()
    {
        return $this->hasMany('App\product_image','id_product');
    }
    
}
