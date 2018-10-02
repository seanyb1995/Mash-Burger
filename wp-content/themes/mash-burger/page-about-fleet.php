<?php
/**
 * Template Name: About Our Fleet
 * This template is for the page, 'About our Fleet'
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A3_Car_Rental
 */
get_header();
?>

	<div id="primary" class="content-area pure-u-1 pure-u-md-2-3">
		<main id="main" class="about-fleet">
			
			
			<h1><?php the_title(); ?></h1>
			
			
			<p>At Uni Share Car we only use the newest, and most economical cars from award winning manufacturers like Toyota, Audi, Mitsubishi and Kia.
				</p>		

		
			<img src="<?php echo get_bloginfo('template_url') ?>/img/about-cars.png" alt"Logo" class="about-logo">
		
		
			<div class="info">
				<label>All of our vehicles are:</label>
					<ul>
						<li>Automatic</li>
						<li>Air conditioned</li>
						<li>Fully maintained and services to manufacturer standards</li>
						<li>Cleaned regularly by professional contractors</li>
						<li>Covered by 24 hour Roadside Assistance</li>
					</ul>
			</div>
		
			<div class="info">
				<label>In addition all our vehicles are fitted with:</label>
					<ul>
						<li>Child-seat anchor points (excluding utes & vans) </li>
						<li>Bluetooth sound system </li>
						<li>Fuel card so you can fuel up on our account at 90% of service stations</li>
					</ul>
			</div>
		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
