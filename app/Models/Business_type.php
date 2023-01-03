<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_type extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'business_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'status_code'];
    
    
    public function status()
    {
        return $this->belongsTo('\App\Models\Status','status_code', 'code');
    }


}