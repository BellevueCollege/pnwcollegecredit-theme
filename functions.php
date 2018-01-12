<?php
/**
 * Enqueue Parent stylesheet
 *
 */

add_action( 'wp_enqueue_scripts', 'pnwcollegecredit_enqueue_styles' );
function pnwcollegecredit_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Hide default credit text (sorry!)
 */
function pnwcollegecredit_credits_text( $text ) {
	return false;
}

add_filter( 'tinyframework_credits_text', 'pnwcollegecredit_credits_text' );


/**
 * Add search (example from default child theme)
 *
 */
function pnwcollegecredit_add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
	$items .= '<li class="menu-item menu-item-search">' . get_search_form(false) . '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','pnwcollegecredit_add_search_to_wp_menu',10,2 );


/* Enable shortcodes in widget text */
add_filter('widget_text', 'do_shortcode');

								/*** Wide site ***/
// 3.10 - Tip07 - Add new image size for custom post/page headers and select default header image.
add_image_size( 'custom-header-image', 1120, 9999 ); // Unlimited height, soft crop

if ( ! function_exists( 'tinyframework_mod_content_width' ) ) :
/* Adjust content width in certain contexts.
 *
 * Adjust content_width value for full-width and single image attachment templates, and when there are no active widgets in the sidebar.
 *
 * template_redirect fires a lot later than after_setup_theme so that will still change the variable as usual.
 */
function tinyframework_mod_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		$GLOBALS['content_width'] = 1120;
	}
}
endif;
add_action( 'template_redirect', 'tinyframework_mod_content_width' );

/**
* Move Header Image Css 
*/

function pnwcollegecredit_header() {
	wp_enqueue_style(
		'custom_style',
		 get_stylesheet_directory_uri() . "/style.css",
		 array(),
		 '1.0.0',
		 'all'
	);
	$image_directory = get_header_image();
	$custom_css = "
		#masthead {	
			background-image: url($image_directory);
			background-repeat: no-repeat;
    		background-position: center;
			width:100%;
			background-size: cover;
		}";

	wp_add_inline_style('custom_style', $custom_css);
}

add_action('wp_enqueue_scripts', 'pnwcollegecredit_header');