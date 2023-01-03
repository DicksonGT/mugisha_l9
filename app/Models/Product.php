<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'barcode', 'product_cat_id', 'price', 'status_code'];
    
    
    public function product_cat()
    {
        return $this->belongsTo('\App\Models\Product_cat');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\Status','status_code', 'code');
    }


}