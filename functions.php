<?php
/**
 * Phantom Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Phantom_Lite
 */

if ( ! function_exists( 'phantomlite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function phantomlite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Phantom Lite, use a find and replace
	 * to change 'phantomlite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'phantomlite', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'phantomlite' ),
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
	 * Set Up Custom Logo
	 */
	add_theme_support( 'custom-logo', array(
	  'height'      => 50,
	  'flex-height' => true,
	  'flex-width'  => true,  
	 ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'phantomlite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style();

}
endif;
add_action( 'after_setup_theme', 'phantomlite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phantomlite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'phantomlite_content_width', 640 );
}
add_action( 'after_setup_theme', 'phantomlite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phantomlite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'phantomlite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'phantomlite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer', 'phantomlite' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'phantomlite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer', 'phantomlite' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'phantomlite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer', 'phantomlite' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'phantomlite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'phantomlite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function phantomlite_scripts() {
	wp_enqueue_style( 'phantomlite-bootstrap', get_template_directory_uri().'/css/bootstrap.css' );	
	wp_enqueue_style( 'phantomlite-fontawesome', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'phantomlite-owl', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'phantomlite-animate', get_template_directory_uri().'/css/animate.min.css' );
	$query_args = array('family' => 'Droid+Serif|PT+Sans');
	wp_register_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'google-fonts' );
	wp_enqueue_style( 'phantomlite-style', get_stylesheet_uri() );

	if(is_rtl()) {
		wp_enqueue_style( 'phantomlite-rtl', get_template_directory_uri().'/css/rtl.css' );
		wp_enqueue_style( 'phantomlite-css-rtl', get_template_directory_uri().'/css/bootstrap-rtl.css' );
		wp_enqueue_script( 'phantomlite-js-rtl', get_template_directory_uri() . '/js/bootstrap.rtl.js', array(), '1.0.0', true );
	}

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'phantomlite-owl', get_template_directory_uri() . '/js/owl.carousel.js', array(), '1.0.0', true );
	wp_enqueue_script( 'phantomlite-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', true );
	wp_enqueue_script( 'phantomlite-scrollreveal', get_template_directory_uri() . '/js/wow.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'phantomlite-scripts', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );


	wp_enqueue_script( 'phantomlite-js', get_template_directory_uri() . '/js/phantom.js', array(), '20160726', true );
	
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'phantomlite_scripts' );



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

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**  
 * Load TGM plugin 
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';


 /* Recommended plugin using TGM */
add_action( 'tgmpa_register', 'phantomlite_register_plugins');
if( !function_exists('phantomlite_register_plugins') ) {
	function phantomlite_register_plugins() {
       /**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
 			array(
				'name'     => 'One Click Demo Import', // The plugin name.
				'slug'     => 'one-click-demo-import', // The plugin slug (typically the folder name).
				'required' => false, // If false, the plugin is only 'recommended' instead of required.
			),
			array(
				'name'               => 'Contact Form 7', // The plugin name.
				'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			),
		);
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tgmpa',
			// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',
			// Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins',
			// Menu slug.
			'parent_slug'  => 'themes.php',
			// Parent menu slug.
			'capability'   => 'edit_theme_options',
			// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,
			// Show admin notices or not.
			'dismissable'  => true,
			// If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',
			// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,
			// Automatically activate plugins after installation or not.
			'message'      => '',
			// Message to output right before the plugins table.
		);
 		tgmpa( $plugins, $config );
	}
}


/* PhantomLite Demo importer */
add_filter( 'pt-ocdi/import_files', 'phantomlite_import_demo_data' );
if ( ! function_exists( 'phantomlite_import_demo_data' ) ) {
	function phantomlite_import_demo_data() {
	  return array(
	    array(   
			'import_file_name'             => __('Default Demo','phantomlite'),
			'categories'                   => array( 'Default', 'Blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/default/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/default/widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/default/customizer.dat',
			'import_preview_image_url'     => 'https://phantomthemes.com/demo/phantomlite/wp-content/themes/phantomlite/screenshot.png',
			'preview_url'                  => 'https://phantomthemes.com/view?theme=PhantomLite',
		),
	  ); 
	}
}
 add_action( 'pt-ocdi/after_import', 'phantomlite_after_import' );
if ( ! function_exists( 'phantomlite_after_import' ) ) {
	function phantomlite_after_import( $selected_import ) { 
		$importer_name  = __('Default Demo','phantomlite');
	 
	    if ( $importer_name === $selected_import['import_file_name'] ) {

	        //Set Menu
			$top_menu = get_term_by('name', 'Primary Menu', 'nav_menu'); 
	        set_theme_mod( 'nav_menu_locations' , array( 				  
				'primary' => $top_menu->term_id,			
	             ) 
			);
			
			//Set Front page
		    if( get_option('page_on_front') === '0' && get_option('page_for_posts') === '0' ) {
				$page = get_page_by_title( 'Home');
				$blog = get_page_by_title( 'Blog');
				if ( isset( $page->ID ) ) {
						update_option( 'show_on_front', 'page' );
					 update_option( 'page_on_front', $page->ID );
					 update_option('page_for_posts', $blog->ID);
				}
			 }
	    }
	     
	}
}
 add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );