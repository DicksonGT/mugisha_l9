<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'districts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'region_id'];
    
    
    public function region()
    {
        return $this->belongsTo('\App\Models\Region');
    }


}