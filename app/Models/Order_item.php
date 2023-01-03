<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_code', 'product_id', 'service_id', 'quantity', 'price', 'total', 'member_id'];
    
    
    public function product()
    {
        return $this->belongsTo('\App\Models\Product');
    }

    public function service()
    {
        return $this->belongsTo('\App\Models\Service');
    }

    public function member()
    {
        return $this->belongsTo('\App\Models\Member');
    }


}