<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meal_Delivery
 */

?>

	<footer id="colophon" class="site-footer">
		<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
				)
			);
		?>
		<div class="site-info">
		<p>
			<?php echo 'Created by: Claire, Heyam, Hirdey, Vidhi, and Wei' ?>
			</p>
			<p>
			<?php echo 'For Educational Purposes' ?>
			</p>
			
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
