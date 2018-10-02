<?php
/*
 * Plugin Name: Menu List
 * Plugin URI:
 * Description: A simple plugin that creates a contact button
 * Version: 1.0
 * Author: Jeffrey Chong
 * Author URI:
 * License: GPL2
*/


/*
 * create $plugin_root variable
 * This saves us writing out plugin_dir_path(__FILE__) each time
 * We also create a $menu_plugin_root_url , which is similar, but insteead of 
 * outputting the PHP file path, it outputs the URL path chich is required for 
 * only scripts or stylesheets we include in the head
*/
$menu_plugin_root = plugin_dir_path(__FILE__);
$menu_plugin_root_url = plugin_dir_url(__FILE__);


/* --------------------------------------------------------------------------------
* 0. Setup product post type and category taxonomy
*/
require_once( $menu_plugin_root . 'inc/cpt-product.php' );
require_once( $menu_plugin_root . 'inc/tax-category.php' );
add_action('init', 'mb_menu_list_product_post_type');
add_action('init', 'mb_menu_list_category_taxonomy');


/* --------------------------------------------------------------------------------
* 1. Add menu item
* This function adds our plugin to the WP admin menu
*/
if(!function_exists('menu_menu')){
    function menu_menu(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page( $page_title, $menu_item, $capability, $menu_slug, $function )
        */
        add_menu_page(
            'Menu List', //page title
            'Menu List', // menu title
            'manage_options', //capabilities
            'menulist', //menu slug
            'menu_options_page', //function
            'dashicons-carrot' //icon
        );
    }
    // add_action hook - this hooks our functio into WordPress
    add_action( 'admin_menu', 'menu_menu');
}


/* 
 * 2. Admin settings page - display
 * funciton that controls how our admin page looks
*/
if( !function_exists('menu_options_page') ) {
    function menu_options_page(){
        
        if( !current_user_can( 'manage_options' ) ) {
            wp_die('Your do not have sufficient permissions to access this page.');
        }
        
        // make our PLUGINROOT constantly avaliable within
        // the options-page-wrapper.php so we can use it
        // for image paths etc.
        global $menu_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $menu_plugin_root . 'inc/menu-list-options-page-wrapper.php' );
    }
}


/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our 
 * template tags
*/
require_once( $menu_plugin_root . 'inc/template-tags.php' );

/*
 * 5. Template tags - include for themes
 * tell wordpress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. this is achieved via the 
 * wordpress action 'after_setup_theme'
*/
if( !function_exists('menu_include_template_tags' ) ) {
    function menu_include_template_tags() {
        global $menu_plugin_root;
        include_once( $menu_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'menu_include_template_tags' );
} 

?>