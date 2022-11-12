<?php

function binaryDelete($myArray, $num)
{
    $start = 0;
    $end = count($myArray) - 1;
    $n = 0;

    while (($start <= $end) && ($num >= $myArray[$start]) && ($num <= $myArray[$end])) {
        $n++;

        $base = floor(($start + $end) / 2);

        if ($myArray[$base] == $num) {
            $del = 1;
            unset($myArray[$base]);
            $i = $base+1;
            while ($myArray[$i] == $num) {
                unset($myArray[$i]);
                $i++;
                $del++;
            }
            $j=$base-1;
            while ($myArray[$j] == $num) {
                unset($myArray[$j]);
                $j--;
                $del++;
            }
            echo "УДАЛЕНО $del ЭЛЕМЕНТОВ! ВЫПОЛНЕНО $n ИТЕРАЦИЙ!".PHP_EOL;
            return $base;
        } elseif ($myArray[$base] < $num) {
            $start = $base + 1;
        } else {
            $end = $base - 1;
        }
    }
    echo "ЗАДАННОЕ ЧИСЛО НЕ НАЙДЕНО! ВЫПОЛНЕНО $n ИТЕРАЦИЙ!".PHP_EOL;
    return null;
}