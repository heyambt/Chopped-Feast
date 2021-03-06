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

	<main id="primary" class="site-main homepage-main">

		<?php while ( have_posts() ) :
				the_post(); ?>

		<section class="hero-image">
			<?php 
				if (function_exists ('get_field')) :
					if (get_field('hero_image')) :
						echo wp_get_attachment_image(get_field('hero_image'), 'full');
					endif;
				endif;
			?>
			<div class="hero-text">
				<h1><?php 
					if (function_exists('get_field')) :
						if (get_field('hero_text')) :
							the_field('hero_text');
						endif;
					endif;
				?></h1>
				<a href="<?php echo get_permalink(35)?>">Order Now</a>
			</div>
		</section>

		<section class="about-us">
			<h2>About Us</h2>
			<?php if (function_exists('get_field')) :
					if (get_field ('about_us')) : ?>
						<p><?php the_field('about_us'); ?></p>
			  <?php endif;
				  endif; ?>
		</section>

		<section class="how-it-works">
			<h2>How It Works</h2>
			<div class="how-it-works-section">
				<?php if (function_exists('get_field')) :
							if (have_rows('how_it_works')):
								while(have_rows('how_it_works')) : the_row();
									if (get_sub_field('illustration_guide')) : ?>
										<div class="how-it-works-card">
									<?php	echo wp_get_attachment_image(get_sub_field('illustration_guide'),'medium');						
									endif;

									if (get_sub_field('text_guide')) : ?>
										<p><?php the_sub_field('text_guide'); ?></p>
										<p class="arrow">&rarr;</p></div>
										<?php
								endif;
								endwhile;
						?>
							<?php	
							endif;
					endif; ?>
			</div>
		</section>

		<section class="testimonial-section">
			<h2>Testimonials</h2>
			<div class="testimonials">	
				<?php
					$args = array(
						'post_type'      => 'md-testimonials',
						'posts_per_page' => 4
					);

					$query = new WP_Query ( $args );
					
					if ( $query -> have_posts() ):
						while ( $query -> have_posts() ) :
							$query -> the_post();
							the_content();
						endwhile;
						wp_reset_postdata();
					endif; 
				?>
			</div>
		</section>
		
		<section class="social-proof">
			<h2>As Featured In</h2>
			<?php 
				if (function_exists('get_field')):
					if (get_field('social_proof')):
						$images = get_field('social_proof');
						foreach ($images as $image):
							echo wp_get_attachment_image($image, 'thumbnail');
						endforeach;
					endif;
				endif; 
			?>
		</section>

		<section class="call-to-action">
			<a href="<?php echo get_permalink(35)?>">Buy Now</a>
			<a href="<?php echo get_permalink(35)?>">Coupon</a>
		</section>
		
		<?php endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();