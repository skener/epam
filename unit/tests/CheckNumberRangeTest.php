<?php

namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class checkNumberRangeTest extends TestCase {
	/**
	 * @return array
	 */
	public function positiveDataProvider () {
		return [
			[ 2, 'Вірно' ],
			[ -1, 'Невірно' ],
			[ 10, 'Невірно' ],
			[ '2', 'Exeption' ]
		];
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive ( $a, $expected ) {
		$result = checkNumberRange ( $a );
		$this->assertEquals ( $expected, $result );
	}
}