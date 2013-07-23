<?php

var_dump(exec('pwd'));
//var_dump(exec('mysql -uroot -p08800 blah < /tmp/mycell_system.bkp.sql'));
var_dump(exec('mysqldump -uroot -p08800 mycell_system | mysql  -uroot -p08800 blah'));
//mysqldump -u{$userSysDB} -p{$passwordSysDB} {$sourceDB} | mysql -u{$userSysDB} -p{$passwordSysDB} {$dbname}