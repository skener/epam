<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 04.04.2019
 * Time: 17:59
 */



function quoterHour ( $minute = 0 ) {
	$quoter = '';
	if ( ( ! is_numeric ( $minute ) ) || (  $minute > 60 ) || ( empty( $minute ) || ( $minute === null ) ) ) {
		throw new InvalidArgumentException( 'Argument must be: numeric,  2-digit and not empty, range 1-60' );
	} else {
		/// check by int
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
				$quoter = 'You how match minutes in 1 hour?';
		}
	}

	return $quoter;
}



