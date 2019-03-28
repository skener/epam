<?php
//PHP TASK #1
echo '<h4> Task #1</h4>';
$str = 'var_test_text';
echo ucwords ( str_replace ( "_", " ", $str ) );

echo '<h4> Task #2</h4>';
echo $str1 = 'ФЫВА олдж';
echo '<br>';
foreach ( explode ( ' ', $str1 ) as $char ) {
	mb_http_output ( 'UTF-8' );
	echo strrev ( $char ) . ' ';
}

//PHP TASK #3
echo '<h4> Task #3</h4>';
$a = [ 342, 55, 33, 123, 66, 63, 9 ];
//$a = [ 9, 9 ];
foreach ( $a as $match ) {
	if ( preg_match ( '/3/', $match ) ) {
		echo $match . '<br>';
	}

}

//PHP TASK #4
echo '<h4> Task #4</h4>';
$b     = [ 342, 55, 33, 123, 66, 63, 9 ];
$occur = 0;
foreach ( $b as $value ) {
	if ( preg_match_all ( '/3/', $value, $matches ) ) {
		$occur += count ( $matches[0] );
	}
}

echo $occur;
