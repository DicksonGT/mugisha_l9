<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expenses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id', 'item', 'paid_on', 'payment_method', 'amount'];
    
    
    public function member()
    {
        return $this->belongsTo('\App\Models\Member', 'client_id');
    }


}