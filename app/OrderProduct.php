<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Order extends Model
{ 
    protected $table = 'order_product';
    protected $fillable = ['order_id' ,'product_id', 'qnt'];	 
    public $timestamps = false;

    
     public function order()
    {
        return $this->belongsTo('App\Order');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    
}
?>