<?php
/**
 * Template Name: Home
 * This template is for the home page (home custom post types)
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

			<!-- owl carousel -->
			<?php home_banner_box() ?>
	
			<!-- about brief -->
			<?php about_brief_box() ?>
	
			<!-- map / location -->
			<?php map_box() ?>
			
			<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.449411169767!2d115.88975161511789!3d-32.00293798121265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32bc8f1c1e4ef9%3A0xd69537e182cd6a4e!2sDumas+Rd%2C+Bentley+WA+6102!5e0!3m2!1sen!2sau!4v1536551368866" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>-->

        	<!--<a class="button" href=": https://mash-burger-yuzurashi.c9users.io/find-us/">FIND YOUR CLOSEST STORE</a>	-->

		</main><!-- #main -->
		
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
