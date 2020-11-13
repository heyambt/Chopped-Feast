<?php
/**
 * Meal Delivery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Meal_Delivery
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'meal_delivery_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function meal_delivery_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Meal Delivery, use a find and replace
		 * to change 'meal-delivery' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'meal-delivery', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'meal-delivery' ),
				'footer' => esc_html__('Footer', 'meal-delivery'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'meal_delivery_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// add editor styles
		add_editor_style();
		add_theme_support( 'editor-styles' );

	}
endif;
add_action( 'after_setup_theme', 'meal_delivery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function meal_delivery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'meal_delivery_content_width', 640 );
}
add_action( 'after_setup_theme', 'meal_delivery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function meal_delivery_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'meal-delivery' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'meal-delivery' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'meal_delivery_widgets_init' );

// remove default widgets 
function meal_delivery_remove_dashboard_widget() {
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
} 
add_action( 'wp_dashboard_setup', 'meal_delivery_remove_dashboard_widget' );

function meal_delivery_remove_all_dashboard_metaboxes() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');

}
add_action( 'wp_dashboard_setup', 'meal_delivery_remove_all_dashboard_metaboxes' );




/**
 * Enqueue scripts and styles.
 */
function meal_delivery_scripts() {
	wp_enqueue_style( 'meal-delivery-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'meal-delivery-style', 'rtl', 'replace' );

	wp_enqueue_script( 'meal-delivery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'meal-delivery-menu', get_template_directory_uri() . '/js/menu.js', array(), _S_VERSION, true ); 

	wp_enqueue_script( 'meal-delivery-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC-gxceShvT7g-5mEDHJEsANXz05NPKfDE', array(), _S_VERSION, true );

	wp_enqueue_script( 'meal-delivery-map-settings', get_template_directory_uri() . '/js/googlemap.js', array('jquery'), _S_VERSION, true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'meal_delivery_scripts' );

function my_acf_google_map_api( $api){
	$api['key'] = 'AIzaSyC-gxceShvT7g-5mEDHJEsANXz05NPKfDE';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * custom posty types and taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/** Adding themes to the Block Editor */
add_editor_style(); 

add_theme_support( 'editor-styles' );

/* Remove the function that zooms in images */
function remove_product_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_product_zoom_support', 100 );

/* Customize the WYSIWYG Toolbar */
function my_toolbars( $toolbars ) {

	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'underline', 'link' );

	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

/* Remove Block Editor from Home & FAQ Pages */
function md_post_filter( $use_block_editor, $post ) {
	if ( 22 === $post->ID || 31 === $post->ID ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'md_post_filter', 10, 2 );

/* Add Welcome Message widget on Dashboard */
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Chopped Fresh Message', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
	echo '<p>Welcome to the dashboard! Please feel free add content to your website by creating new posts or pages. If you have any questions, contact the TWD 25 development team <a href="mailto:info@example.com">here</a></p>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

/* Remove admin menu for non-admin users */
function twd_remove_admin_links() {
	if ( !current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit.php' );           // Remove Posts link
    		remove_menu_page( 'edit-comments.php' );   // Remove Comments link
	}
}
add_action( 'admin_menu', 'twd_remove_admin_links' );

/* Change the logo on the WordPress login page */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
		background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/chopped-feast-logo.png);
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/* Link to site using the logo */
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Chopped Feast Meal Delivery';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );