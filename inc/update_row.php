<?php/** * action to update of data in row */if(isset($_POST) && $_POST!=NULL){	require realpath(__DIR__) . "/db_manager.php";	$t_name="static_translate";	$t_ID=$_POST['ID'];	$data='';	$i = 0;	foreach($_POST as $key => $value){		$data .='`'.$key.'` = "'.$value.'"';		if($i != count($_POST)-1){			$data .=',';		}			$i++;	}	update_row($t_name,$t_ID,$data);}