<?php

class SquareAreaLib
{
    public function getSquareArea($diagonal)
    {
        $area = ($diagonal**2)/2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea($diagonal)
    {
        $area = (M_PI * $diagonal**2)/4;
return $area;
}
}

interface ISquare
{
    function squareArea($sideSquare);
}
interface ICircle
{
    function circleArea($circumference);
}

class SquareAreaLibAdapter implements ISquare {

    public function __construct (
        private SquareAreaLib $squareAreaLib
    ){}

    public function squareArea($sideSquare): float|int
    {
        $diagonal = sqrt(2*($sideSquare**2));
        return $this->squareAreaLib->getSquareArea($diagonal);
    }
}

class CircleAreaLibAdapter implements ICircle
{
    public function __construct (
        private CircleAreaLib $circleAreaLib
    ){}

    function circleArea($circumference): float|int
    {
        $diagonal = $circumference/M_PI;
        return $this->circleAreaLib->getCircleArea($diagonal);
    }
}

// Проверка
$resultSquareArea = new SquareAreaLibAdapter(new SquareAreaLib());
echo $resultSquareArea->squareArea(5);

echo "\n";

$resultCircleArea = new CircleAreaLibAdapter(new CircleAreaLib());
echo $resultCircleArea->circleArea(2*sqrt(M_PI));

