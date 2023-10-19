<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;


class Order extends Model
{
    use HasFactory;
	
	protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

	public function Items()
    {
        return $this->hasMany(OrderItem::class);
    }
	
	public function getOrderStatusValueAttribute()
    {
        switch ($this->order_status){
            
			     case 0:
                $result = 'در حال پردازش';
                break;
                 case 1:
                $result = 'ارسال شده';
                break;
                  case 2:
                $result = 'لغو شده';
                break;
                  case 3:
                $result = 'ثبت شده';
                break;
                 case 4:
                $result = 'مرجوعی';
                break;
        }
        return $result;
    }
	
    public function address()
	{
	    return $this->belongsTo(Address::class);
	}
}
