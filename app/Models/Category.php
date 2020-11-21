<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	public function subcategories(){
		return $this->hasMany('App\models\Subcategory', 'category_id');
	}	

	public function prosubcategories(){
		return $this->hasMany('App\models\Prosubcategory', 'category_id');
	}

	public function product(){
		return $this->hasMany('App\models\Product', 'category_id');
	}

}
