<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
	protected $table='addresses';
	protected $guarded=['id'];
    protected $fillable = ['user_id' , 'city' , 'province' , 'address' , 'no' , 'unit' , 'postal_code' , 'status'];
	
	public function user()
	{
		return $this->belongTo(User::class);
	}
}
