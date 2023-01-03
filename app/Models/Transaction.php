<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['txn_id', 'type', 'company_id', 'member_id', 'offer_id', 'amount', 'details'];
    
    
    public function txn()
    {
        return $this->belongsTo('\App\Models\Txn');
    }

    public function company()
    {
        return $this->belongsTo('\App\Models\Company');
    }

    public function member()
    {
        return $this->belongsTo('\App\Models\Member');
    }

    public function offer()
    {
        return $this->belongsTo('\App\Models\Offer');
    }


}