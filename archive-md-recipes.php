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
				<h1><?php get_the_archive_title(); ?></h1>
						
		</header><!-- .page-header -->
	<!-- drop down menu-->
		<?php
			$terms = get_terms( array(
				'taxonomy' => 'weekly-recipes'
			) );
			if ( $terms && ! is_wp_error($terms) ){
				echo '<form><h2>Select Week</h2>';
				echo '<select class="dropdown" name="dropdown">';
				foreach ( $terms as $term ) {
					echo '<option value="'.$term->slug.'">';
					echo $term->name;
					echo '</option>';
				}
				echo '</select>';
				echo'</form>';
			}
		?>
		<?php
			$taxonomy = 'weekly-recipes';
			$terms = get_terms(
				array(
					'taxonomy' => $taxonomy
				)
			);
			if($terms && ! is_wp_error($terms) ){
				$counter= 0;
				foreach($terms as $term){
					$term_args = array(
						'post_type'      => 'md-recipes',
						'posts_per_page' => -1,
						'tax_query'      => array(
								array(
									'taxonomy' => $taxonomy,
									'field'    => 'slug',
									'terms'    => $term->slug,
								)
						),
					);
					$term_query = new WP_Query ($term_args);
				
					if ( $term_query->have_posts() ) {
						//display the term name dynamically
						// changed id="'.$term->slug.'" to a second class
						if ($counter < 1 )	{
							echo '<section class="week-section visible '.$term->slug.' ">';
						}else {
							echo '<section class="week-section '.$term->slug.' ">';
						}
						echo '<h2>' . $term->name . '</h2>';
						while($term_query->have_posts()){
							$term_query->the_post();
							$counter++;
							echo '<article>';
							echo '<h3>';
							the_title();
							echo '</h3>';
							the_post_thumbnail('medium');						
							the_content(); 
							$term_obj_list = get_the_terms( $post->ID, 'special-diets' );
							$terms_string = join(', ', wp_list_pluck($term_obj_list, 'name'));
							echo $terms_string;
							echo '</article>';
						}//end while
						echo '</section>';
						wp_reset_postdata();
					}// end if
				}//end foreach
			}//end if
		?>
		<section class="call-to-action">
			<a href="<?php echo get_permalink(35);?>">See Plans</a>
		</section>
	</main><!-- #main -->
<?php
// get_sidebar();
get_footer();
