<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
        protected $table = 'carts';
        protected $fillable = ['id', 'id_user', 'id_product', 'jumlah'];
        public $timestamps = true;

        public function product()
        {
            return $this->belongsTo('App\product','id_product');
        }

        public function user()
        {
            return $this->belongsTo('App\User','user_id');
        }
    }
