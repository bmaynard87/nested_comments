<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    
	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public function getPostDateAttribute()
	{
		return Carbon::parse($this->created_at)->toFormattedDateString();
	}

	public function getPostTimeAttribute()
	{
		return Carbon::parse($this->created_at)->format('g:i A');
	}

	public function children()
	{
		return $this->hasMany('App\Comment', 'parent_id', 'id');
	}

	public function parent()
	{
		return $this->belongsTo('App\Comment');
	}

	public function getLevel()
	{
		if( ! is_null($this->parent_id)) {
			if(is_null($this->parent->parent_id)) {
				return 2;
			}

			return 3;
		}

		return 1;
	}

}
