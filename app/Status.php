<?php

namespace App;

use App\User;
use App\Like;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = 'statuses';
	protected $fillable = ['body'];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function scopeNotReply($query)
	{
		return $query->whereNull('parent_id');
	}

	public function replies()
	{
		return $this->hasMany(Status::class, 'parent_id');
	}

	public function likes()
	{
		return $this->morphMany(Like::class, 'likeable');
	}
}