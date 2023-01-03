<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'second_name', 'last_name', 'phone_number', 'nida_number', 'employment_status', 'employer', 'region_id', 'district_id', 'dob'];
    
    
    public function region()
    {
        return $this->belongsTo('\App\Models\Region');
    }

    public function district()
    {
        return $this->belongsTo('\App\Models\District');
    }


}