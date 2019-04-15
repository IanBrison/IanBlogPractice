<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 2019/04/13
 * Time: 17:41
 */

namespace Test\Unit\Model\ValueObject;

use App\Model\ValueObject\Url;
use Test\TestCase;

class UrlTest extends TestCase {

	CONST FULL_STRING = 'https://test.com/path?id=1&type=bbb';

	/**
	 * @test
	 */
	public function scheme() {
		$url = Url::createFromFullString(self::FULL_STRING);
		$this->assertSame('https', $url->scheme());
	}

	/**
	 * @test
	 */
	public function domain() {
		$url = Url::createFromFullString(self::FULL_STRING);
		$this->assertSame('test.com', $url->domain());
	}

	/**
	 * @test
	 */
	public function path() {
		$url = Url::createFromFullString(self::FULL_STRING);
		$this->assertSame('/path', $url->path());
	}

	/**
	 * @test
	 */
	public function params() {
		$url = Url::createFromFullString(self::FULL_STRING);
		$expectedParams = [
			'id' => '1',
			'type' => 'bbb',
		];
		$this->assertSame($expectedParams, $url->params());
	}

	/**
	 * @test
	 */
	public function fullString() {
		$url = Url::createFromFullString(self::FULL_STRING);
		$this->assertSame(self::FULL_STRING, $url->fullString());
	}
}
