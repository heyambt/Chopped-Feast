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
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'meal-delivery' ), 'meal-delivery', 'Claire, Hirdey, Heyam, Vidhi and Wei' );
				?>
			</p>
			<div>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'meal-delivery' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Powered by %s', 'meal-delivery' ), 'WordPress' );
					?>
				</a>
			</div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
