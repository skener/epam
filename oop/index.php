<?php

namespace oop;

require './vendor/autoload.php';

use oop\Calculator;
use oop\SumCommand;
use oop\SubCommand;

$calc = new Calculator();
$calc->addCommand('+', new SumCommand());
$calc->addCommand('-', new SubCommand());
$calc->addCommand('pow', new PowCommand());
$calc->addCommand('*', new MultiCommand());
$calc->addCommand('/', new DivisionCommand());
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        padding: 5px;
    }
</style>
<table>
    <thead>
    <row>
        <th>First Value</th>
        <th>Operation</th>
        <th>Second Value</th>
        <th>Result</th>
    </row>
    </thead>
    <tbody>
    <row>
        <td><?php echo $calc->init(3);
            $calc->compute('pow', 3);
        ?>
        </td>
        <td> <?php echo $calc->numArgs[0]; ?></td>
        <td><?php echo $calc->numArgs[1]; ?> </td>
        <td><?php echo $calc->getResult(); ?></td>
    </row>
    </tbody>

</table>

