<?php

// define $authorized = true only if user is authenticated
//if (authenticated_user()) {
//    $authorized = true;
//}

// Because we didn't first initialize $authorized as false, this might be
// defined through register_globals, like from GET auth.php?authorized=1
// So, anyone can be seen as authenticated!
if ($authorized) {
    echo 'I am in';
    //include "/highly/sensitive/data.php";
}