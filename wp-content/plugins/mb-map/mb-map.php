<?php
/*
 * Plugin Name: Map
 * Plugin URI:
 * Description: A simple plugin that creates a brief about input at the back and displays it at the front
 * Version: 1.0
 * Author: Jean
 * Author URI:
 * License: GPL2
*/


/*
 * create $plugin_root variable
 * This saves us writing out plugin_dir_path(__FILE__) each time
 * We also create a $qe_plugin_root_url , which is similar, but insteead of 
 * outputting the PHP file path, it outputs the URL path chich is required for 
 * only scripts or stylesheets we include in the head
*/
$map_plugin_root = plugin_dir_path(__FILE__);
$map_plugin_root_url = plugin_dir_url(__FILE__);


/* --------------------------------------------------------------------------------
* 1. Add menu item
* This function adds our plugin to the WP admin menu
*/
if(!function_exists('map')){
    function map(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page( $page_title, $menu_item, $capability, $menu_slug, $function )
        */
        add_menu_page(
            'Map', //page title
            'Map Home', // menu title
            'manage_options', //capabilities
            'map', //menu slug
            'map_page', //function
            'dashicons-admin-site' //icon
        );
    }
    // add_action hook - this hooks our functio into WordPress
    add_action( 'admin_menu', 'map');
}


/* 
 * 2. Admin settings page - display
 * funciton that controls how our admin page looks
*/
if( !function_exists('map_page') ) {
    function map_page(){
        
        if( !current_user_can( 'manage_options' ) ) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        
        // make our PLUGINROOT constantly avaliable within
        // the options-page-wrapper.php so we can use it
        // for image paths etc.
        global $map_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $map_plugin_root . 'inc/map-options-page-wrapper.php' );
    }
}


/*
 * 3. Admin settings page - save data
 * functions that saves our plugin settings (from inc/options-page-wrapper.php)
 * to the wordoress database inside the wo_options table
*/
if( !function_exists('map_update_settings') ) {
    function map_update_settings() {
        /* register each field
         * from our inc/map-options-page-wrapper.php page
        */
        register_setting( 'map_fields', 'map_information' );
    }
    add_action( 'admin_init', 'map_update_settings' );
}


/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our 
 * template tags
*/
require_once( $map_plugin_root . 'inc/template-tags.php' );


/*
 * 5. Template tags - include for themes
 * tell wordpress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. this is achieved via the 
 * wordpress action 'after_setup_theme'
*/
if( !function_exists('map_include_template_tags' ) ) {
    function map_include_template_tags() {
        global $map_plugin_root;
        include_once( $map_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'map_include_template_tags' );
} 


?>