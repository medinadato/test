<?php

$array = array(
    10,
    'a' => 20,
    'eu',
    30,
);
echo "<pre>";

//asort($array);
var_dump($array);

$a = array();

list($a, $b) = $array;
//list($a[0], $a[1], $a[2], $a[3]) = $array;

var_dump($a);
var_dump($b);

echo "\n\n";

# - - - - - - - - - - - - - - - - - - - - - - - - 
# internal pointer
# - - - - - - - - - - - - - - - - - - - - - - - - 

$array = array(
    10,
    'a' => 20,
    'paraguay' => 30,
);


var_dump(each($array));
var_dump(each($array));
var_dump(each($array));

reset($array);
 
while(list($k, $v) = each($array))
{
    echo $k, ' = ', $v, "\n";
}

echo "\n\n";

# - - - - - - - - - - - - - - - - - - - - - - - - 
# array walk
# - - - - - - - - - - - - - - - - - - - - - - - - 

function printout($v) {
    echo '--', $v, "\n";
}

array_walk($array, 'printout');

echo "\n\n";