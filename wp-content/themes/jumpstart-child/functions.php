<?php
/*-------------------------------------------------------*/
/* Run Theme Blvd framework (required)
/*-------------------------------------------------------*/

require_once( get_template_directory() . '/framework/themeblvd.php' );

/*-------------------------------------------------------*/
/* Start Child Theme
/*-------------------------------------------------------*/

/**
 * Maintain options ID for saved options from parent
 * theme. (optional)
 *
 * This allows you to switch between parent and child theme,
 * with your theme options remaining saved to the same value
 * in your WordPress database.
 */
function jumpstart_option_id( $id ) {
    return 'jumpstart';
}
add_filter('themeblvd_option_id', 'jumpstart_option_id');

// enqueue scripts
function custom_scripts() {
	wp_register_script('brew', get_stylesheet_directory_uri() . '/js/brew.js', array('jquery'),'1.1', true);
	wp_enqueue_script('brew');
}
add_action('wp_enqueue_scripts', 'custom_scripts'); 
