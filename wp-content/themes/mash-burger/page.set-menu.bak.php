<?php
/**
 * Template Name: Set Menu
 * This template is for the set menu page (set menu custom post types)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mash_Burger
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<h1> <?php the_title(); ?></h1>
				
			<?php
				$args = array(
					'post_type' => 'product',
					'orderby' => 'menu_order',
					'order' => 'ASC'
				);
				$product = new WP_Query($args);
			?>

			<?php if( $product->have_posts() ): ?>
			    <?php while($product->have_posts()) : $product->the_post();  ?>
			        <article class="product-profile">
			            <h2>
			                <a href="<?php the_permalink(); ?>" title="View Product"><?php the_title(); ?></a>
			            </h2>
			            <?php the_content(); ?>
			        </article>
		        <?php endwhile; ?>
	    	<?php else: ?>
	        <p>Sorry, we currently have no food products to list</p>
	    <?php endif; ?>
	  



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
