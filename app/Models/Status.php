<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'code', 'name'];
    
    

}