<?php
/*
 * Plugin Name: About
 * Plugin URI:
 * Description: A simple plugin that creates an about input at the back and displays it at the front
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
$about_plugin_root = plugin_dir_path(__FILE__);
$about_plugin_root_url = plugin_dir_url(__FILE__);


/* --------------------------------------------------------------------------------
* 1. Add menu item
* This function adds our plugin to the WP admin menu
*/
if(!function_exists('about_info_site')){
    function about_info_site(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page( $page_title, $menu_item, $capability, $menu_slug, $function )
        */
        add_menu_page(
            'About', //page title
            'About Page', // menu title
            'manage_options', //capabilities
            'aboutinfo', //menu slug
            'about_info_options_page', //function
            'dashicons-info' //icon
        );
    }
    // add_action hook - this hooks our functio into WordPress
    add_action( 'admin_menu', 'about_info_site');
}


/* 
 * 2. Admin settings page - display
 * funciton that controls how our admin page looks
*/
if( !function_exists('about_info_options_page') ) {
    function about_info_options_page(){
        
        if( !current_user_can( 'manage_options' ) ) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        
        // make our PLUGINROOT constantly avaliable within
        // the options-page-wrapper.php so we can use it
        // for image paths etc.
        global $about_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $about_plugin_root . 'inc/about-options-page-wrapper.php' );
    }
}


/*
 * 3. Admin settings page - save data
 * functions that saves our plugin settings (from inc/options-page-wrapper.php)
 * to the wordoress database inside the wo_options table
*/
if( !function_exists('about_info_update_settings') ) {
    function about_info_update_settings() {
        /* register each field
         * from our inc/options-page-wrapper.php page
        */
        register_setting( 'about_info_fields', 'about_info1_title' );
        register_setting( 'about_info_fields', 'about_info1_information' );
        register_setting( 'about_info_fields', 'about_info2_information' );
        register_setting( 'about_info_fields', 'about_info3_information' );
        register_setting( 'about_info_fields', 'about_info4_information' );
        register_setting( 'about_info_fields', 'about_info5_information' );
        register_setting( 'about_info_fields', 'about_info6_information' );
        
    }
    add_action( 'admin_init', 'about_info_update_settings' );
}


/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our 
 * template tags
*/
require_once( $about_plugin_root . 'inc/template-tags.php' );


/*
 * 5. Template tags - include for themes
 * tell wordpress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. this is achieved via the 
 * wordpress action 'after_setup_theme'
*/
if( !function_exists('about_info_include_template_tags' ) ) {
    function about_info_include_template_tags() {
        global $about_plugin_root;
        include_once( $about_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'about_info_include_template_tags' );
} 

/*
 * 6. Include custom CSS styles
 * Tell WordPress to include custom stylesheets assets/css file name'
 * in our theme so it's included in the document <head>
 */
 if( !function_exists('about_page_full_custom_styles') ) {
     function about_page_full_custom_styles() {
         global $about_plugin_root_url;
         
        //  enqueue each stylesheet */
        wp_enqueue_style( 'about_info_site', $about_plugin_root_url . 'assets/mb-about-page-full.css') ;
     }
     add_action( 'wp_enqueue_scripts', 'about_page_full_custom_styles' );
 }
 








?>