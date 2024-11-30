<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

	protected $fillable = ['title', 'article', 'user_id'];

	public function user()
	{
		return $this->belongsTo(User::class);
	}


	protected function title(): Attribute
	{
		return Attribute::make(
			get: fn($value) => json_decode($value, true),
			set: fn($value) => json_encode($value)
		);
	}

	protected function content(): Attribute
	{
		return Attribute::make(
			get: fn($value) => json_decode($value, true),
			set: fn($value) => json_encode($value)
		);
	}

}
