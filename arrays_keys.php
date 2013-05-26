<?php
$b = 'vv';
$a = <<<'EOT'
testing
if works {$b}
EOT;

echo "<pre>\n\n";

var_dump($a);

echo "\n\n";


$array = array(
    1 => 99,
    'test' => 1,
    '85' => 'renato',
    101 => 'clare',
    
);

krsort($array, SORT_REGULAR);

var_dump($array);

echo "\n\n";

// ksort
// krsort
// sort
// rsort
// asort
// arsort
// array_rand

// array_merge
// array_merge_recursive

// array_intersect
// array_intersec_assoc
// array_diff
// array_diff_assoc

$array = array(
    array('Jack', 'John', 'Marco', 'Daniel'),
    array(21, 29, 23, 44),
);

// quero que ordene o segundo arg no criterio do primeiro (sendo q orderno o primeiro baseado em SORT_REGULAR)
array_multisort($array[0], SORT_ASC,  $array[1]);

var_dump($array);

    
echo "\n\n";

shuffle($array[0]);
var_dump($array[0]);

echo "\n\n";

$a = array('a' => 220, 36, 40, 1.6 => 'renato');
$saved = serialize($a);
var_dump($saved);

echo "\n\n";

$restored = unserialize($saved);

var_dump($restored);

echo "\n\n";

