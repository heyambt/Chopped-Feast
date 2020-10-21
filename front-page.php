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

		<section class="testimonials"><!--testimonial array--></section>

		<section class="social-proof"></section>

		<section class="call-to-action"></section>

		
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();