(function($) {$(document).ready(function(){		get_all();		$('.add_row').click(function(){			$('#insert_form').fadeIn();		});		$('.add_changed').click(function(){			$('#add_coll').fadeIn();		});		$('.dell').click(function(){			var ID = $(this).append().text();			alert(ID);		});		$(".close").click(function(){			$(this).parent().parent().fadeOut();		});	});})(jQuery);function add_load(){	jQuery('.translate_table').append('<div class="load"></div>');	jQuery('.load').css({'height':jQuery('.translate_table').height()})}/** * Get all row */function get_all() { //Ajax	var msg = jQuery("#form").serialize();	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/get_table.php',		data: msg,		beforeSend: function( xhr){			add_load();		},		success: function(data) {			jQuery(".translate_table").html(data);		},		error:  function(xhr, str){			alert("Error!");		}	});}/** * Update data in row */function update() { //Ajax	var msg = jQuery("#update_form").serialize();	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/update_row.php',		data: msg,		beforeSend: function( xhr){			add_load();		},		success: function(data) {			//alert('Update successful');			//jQuery('#debug').html(data);			jQuery('#update_form').fadeOut();			get_all();		},		error:  function(xhr, str){			alert("Error!");		}	});}/** * Set new row */function set_row() { //Ajax	var msg = jQuery("#insert_form").serialize();	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/set_row.php',		data: msg,		beforeSend: function( xhr){			add_load();		},		success: function(data) {			//jQuery('#debug').html(data);			//alert('Add successful');			jQuery('#insert_form').fadeOut();			get_all();		},		error:  function(xhr, str){			alert("Error!");		}	});}/** * Set new column */function set_col(){ //Ajax	var msg = jQuery("#add_coll").serialize();	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/set_coll.php',		data: msg,		beforeSend: function( xhr){			add_load();		},		success: function(data) {			jQuery('#add_coll').fadeOut();			get_all();		},		error:  function(xhr, str){			alert("Error!");		}	});}/** * Get row to add ore change th data * @param id - id of row */function get_row(id){ //Ajax	var msg = {ID:id};	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/get_row.php',		data: msg,		success: function(data) {			//jQuery('#debug').html(data);			//alert('Add successful');			jQuery('#update_form').html(data).fadeIn();		},		error:  function(xhr, str){			alert("Error!");		}	});}/** * delete row from DB * @param id - id of row */function del_row(id){ //Ajax	var msg = {ID:id};	jQuery.ajax({		type: "POST",		url: '/wp-content/plugins/wp-static-translate/inc/del_row.php',		data: msg,		beforeSend: function( xhr){			add_load();		},		success: function(data) {			//jQuery('#debug').html(data);			//alert('Add successful');			 get_all();		},		error:  function(xhr, str){			alert("Error!");		}	});}