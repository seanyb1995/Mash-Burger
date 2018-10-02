<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A3_Car_Rental
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" >
		<div class="site-info">
			
			
			
			<div class="foot-head">
				
				<!-- site title in footer -->
				<div class="footer-greet">
					<h1>USC Share Car</h1>
	<a href="https://a-3-yuzurashi.c9users.io/sitemap/">Sitemap</a>
					
				</div>
		
		
				<!-- navigation -->
				<nav id="site-navigation" class="main-navigation2">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'a3-car-rental' ); ?></button>
		
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			
			
		
				<!-- footer logo -->
				<div class="site-branding2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url') ?>/img/usc-logo-white-mono.png" alt"Logo">
					</a>
					
				</div><!-- .site-branding -->


			</div>
			<!-- end of class footer-head -->
	
	
	
	
	
			<div class="wpinfo">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'a3-car-rental' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'a3-car-rental' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'a3-car-rental' ), 'a3-car-rental', '<a href="https://a-3-yuzurashi.c9users.io/">jeff</a>' );
					?>	
			</div>
					
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
