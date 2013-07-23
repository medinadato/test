<?php
// load bootstrap
require __DIR__ . '/bootstrap.php';

// load mgrid example
$test_grid = new \Demo\Grid\Test;
?>

<html>
    <head>Mgrid Example</head>
    <body>

<?php
// show the grid
$test_grid->render();
?> 
        
    </body>
</html>

        