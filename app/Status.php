<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';
	protected $fillable = ['body'];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}