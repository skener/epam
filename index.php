<?php
//PHP TASK #1
echo '<h4> Task #1</h4>';
$text1 = 'Hello';
$text2 = 'World';
echo $text1 . ' ' . $text2 . '<br>';

//PHP TASK #2
echo '<h4> Task #2</h4>';
$var = 'hello';
echo substr ( $var, 0, 1 ) . '<br>';
echo substr ( $var, 1, 1 ) . '<br>';
echo substr ( $var, 4, 1 ) . '<br>';

//PHP TASK #3
echo '<h4> Task #3</h4>';
$a = 4;
if ( $a > 0 && $a < 5 ):
	echo 'Вірно';
else:'Невірно';
endif;

//PHP TASK #4
echo '<h4> Task #4</h4>';
$min = 45;
switch ( $min ):
	case $min <= 15:
		echo 'Перша';
		break;
	case $min <= 30:
		echo 'Друга';
		break;
	case $min <= 45:
		echo 'Третя';
		break;
	default:
		echo "Something wrong!";
endswitch;

//PHP TASK #5
echo '<h4> Task #5</h4>';
$year = 2019;
echo ( $year % 4 == 0 || $year % 400 == 0 ) ? 'Це високосний рік' : 'Це звичайний рік';

//PHP TASK #6
echo '<h4> Task #6</h4>';
function sum ( $str ) {
	$sumFirst = 0;
	$sumTwo   = 0;
	for ( $i = 0; $i < strlen ( $str ) / 2; $i ++ ) {
		$sumFirst += $str[ $i ];
	}
	for ( $j = strlen ( $str ) / 2; $j < strlen ( $str ); $j ++ ) {
		$sumTwo += $str[ $j ];
	}

	return ( $sumFirst == $sumTwo ) ? 'yes' : 'no';
}


$str = '385934';
echo sum ( $str );


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



echo preg_match ('/^[A-Z]{1}/', $st1);