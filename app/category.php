<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','nama_category','slug'];

    public $timestamps = true;

    public function product()
    {
        return $this->hasMany('App\product','id_category');
    }

}
