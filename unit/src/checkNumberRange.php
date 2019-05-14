<?php

function checkNumberRange ( $a ) {

	if ( is_string ( $a ) || empty( $a ) || ( $a === null ) ) {

		throw new InvalidArgumentException();

	} elseif ( $a > 0 && $a < 5 ) {

		$result = 'Вірно';

	} else {

		$result = 'Невірно';

	}

	return $result;
}


//$a = 2;
//echo checkNumberRange ( $a );