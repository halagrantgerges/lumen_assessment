<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Order extends Model
{ 
    protected $table = 'order';
    protected $fillable = ['order_id' ,'email', 'total_amount_net', 'payment_method','discount_value','total_payment_after_discount'];	 
    public $timestamps = false;

    
     public function productOrder()
    {
        return $this->belongsToMany('App\OrderProduct');
    }
    
}
?>