<?php

function linearDelete($myArray, $num) {

    $arrCount = count($myArray);

    for ($i = 0; $i < $arrCount; $i++) {

//        echo "Проверяется число с индексом: $i".PHP_EOL;

        if($myArray[$i] == $num) {
            $count = 0;
            do {
                unset($myArray[$i]);
                $i++;
                $count++;
            } while ($myArray[$i] == $num);
            echo "УДАЛЕНО $count ЭЛЕМЕНТОВ! ВЫПОЛНЕНО $i ИТЕРАЦИЙ!".PHP_EOL;
            return $i;
        }

        elseif ($myArray[$i] > $num) {
            echo "ЗАДАННОЕ ЧИСЛО НЕ НАЙДЕНО! ВЫПОЛНЕНО $i ИТЕРАЦИЙ!".PHP_EOL;
            return null;
        }
    }
}