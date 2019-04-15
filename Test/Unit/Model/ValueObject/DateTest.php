<?php

namespace Test\Unit\Model\ValueObject;

use App\Model\ValueObject\Date;
use Test\TestCase;

class DateTest extends TestCase {

	/**
	 * @test
	 */
	public function display() {
		$date = Date::create('2020-02-22');
		$this->assertSame('2020-02-22', $date->display());
	}

	/**
	 * @test
	 */
	public function createWithInvalidString() {
		$this->expectException(\Exception::class);
		Date::create('20-20-02-02');
	}
}
