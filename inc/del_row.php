<?php
if(isset($_POST) && $_POST!=NULL) {
	require realpath( __DIR__ ) . "/db_manager.php";

	$t_name = "static_translate";
	$t_ID = $_POST['ID'];

	var_dump($_POST);
	//del_row($t_name,$t_ID);
}