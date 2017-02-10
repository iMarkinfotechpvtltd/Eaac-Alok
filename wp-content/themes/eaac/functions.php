<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'header' => __( 'Header Menu', 'twentysixteen' ),
		'footer'  => __( 'Footer Links Menu', 'twentysixteen' ),
		'service'  => __( 'Service Links Menu', 'twentysixteen' ),
		'training_modules'  => __( 'Training Modules Links Menu', 'twentysixteen' ),
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
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

/*--------------------LOGO --------------*/
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important; background-size: 50% !important;height: 99px !important;    width: auto !important; box-shadow:none !important; outline:none !important;}
</style>';
}
add_action('login_head', 'custom_loginlogo');

function my_login_logo_url() {
   return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
   return 'Emerging Africa Consulting';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
/*--------------------/LOGO --------------*/

/*----------------------Image size---------------------*/
add_image_size( 'slider-image', 1920, 772, true );
add_image_size( 'otherpageslider_image', 1920, 482, true );
add_image_size( 'slider-logo', 258, 75, true );
add_image_size( 'about_image', 850, 711, true );
add_image_size( 'home1_image', 809, 355, true );
add_image_size( 'homeslider_image', 582, 619, true );
add_image_size( 'projecthome_image', 338, 390, true );
add_image_size( 'staff_image', 460, 365, true );
add_image_size( 'whowe_image', 680, 624, true );
add_image_size( 'about_image2', 720, 624, true );
add_image_size( 'industries', 582, 297, true );
add_image_size( 'consult_image', 702, 375, true );
add_image_size( 'teaminner_image', 580, 298, true );
add_image_size( 'traning_image', 582, 508, true );
add_image_size( 'projecta_image', 580, 298, true );


/************slider post**************/
add_action( 'init', 'Slider_init' );
function Slider_init() {
	$labels = array(
		'name'               => _x( 'Sliders', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Sliders', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Sliders', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Sliders', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Sliders', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Sliders', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Sliders', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Sliders', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Sliders', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Sliders', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Sliders', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Sliders:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Sliders found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Sliders found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'Slider_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'Slider', $args );
}

add_action( 'init', 'Slider_init' );

function my_taxonomies_slider() {
$labels = array(
  'name' =>  'Slider Categories',
'add_new_item' => 'Add New Slide category',
'search_items' => 'Search Slides Categories',
'edit_item' => 'Edit Slide Category',
  'menu_name' =>  'Slider Categories'
);
$args = array(
  'labels' => $labels,
  'hierarchical' => true,
  'show_admin_column' => true,
);
register_taxonomy( 'slider_category', 'slider', $args );
}
add_action( 'init', 'my_taxonomies_slider');
/************Logo slider post**************/
add_action( 'init', 'logo_init' );
function logo_init() {
	$labels = array(
		'name'               => _x( 'Logo images', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Logo image', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Logo Images', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Logo image', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Logo image', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Logo image', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Logo image', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Logo image', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Logo image', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Logo image', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Logo image', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Logo image:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Logo images found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Logo images found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'logo slider' ),
		'logo_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'logo', $args );
}

// sreach
function filter_search($query) {
    if ($query->is_search) {
    $query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');

//end

/*********************************** Our project******************************/
add_action( 'init', 'project_init' );
function project_init() {
	$labels = array(
		'name'               => _x( 'Our Project', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Our Project', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Our Projects', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Our Project', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Our Project', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Our Project', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Our Project', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Our Project', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Our Project', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Our Projects', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Our Projects', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Our Project:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Our Project found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Our Project found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'project_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'project', $args );
}

/************our staff post**************/
add_action( 'init', 'staff_init' );
function staff_init() {
	$labels = array(
		'name'               => _x( 'Our staff', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Our staff', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Our Staff', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Our staff', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Our staff', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Our staff', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Our staff', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Our staff', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Our staff', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Our staff', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Our staff', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Our staff:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Our staff found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Our staff found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'staff' ),
		'staff_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'staff', $args );
}

/*********************************** Industries & Sectors******************************/
add_action( 'init', 'industriest_init' );
function industriest_init() {
	$labels = array(
		'name'               => _x( 'Industries & Sectors', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Industries & Sectors', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Industries & Sectors', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Industries & Sectors', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Industries & Sectors', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Industries & Sectors', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Industries & Sectors', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Industries & Sectors', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Industries & Sectors', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Industries & Sectors', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Industries & Sectors', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Industries & Sectors:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Industries & Sectors found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Industries & Sectors found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'industriest' ),
		'industriest_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'industriest', $args );
}

/************Consulting & Advisory post**************/
add_action( 'init', 'consulting_advisory_init' );
function consulting_advisory_init() {
	$labels = array(
		'name'               => _x( 'Consulting & Advisory', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Consulting & Advisory', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Consulting & Advisory', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Consulting & Advisory', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Consulting & Advisory', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Consulting & Advisory', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Consulting & Advisory', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Consulting & Advisory', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Consulting & Advisory', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Consulting & Advisory', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Consulting & Advisory', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Consulting & Advisory:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Consulting & Advisory found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Consulting & Advisory found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'consulting_advisory' ),
		'consulting_advisory_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'author')
	);

	register_post_type( 'consulting_advisory', $args );
}

add_action( 'init', 'consulting_advisory_init' );

function my_taxonomies_consulting_advisory() {
$labels = array(
  'name' =>  'Consulting & Advisory Categories',
'add_new_item' => 'Add New Consulting & Advisory category',
'search_items' => 'Search Consulting & Advisory Categories',
'edit_item' => 'Edit Consulting & Advisory Category',
  'menu_name' =>  'Consulting & Advisory Categories'
);
$args = array(
  'labels' => $labels,
  'hierarchical' => true,
  'show_admin_column' => true,
);
register_taxonomy( 'consulting_category', 'consulting_advisory', $args );
}
add_action( 'init', 'my_taxonomies_consulting_advisory');

/*********************************** Traning Post******************************/
add_action( 'init', 'training_init' );
function training_init() {
	$labels = array(
		'name'               => _x( 'Training', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Training', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Trainings', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Training', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Training', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Training', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Training', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Training', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Training', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Training', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Training', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Training:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Training found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No ITraining found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'training' ),
		'training_type'    => 'post',
		//'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail')
	);

	register_post_type( 'training', $args );
}
