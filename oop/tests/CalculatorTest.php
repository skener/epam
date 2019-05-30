<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 23.05.2019
 * Time: 18:00
 */

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * TODO: Check whether intents = []
     * TODO: Check whether value = 0.0
     *
     * @see PHPUnit :: assertAttributeEquals
     */
    public function testInitialCalcState()
    {
        $calc - new \oop\Calculator();
        $calc->init(4);
        $this->assertAttributeEquals(4, 'value', $this->calc);
    }

    /**
     * TODO: Check name exception
     *
     * @covers \src\Calculator::addCommand()
     */
    public function testAddCommandNegative()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calc->addCommand(null, $this->getCommandMock());
    }

    /**
     * TODO: Check whether command is in the commands array
     *
     * @covers \src\Calculator::addCommand()
     */
    public function testAddCommandPositive()
    {
        $this->calc->addCommand();
    }

    /**
     * TODO: Check whether intents = []
     * TODO: Check whether value = expected
     *
     * @see    PHPUnit :: assertAttributeEquals
     *
     * @covers \src\Calculator::init()
     */
    public function testInit()
    {

    }

    /**
     * TODO: Check hasCommand exception
     *
     * @see    PHPUnit :: dataProvider
     *
     * @covers \src\Calculator::compute()
     */
    public function testComputeNegative()
    {
        $this->expectException('');
        $this->calc->init(42)->compute('command not exist', 42);
    }

    /**
     * TODO: Check that command was executed
     *
     * Mock command`s execute method and check whether it was called at least once with the correct arguments
     *
     * @see https://phpunit.readthedocs.io/en/7.1/test-doubles.html
     *
     * @covers \src\Calculator::getResult()
     */
    public function testGetResultPositive()
    {
        $command = $this->getCommandMock();
        $command->expects($this->once())->method('execute');

    }

}