<?php
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

namespace App;

/**
 * Description of Collection
 *
 * @author SAMEH
 */
class Collection {
   protected $table = 'Collection';

    public function Product()
    {
        return $this->belongsToMany('App\Product');
    }
}
