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

    register_sidebar( array(
        'name'          => esc_html__( 'Shop Widgets', 'asbab' ),
        'id'            => 'sidebar-shop',
        'description'   => esc_html__( 'Add shop widgets here.', 'asbab' ),
        'before_widget' => '<section id="%1$s" class="htc__product__leftsidebar shop-widgets widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title shop-widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'asbab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function asbab_scripts() {


    /*Asbab Fonts*/
    wp_enqueue_style('asbab-fonts','https://fonts.googleapis.com/css?family=Old+Standard+TT|Poppins:400,600');


    /*Asbab Main Styles*/
    wp_enqueue_style('asbab-main-css', get_template_directory_uri() .'/main.css', array(), '20190509');


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


/*filter to increase upload size important*/ /*Very Important*/
//filter
add_filter('upload_size_limit', 'increase_upload');
function increase_upload($bytes) {
    return 134217728;
}



/*Increase Maximum upload Size*/
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );



/*WooCommerce Hooks removal and addition*/
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);

remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content','asbab_before_main_content',10);
add_action('woocommerce_after_main_content','asbab_after_main_content',10);


function asbab_before_main_content(){
    echo '<section class="htc__product__grid bg__white ptb--100"><div class="container"><div class="row">';
}

function asbab_after_main_content(){
    echo '</div></div></section>';
}


function asbab_sorting_wrapper() {
    echo '<div class="asbab-sorting">';
}

function asbab_sorting_wrapper_close() {
    echo '</div>';
}

add_action('woocommerce_before_shop_loop','asbab_sorting_wrapper',9);
add_action('woocommerce_before_shop_loop','asbab_sorting_wrapper_close',31);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );

//add_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_rating',30);
//add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_widget_shopping_cart_button_view_cart',20);

//remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30);


add_action( 'woocommerce_after_shop_loop_item_title', 'output_product_excerpt', 20 );
function output_product_excerpt() {
    global $post;

    //get the individual products' categories and put them in an array
    $terms = wp_get_post_terms( $post->ID, 'product_cat' );
    foreach ( $terms as $term ) {
        $product_categories[] = $term->term_id;
    };

    //check if the array contains your specific $category_id that you are targeting
//    if ( is_shop() && in_array( $category_id, $product_categories )) {
        echo '<div class="my-excerpt">'.wp_trim_words($post->post_excerpt,20).'</div>';
//    }
}



/**
 * Output the view cart button.
 */
//function woocommerce_widget_shopping_cart_button_view_cart() {
//    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
//}

// always display rating stars // source : https://wordpress.org/support/topic/woocommerce-always-show-stars-even-with-no-reviews/
//Mohammed Rezq
function filter_woocommerce_product_get_rating_html( $rating_html, $rating, $count ) {
    $rating_html  = '<div class="star-rating">';
    $rating_html .= wc_get_star_rating_html( $rating, $count );
    $rating_html .= '</div>';

    return $rating_html;
};
add_filter( 'woocommerce_product_get_rating_html', 'filter_woocommerce_product_get_rating_html', 10, 3 );

/*Change Breadcrumb separator*/

add_filter('woocommerce_breadcrumb_defaults','asbab_breadcrumb');
function asbab_breadcrumb($breadcrumb){
    $breadcrumb['delimiter']    = ' &gt; ';
    $breadcrumb['wrap_before']  = '<nav class="woocommerce-breadcrumb bradcaump-inner">';
	$breadcrumb['wrap_after']   = '</nav>';

    return $breadcrumb;
}

/* Add customized Breadcrumbs to the header Main Image */


add_action('woocommerce_asbab_breadcrumb_items','woocommerce_breadcrumb',10);

/*remove breadcrumbs from the top of the shop products !*/
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);


/* Add bootstrap grid for products loop and sidebar */

add_action('woocommerce_before_shop_loop','asbab_open_grid_loop_columns',5);
function asbab_open_grid_loop_columns(){
    echo "<div class='col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12'>";
}

add_action('woocommerce_after_shop_loop','asbab_close_grid_loop_columns',100);
function asbab_close_grid_loop_columns(){
    echo "</div>";
}


add_action('woocommerce_cart_actions', 'asbab_update_cart');
function asbab_update_cart(){
    echo "";
}

add_action('woocommerce_cart_actions', 'asbab_continue_shopping_after_cart_totals',20);

function asbab_continue_shopping_after_cart_totals(){

    $checkout_link = get_permalink( wc_get_page_id( 'checkout' ) );

    echo "<div><a href='$checkout_link'<?php class='btn asbab-btn-checkout'>Checkout</a></div>";
}


add_action('woocommerce_cart_actions','asbab_update_after_cart_table',30);

function asbab_update_after_cart_table(){

    echo "<button type='submit' class='button checkout--btn' name='update_cart' value='Update Cart'>Update Cart</button>";
}


add_action( 'woocommerce_update_cart_action_cart_updated', 'on_action_cart_updated', 20, 1 );
function on_action_cart_updated( $cart_updated ){

    $applied_coupons = WC()->cart->get_applied_coupons();

    if( count( $applied_coupons ) > 0 ){
        $new_value        = WC()->cart->get_cart_subtotal();
        $discounted       = WC()->cart->coupon_discount_totals;
        $discounted_value = array_values($discounted)[0];
        $new_value        = $new_value-$discounted_value + 100;

        WC()->cart->set_total( $new_value );

        if ( $cart_updated ) {
            // Recalc our totals
            WC()->cart->calculate_totals();
        }
    }
}

add_action('woocommerce_after_cart_totals','asbab_continue_shopping_after_cart_totals_2',10);
function asbab_continue_shopping_after_cart_totals_2(){

    $shop_link = get_permalink( wc_get_page_id( 'shop' ) );

    echo "<div><a href='$shop_link'<?php class='btn asbab-btn-shopping asbab_cart-totals_shopping'>Continue Shopping</a></div>";
}