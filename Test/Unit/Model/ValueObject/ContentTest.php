<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 2019/04/13
 * Time: 16:01
 */

namespace Test\Unit\Model\ValueObject;

use App\Model\ValueObject\Content;
use Test\TestCase;

class ContentTest extends TestCase {

	/**
	 * @test
	 */
	public function display() {
		$testContent = "# Bravel Hi guys.";
		$content = new Content($testContent);
		$this->assertSame($testContent, $content->display());
	}

	/**
	 * @test
	 */
	public function displayWithoutMarkdown() {
		$testContent = "# Bravel Hi guys.";
		$expectedResult = " Bravel Hi guys.";
		$content = new Content($testContent);
		$this->assertSame($expectedResult, $content->displayWithoutMarkdown());
	}
}
