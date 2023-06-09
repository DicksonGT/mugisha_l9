<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    

}