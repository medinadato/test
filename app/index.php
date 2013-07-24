<?php
// load bootstrap
require __DIR__ . '/bootstrap.php';

// load mgrid example
$test_grid = new \Demo\Grid\Test;
?>

<html>
    <head>
        <title>Mgrid Example</title>
    </head>
    <body>
<?php
// don't forget to create a symlink ln -s /usr/share/nginx/www/mgrid /usr/share/nginx/www/test/app/vendor/mdn/
// 
// show the grid
echo $test_grid->render();
?> 
        
    </body>
</html>

        