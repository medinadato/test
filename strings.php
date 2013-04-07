<?php

echo "Test\n";    
$bar = 'value';

/**
 * Using heredocs
 */

$foo = <<<EU
Testing the \n\ttexting stuff.\n\n
EU;
    
echo $foo;

var_dump(array(<<<EOD
foobar within heredocs {$bar}
EOD
));

var_dump(<<<"DOUBLEQUOTES"
PHP 5.3.0, the opening Heredoc identifier may optionally be enclosed in double quotes
DOUBLEQUOTES
);

/**
 * constant
 */
define('A', 1);
echo '- '  . A . "\n";

/**
 * Using nowdocs
 * @version >=5.3.0
 */
var_dump(<<<'EOD'
foobar! within nowdocs {$bar}
EOD
);