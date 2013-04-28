<?php

$str = "Is your name O'reilly?";

// Outputs: Is your name O\'reilly?
echo addslashes($_REQUEST['var']);

echo '<br />';

// Outputs: Is your name O\'reilly?
echo $_REQUEST['var'];