<?php
/*	$test = $_GET['name'];
	echo $test;
	var_dump($test);
*/
#	echo $_GET['name1'];
	foreach($_GET as $key => $value) {
		echo $key.':'.$value.'<br>';
	}

?>