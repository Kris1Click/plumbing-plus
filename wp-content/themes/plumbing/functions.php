<?php
/**
 * Plumbing functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Plumbing
 */

if ( ! function_exists( 'plumbing_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function plumbing_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Plumbing, use a find and replace
	 * to change 'plumbing' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'plumbing', get_template_directory() . '/languages' );

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
	
	add_image_size('slider-thumbnail', 550, 510, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'plumbing' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'plumbing_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'plumbing_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function plumbing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'plumbing_content_width', 640 );
}
add_action( 'after_setup_theme', 'plumbing_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function plumbing_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'plumbing' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'plumbing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'plumbing_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function plumbing_scripts() {
	wp_enqueue_style( 'plumbing-style', get_stylesheet_uri() );

	wp_enqueue_script( 'plumbing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'plumbing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.1', 'all' );
	
	wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));

	wp_enqueue_style('flexslider_css', get_template_directory_uri().'/css/flexslider.css');
	
	$query_args = array(
		'family' => 'Roboto:100,300,400,500,700,900',
		'subset' => 'latin,latin-ext',
	);
	
	wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	
	wp_enqueue_style('google-fonts');	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'plumbing_scripts' );

function call_slider_script(){
 
print '<script type="text/javascript" charset="utf-8">
	  jQuery(window).load(function() {
		jQuery("#home-slider").flexslider();
	  });
	</script>';

	print '<script type="text/javascript" charset="utf-8">
			jQuery(window).load(function() {
			  jQuery("#reviews-slider").flexslider({
			  animation: "slide",
			    controlNav: false,
			    animationLoop: false,
			    slideshow: false,
				drag: true,
			    itemWidth: 150,
			    itemMargin: 5,
			    asNavFor: "#main-slider"
			  });
			   
			  jQuery("#main-slider").flexslider({
			  animation: "slide",
			    controlNav: false,
			    animationLoop: false,
			    slideshow: false,
			    sync: "#reviews-slider"
			  });
			});
</script>'; 

print '<script type="text/javascript" charset="utf-8">
		jQuery(window).load(function() {
		  jQuery("#carousel-homepage").flexslider({
			animation: "slide",
			animationLoop: false,
			itemWidth: 210,
			itemMargin: 15,
		  });
		});
		</script>'; 		
}
 
add_action('wp_head', 'call_slider_script');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function one_click_add_admin_page()
{
	add_menu_page('Plumbing Theme Options', 'Theme Options', 'manage_options', 'admin_one_click', 'one_click_theme_create_page', get_template_directory_uri() . '/img/theme-options.png', 110);

	//add_submenu_page('admin_one_click', '1 Click Theme Options', 'General', 'manage_options', 'admin_one_click', 'one_click_theme_create_page');
	//add_submenu_page('admin_one_click', 'Slider Options', 'Slider Options', 'manage_options', 'admin_one_click_slider', 'one_click_theme_slider_page');
	add_submenu_page('admin_one_click', 'Header and Footer Options', 'Header and Footer', 'manage_options', 'admin_one_click_hefo', 'one_click_theme_hefo_page');
	//add_submenu_page('admin_one_click', 'Our Services Section', 'Our Services Section', 'manage_options', 'admin_one_click_services', 'one_click_theme_services_page');
	//add_submenu_page('admin_one_click', 'Section About Us', 'About Us Section', 'manage_options', 'admin_one_click_about', 'one_click_theme_about_page');
	//add_submenu_page('admin_one_click', 'CSS Options', 'Custom CSS', 'manage_options', 'admin_one_click_css', 'one_click_theme_settings_page');
}

add_action('admin_menu', 'one_click_add_admin_page');
add_action('admin_init', 'one_click_hefo_settings');
//add_action('admin_init', 'one_click_services_settings');
//add_action('admin_init', 'one_click_about_settings');

function one_click_hefo_settings()
{
	register_setting('one-click-settings-group', 'phone_number');
	register_setting('one-click-settings-group', 'custom_moto');
	register_setting('one-click-settings-group', 'facebook_handler');
	register_setting('one-click-settings-group', 'twitter_handler', 'one_click_sanitize_twitter_handler');
 	register_setting('one-click-settings-group', 'gplus_handler');
 	register_setting('one-click-settings-group', 'pinterest_handler');
	register_setting('one-click-settings-group', 'youtube_handler');
	register_setting('one-click-settings-group', 'footer_copyright');
	register_setting('one-click-settings-group', 'footer_copyright_span');

 	add_settings_section('one-click-hefo-options', 'Header and Footer Options', 'one_click_theme_hefo_page', 'admin_one_click_hefo');

	add_settings_field('header-contact-number', 'Contact Number', 'one_click_header_contact_number', 'admin_one_click_hefo', 'one-click-hefo-options');
	add_settings_field('header-contact-moto', 'Contact Moto', 'one_click_header_contact_moto', 'admin_one_click_hefo', 'one-click-hefo-options');

	add_settings_field('footer-facebook', 'Add link to Facebook page', 'one_click_footer_facebook', 'admin_one_click_hefo', 'one-click-hefo-options');
	add_settings_field('footer-twitter', 'Add link to Twitter page', 'one_click_footer_twitter', 'admin_one_click_hefo', 'one-click-hefo-options');
	add_settings_field('footer-gplus', 'Add link to Google+ page', 'one_click_footer_gplus', 'admin_one_click_hefo', 'one-click-hefo-options');
	add_settings_field('footer-pinterest', 'Add link to pinterest page', 'one_click_footer_pinterest', 'admin_one_click_hefo', 'one-click-hefo-options');	
	add_settings_field('footer-youtube', 'Add link to YouTube profile', 'one_click_footer_youtube', 'admin_one_click_hefo', 'one-click-hefo-options');	

	add_settings_field('footer-copyright', 'Footer copyright', 'one_click_footer_copyright', 'admin_one_click_hefo', 'one-click-hefo-options');
	add_settings_field('footer-copyright_span', 'Footer copyright span', 'one_click_footer_copyright_span', 'admin_one_click_hefo', 'one-click-hefo-options');

}	

