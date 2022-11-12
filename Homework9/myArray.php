<?php

function createArray (int $count): array
{
    $arr=[];
    for ($i=0; $i<$count; $i++) {
        $arr[]=rand(0,$count);
    }
    return $arr;
}