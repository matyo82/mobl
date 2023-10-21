<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductMeta;
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

	public function productMetas()
	{
		return $this->hasMany(ProductMeta::class);
	}

	public function productFabrics()
	{
		return $this->hasMany(ProductFabric::class);
	}
	
	public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class,'category_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }




}
