<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductMeta;
use App\Models\Fabric;
use App\Models\ProductFabric;
use App\Models\ProductCategory;
use Cviebrock\EloquentSluggable\Sluggable;



class Product extends Model
{
    use HasFactory, SoftDeletes,Sluggable;
	
	protected $guarded=['id'];
	
	public function sluggable(): array
    {
        return[
            'slug' =>[
                'source' => 'name',
            ]
        ];
    }

	public function metas()
	{
		return $this->hasMany(ProductMeta::class);
	}
	
		
	public function fabrics()
	{
		return $this->hasMany(ProductFabric::class);
	}
	
	public function category()
	{
	    return $this->belongsTo(ProductCategory::class);
	}
	
}
