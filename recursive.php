<?php

ini_set('display_errors', 1);

$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '08800');

$stmt = $db->query("SELECT * FROM bloh");

$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
//var_export($resultSet);


$setMenu = function ($data, $index = 0) use (&$setMenu) {

			$menu = array();

			foreach ($data as $row) {
				if ((int) $row['menu_parent_id'] !== $index)
					continue;

				$menu[$row['menu_id']] = array(
					'name' => $row['menu_name'],
					'link' => $row['menu_link'],
					'submenus' => $setMenu($data, (int) $row['menu_id']),
				);
			}

			return $menu;
		};

//$menu = array();
//
//foreach($resultSet as $key => $row) {
//	$menu[$row['menu_parent_id']][] = $row;
//}

echo "\n\n\n\n";

$menu = $setMenu($resultSet, 0);

var_export($menu);