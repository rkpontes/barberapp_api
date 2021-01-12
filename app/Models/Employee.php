<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $image
 * @property int $company_id
 * @property int $user_id
 * 
 * @property Company $company
 * @property User $user
 * @property Collection|Service[] $services
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'image',
		'company_id',
		'user_id'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function services()
	{
		return $this->belongsToMany(Service::class, 'employees_services');
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}
}
