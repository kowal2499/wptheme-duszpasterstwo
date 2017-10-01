<?php
/**
 * UKSW-szablon functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UKSW-szablon
 */

if ( ! function_exists( 'uksw_szablon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uksw_szablon_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on UKSW-szablon, use a find and replace
	 * to change 'uksw-szablon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uksw-szablon', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'uksw-szablon' ),
		'secondary' => esc_html__( 'Secondary', 'uksw-szablon' ),
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
	add_theme_support( 'custom-background', apply_filters( 'uksw_szablon_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'uksw_szablon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uksw_szablon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uksw_szablon_content_width', 640 );
}
add_action( 'after_setup_theme', 'uksw_szablon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uksw_szablon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uksw-szablon' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'uksw-szablon' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uksw_szablon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function uksw_szablon_scripts() {
	wp_enqueue_style( 'uksw-szablon-style', get_stylesheet_uri() );
	wp_enqueue_style( 'mystyle', get_template_directory_uri() . '/assets/css/mystyle.css', $ver = '1.2' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_script( 'uksw-szablon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'uksw-szablon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ) );
	 // wp_enqueue_script( 'responsive-menu.js', get_template_directory_uri() . '/assets/js/responsive-menu.js', array ( 'jquery' ) );
	wp_enqueue_script( 'rkfacebook', get_template_directory_uri() . '/assets/js/facebook.js');

	wp_enqueue_script( 'rkmain', get_template_directory_uri() . '/assets/js/main.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'uksw_szablon_scripts' );

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



require get_template_directory() . '/template-parts/rk-shortcodes.php';

add_shortcode('rk_menu', 'rk_subpage_menu_func');
add_shortcode('rk_nav', 'rk_page_navigation_buttons');
add_shortcode('rk_abc_header', 'rk_abc_header');



function custom_pagination($numpages = '', $pagerange = '', $paged='') {
	if (empty($pagerange)) {
	$pagerange = 2;
	}
	/**
	* This first part of our function is a fallback
	* for custom pagination inside a regular loop that
	* uses the global $paged and global $wp_query variables.
	* 
	* It's good because we can now override default pagination
	* in our theme, and use this function in default quries
	* and custom queries.
	*/
	global $paged;
	if (empty($paged)) {
	$paged = 1;
	}

	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
		    $numpages = 1;
		}
	}

	$pagination_args = array(
	'base'            => get_pagenum_link(1) . '%_%',
	'format'          => 'page/%#%',
	'total'           => $numpages,
	'current'         => $paged,
	'show_all'        => False,
	'end_size'        => 1,
	'mid_size'        => $pagerange,
	'prev_next'       => True,
	'prev_text'       => __('&laquo;'),
	'next_text'       => __('&raquo;'),
	'type'            => 'plain',
	'add_args'        => false,
	'add_fragment'    => ''
	);

	$paginate_links = paginate_links($pagination_args);
	  
	if ($paginate_links) {
	echo "<div class='pagination-wrapper'>";
	echo "<nav class='custom-pagination text-center'>";
	  // echo "<span class='page-numbers page-num'>Strona " . $paged . " z " . $numpages . "</span> ";
	  echo $paginate_links;
	echo "</nav>";
	echo "</div>";
	}
}

// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// function special_nav_class ($classes, $item) {
//     if (in_array('current-menu-item', $classes) ){
//         $classes[] = 'active ';
//     }
//     return $classes;
// }

function wydarzenia_order($query) {
	$post_types = get_post_types(array('_builtin' => false));
	$post_type = $query->get('post_type');
	if ($post_type == "wydarzenia") {
		$query->set('meta_key', 'start');
		$query->set('orderby','meta_value_num');
		$query->set('order', 'ASC');
	}
		
	return $query;
}

if (is_admin()) {
	add_action('pre_get_posts', 'wydarzenia_order');
}

// add_action('manage_wydarzenia_posts_columns', 'manage_wydarzenia_posts_columns');

// function manage_wydarzenia_posts_columns($post_columns) {
//     $post_columns = array(
//     	'cb' => $post_columns['cb'],
//     	'start' => 'start',
//     	'koniec' => 'koniec',
//     	'thumbnail'	=>	'Thumbnail',
// 		'title' 	=> 'Title',
// 		'featured' 	=> 'Featured',
// 		'author'	=>	'Author',
// 		'date'		=>	'Date',
//         );
//     return $post_columns;
// }
