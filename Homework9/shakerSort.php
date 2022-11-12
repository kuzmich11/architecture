<?php

function shakerSort ($array)
{
    $x=0;
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do {
        for ($i = $left; $i < $right; $i++) {
            if ($array[$i] > $array[$i + 1]) {
//                list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
                $temp = $array[$i];
                $array[$i] = $array[$i+1];
                $array[$i+1] = $temp;
            }
            $x+=1;
        }
        $right -= 1;
        for ($i = $right; $i > $left; $i--) {
            if ($array[$i] < $array[$i - 1]) {
//                list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
                $temp = $array[$i];
                $array[$i] = $array[$i-1];
                $array[$i-1] = $temp;
            }
            $x+=1;
        }
        $left += 1;
    } while ($left <= $right);
    echo "Шейкерная сортировка". PHP_EOL."Количество итераций: $x" . PHP_EOL;
    return $array;
}
