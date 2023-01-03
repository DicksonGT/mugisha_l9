<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan_detail extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'loan_details';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['member_id', 'amount_requested', 'amount_granted', 'request_date', 'funding_date', 'mfi_id', 'mfi_product_id', 'status_code', 'comment'];
    
    
    public function member()
    {
        return $this->belongsTo('\App\Models\Member');
    }

    public function mfi()
    {
        return $this->belongsTo('\App\Models\Mfi');
    }

    public function mfi_product()
    {
        return $this->belongsTo('\App\Models\Mfi_product');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\Status','status_code', 'code');
    }


}