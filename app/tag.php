<?php namespace App;
 
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Tag extends Model
{ 
   protected $table = 'Tag';
    protected $fillable = ['tag_id', 'name'];	 
    public $timestamps = false;
   
 
     public function product()
    {
        return $this->belongsToMany('App\Product');
        
    }
}
?>