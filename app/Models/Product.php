<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductMeta;


class Product extends Model
{
    use HasFactory, SoftDeletes;
	
	protected $guarded=['id'];
	public function metas()
	{
		return $this->hasMany(ProductMeta::class);
	}
}
