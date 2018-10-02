<?php
/**
 * The template is for displaying single food items/posts
 * 
 * @package Mash_Burger
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
	
				<h1><?php the_title(); ?></h1>
				
				<?php if( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( 'medium', array('class' => 'alignright') ); ?>
				<?php endif; ?>
				
				<?oho the_content(); ?>
				
			<?php endwhile; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
