<?php


function checkHighYear($year)
{
    if (is_string($year) || empty($year) || $year === null) {

        throw new InvalidArgumentException('Arg must be numeric integer & not empty');

    } else {
        return (($year % 400 == 0) || ($year % 4 == 0 && $year % 100 != 0)) ? 'Це високосний рік!' : 'Це звичайний рік!';
    }
}
