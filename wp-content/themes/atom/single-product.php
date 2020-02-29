<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' );

global $wp;

$product = get_page_by_path( $wp->query_vars['product'], OBJECT, 'product' );
$_product = wc_get_product( $product->ID );

?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->ID ), 'single-post-thumbnail' );?>
<div class="container mt-detail-pro">

<div class="row service-container">
      <div class="col-xs-12 col-md-10 col-lg-8 product">
        <!-- <div class="arrow-back" ng-click="$ctrl.back()">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
          <span>Retour</span>
        </div> -->
        <div class="col-xs-12">
          <img  class="image_product" alt="" src="<?php echo $image[0]; ?>">
          
          <figcaption class="ng-binding"><?php echo $product->post_title ?></figcaption>
          <h3 class="ng-binding"><?php echo get_the_category_by_id( $_product->category_ids[0] ); ?></h3>
        </div>
        <hr>
        <div class="col-xs-12 product-description text-left">
          <!-- description -->
          <?php echo $product->post_content ?>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 col-lg-3 product-price">
        <p>Prix de la réparation</p>
        <h3 class="ng-binding"><?php echo $_product->price; ?> XPF</h3>
        <hr>
        <p>
          <span>
          <span><img src="<?php echo get_template_directory_uri() . '/img/settings-tools.png' ?>" alt=""></span>
          <span><img src="<?php echo get_template_directory_uri() . '/img/runer.png' ?>" alt=""></span>
          </span>
        </p>
        <!-- <p>
          <a ui-sref="app.payment({id:$ctrl.product._id})" class="btn-default">Payer</a>
        </p> -->
      </div>

  </div>
<div class="row my-5 pt-5">
<div class="col-md-4 text-center">
<img src="<?php echo get_template_directory_uri() . '/img/speed-thunderbolt.png'?>" class="img-responsive">
<p>Service <br> Rapide</p>
</div>
<div class="col-md-4 text-center">
<img src="<?php echo get_template_directory_uri() . '/img/quality-price.png'?>" class="img-responsive">
<p>Meilleur <br> Qualité/prix</p>
</div>
<div class="col-md-4 text-center">
<img src="<?php echo get_template_directory_uri() . '/img/certified.png'?>" class="img-responsive">
<p>Réparateurs <br>Certifiés</p>
</div>
</div>
</div>


<?php get_footer( 'shop' );
