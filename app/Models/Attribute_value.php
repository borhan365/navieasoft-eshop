<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    use HasFactory;
	public function attribute(){
		return $this->belongsTo('App\Models\Attribute', 'attribute_id');
	}

}