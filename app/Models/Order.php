<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;


class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

	public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
	
	public function getOrderStatusValueAttribute()
    {
        switch ($this->order_status){
            
			     case 0:
                $result = 'بررسی نشده';
                break;
                 case 1:
                $result = 'در انتظار تایید';
                break;
                  case 2:
                $result = 'تایید شده';
                break;
                 case 3:
                $result = 'تایید نشده';
                break;
                 case 4:
                $result = 'باطل شده';
                break;
                case 5:
                $result = 'مرجوع شده';
                break;
        }
        return $result;
    }
	
    public function address()
	{
	    return $this->belongsTo(Address::class);
	}
	
}
