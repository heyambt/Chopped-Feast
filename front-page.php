<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meal_Delivery
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php while ( have_posts() ) :
				the_post(); ?>

		<section class="hero-image"></section>

		<section class="about-us">
			<h2>About Us</h2>
			<?php the_content(); ?>
		</section>

		<section class="how-it-works">
			<h2>How It Works</h2>
		</section>

		<section class="testimonials">
			<?php
				$args = array(
					'post_type'      => 'md-testimonials',
					'posts_per_page' => 4
				);

				$query = new WP_Query ( $args );
				
				if ( $query -> have_posts() ){
					while ( $query -> have_posts() ) {
						$query -> the_post();
						the_content();
					}
					wp_reset_postdata();
			} ?>
		
		</section>

		<section class="social-proof"></section>

		<section class="call-to-action"></section>

		
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();