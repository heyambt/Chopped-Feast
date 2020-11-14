<?php
/**
 * The template for displaying contact page
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

		<?php
		while ( have_posts() ) :
			the_post();
		
		?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php meal_delivery_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meal-delivery' ),
				'after'  => '</div>',
			)
		);


		$phone_number = get_field('phone_number');
		$email = get_field('email') ;
		$mailing_address = get_field('mailing_address');
		echo '<div class=info>';
		echo '<div class=phone>';
		echo '<h4>';
		echo 'Phone : ';
		echo '</h4>';
		echo '<p>';
		echo $phone_number ;
		echo '</p>';
		echo '</div>';

		echo '<div class=email>';
		echo '<h4>';
		echo 'Email : ';
		echo '</h4>';
		echo '<p>';
		echo $email ;
		echo '</p>';
		echo '</div>';


		echo '<div class=address>';
		echo '<h4>';
		echo 'Mailing Address : ';
		echo '</h4>';
		echo '<p>';
		echo $mailing_address;
		echo '</p>';
		echo '</div>';
		echo '</div>';
		?>
	</div><!-- .entry-content -->

	</article>

	<?php
	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

<?php
get_footer();