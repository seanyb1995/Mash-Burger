<?php
/*
 * Plugin Name: Home Banner
 * Plugin URI:
 * Description: A simple plugin that creates a banner image and nav input at the back and displays it at the front
 * Version: 1.0
 * Author: Jeffrey Chong
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
$banner_plugin_root = plugin_dir_path(__FILE__);
$banner_plugin_root_url = plugin_dir_url(__FILE__);


/* --------------------------------------------------------------------------------
* 1. Add menu item
* This function adds our plugin to the WP admin menu
*/
if(!function_exists('home_banner_menu')){
    function home_banner_menu(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page( $page_title, $menu_item, $capability, $menu_slug, $function )
        */
        add_menu_page(
            'Home Banner', //page title
            'Home Banner Page', // menu title
            'manage_options', //capabilities
            'homebanner', //menu slug
            'home_banner_options_page', //function
            'dashicons-warning' //icon
        );
    }
    // add_action hook - this hooks our functio into WordPress
    add_action( 'admin_menu', 'home_banner_menu');
}


/* 
 * 2. Admin settings page - display
 * funciton that controls how our admin page looks
*/
if( !function_exists('home_banner_options_page') ) {
    function home_banner_options_page(){
        
        if( !current_user_can( 'manage_options' ) ) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        
        // make our PLUGINROOT constantly avaliable within
        // the options-page-wrapper.php so we can use it
        // for image paths etc.
        global $banner_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $banner_plugin_root . 'inc/home-banner-options-page-wrapper.php' );
    }
}


/*
 * 3. Admin settings page - save data
 * functions that saves our plugin settings (from inc/options-page-wrapper.php)
 * to the wordoress database inside the wo_options table
*/
if( !function_exists('home_banner_update_settings') ) {
    function home_banner_update_settings() {
        /* register each field
         * from our inc/options-page-wrapper.php page
        */
        register_setting( 'banner_fields', 'banner_title' );
        register_setting( 'banner_fields', 'banner_information' );
    }
    add_action( 'admin_init', 'home_banner_update_settings' );
}


/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our 
 * template tags
*/
require_once( $banner_plugin_root . 'inc/template-tags.php' );


/*
 * 5. Template tags - include for themes
 * tell wordpress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. this is achieved via the 
 * wordpress action 'after_setup_theme'
*/
if( !function_exists('home_banner_include_template_tags' ) ) {
    function home_banner_include_template_tags() {
        global $banner_plugin_root;
        include_once( $banner_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'home_banner_include_template_tags' );
} 











?>