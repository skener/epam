<?php
//PHP TASK #1
echo '<h4> Task #1</h4>';

function refillAr ( $ar ) {

	foreach ( $ar as $item ) {

		for ( $i = 1; $i <= $item; $i ++ ) {

			$ref_arr[] = $item;

		}
	}
	echo '<pre>';
	print_r ( $ref_arr );
	echo '<pre>';

}

$ar = [ 1, 3, 2, 4 ];
refillAr ( $ar );


//PHP TASK #2
echo '<h4> Task #2</h4>';

$temperatures = [
	33,
	15,
	17,
	20,
	23,
	23,
	28,
	40,
	21,
	19,
	31,
	18,
	30,
	31,
	28,
	23,
	19,
	28,
	27,
	30,
	39,
	17,
	17,
	20,
	19,
	23,
	28,
	30,
	34,
	28
];

$tempp = array_unique ( $temperatures );

sort ( $tempp, SORT_NUMERIC );

foreach ( $tempp as $sort ) {

	echo $sort . '<br>';

}
$count = count ( $tempp ) - 1;
$mid   = $count / 2;

echo 'Три мінімальні знчення температури:' . ( $tempp[0] ) . ', ' . $tempp[1] . ', ' . $tempp[2] . '<br>';
echo 'Три середні значення температури:' . ( $tempp[ $mid ] ) . ', ' . $tempp[ $mid + 1 ] . ', ' . $tempp[ $mid - 1 ] . '<br>';
echo 'Три максимальні значення температури:' . ( $tempp[ $count ] ) . ', ' . $tempp[ $count - 1 ] . ', ' . $tempp[ $count - 2 ];


//PHP TASK #3
echo '<h4> Task #3</h4>';

function sortPrices ( array $books ) {

	foreach ( $books as $value ):

		( array_key_exists ( 'price', $value ) ? $prices[]['price'] = $value['price']  : false );

	endforeach;

	array_multisort($prices, SORT_ASC, $books);

	echo '<pre>';
	print_r ( $prices );
	echo '<pre>';

}


$books = [
	[
		'name'   => 'Learning php, mysql & JavaScript',
		'author' => 'Robin Nixon',
		'price'  => 30,
		'tags'   => [ 'php', 'javascript', 'mysql' ]
	],
	[
		'name'   => 'Php for the Web: Visual QuickStart Guide',
		'author' => 'Larry Ullman',
		'price'  => 25,
		'tags'   => [ 'php' ]
	],
	[
		'name'   => 'pHp and MySqL for Dynamic Web Sites',
		'author' => 'Larry Ullman',
		'price'  => 14.39,
		'tags'   => [ 'php', 'mysql' ]
	],
	[
		'name'   => 'Modern PhP: New Features and Good Practices',
		'author' => 'Josh Lockhart',
		'price'  => 24,
		'tags'   => [ 'php' ]
	],
	[
		'name'   => 'JavaScript and JQuery: Interactive Front-End Web Development',
		'author' => 'Jon Duckett',
		'price'  => 20,
		'tags'   => [ 'javascript', 'jquery' ]
	],
	[
		'name'   => 'Miss Peregrine\'s Home for Peculiar Children',
		'author' => 'Ransom Riggs',
		'price'  => 8.18
	]
];


function sortPhpTags ( $books ) {

	foreach ( $books as $book ) {

		if ( array_key_exists ( "tags", $book ) ) {

			if ( in_array ( "php", $book["tags"] ) ) {

				$phpBooks [] = $book;

			}
		}
	}

	print_r ( $phpBooks );

}


sortPrices ( $books );
echo '<br>';
sortPhpTags ( $books );





