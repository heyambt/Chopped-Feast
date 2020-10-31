<?php
/**
 * The template for displaying questions page
 * 
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
		endwhile; ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>

		<?php meal_delivery_post_thumbnail(); ?>

		 <?php

		if(have_rows('faq') ) : 
            while(have_rows('faq') ):
                the_row();
            $q = get_sub_field('question');  
            $a = get_sub_field('answer');
			
			echo $q;
			echo '<br />';
			echo $a;
            
            endwhile;
        endif;

		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
