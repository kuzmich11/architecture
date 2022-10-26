<?php

// Создаем новый объект DirectoryIterator
$dir = new DirectoryIterator("D:\\");
// Цикл по содержанию директории
foreach ($dir as $item) {
    echo $item . "\n";
}
