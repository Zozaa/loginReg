<?php
	require_once("class.user.php");
	require_once("class.db.php");
	$user = new User(); 
	$term = $_POST['term'];
	echo $user->search($term);
?>
