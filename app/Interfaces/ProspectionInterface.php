<?php

namespace App\Interfaces;

use App\Models\Prospection;

interface ProspectionInterface
{
	public function create(array $prospectionData): Prospection;
}
