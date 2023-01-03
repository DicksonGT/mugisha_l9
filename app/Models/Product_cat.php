<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_cat extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_cats';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'business_type_id'];
    
    
    public function business_type()
    {
        return $this->belongsTo('\App\Models\Business_type');
    }


}