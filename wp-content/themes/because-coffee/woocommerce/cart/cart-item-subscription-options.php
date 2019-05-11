<?php
/**
 * Cart Item Subscription Options Template.
 *
 * Override this template by copying it to 'yourtheme/woocommerce/cart/cart-item-subscription-options.php'.
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
$switch = 1;
?>
<div class="wcsatt-options-wrapper " <?php echo count( $options ) === 1 ? 'style="display:none;"' : '' ?>>
	<div class="switch-field">
	<?php
	

	foreach ( $options as $option ) {
			?><input type="radio" name="cart[<?php echo $cart_item_key; ?>][convert_to_sub]" id="switch_product_<?php echo $cart_item_key.$switch; ?>" value="<?php echo esc_attr( $option[ 'value' ] ); ?>" <?php checked( $option[ 'selected' ], true, true ); ?> />
			<label for="switch_product_<?php echo $cart_item_key.$switch; ?>">
					<?php echo $option[ 'description' ]; ?>
			</label>
			<?php
			$switch++;
		}

	?>
	</div>
</div>
