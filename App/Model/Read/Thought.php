<?php

namespace App\Model\Read;

use App\Model\ValueObject\Date;

interface Thought extends Article {

	public function renewedAt(): Date;
}