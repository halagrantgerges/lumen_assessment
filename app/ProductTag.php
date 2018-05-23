<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Tag extends Model
{ 
   protected $table = 'product_tag';
    protected $fillable = ['product_id', 'tag_id'];	 
    public $timestamps = false;
   
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
     public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
?>