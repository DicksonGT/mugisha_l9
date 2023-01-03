<?php namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends EloquentUser {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes to be fillable from the model.
	 *
	 * A dirty hack to allow fields to be fillable by calling empty fillable array
	 *
	 * @var array
	 */
	protected $fillable = [];
	protected $guarded = ['id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
    protected $hidden = ['remember_token','created_at', 'deleted_at'];
	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function activations()
    {
        return $this->hasMany('App\Activations');
    }

    public function task()
    {
    	return $this->hasMany('App\Task');
    }

    public function Group()
    {
    	return $this->hasMany('App\Group');
    }

    public function Withdrawal()
    {
    	return $this->hasMany('App\Withdrawal');
    }

    public function Point()
    {
    	return $this->hasMany('App\Point', 'user_id', 'user_code');
    }
}

