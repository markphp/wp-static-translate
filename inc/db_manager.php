<?php/** * This the main file to do request in $wpdb */require ($_SERVER[DOCUMENT_ROOT].'/wp-load.php');/** * Create new table in DB when activated * @param $t_name - name of table */function create_table ($t_name){	global $wpdb; 	global $static_db_version;    $table_name = $wpdb->prefix . $t_name;    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){    	$sql = "CREATE TABLE " . $table_name . " (    	  	ID mediumint(9) NOT NULL AUTO_INCREMENT,    	  	Search_rule tinytext NOT NULL,    	    UNIQUE KEY id (id)    	    )    	    CHARACTER SET utf8 COLLATE utf8_unicode_ci;    	";    	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');    	dbDelta($sql);    	add_option("static_db_versio", $static_db_version);    }}/** * Created new column * @param $t_name - name of table * @param $name - name of column */function add_new_column($t_name,$name){	global $wpdb;	$table_name = $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){    	$wpdb->query("ALTER TABLE " . $table_name . " ADD COLUMN ".$name. " tinytext");    }    }/** * Get all row from table * @param $t_name - name of table * @return mixed - result all row table */function get_all($t_name){	global $wpdb;	$table_name = $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		$query = "SELECT * FROM " . $table_name . ' ORDER BY ID ASC';    	return $wpdb->get_results($query);    }}/** * Get row from table * @param $t_name -name of table * @param $r_ID - id of row * @return mixed - result one row from table where id like... */function get_row($t_name,$r_ID){	global $wpdb;	$table_name = $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		$query = "SELECT * FROM " . $table_name . " WHERE id =".$r_ID;		return $wpdb->get_results($query);	}}/** * Get table colum name function * @param $t_name * @return array */function get_colums_name($t_name){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		return ($wpdb->get_col("DESC " . $table_name, 0));	}}/** * Update data in row * @param $t_name - name of table * @param $r_ID - id of row * @param $data - update data */function update_row($t_name,$r_ID,$data){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		$query ="UPDATE  $table_name SET $data WHERE id = $r_ID";		$wpdb->query($query);	}}/** * Add new row * @param $t_name - table name * @param $value - new data */function add_row($t_name,$value){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		$wpdb->insert($table_name,array(			'Search_rule'=> $value[0]		));	}}/** * Delete row from table * @param $t_name - table name * @param $r_ID - row id */function del_row($t_name,$r_ID){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name){		$wpdb->query("DELETE FROM $table_name WHERE `ID` = '$r_ID'");	}}/** * Delete column from table * @param $t_name * @param $c_name */function del_col($t_name,$c_name){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {		$wpdb->query("ALTER TABLE " . $table_name . " DROP ".$c_name);	}}function search_by($t_name,$search){	global $wpdb;	$table_name= $wpdb->prefix . $t_name;	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {		if($search !='') {			$query = "SELECT * FROM " . $table_name . ' WHERE Search_rule LIKE \''.'%' . $search . '%\'';		}else{			$query = "SELECT * FROM " . $table_name;		}		return $wpdb->get_results($query);	}}