//HEADER AND FOOTER SECTION//

function one_click_header_contact_number()
{
	$customPhoneNumber = esc_attr(get_option('phone_number'));
	echo '<input type="text" name="phone_number" style="width:400px;" value="'.$customPhoneNumber.'" placeholder="Phone Number"/>';
}

function one_click_header_contact_moto()
{
	$customMoto = esc_attr(get_option('custom_moto'));
	echo '<input type="text" name="custom_moto" style="width:400px;" value="'.$customMoto.'" placeholder="Moto"/>';
}

function one_click_footer_facebook()
{
	$customFacebook = esc_attr(get_option('facebook_handler'));
	echo '<input type="text" name="facebook_handler" style="width:400px;" value="'.$customFacebook.'" placeholder="Facebook page link"/>';
}

function one_click_footer_twitter()
{
	$customTwitter = esc_attr(get_option('twitter_handler'));
	echo '<input type="text" name="twitter_handler" style="width:400px;" value="'.$customTwitter.'" placeholder="Twitter page link"/> <p class="description">Input your Twitter username without the @ character</p>';
}

///Sanitization 

function one_click_sanitize_twitter_handler($input)
{
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;
}

function one_click_footer_gplus()
{
	$customGplus = esc_attr(get_option('gplus_handler'));
	echo '<input type="text" name="gplus_handler" style="width:400px;" value="'.$customGplus.'" placeholder="Google+ page link"/>';
}

function one_click_footer_pinterest()
{
	$customPinterest = esc_attr(get_option('pinterest_handler'));
	echo '<input type="text" name="pinterest_handler" style="width:400px;" value="'.$customPinterest.'" placeholder="Pinterest page link"/>';
}

function one_click_footer_youtube()
{
	$customYouTube = esc_attr(get_option('youtube_handler'));
	echo '<input type="text" name="youtube_handler" style="width:400px;" value="'.$customYouTube.'" placeholder="YouTube profile link"/>';
}

function one_click_footer_copyright()
{
	$customFooterCopyRight = esc_attr(get_option('footer_copyright'));
	echo '<input type="text" name="footer_copyright" style="width:400px;" value="'.$customFooterCopyRight.'" placeholder="Footer Copyright"/>';
}
function one_click_footer_copyright_span()
{
	$customFooterCopyRightSpan = esc_attr(get_option('footer_copyright_span'));
	echo '<input type="text" name="footer_copyright_span" style="width:400px;" value="'.$customFooterCopyRightSpan.'" placeholder="Footer Copyright Span"/>';
}
//HEADER AND FOOTER SECTION ENDS//

function one_click_theme_create_page()
{
	require_once(get_template_directory().'/inc/one-click-admin.php');
}

function one_click_theme_hefo_page()
{
	require_once(get_template_directory().'/inc/hefo-admin.php');
}

function one_click_theme_about_page()
{
	require_once(get_template_directory().'/inc/about-admin.php');
}

function one_click_theme_services_page()
{
	require_once(get_template_directory().'/inc/services-admin.php');
}

function one_click_theme_settings_page()
{
	echo '<h1>Custom CSS</h1>';
}

function one_click_theme_slider_page()
{
	echo '<h1>Customize your slider here</h1>';
}

////////////// SLIDER ///////////////////

function register_cpt_slider() {

	$labels = array(
		'name' => __( 'Slides', 'slide' ),
		'singular_name' => __( 'Slide', 'slide' ),
		'add_new' => __( 'Add New Slide', 'slide' ),
		'add_new_item' => __( 'Add New Slide', 'slide' ),
		'edit_item' => __( 'Edit Slide', 'slide' ),
		'new_item' => __( 'New Slide', 'slide' ),
		'view_item' => __( 'View Slide', 'slide' ),
		'search_items' => __( 'Search Slides', 'slide' ),
		'not_found' => __( 'No slides found', 'slide' ),
		'not_found_in_trash' => __( 'No slides found in Trash', 'slide' ),
		'parent_item_colon' => __( 'Parent Slide:', 'slide' ),
		'menu_name' => __( 'Slides', 'slide' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Custom post type for adding a slider on the page',
		'supports' => array( 'title','editor','post-formats','thumbnail', 'page-attributes', 'custom-fields' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-format-gallery',
		'show_in_nav_menus' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

	register_post_type( 'slider', $args );
}

add_action( 'init', 'register_cpt_slider' );