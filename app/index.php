<?php
// load bootstrap
require __DIR__ . '/bootstrap.php';

// load mgrid example
$test_grid = new \Demo\Grid\Test;
?>

<html>
    <head>
        <title>Mgrid Example</title>
        <style>
            body { font-family: 'PT Sans', sans-serif, "Trebuchet MS"; }
        </style>
    </head>
    <body>
<?php
/**
 * don't forget to create a symlink 
 *      ln -s /var/www/mgrid /var/www/test/app/vendor/mdn/
 *      ln -s /usr/share/nginx/www/mgrid /usr/share/nginx/www/test/app/vendor/mdn/
 *  
 * also has to create one for the assets 
 *      ln -s /var/www/test/app/vendor/mdn/mgrid/lib/Mgrid/templates/default/assets /var/www/test/app/
 *      ln -s /usr/share/nginx/www/test/app/vendor/mdn/mgrid/lib/Mgrid/templates/default/assets /usr/share/nginx/www/test/app/
 */

// show the grid
echo $test_grid->render();
?> 
        
    </body>
</html>

        