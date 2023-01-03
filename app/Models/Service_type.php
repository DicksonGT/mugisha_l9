<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_type extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    

}