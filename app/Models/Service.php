<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'service_type_id', 'code', 'status_code'];
    
    
    public function service_type()
    {
        return $this->belongsTo('\App\Models\Service_type');
    }

    public function status()
    {
        return $this->belongsTo('\App\Models\Status','status_code', 'code');
    }


}