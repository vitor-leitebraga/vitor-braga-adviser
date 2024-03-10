<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClientAddress extends Model
{
    use HasFactory;

	protected $guarded = ["id"];

	public function consumers(): BelongsToMany
	{
		return $this->belongsToMany(Consumer::class)->withTimestamps();
	}
}
