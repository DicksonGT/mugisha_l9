<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mfi_product extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mfi_products';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'details'];
    
    

}