<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'path', 'user_id'];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	// Accessor for the 'category' attribute
	public function getNameAttribute($value)
	{
		return json_decode($value, true);
	}

	// Mutator for the 'category' attribute
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = json_encode($value);
	}
}
