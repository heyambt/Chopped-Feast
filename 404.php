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
				<p><?php esc_html_e( 'Please Try search bar or click on Home. ', 'meal-delivery' ); ?></p>

					<?php
					get_search_form();
					// the_widget( 'WP_Widget_Recent_Posts' );
					?>
					<section class="call-to-action">
					<a href="<?php echo get_permalink(22);?>">Home</a>		
					</section>

					<!-- <div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'meal-delivery' ); ?></h2>
						<ul> -->
							<?php
							// wp_list_categories(
							// 	array(
							// 		'orderby'    => 'count',
							// 		'order'      => 'DESC',
							// 		'show_count' => 1,
							// 		'title_li'   => '',
							// 		'number'     => 10,
							// 	)
							// );
							// ?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					// $meal_delivery_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'meal-delivery' ), convert_smilies( ':)' ) ) . '</p>';
					// the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$meal_delivery_archive_content" );

					// the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
