<?php

$user_perms = 7; //             |0|0|0|0|0|1|1|1|

$perms = array(
        'can_post' => 1,	//  |0|0|0|0|0|1|1|1| 
        'can_comment' => 2, //  |0|0|0|0|0|0|1|0|
        'can_edit' => 4,	//  |0|0|0|0|0|1|0|0|
        'can_delete' => 8,  //  |0|0|0|0|1|0|0|0|
);


//$user_perms = $perms['can_post'] | $perms['can_comment'] | $perms['can_edit'];


//var_dump($user_perms);

if ($user_perms & $perms['can_post']) {
        echo 'He/She can post <br />';
}

if ($user_perms & $perms['can_comment']) {
        echo 'He/She can comment <br />';
}

if ($user_perms & $perms['can_edit']) {
        echo 'He/She can edit  <br />';
}

if ($user_perms & $perms['can_delete']) {
        echo 'He/She can delete  <br />';
}

// or
if ($user_perms | $perms['can_delete']) {
        echo 'He/She can delete  <br />';
}

// xor exclusive
if ($user_perms ^ $perms['can_delete']) {
        echo 'He/She can delete  <br />';
}

// I need to check about precedence
if ($user_perms & 1 | 2 & 4) {
	echo 'ouuu  <br />';
}

// not or unary operator
if ($user_perms & ~7) {
	echo 'unary  <br />';
}

// not or unary operator
	if ((5 & 3) & 1) {
	echo 'unary 2 <br />';
}

echo 5 << 1; // each step means "multiply by two" ( = 10 )
echo '<br />';
echo 8 >> 1; // each step means "divided by two" ( = 4 )
echo '<br />';
echo 5 << 2; // each step means "multiply by two" ( = 20 )