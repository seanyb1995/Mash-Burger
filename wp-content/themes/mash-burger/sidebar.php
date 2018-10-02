<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mash_Burger
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area pure-u-1 pure-u-md-1-3">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php mb_order_docket() ?>
</aside><!-- #secondary -->
