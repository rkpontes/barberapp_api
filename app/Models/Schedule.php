<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * 
 * @property int $id
 * @property Carbon|null $scheduling_date
 * @property string|null $scheduling_hour
 * @property string|null $hour_start
 * @property string|null $hour_end
 * @property int $user_id
 * @property int|null $employee_id
 * @property int $service_id
 * 
 * @property Employee $employee
 * @property Service $service
 * @property User $user
 *
 * @package App\Models
 */
class Schedule extends Model
{
	protected $table = 'schedules';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'employee_id' => 'int',
		'service_id' => 'int'
	];

	protected $dates = [
		'scheduling_date'
	];

	protected $fillable = [
		'scheduling_date',
		'scheduling_hour',
		'hour_start',
		'hour_end',
		'user_id',
		'employee_id',
		'service_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
