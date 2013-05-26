<?php

// expression with bitwise (=2)
echo 10 & (5 + 2);
echo " \n";

// expression with precedence (=2)
$a = 1;
$a = $a-- +1;
echo $a;
echo " \n";

// execution operator
echo "<h2>Access log</h2>";
echo "<pre>";
echo `tail /var/log/apache2/access_log `;
echo "</pre>";

echo "<h2>Error log</h2>";
echo "<pre>";
echo `tail /var/log/apache2/error_log `;
echo "\n";
echo "</pre>";

//echo `ls -la /tmp`;
echo "<h2>PS Aux</h2>";
echo "<pre>";
$ps = `ps aux`;
echo $ps;
echo "</pre>";

// break lines
echo " \n";
echo " \n";