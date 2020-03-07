<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="wrap-button-a d-flex justify-content-center">
<?php
echo apply_filters( 'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf( '<a href="%s" class="btn-success info-button btn px-3">%s</a>',
		esc_url( get_permalink( $product->get_id() ) ),
		'<i class="fas fa-shopping-cart"></i> &nbsp; afficher'
	),
$product, $args );
?>
<!-- <a class="btn btn-success info-button" href="<?php #the_permalink($product->id) ?>">+d'infos</a> -->
</div>