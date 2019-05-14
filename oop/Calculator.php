<?php

namespace oop;

class Calculator

{
    public $firstVal = 0;
    public $secondVal = 0;
    public $commands = [];
    public $result = null;
    public $numArgs;

    public function addCommand(string $sign, $commandObject)
    {
        $this->commands[$sign] = $commandObject;


    }

    public function init(int $firstVal = null)
    {
        return $this->firstVal = $firstVal;
    }

    public function compute(string $operation = null, int $secondVal = null)
    {

        if ( ! is_string($operation) || empty($operation) || ! is_int($secondVal) || empty($secondVal)) {
            throw new \Exception('Operation value must be a string & not empty, second value must be an integer
             & not empty');
        }

        $this->numArgs=func_get_args(0);

        foreach ($this->commands as $sign => $commandObject) {
            if ($operation == $sign) {
                switch ($operation) {
                    case '+':
                        $this->result = $this->firstVal + $secondVal;
                        break;
                    case '-':
                        $this->result = $this->firstVal - $secondVal;
                        break;
                    case '*':
                        $this->result = $this->firstVal * $secondVal;
                        break;
                    case '/':
                        $this->result = $this->firstVal / $secondVal;
                        break;
                    case 'pow':
                        $this->result = pow($this->firstVal, $secondVal);
                        break;
                    default:
                        'Nothing to compute, check input values';
                        break;

                }
            }

        }
    }

    public function getResult()
    {
        return $this->result;
    }

}

