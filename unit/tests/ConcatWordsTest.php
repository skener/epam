<?php

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ConcatWordsTest extends TestCase {
	/**
	 * @return array
	 */
	public function positiveDataProvider () {
		return [
			[ 'Hello', 'World', 'Hello World' ]
		];
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive ( $text1, $text2, $expected ) {
		$result = concatWords ( $text1, $text2  );
		$this->assertEquals ( $expected, $result );
	}
}