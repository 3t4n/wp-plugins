<?php
function SeverAnalitycsConvert($size){
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}

echo 'Memoria usada: '. SeverAnalitycsConvert(memory_get_usage(true));
