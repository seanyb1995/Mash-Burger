<?php
/*
 * Plugin Name: Vehicle Booking
 * Plugin URI:
 * Description:Creates vehicle post type and allows bookings for each vehicle
 * Version: 1.0
 * Author: Jeffrey Chong
 * Author URI:
 * License: GPL2
*/
/*
 * create $plugin_root variable
 * This saves us writing out plugin_dir_path(__FILE__) each time
 * We also create a $plugin_root_url , which is similar, but insteead of 
 * outputting the PHP file path, it outputs the URL path chich is required for 
 * only scripts or stylesheets we include in the head
*/
$vb_plugin_root = plugin_dir_path(__FILE__);
$plugin_root_url = plugin_dir_url(__FILE__);

/* -------------------------------------------------------------------------------
 * 0. Setup database table for vehicle_bookings
 * This only needs to be executed once, so we add it to the 
*/

if(!function_exists('cu_vehiclebookings_dbsetup')){
    function cu_vehiclebookings_dbsetup(){
        // Create db table 'vehicle_bookings'; using the $wpdb global variable
        global $wpdb;
        
        $table_name = $wpdb->prefix . "cu_vehicle_bookings";
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                vehicle_id MEDIUMINT(9) NOT NULL,
                user_firstname TEXT NOT NULL,
                user_lastname TEXT NOT NULL,
                booking_date DATE NOT NULL,  
                booking_start_time VARCHAR(11)  NOT NULL,
                booking_end_time VARCHAR(11)  NOT NULL,
                user_email VARCHAR(320) NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate; ";
            
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    // run the above dbsa_setup function upon plugin activation
    register_activation_hook(__FILE__, 'cu_vehiclebookings_dbsetup');
}
    

// if(!function_exists('cu_vehiclebookings_dbsetup_user')){
//     function cu_vehiclebookings_dbsetup_user(){
//         // Create db table 'cu_user_user'; using the $wpdb global variable
//         global $wpdb;
//         $table_name = $wpdb->prefix . "cu_user_info";
//         $charset_collate = $wpdb->get_charset_collate();
//         $sql = "CREATE TABLE IF NOT EXISTS $table_name (
//                 id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
//                 user_login VARCHAR(255) NOT NULL,
//                 user_password VARCHAR(255) NOT NULL,
//                 first_name NOT NULL,
//                 last_name NOT NULL,
//                 user_email VARCHAR(320) NOT NULL,
//                 PRIMARY KEY (id)
//             ) $charset_collate; ";
//         require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
//         dbDelta($sql);
//     }
    
//     // run the above dbsa_setup function upon plugin activation
//     register_activation_hook(__FILE__, 'cu_vehiclebookings_dbsetup');
// }



/*---------------------------------------------------------------------------------
 * 0. Setup staff post type and department taxonomy
*/
require_once( $vb_plugin_root . 'inc/cpt-vehicle.php' );
require_once( $vb_plugin_root . 'inc/tax-department.php');
require_once( $vb_plugin_root . 'inc/tax-department-car-type.php');
require_once( $vb_plugin_root . 'inc/tax-department-body.php');
require_once( $vb_plugin_root . 'inc/tax-department-extra-features.php');
add_action('init', 'cu_vehiclebooking_vehicle_post_type');
add_action('init', 'cu_vehiclebooking_pod_taxonomy');
add_action('init', 'cu_vehiclebooking_car_type_taxonomy');
add_action('init', 'cu_vehiclebooking_body_taxonomy');
add_action('init', 'cu_vehiclebooking_extra_features_taxonomy');


/*---------------------------------------------------------------------------------
 * Add custom meta boxes
*/
require_once( $vb_plugin_root . 'inc/cpt-vehicle-metaboxes.php' );


/* --------------------------------------------------------------------------------
* 1. Add menu item
* This function adds our plugin to the WP admin menu
*/
if(!function_exists('cu_vehiclebooking_menu')){
    function cu_vehiclebooking_menu(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page( $page_title, $menu_item, $capability, $menu_slug, $function )
        */
        add_menu_page(
            'Vehicle Booking', //page title
            'Vehicle Booking', // menu title
            'manage_options', //capabilities
            'cuvehiclebooking', //menu slug
            'cu_vehiclebooking_options_page', //function
            'dashicons-calendar-alt' //icon
        );
    }
    // add_action hook - this hooks our functio into WordPress
    add_action( 'admin_menu', 'cu_vehiclebooking_menu');
}


/* 
 * 2. Admin settings page - display
 * funciton that controls how our admin page looks
*/
if( !function_exists('cu_vehiclebooking_options_page') ) {
    function cu_vehiclebooking_options_page(){
        
        if( !current_user_can( 'manage_options' ) ) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        
        // make our PLUGINROOT constantly avaliable within
        // the options-page-wrapper.php so we can use it
        // for image paths etc.
        global $vb_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $vb_plugin_root . 'inc/options-page-wrapper.php' );
    }
}

/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our 
 * template tags
*/
require_once( $vb_plugin_root . 'inc/template-tags.php' );

/*
 * 5. Template tags - include for themes
 * tell wordpress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. this is achieved via the 
 * wordpress action 'after_setup_theme'
*/
if( !function_exists('cu_vehiclebooking_include_template_tags' ) ) {
    function cu_vehiclebooking_include_template_tags() {
        global $vb_plugin_root;
        include_once( $vb_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'cu_vehiclebooking_include_template_tags' );
} 

/*
 * 6. include custom CSS styles
 * tell wordpress to include custom stylesheet 'assets/cu-vehiclebooking-styles.css'
 * in our theme so it's included in the document <head>
*/

if( !function_exists('cu_vehiclebooking_add_custom_styles' ) ) {
    function cu_vehiclebooking_add_custom_styles() {
        global $plugin_root_url;
        
        /* enqueue each stylesheet */
        wp_enqueue_style( 'cu-vehiclebooking', $plugin_root_url . 'assets/cu-vehiclebooking-styles.css' );
    }
    add_action( 'wp_enqueue_scripts', 'cu_vehiclebooking_add_custom_styles' );
}
?>