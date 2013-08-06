<?php
// load bootstrap
require __DIR__ . '/bootstrap.php';
//echo "<pre>";
// load mgrid example
$test_grid = new \Demo\Grid\Test;

//unset($_SESSION);
//echo "SESSION:
//    ";
//var_export($_SESSION);        
//echo "</pre>";
//session_destroy();
?>

<html>
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
        <title>Mgrid Example</title>
        <style>
            body { font-family: 'PT Sans', sans-serif, "Trebuchet MS"; }
        </style>
    </head>
    <body>
<?php
/**
 * 
 * 
 * Symlink for Ubuntu
 *  rm -rf /usr/share/nginx/www/test/app/vendor/mdn/mgrid
 *  ln -s /usr/share/nginx/www/mgrid /usr/share/nginx/www/test/app/vendor/mdn/
 *  rm -rf /usr/share/nginx/www/test/app/assets
 *  ln -s /usr/share/nginx/www/test/app/vendor/mdn/mgrid/lib/Mgrid/templates/default/assets /usr/share/nginx/www/test/app/
 *  
 * Symlink for IMac
 *  ln -s /var/www/mgrid /var/www/test/app/vendor/mdn/
 *  rm -rf /var/www/test/app/vendor/mdn/mgrid
 *  ln -s /var/www/test/app/vendor/mdn/mgrid/lib/Mgrid/templates/default/assets /var/www/test/app/
 *  rm -rf /var/www/test/app/assets
 */

// show the grid
echo $test_grid->render();
?> 
        
    </body>
</html>

        