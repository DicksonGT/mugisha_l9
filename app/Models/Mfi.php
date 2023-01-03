<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mfi extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mfis';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'address', 'phone_number', 'region_id', 'district_id'];
    
    
    public function region()
    {
        return $this->belongsTo('\App\Models\Region');
    }

    public function district()
    {
        return $this->belongsTo('\App\Models\District');
    }


}