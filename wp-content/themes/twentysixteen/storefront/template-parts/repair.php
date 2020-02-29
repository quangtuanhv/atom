<?php
/*
 Template Name: Repair
 */
?>
<?php get_header(); ?>
 
<div id="repair">

<div class="container text-center mt-5">
<section class=" mt-5">
  <div class="row py-5">
    <h3 class="text-center col-md-12">
      <span>Quel type d'appareil souhaitez-vous réparer ?</span>
    </h3>
    <!-- Search form -->
        <div class="md-form mt-0 col-md-6 my-3 ml-auto mr-auto">
          <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
          <?php endif; ?>
                <!-- <input class="form-control" type="text" placeholder="Faites directement une recherche" aria-label="Search"> -->
        </div>
  </div>
  <div class="row text-center ng-scope">
      <div class="col-md-3 offset-md-3">
        <a class="product"  href="<?php echo get_site_url().'/repair/mobile?id=18'?>">
          <img class="img-responsive" alt="Card image cap" src="<?php echo get_template_directory_uri() . '/img/smartphone.svg'?>">
          <div class="card-block">
            <h3 class="card-text text-center mt-3">Smartphone</h3>
          </div>
        </a>
      </div>
      <div class="col-md-3 ">
        <a class="product"  href="<?php echo get_site_url().'/repair/mobile?id=19'?>">
          <img class="img-responsive" alt="Card image cap" src="<?php echo get_template_directory_uri() . '/img/ipad.svg'?>">
          <div class="card-block">
            <h3 class="card-text text-center mt-3">Tablette</h3>
          </div>
        </a>
      </div>
  </div>

</section>
<?php
// $taxonomies = get_terms( array(
//   'taxonomy' => 'product_cat',
// ) );
// $termchildren = get_terms('product_cat',array('parent' => 18));
// $thumbnail_id = get_woocommerce_term_meta( 20, 'thumbnail_id', true );
// $image = wp_get_attachment_url( $thumbnail_id );
// var_dump($image);
// echo '<br>';
// print_r($termchildren);

?>
<div class="row my-5 pt-5">
<div class="col-md-4">
<img src="<?php echo get_template_directory_uri() . '/img/speed-thunderbolt.png'?>" class="img-responsive">
<p>Service <br> Rapide</p>
</div>
<div class="col-md-4">
<img src="<?php echo get_template_directory_uri() . '/img/quality-price.png'?>" class="img-responsive">
<p>Meilleur <br> Qualité/prix</p>
</div>
<div class="col-md-4">
<img src="<?php echo get_template_directory_uri() . '/img/certified.png'?>" class="img-responsive">
<p>Réparateurs <br>Certifiés</p>
</div>
</div>
</div>
</div>
 
<?php get_footer(); ?>