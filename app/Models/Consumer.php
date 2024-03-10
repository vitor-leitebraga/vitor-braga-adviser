<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Consumer extends Model
{
    use HasFactory;

	protected $guarded = ["id"];

	public function addresses(): BelongsToMany
	{
		return $this->belongsToMany(ClientAddress::class)->withTimestamps();
	}
}
