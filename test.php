<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 13.04.2019
 * Time: 2:36
 */

$ar = ['first', 'second', 'third'];
$ar2 = ['fi', 'sec', 'thir'];

foreach (array_merge($ar,$ar2) as $value) {
    echo "<li>   $value</li>";
}

list($first, $second, $third) = $ar;
echo $first . '<br>';
echo $second . '<br>';
echo $third . '<br>';


class Test {
    public function __construct()
    {
        echo 'constract!';
    }

    public function __destruct()
    {
        echo 'destruct';
    }
}

$test=new Test();