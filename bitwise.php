<?php

$user_perms = 3; //             |0|0|0|0|0|1|1|1|

$perms = array(
        'can_post' => 1, //     |0|0|0|0|0|1|1|1| 
        'can_comment' => 2, //  |0|0|0|0|0|0|1|0|
        'can_edit' => 4, //     |0|0|0|0|0|1|0|0|
        'can_delete' => 8,
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