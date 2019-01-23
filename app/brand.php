<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['id','nama_brand','slug'];

    public $timestamps = true;

    public function product ()
    {
        return $this->hasMany('App\product','id_brand');
    }

}
