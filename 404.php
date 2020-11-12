<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Meal_Delivery
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! Looks like you took a wrong turn!', 'meal-delivery' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Please click on Home. ', 'meal-delivery' ); ?></p>

				<?php
				echo '<figure>';
				echo wp_get_attachment_image(292);
				echo '</figure>';
					
				?>
					
					<section class="call-to-action">
					<a href="<?php echo get_permalink(22);?>">Home</a>		
					</section>

					


			</div><!-- .page-content -->

	</main><!-- #main -->

<?php
get_footer();
