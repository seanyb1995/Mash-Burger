<?php
/*
 * Plugin Name: Customer Order
 * Plugin URI:
 * Description: A simple plugin that keeps track of order
 * Version: 1.0
 * Author: Sean Buchanan
 * Author URI:
 * License: GPL2
*/

/*
 * Create $plugin_root variable
 * This save your writing out plugin_dir_path(__FILE__) each time
 * We also create a $plugin_root_url, which is similar, but instead of
 * outputting the PHP file path, it outputs the URL path which is required for 
 * any scripts or stylesheets we include in the head
*/

$customer_order_plugin_root = plugin_dir_path(__FILE__);
$customer_order_plugin_root_url = plugin_dir_url(__FILE__);

/* -----------------------------------------------------------------------------
 * 1. Add menu item
 * This function adds our plugin to the WP admin menu
*/
if(!function_exists('mb_customer_order_menu')){
    function mb_customer_order_menu(){
        /*
         * Use WordPress add_menu_page function
         * add_option_page ( $page_title, $menu_title, $capability, $menu-slug, $function )
        */
        add_menu_page(
            'Customer Order', //page title
            'Customer Order', //menu title
            'manage_options', //capabilities
            'mbcustomerorder', //menu slug
            'mb_customer_order_options_page', //function
            'dashicons-list-view' //icon
            );
    }
    // add_action hook - this hooks our function into WordPress
    add_action( 'admin_menu', 'mb_customer_order_menu' ); 
}

/* -----------------------------------------------------------------------------
 * 2. Admin settings page - display
 * function that controls how our admin page looks
*/

if ( !function_exists('mb_customer_order_options_page') ) {
    function mb_customer_order_options_page(){
        
        if ( !current_user_can( 'manage_options' ) ){
            wp_die('You do not have sufficient permission to access this page.');
        }
        
        // make our PLUGINROOT constant avaliable within
        // the options-page-wrapper.php so we can use it
        // for imag epaths etc.
        global $customer_order_plugin_root;
        
        // this file contains all the html for our admin settings page
        require_once( $customer_order_plugin_root . 'inc/options-page-wrapper.php' );
    }
}

/*
 * 3. Setup database table for contact us
 * This only needs to be executed once, so we add it to the
*/
if(!function_exists('mb_customer_order_dbsetup')){
    function mb_customer_order_dbsetup(){
        // Create db table 'vehicle_bookings'; using the $wpdb global variable
        global $wpdb;
        
        $table_name = $wpdb->prefix . "mb_customer_order";
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "CREATE TABLE IF NOT EXISTS $table_name(
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                customer_id VARCHAR(320) NOT NULL,
                name TEXT NOT NULL,
                customer_order VARCHAR(320) NOT NULL,
                cost INT(10) NOT NULL,
                email VARCHAR(320) NOT NULL,
                phone_number INT(10) NOT NULL,
                PRIMARY KEY (id)
            ) $charset_collate; ";
            
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    // run the above dbsa_setup function upon plugin activation
    register_activation_hook(__FILE__, 'mb_customer_order_dbsetup');
}

/*
 * 4. Template tags
 * Require our Template tags file which contains all the functions for our
 * template tags
*/

require_once( $customer_order_plugin_root . 'inc/template-tags.php' );

/* 
 * 5. Template tags - include for themes
 * Tell WordPress to include our template-tags.php file for our theme, so
 * our template tag functions can be used in our theme. This is achieved via the
 * WordPress action 'after_setup_theme'
*/ 
if( !function_exists('mb_customer_order_include_template_tags') ) {
    function mb_customer_order_include_template_tags() {
        global $customer_order_plugin_root;
        include_once( $customer_order_plugin_root . 'inc/template-tags.php' );
    }
    add_action( 'after_setup_theme', 'mb_customer_order_include_template_tags' );
}

/* 
* 6. Setup product post type and category taxonomy
*/
    require_once( $customer_order_plugin_root . 'inc/cpt-custom-burger.php' );
    // require_once( $customer_order_plugin_root . 'inc/tax-category.php' );
    add_action('init', 'mb_custom_burger_ingredients_post_type');
    // add_action('init', 'mb_ingredient_category_taxonomy');

/*
 * 7. Include custom CSS styles
 * Tell WordPress to include custom stylesheet 'assets/mb-customer-order-styles.css'
 * in our theme so it's included in the document <head>
*/
if( !function_exists('mb_customer_order_add_custom_styles') ){
    function mb_customer_order_add_custom_styles() {
        global $customer_order_plugin_root_url;
        
        /* Enqueue each stylesheet */
        wp_enqueue_style( 'mb-customer-order', $customer_order_plugin_root_url . 'assets/mb-customer-order-styles.css' );
    }
    add_action( 'wp_enqueue_scripts', 'mb_customer_order_add_custom_styles' );
}

/*
 * 8. Include custom Javascript
 * Tell WordPress to include custom stylesheet 'assets/mb-customer-order-java.js'
 * in our theme so it's included in the document <head>
*/

?>