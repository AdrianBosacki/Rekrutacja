<?php
/**
 * AdrianBosacki functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AdrianBosacki
 */


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
	   


if ( ! function_exists( 'adrianbosacki_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adrianbosacki_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AdrianBosacki, use a find and replace
		 * to change 'adrianbosacki' to the name of your theme in all the template files.
		 */
		//load_theme_textdomain( 'adrianbosacki', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		//add_theme_support( 'automatic-feed-links' );

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
		add_image_size( 'header_top', 1040, 546, true ); 
		add_image_size( 'main_list', 434, 297, true ); 		
		add_image_size( 'see_also', 284, 174, true ); 
		
		

		// This theme uses wp_nav_menu() in one location.
		/*register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'adrianbosacki' ),
		) );
*/
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
		/*add_theme_support( 'custom-background', apply_filters( 'adrianbosacki_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
*/
		// Add theme support for selective refresh for widgets.
		//add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );*/
	}
endif;
add_action( 'after_setup_theme', 'adrianbosacki_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
/*function adrianbosacki_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'adrianbosacki_content_width', 640 );
}
add_action( 'after_setup_theme', 'adrianbosacki_content_width', 0 );
*/
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

function adrianbosacki_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adrianbosacki' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adrianbosacki' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adrianbosacki_widgets_init' );
*/




/**
 * Dodaj styl css do headera. Aby wyeliminować blokujące renderowanie zapytanie do arkusza stylu, jest on dodawany w tagach <style></style>
 */
function criticalCSS_wp_head() {
	
	echo '<style>';
	echo file_get_contents( get_template_directory_uri() . '/sass/style.min.css' );
	//include get_template_directory_uri() . '/sass/style.css';
	echo '</style>';    
  
  
}
add_action( 'wp_head', 'criticalCSS_wp_head' );




/**
 * Usuwa blokujący CSS
 */

function remove_block_css(){
	wp_dequeue_style( 'wp-block-library' );
	}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );








/**
 * Enqueue scripts and styles.
 */



function adrianbosacki_scripts() {
	//wp_enqueue_style( 'adrianbosacki-style', get_stylesheet_uri() );

	// !!!  wp_enqueue_style( 'style', get_template_directory_uri() . '/sass/style.css' );

	//wp_enqueue_script( 'adrianbosacki-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'adrianbosacki-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', 'adrianbosacki_scripts' );

/**
 * Implement the Custom Header feature.

require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.

require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
*/








/**
 * Disable the emoji's Usuwa emojis, aby przyspieszyć stronę
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
   function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
   }
   
   /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
   }
