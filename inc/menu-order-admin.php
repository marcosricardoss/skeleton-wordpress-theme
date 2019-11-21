<?php
/**
 * Ordering the administration menu
 * 
 * Reorders the provision of the administrative panel menu
 * 
 */
function custom_menu_order() {
	return array( 
		'index.php',
		'separator1', // First separator
		'edit.php',
		'edit.php?post_type=product', // Custom type "product"
		'upload.php', // Media      	
      	'edit-comments.php', // Comments
      	'edit.php?post_type=page', // Pages      	'      	 
      	'separator2', // Second separator
		
		);
}	
add_filter( 'custom_menu_order', '__return_true' ); #filter
add_filter( 'menu_order', 'custom_menu_order' ); #filter
?>