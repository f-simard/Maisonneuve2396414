<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'content', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}


	// Accessor for the 'category' attribute
	public function getTitleAttribute($value)
	{
		return json_decode($value, true);
	}

	// Mutator for the 'category' attribute
	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = json_encode($value);
	}

	// Accessor for the 'category' attribute
	public function getContentAttribute($value)
	{
		return json_decode($value, true);
	}

	// Mutator for the 'category' attribute
	public function setContentAttribute($value)
	{
		$this->attributes['content'] = json_encode($value);
	}

}
