<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 04.04.2019
 * Time: 18:09
 */


namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class QuaterHourTest extends TestCase {
	/**
	 * @return array
	 */
	public function positiveDataProvider () {
		return [
			[ 14, 'First' ],
			[ 'a', 'Exeption Arg' ],
			[ null, 'Exeption Arg' ],
			[ '', 'Exeption Arg' ]
		];
	}

	/**
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive ( $a,  $expected ) {
		$result = quoterHour ( $a );
		$this->assertEquals ( $expected, $result );
	}

//	public function testNegative () {
//		$this->expectException ( InvalidArgumentException::class );
//		division ( 1, 0 );
//	}
}