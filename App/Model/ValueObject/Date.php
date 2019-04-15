<?php

namespace App\Model\ValueObject;

use Carbon\Carbon;
use Exception;

class Date {

    private $carbonDate; // use the carbon library to manipulate the date

    private function __construct(Carbon $carbonDate) {
    	$this->carbonDate = $carbonDate;
    }

    /*
     * the only supported format is YYYY-MM-DD at the moment
     */
    public static function create(string $date): self {
    	try {
		    $carbonDate = Carbon::createFromFormat('Y-m-d', $date);
	    } catch (Exception $e) {
    		throw new Exception("Invalid string date to initialize Date");
	    }
    	return new self($carbonDate);
    }

	/*
	 * display the date with the YYYY-MM-DD format
	 */
	public function display(): string {
    	return $this->carbonDate->format('Y-m-d');
    }
}
