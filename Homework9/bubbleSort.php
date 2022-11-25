<?php

//$arr = range(0, 100);
//shuffle($arr);

//print_r($arr);

function bubbleSort($array){
    $x=0;
    for($i=0; $i<count($array); $i++){
        $count = count($array);
        for($j=$i+1; $j<$count; $j++){
            if($array[$i]>$array[$j]){
                $temp = $array[$j];
                $array[$j] = $array[$i];
                $array[$i] = $temp;
            }
            $x+=1;
        }
    }
    echo "Сортировка пузырьком:" . PHP_EOL ."Количество итераций: $x" . PHP_EOL;
    return $array;
}

//print_r(bubbleSort($arr));
//echo ("Количество проходов $x\n");
