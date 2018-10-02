<?php
/**
 * Template Name: About
 * This template is for the about page (about custom post types)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Enjoy_Inn
 */

get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">
			
			<!--<h1><?php the_title(); ?></h1>-->
	
	
			<?php about_info_box() ?>	
	
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
