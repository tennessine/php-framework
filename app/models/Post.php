<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	protected $fillable = ['user_id', 'title', 'body'];
	public $timestamps = [];

	public function user() {
		return $this->hasOne('App\Models\User');
	}
}