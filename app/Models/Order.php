<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['order_code', 'date', 'total', 'tranx_code', 'client_id', 'paid_on', 'item_count', 'payment_status', 'status_code'];
    
    
    public function client()
    {
        return $this->belongsTo('\App\Models\Client');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\Status','status_code', 'code');
    }


}