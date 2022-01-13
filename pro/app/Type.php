<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Menu;

class Type extends Model
{
    protected $primaryKey = 'id_types';



    public function user(){
        return $this->hasOne(User::class,'id','id_user');
    }
}
