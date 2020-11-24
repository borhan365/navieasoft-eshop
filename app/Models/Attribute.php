<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
	public function attribute_value(){
		return $this->hasMany('App\Models\Attribute_value', 'attribute_id');
	}

}
