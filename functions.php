<?php
/**
 * Enqueue Parent stylesheet
 *
 */

add_action( 'wp_enqueue_scripts', 'techprepcc_enqueue_styles' );
function techprepcc_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/**
 * Hide default credit text (sorry!)
 */
function techprepcc_credits_text( $text ) {
	return false;
}

add_filter( 'tinyframework_credits_text', 'techprepcc_credits_text' );


/**
 * Add search (example from default child theme)
 *
 */
function techprepcc_add_search_to_wp_menu ( $items, $args ) {
	if( 'primary' === $args -> theme_location ) {
	$items .= '<li class="menu-item menu-item-search">' . get_search_form(false) . '</li>';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items','techprepcc_add_search_to_wp_menu',10,2 );


/* Enable shortcodes in widget text */
add_filter('widget_text', 'do_shortcode');
