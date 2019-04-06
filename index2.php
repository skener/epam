<?php
//PHP TASK #1
echo '<h4> Task #1</h4>';

function replaceUnderScore ( string $str ): string {

	if ( ! is_string ( $str ) || empty( $str ) || $str === null ) {

		throw new InvalidArgumentException( 'Argument must be: a string and not empty!' );

	} else {

		$string = ucwords ( str_replace ( "_", " ", $str ) );
		$result = str_replace ( ' ', '', $string );

		return $result;
	}
}

$str = 'var_test_text';
echo replaceUnderScore ( $str );

echo '<h4> Task #2</h4>';

echo '<br>';

function reverseWords ( $str1 ) {

	$reverseStr = '';

	foreach ( explode ( ' ', $str1 ) as $char ) {

		$reverseStr .= strrev ( $char . ' ' );

	}

	//mb_internal_encoding ( "Windows-1251" );
	//return mb_convert_encoding ( $reverseStr, 'UTF-8', 'UTF-8' );
	//return iconv ( 'Windows-1251', 'UTF-8', $reverseStr );
	return $reverseStr;

}

echo $str1 = 'ФЫВА олдж';

echo '<br>';
echo reverseWords ( $str1 );

//PHP TASK #3
echo '<h4> Task #3</h4>';

function onlyItemsContainThree ( $array ) {

	foreach ( $array as $item ) {
		if ( preg_match ( '/3/', $item ) ) {

			echo $item . '<br>';

		}

	}
}

$a = [ 342, 55, 33, 123, 66, 63, 9 ];
onlyItemsContainThree ( $a );

//PHP TASK #4
echo '<h4> Task #4</h4>';

function countNumberThree ( $ar ) {

	if ( ! is_array ( $ar ) || empty( $ar ) || $ar === null ) {

		throw new InvalidArgumentException( 'Argument must be: an array and not empty!' );

	} else {

		$occur = 0;

		foreach ( $ar as $value ) {

			if ( preg_match_all ( '/3/', $value, $matches ) ) {

				$occur += count ( $matches[0] );

			}
		}

		return $occur;
	}
}

$ar = [ 342, 55, 33, 123, 66, 63, 9 ];
echo countNumberThree ( $ar );

