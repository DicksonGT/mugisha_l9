<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['member_id', 'offer_id', 'comment', 'rating'];
    
    
    public function member()
    {
        return $this->belongsTo('\App\Models\Member');
    }

    public function offer()
    {
        return $this->belongsTo('\App\Models\Offer');
    }


}