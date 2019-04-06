<?php
//PHP TASK #1
echo '<h4> Task #1</h4>';
function concatWords ( string $text1, string $text2 ): string {

	if ( ! is_string ( $text1 ) || ! is_string ( $text2 ) || empty( $text1 ) || empty( $text2 ) ) {

		throw new InvalidArgumentException( 'Argument must be: string, not empty' );

	} else {

		return $text1 . ' ' . $text2 . '<br>';

	}
}

$text1 = 'Hello';
$text2 = 'World';
echo concatWords ( $text1, $text2 );

//PHP TASK #2
echo '<h4> Task #2</h4>';
$var = 'hello';
echo substr ( $var, 0, 1 ) . '<br>';
echo substr ( $var, 1, 1 ) . '<br>';
echo substr ( $var, 4, 1 ) . '<br>';

//PHP TASK #3
echo '<h4> Task #3</h4>';

function checkNumberRange ( $a ) {

	if ( ! is_numeric ( $a ) || empty( $a ) || ( $a === null ) ) {

		throw new InvalidArgumentException();

	} elseif ( $a > 0 && $a < 5 ) {

		$result = 'Вірно';

	} else {

		$result = 'Невірно';

	}

	return $result;
}

$a = - 1;
echo checkNumberRange ( $a );


//PHP TASK #4
echo '<h4> Task #4</h4>';
function quaterHour ( $minute = 0 ) {

	$quoter = '';

	if ( ( ! is_numeric ( $minute ) ) || ( $minute > 60 ) || ( empty( $minute ) || ( $minute === null ) ) ) {

		throw new InvalidArgumentException( 'Argument must be: numeric,  2-digit and not empty, range 1-60' );

	} else {
		switch ( $minute ) {

			case $minute <= 15:
				$quoter = 'First';
				break;

			case $minute <= 30:
				$quoter = 'Second';
				break;

			case $minute <= 45:
				$quoter = 'Third';
				break;
			case $minute <= 60:
				$quoter = 'Fourth';
				break;

			default:
				$quoter = 'Do You khow how match minutes in 1 hour?';
		}
	}

	return $quoter;
}

//echo quaterHour(14);
//echo quaterHour ( 59 );
//echo quaterHour ( 60 );
//echo quaterHour ( 80 );
//echo quaterHour ( 800 );
//echo quaterHour ();
//echo quaterHour ( '' );

//PHP TASK #5
echo '<h4> Task #5</h4>';

function checkHighYear ( $year ) {

	return ( ( $year % 400 == 0 ) || ( $year % 4 == 0 && $year % 100 != 0 ) ) ? 'Це високосний рік!' : 'Це звичайний рік!';

}

$year = 2100;
echo checkHighYear ( $year );

//PHP TASK #6
echo '<h4> Task #6</h4>';
function checkSumParts ( $str ) {

	if ( ! is_numeric ( $str ) || empty( $str ) || $str === null || strlen ($str)!==6  ) {

		throw new InvalidArgumentException( 'Argument must be: numeric, not empty, 6th characters in number!' );

	} else {

		$leftPartStr  = 0;
		$rightPartStr = 0;

		for ( $i = 0; $i < strlen ( $str ) / 2; $i ++ ) {

			$leftPartStr += $str[ $i ];

		}
		for ( $j = strlen ( $str ) / 2; $j < strlen ( $str ); $j ++ ) {

			$rightPartStr += $str[ $j ];

		}
	}

	return ( $leftPartStr == $rightPartStr ) ? 'Yes' : 'No';
}


$str = 385934;
echo checkSumParts ( $str );


//Bonus task
echo '<h4> Bonus </h4>';
//"AD","BC" -> equal
//"AD","DD" -> not equal
//"gf","FG" -> equal
//"zz1","" -> equal
//"ZzZz", "ffPFF" -> equal
//"kl", "lz" -> not equal
//null, "" -> equal

$st1 = "AD";
$st2 = "BC";
$st3 = "AD";
$st4 = "DD";


echo preg_match ( '/^[A-Z]{1}/', $st1 );