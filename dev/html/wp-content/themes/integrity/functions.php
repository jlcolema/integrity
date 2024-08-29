<?php


	/*-------------------------------------------
		Theme Setup
	-------------------------------------------*/

	// Sets up theme defaults and registers support for various WordPress features.


	if ( ! function_exists( 'bloom_setup' ) ) :

		function bloom_setup() {

			// Make theme available for translation.

			load_theme_textdomain( 'bloom', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.

			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.

			// add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.

			// add_theme_support( 'post-thumbnails' );

			// set_post_thumbnail_size( 825, 510, true );

			// This theme use wp_nav_menu() in two locations.

			register_nav_menus( array(

				'primary'	=> __( 'Primary Menu', 'bloom' ),
				'secondary'	=> __( 'Secondary Menu', 'bloom' )

			) );

			// Switch default core markup for search form, comment form and comments to ouput valid HTML5.

			add_theme_support( 'html5', array(

				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

			) );

			// Enable support for Post Formats.

			// add_theme_support( 'post-formats', array(

				// 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'

			// ) );

			// This theme styles the visual editor to resemble the theme style.

			// add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', bloom_fonts_url() ) );

		}

	endif;

	add_action( 'after_setup_theme', 'bloom_setup' );


	/*-------------------------------------------
		Register Widget Area
	-------------------------------------------*/

	// Notes...


	function bloom_widgets_init() {

		register_sidebar( array(

			'name'			=> __( 'Widget Area', 'bloom'),
			'id'			=> 'sidebar-1',
			'description'	=> __( 'Add widgets here to appear in your sidebar.', 'bloom'),
			'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h2 class="widget-title">',
			'after_title'	=> '</h2>'

		) );

	}

	add_action( 'widgets_init', 'bloom_widgets_init' );


	/*-------------------------------------------
		JavaScript Detection
	-------------------------------------------*/

	// Adds a `enhanced` class to the root `<html>` element when JavaScript is detected.


	// function bloom_javascript_detection() {

		// echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'enhanced')})(document.documentElement);</script>\n";

	// }

	// add_action( 'wp_head', 'bloom_javascript_detection', 0 );


	/*-------------------------------------------
		Title
	-------------------------------------------*/

	// Notes...


	/*-------------------------------------------
		Enqueue Styles
	-------------------------------------------*/

	// Notes...


	function bloom_styles() {

		// Add custom fonts, use in the main stylesheet.

		// wp_enqueue_style( 'bloom-fonts', bloom_fonts_url(), array(), null );

		// Add Genericons, used in the main stylesheet.

		// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

		// Load our main stylesheet.

		// wp_enqueue_style( 'bloom-style', get_stylesheet_uri() );

		// Load the Internet Explorer specific stylesheet.

		// wp_enqueue_style( 'bloom-ie', get_template_directory_uri() . '/css/ie.css', array( 'bloom-style' ), '20141010' );

		// wp_style_add_data( 'bloom-ie', 'conditional', 'lt IE 9' );

		// Load the Internet Explorer 7 specific stylesheet.

		// wp_enqueue_style( 'bloom-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'bloom-style' ), '20141010' );

		// wp_style_add_data( 'bloom-ie7', 'conditional', 'lt IE 8' );

	}

	add_action( 'wp_enqueue_scripts', 'bloom_styles' );


	/*-------------------------------------------
		Enqueue Styles
	-------------------------------------------*/

	// Notes...


	function bloom_scripts() {

		// Title

		// wp_deregister_script( 'jquery' );

		// wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, null, true );

		// wp_enqueue_script( 'jquery' );

		// Title...

		// wp_enqueue_script( 'bloom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

		// Title...

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );

		}

		// Title...

		// if ( is_singular() && wp_attachment_is_image() ) {

			// wp_enqueue_script( 'bloom-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );

		// }

		// Title...

		wp_enqueue_script( 'bloom-script', get_template_directory_uri() . '/a/js/scripts.js', array( 'jquery' ), '20150330', true );

		// Title...

		// wp_localize_script( 'bloom-script', 'screenReaderText', array(

			// 'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'bloom' ) . '</span>',

			// 'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'bloom' ) . '</span>',

		// ) );

	}

	add_action( 'wp_enqueue_scripts', 'bloom_scripts' );


	/*-------------------------------------------
		Clean Up the `<head>`
	-------------------------------------------*/

	// Notes...


	function bloom_remove() {

		// WordPress version.

		remove_action( 'wp_head', 'wp_generator' );

		// Really Simple Discovery.

		remove_action( 'wp_head', 'rsd_link' );

		// WL Manifest Link

		remove_action( 'wp_head', 'wlwmanifest_link' );

		// Shortlink

		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		// Prev / Next

		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

		// Canonical

		remove_action( 'wp_head', 'rel_canonical' );

		// Title

		remove_action( 'wp_head', 'feed_links', 2 );

		// Title

		remove_action( 'wp_head', 'feed_links_extra', 3 );

	}

	add_action( 'init', 'bloom_remove' );


	/*-------------------------------------------
		Add Page ID to `<body>`
	-------------------------------------------*/

	// Notes...


	function get_body_id( $id = '' ) {

		global $wp_query;

		// Fallbacks

		if ( is_front_page() ) $id = 'home';

		if ( is_home() ) $id = 'home';

		if ( is_search() ) $id = 'search';

		// If it's an Archive Page

		if ( is_archive() ) {

			if ( is_author() ) {

				$author = $wp_query->get_queried_object();

				$id = 'archive-author-' . sanitize_html_class( $author->user_nicename, $author->ID );

			} elseif ( is_category() ) {

				$cat = $wp_query->get_queried_object();

				$id = 'archive-category-' . sanitize_html_class( $cat->slug, $cat->cat_ID );

			} elseif ( is_date() ) {

				if ( is_day() ) {

					$date = get_the_time( 'F jS Y' );

					$id = 'archive-day-' . str_replace( ' ', '-', strtolower( $date ) );

				} elseif ( is_month() ) {

					$date = get_the_time( 'F Y' );

					$id = 'date-' . str_replace( ' ', '-', strtolower( $date ) );

				} elseif ( is_year() ) {

					$date = get_the_time( 'Y' );

					$id = 'date-' . strtolower( $date );

				} else {

					$id = 'archive-date';

				}

			} elseif ( is_tag() ) {

				$tags = $wp_query->get_queried_object();

				$id = 'archive-tag-' . sanitize_html_class( $tags->slug, $tags->term_id );

			} else {

				$id = 'archive';

			}

		}

		// If it's a Page

		if ( is_page() ) {

			$id = $wp_query->queried_object->post_name;

			if ( '' == $id ) {

				$id = 'page';

			}

		}

		// If it's the Blog Landing Page

		if ( ! is_page() ) {

			$id = 'blog';

		}

		// If it's a Single Post

		if ( is_single() ) {

			if ( is_attachment() ) {

				$id = 'attachment';

			} else {

				$id = 'single-post';

			}

		}

		// If it's an Error Page

		if ( is_404() ) {

			$id = 'error';

		}

		// If $id still doesn't have a value, attempt to assign it the Page's name

		if ( '' == $id ) {

			$id = $wp_query->queried_object->post_name;

		}

		$id = preg_replace( '#\s+#', ' ', $id );

		$id = str_replace( ' ', '-', strtolower( $id ) );

		// Let other plugins modify the function

		return apply_filters( 'body_id', $id );

	}

	function body_id( $id = '' ) {

		if ( '' == $id ) {

			$id = get_body_id();

		}

		$id = preg_replace( '#\s+#', ' ', $id );

		$id = str_replace( ' ', '-', strtolower( $id ) );

		echo ( '' != $id ) ? 'id="'.$id. '"': '' ;

	}


	/*-------------------------------------------
		Globals
	-------------------------------------------*/

	// Notes...


	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page( array(

			// 'page_title'	=> 'Theme General Settings',
			'menu_title'	=> 'Globals',
			'menu_slug'		=> 'globals'
			// 'capability'	=> 'edit_posts',
			// 'redirect'		=> false

		) );

		acf_add_options_sub_page( array(

			'page_title' 	=> 'Contact Information',
			'menu_title'	=> 'Contact Information',
			'parent_slug'	=> 'globals'

		) );

		acf_add_options_sub_page( array(

			'page_title' 	=> 'Division',
			'menu_title'	=> 'Division',
			'parent_slug'	=> 'globals'

		) );

	}

?>