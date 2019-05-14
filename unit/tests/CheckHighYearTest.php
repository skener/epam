<?php
namespace Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CheckHighYearTest extends TestCase {
    /**
     * @return array
     */
    public function positiveDataProvider () {
        return [
            [ 400, 'Це звичайний рік!' ],
            [ 2100, 'Це високосний рік!' ],
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