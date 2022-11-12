<?php

include 'myArray.php';
include 'bubbleSort.php';
include 'shakerSort.php';
include 'quickSort.php';
include 'treeSort.php';

$arr = createArray(1000);
$lastIndex = count($arr)-1;

$start = microtime(true);
bubbleSort($arr);
echo "Время: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
shakerSort($arr);
echo "Время: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
quickSort($arr,0, $lastIndex,);
echo "Быстрая сортировка:" . PHP_EOL . "Время: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
heapSort($arr);
echo "Пирамидальная сортировка:" . PHP_EOL . "Время: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
sort($arr);
echo "Стандартная сортировка PHP:" . PHP_EOL . "Время: ".( microtime(true) - $start).PHP_EOL;