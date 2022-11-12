<?php
include 'myArray.php';
include 'linearDelete.php';
include 'binaryDelete.php';
include 'interpolationDelete.php';

$arr = createArray(10000);
sort($arr);

$num = 5555;

$start = microtime(true);
echo "Линейный поиск и удаление".PHP_EOL;
linearDelete($arr, $num).PHP_EOL;
echo "Время выполнения: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
echo "Бинарный поиск и удаление".PHP_EOL;
binaryDelete($arr, $num).PHP_EOL;
echo "Время выполнения: ".( microtime(true) - $start).PHP_EOL;

$start = microtime(true);
echo "Интерполяционный поиск и удаление".PHP_EOL;
interpolationDelete($arr, $num);
echo "Время выполнения: ".( microtime(true) - $start).PHP_EOL;