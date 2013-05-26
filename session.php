<?php
//session_start();
//setcookie('bla','Renato Silva Medina', time() + 10, '/', 'http://localhost/', false, true);


//echo "<pre>";
//var_dump(session_save_path());
//
//if(isset($_COOKIE['bleh'])) {
//    echo $_COOKIE['bleh'], "\n";
//    echo $_COOKIE['bloh'], "\n";
//    
////    echo $_COOKIE['bluh'];
//} else {
//    echo 'created', ' ', 'again';
//    setcookie('bleh','Renato Silva Medina', time() + 5, '/test/session.php', null);
//    setcookie('blih','Other one', time() + 5, '/test/session.php', null);
//    setcookie('bloh','Other one more', time() + 5, '/', null, false, true);
//    setcookie('bluh','Other one more 2', time() + 25, '/', null, true);
//}

//session_cache_limiter(5);
//session_cache_expire(5);
////session_destroy();
//echo session_save_path();
//session_set_cookie_params(5);
//
//echo "<pre>";
//$coockie = session_get_cookie_params();
//var_export($coockie);
//
//echo "\n";
//$_SESSION['a'] = 1;
////$_SESSION['b'] = 10;
//
//echo $_SESSION['a'];




function sess_open($sess_path, $sess_name) {
    print "Session opened.\n";
    print "Sess_path: $sess_path\n";
    print "Sess_name: $sess_name\n\n";
    return true;
}

function sess_close() {
    print "Session closed.\n";
    return true;
}

function sess_read($sess_id) {
    print "Session read.\n";
    print "Sess_ID: $sess_id\n";
    return '';
}

function sess_write($sess_id, $data) {
    print "Session value written.\n";
    print "Sess_ID: $sess_id\n";
    print "Data: $data\n\n";
    return true;
}

function sess_destroy($sess_id) {
    print "Session destroy called.\n";
    return true;
}

function sess_gc($sess_maxlifetime) {
    print "Session garbage collection called.\n";
    print "Sess_maxlifetime: $sess_maxlifetime\n";
    return true;
}

session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");
session_start();
echo "<pre>";
$_SESSION['foo'] = "bar";
print "Some text\n";
$_SESSION['baz'] = "wombat";
$_SESSION['eu'] = 152.36;
echo "\n";
echo "\n";

//session_unset();