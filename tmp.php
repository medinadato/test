<?php

$link = mysql_connect('127.0.0.1', 'root', '08800');

//retrieve existing r_id
$sql_res = "SELECT res_id FROM test.result ORDER BY res_id DESC LIMIT 1";
$query_res = mysql_query($sql_res) or die("MySQL Error: " . mysql_error());
$data_res = mysql_fetch_assoc($query_res);
$resid_count = $data_res['res_id']+1;
echo "<br>Result: " . $resid_count;

// insert result to table
$sql_result = "INSERT INTO result (res_id, r_score, s_id, i_id) VALUES (null, '" . $correct . "',  '" . $id . "',  '" . $ins_id . "')";

// insert result to table
$sql_result = "INSERT INTO test.result (res_id, r_score, s_id, i_id) VALUES (null, '1',  '1',  '1')";
mysql_query($sql_result) or die ("Error: " . mysql_error());