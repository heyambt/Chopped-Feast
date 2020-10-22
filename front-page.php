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

		<section class="hero-image">
			<?php if (function_exists ('get_field')) {
				if (get_field('hero_image')) {
					$image = get_field('hero_image') ?>
    					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php 
				}
			} ?>
		</section>

		<section class="about-us">
			<h2>About Us</h2>
			<?php if (function_exists('get_field')) {
					if (get_field ('about_us')) { ?>
					<p><?php the_field('about_us'); ?></p>
				<?php		
					}
				} ?>
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

		<section class="social-proof">
			<h2>As Featured In</h2>
			<?php if (function_exists('get_field')) {
				if (have_rows('social_proof')): 
					while(have_rows('social_proof')) :the_row();
						$logo = get_sub_field('company_logo');
						if (!empty($logo)) { ?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
					<?php	}
					endwhile;
				endif;
			} ?>
		</section>

		<section class="call-to-action"></section>

		
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();