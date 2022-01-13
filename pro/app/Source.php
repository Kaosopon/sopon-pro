<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $primaryKey = 'id_source';

    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
}
