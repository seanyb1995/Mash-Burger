<?php

// Register Custom Post Type

if(!function_exists('mb_custom_burger_ingredients_post_type')){
	function mb_custom_burger_ingredients_post_type() {

	$labels = array(
		'name'                  => _x( 'ingredients', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'ingredient', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'ingredient', 'text_domain' ),
		'name_admin_bar'        => __( 'ingredient', 'text_domain' ),
		'archives'              => __( 'ingredient Archives', 'text_domain' ),
		'attributes'            => __( 'ingredient Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent ingredient:', 'text_domain' ),
		'all_items'             => __( 'All ingredients', 'text_domain' ),
		'add_new_item'          => __( 'Add New ingredient', 'text_domain' ),
		'add_new'               => __( 'Add New ingredient Item', 'text_domain' ),
		'new_item'              => __( 'New ingredient Item', 'text_domain' ),
		'edit_item'             => __( 'Edit ingredient', 'text_domain' ),
		'update_item'           => __( 'Update ingredient', 'text_domain' ),
		'view_item'             => __( 'View ingredient', 'text_domain' ),
		'view_items'            => __( 'View ingredients', 'text_domain' ),
		'search_items'          => __( 'Search ingredients', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into ingredient', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ingredient', 'text_domain' ),
		'items_list'            => __( 'ingredient list', 'text_domain' ),
		'items_list_navigation' => __( 'ingredients list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter ingredient list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'ingredient', 'text_domain' ),
		'description'           => __( 'Content for each ingredient Item', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ingredient', $args );

	}
}

?>