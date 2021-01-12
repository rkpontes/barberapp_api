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
		'activated' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'activated'
	];




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
