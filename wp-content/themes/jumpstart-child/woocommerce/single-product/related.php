<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<section class="coffee_attributes">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 text-center coffee_attribute d-none" style="display: none;">
				<img src="<?php the_field('bag_size_image'); ?>" alt="" />
				<h3>Bag Size</h3>
				<h2><?php the_field('bag_size'); ?></h2>
			</div>
			<div class="col-sm-4 text-center coffee_attribute">
				<img src="<?php the_field('flavor_notes_image'); ?>" alt="" />
				<h3>Flavor Notes</h3>
				<h2><?php the_field('tasting_summary'); ?></h2>
				<p><?php the_field('flavor_notes'); ?></p>
			</div>
			<div class="col-sm-4 text-center coffee_attribute">
				<img src="<?php the_field('tasting_summary_image'); ?>" alt="" />
				<h3>Roast Level</h3>
				<h2><?php $field = get_field('roast_level');
					echo $field['label']; ?></h2>
				<p></p>
			</div>
			<div class="col-sm-4 text-center coffee_attribute">
				<img src="<?php the_field('kick_it_up_image'); ?>" alt="" />
				<h3>Kick It Up a Notch With</h3>
				<h2><?php the_field('kick_it_up_with'); ?></h2>
				<p><a href="<?php the_field('kick_it_up_link'); ?>">Learn how</a></p>
			</div>
		</div>
	</div>
</section>

<section class="coffee_nerd_attributes nerd_stuff row-full">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 origin-country">
				<img src="<?php the_field('origin_country_image'); ?>" alt="" />
			</div>
			<div class="col-sm-8 origin-details">
				<h2>The Details</h2>
				<dl>
				  <dt>Region</dt>
				  <dd><?php the_field('region'); ?></dd>
				  <dt>Varietal</dt>
				  <dd><?php the_field('varietal'); ?></dd>
				  <dt>Altitude</dt>
				  <dd><?php the_field('altitude'); ?></dd>
				  <dt>Process</dt>
				  <dd><?php the_field('process'); ?></dd>
				  <dt>Importer's notes</dt>
				  <dd><?php the_field('importers_notes'); ?></dd>
				</dl>
			</div>
		</div>
	</div>
</section>

<?php
if ( $related_products ) : ?>

	<section class="related products">

		<h2 class="related_coffees"><?php esc_html_e( 'More good coffee', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
