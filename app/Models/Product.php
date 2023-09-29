<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductMeta;
use App\Models\Fabric;
use App\Models\ProductFabric;


class Product extends Model
{
    use HasFactory, SoftDeletes;
	
	protected $guarded=['id'];

	public function metas()
	{
		return $this->hasMany(ProductMeta::class);
	}
	
		
	public function fabrics()
	{
		return $this->hasMany(ProductFabric::class);
	}
	
}
