<?php

/**
 * custom post "product"
 */
function productType() {
	$labels = array(
		'name' => _x('Product', 'post type general name'),
	    'singular_name' => _x('product', 'post type singular name'),
	    'add_new' => _x('Add New', 'slideshow item'),
	    'add_new_item' => __('Add New Product'),
	    'edit_item' => __('Edit Product'),
	    'new_item' => __('New Product'),
	    'view_item' => __('Show Product'),
	    'search_items' => __('Search Product'),
	    'not_found' =>  __('No Products Found'),
	    'not_found_in_trash' => __('No Products in Trash'),
	    'parent_item_colon' => ''
	);

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 4,
        'supports' => array('title','editor','excerpt','thumbnail'),
        'rewrite' => array('slug' => 'product')        
      );

    register_post_type( 'product' , $args ); # registering the new post type
}
add_action('init', 'productType'); # action

?>