<?php
/**
 * Template Name: Menu Fork
 * This template is for the page containing the fork in choosing custom or set burgers (menu fork custom post types)
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
		
            <!-- image -->
			<div class="menu-split">
				<h1>Select from Category</h1>
		
				<img src="<?php echo get_bloginfo('template_url') ?>/img/burger_menu_split.png" style="" alt="">
			
				<div class="menu-text">
		
						<a class="button" href="https://mash-burger-yuzurashi.c9users.io/build-your-burger/">Build Your Own</a>			
			
						<a class="button" href="https://mash-burger-yuzurashi.c9users.io/set-menu">Choose From Menu</a>
	
				</div>
			</div>
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
