<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_role');
	}
}
