<?php
/**
 * Single-Product Subscription Options Template.
 *
 * Override this template by copying it to 'yourtheme/woocommerce/single-product/product-subscription-options.php'.
 *
 * On occasion, this template file may need to be updated and you (the theme developer) will need to copy the new files to your theme to maintain compatibility.
 * We try to do this as little as possible, but it does happen.
 * When this occurs the version of the template file will be bumped and the readme will list any important changes.
 *
 * @version 2.1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="wcsatt-options-wrapper " <?php echo count( $options ) === 1 ? 'style="display:none;"' : '' ?>>
	<div class="switch-title">Subscription</div>
	<div class="switch-field">
	<?php
	$switch = 1;

	if ( $prompt ) {
		echo $prompt;
	} else {
		?>
		
		<?php
	}

	foreach ( $options as $option ) {
			?><input type="radio" name="convert_to_sub_<?php echo absint( $product_id ); ?>" id="switch_product_<?php echo absint( $switch ); ?>" data-custom_data="<?php echo esc_attr( json_encode( $option[ 'data' ] ) ); ?>" value="<?php echo esc_attr( $option[ 'value' ] ); ?>" <?php checked( $option[ 'selected' ], true, true ); ?> />
				<label for="switch_product_<?php echo absint( $switch ); ?>">
					<?php echo $option[ 'description' ]; ?>
				</label>
			<?php
			$switch++;
		}

	?>
	</div>
</div>
