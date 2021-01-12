<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property bool $activated
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject
{

	use Notifiable;


	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'image' => 'boolean',
		'activated' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'fullname',
		'username',
		'password',
		'image',
		'activated'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}




	// JWT

	public function getJWTIdentifier()
    {
        return $this->getKey();
	}
	
	public function getJWTCustomClaims()
    {
        return [];
    }

}
