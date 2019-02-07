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



// default ship to diff address value
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'set_input_attrs' );

// Our hooked in function - $fields is passed via the filter!
function set_input_attrs( $fields ) {
       $fields['billing']['billing_email']['type'] = 'email';
       $fields['billing']['billing_phone']['type'] = 'tel';
       $fields['billing']['billing_postcode']['type'] = 'tel';
       $fields['shipping']['shipping_postcode']['type'] = 'tel';

       return $fields;
}


/**
 * Register our sidebars and widgetized areas.
 *
 */
function shop_widgets_init() {

	register_sidebar( array(
		'name'          => 'Shop top widget area',
		'id'            => 'shop_top_widget',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action('widgets_init', 'shop_widgets_init' );

//add_action( 'themeblvd_content_top', 'archive_description' );

function archive_description() {
	echo "
	<div class=\"button-group filter-button-group\">
	  <button data-filter=\"*\">all</button>
	  <button data-filter=\".product_cat-light-roast\">light</button>
	  <button data-filter=\".product_cat-medium-roast\">medium</button>
	  <button data-filter=\".product_cat-dark-roast\">dark</button>
	</div>";
}

function register_foundation_style() {
  if ( is_page( 'cart' ) ) {
    //wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.min.css' );
    //wp_deregister_script('smntcs');
    wp_deregister_style('smntcs');
    //wp_deregister_script( 'custom' );
    //wp_deregister_script( 'smntcs-woocommerce-quantity-buttons' );
  }
}
add_action( 'wp_enqueue_scripts', 'register_foundation_style' );
