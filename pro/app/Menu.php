<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Type;

class Menu extends Model
{
    protected $primaryKey = 'id_menus';

    public function type(){
        return $this->belongsTo(Type::class,'id_type');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
