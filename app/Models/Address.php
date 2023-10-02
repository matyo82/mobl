<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
	protected $table='addresses';
	protected $guarded=['id'];
	
	public function user()
	{
		return $this->belongTo(User::class);
	}
}
