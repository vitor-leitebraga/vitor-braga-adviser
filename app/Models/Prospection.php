<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Prospection extends Model
{
    use HasFactory;

	protected $guarded = ["id"];

	public function consumer(): HasOne
	{
		return $this->hasOne(Consumer::class);
	}

	public function clientAddress(): HasOne
	{
		return $this->hasOne(ClientAddress::class);
	}
}
