<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mash_Burger
 */

?>

	<footer id="colophon" class="site-footer" >
		<div class="site-info">
			
			
			<div class="foot-head">
				<div class="footer-title">
					<h2>COPYRIGHT@MASHBURGERSAUSTRALIA</h2>
				</div>
		
				<!-- burger footer logo -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_bloginfo('template_url') ?>/img/mb-logo.png" alt"Logo">
				</a>
			</div>
				
				
			<div class="foot-head">
				<div class="footer-title">
					<h2>FOLLOW US</h2>
				</div>
				
				<!-- social media -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_bloginfo('template_url') ?>/img/icon/icon_facebook.png" alt"Logo">
				</a>
				
				<!-- social media -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_bloginfo('template_url') ?>/img/icon/icon_twitter.png" alt"Logo">
				</a>

				<!-- social media -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_bloginfo('template_url') ?>/img/icon/icon_instagram.png" alt"Logo">
				</a>
			</div>


		</div>
		<!-- end of site-info -->
			
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
