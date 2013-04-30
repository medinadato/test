<?php
ini_set('display_errors', 1);

$a = 'hello';

$$a = 'world';

# hello - world
echo $a . ' - ' . $hello;


function blah ($string) {
	echo $string;
}

$b = 'blah';

$b('test');