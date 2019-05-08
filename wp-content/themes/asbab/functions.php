<?php
/**
 * asbab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package asbab
 */

if ( ! function_exists( 'asbab_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function asbab_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on asbab, use a find and replace
		 * to change 'asbab' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'asbab', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'asbab' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'asbab_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'asbab_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function asbab_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'asbab_content_width', 640 );
}
add_action( 'after_setup_theme', 'asbab_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function asbab_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'asbab' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'asbab' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'asbab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asbab_scripts() {


    /*Asbab Main Styles*/
    wp_enqueue_style('asbab-bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css', array(), '20190508');

    wp_enqueue_style('asbab-owlcss', get_template_directory_uri() .'/css/owl.carousel.min.css', array(), '20190508');

    wp_enqueue_style('asbab-owl-theme-css', get_template_directory_uri() .'/css/owl.theme.default.min.css', array(), '20190508');

    wp_enqueue_style('asbab-core-css', get_template_directory_uri() .'/css/core.css', array(), '20190508');

    wp_enqueue_style('asbab-shortcode-css', get_template_directory_uri() .'/css/shortcode/shortcodes.css', array(), '20190508');

    wp_enqueue_style('asbab-responsive-css', get_template_directory_uri() .'/css/responsive.css', array(), '20190508');

    wp_enqueue_style('asbab-custom-css', get_template_directory_uri() .'/css/custom.css', array(), '20190508');


    /*Asbab Main scripts*/

    /*modernizr script in header! */
    wp_enqueue_script( 'asbab_modernizr', get_template_directory_uri() . '/js/vendor/modernizr-3.5.0.min.js', array(), '20190508', false);

    wp_enqueue_script( 'asbab_jquery', get_template_directory_uri() . '/js/vendor/jquery-3.2.1.min.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_pluginsjs', get_template_directory_uri() . '/js/plugins.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_slick', get_template_directory_uri() . '/js/slick.min.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), '20190508', true);

    wp_enqueue_script( 'asbab_mainjs', get_template_directory_uri() . '/js/main.js', array(), '20190508', true);

    /*Main Underscore scripts*/

	wp_enqueue_style( 'asbab-style', get_stylesheet_uri() );

	wp_enqueue_script( 'asbab-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'asbab-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'asbab_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
