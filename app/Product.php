<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Product extends Model
{ 
  
    protected $table = 'Product';
    protected $fillable = ['id' ,'name', 'category', 'subcategory','value','collection_id'];	 
    public $timestamps = false;
    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }
    
     public function productTag()
    {
        return $this->belongsToMany('App\ProductTag');
    }
    
     public function productOrder()
    {
        return $this->belongsToMany('App\OrderProduct');
    }
    
}
?>