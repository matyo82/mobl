<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductMeta extends Model
{
    use HasFactory;
	protected $fillable=['meta_key','meta_value','product_id'];
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
