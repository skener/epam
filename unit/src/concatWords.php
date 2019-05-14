<?php

function concatWords ( string $text1, string $text2 ): string {

	if ( ! is_string ( $text1 ) || ! is_string ( $text2 ) || empty( $text1 ) || empty( $text2 ) ) {

		throw new InvalidArgumentException( 'Argument must be: string, not empty' );

	} else {

		return $text1 . ' ' . $text2;

	}
}

$text1 = 'Hello';
$text2 = 'World';
echo concatWords ( $text1, $text2 );