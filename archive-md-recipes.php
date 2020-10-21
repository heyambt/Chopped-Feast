<?php
/**
 * The template for displaying Recipes archive page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Meal_Delivery
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
		</header><!-- .page-header -->
		<?php
		  $args = array(
			'post_type' => 'md-recipes',
			'post_per_page' => -1,
    		'order'     => 'ASC',
		 );
		$query = new WP_Query( $args );
	
		if ( $query->have_posts() ) {
			while( $query->have_posts() ) {
				$query->the_post();
				echo '<article class="recipes-items">';
				echo '<a href="';
				the_permalink();
				echo '">';
				the_title();
				echo the_post_thumbnail('medium');
				echo '</a>';
				the_excerpt();
				echo '</article>';
			}
			wp_reset_postdata();
		} 
		?>

		

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
