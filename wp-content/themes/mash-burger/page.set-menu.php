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

			<h1><?php the_title(); ?></h1>

			<?php mb_product_list_withfilter() ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
