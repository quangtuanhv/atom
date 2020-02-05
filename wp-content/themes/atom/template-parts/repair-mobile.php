<?php
/*
 Template Name: Sub-Categories-mobile
 */
?>
<?php get_header(); ?>
 
<div id="repair">

<div class="container text-center mt-5">
<section class=" mt-5">
  <div class="row py-5">
    <h3 class="text-center col-md-12">
      <?php if (isset($_GET['id'])): ?>
      <span>Sélectionnez le modèle de l'appareil à réparer</span>
      <?php elseif (isset($_GET['device'])): ?>
      <span>Sélectionnez la marque de l'appareil que vous souhaitez réparer</span>
      <?php elseif (isset($_GET['productId'])): ?>
      <span>Sélectionnez la réparation </span>
      <?php endif ?>
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

    <?php 
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $taxonomies = get_terms( array(
          'taxonomy' => 'product_cat',
        ) );
        $trademarks = get_terms('product_cat',array('parent' => $id));
        foreach ($trademarks as $trademark) : ?>
          <div class="col-xs-12 col-md-4 col-lg-3">
            <div class="product">
            <a href="<?php echo get_site_url().'/repair/mobile?device='.$trademark->term_id ?>">
              <div class="picture-container">
                <img class="card-img" alt="Alcatel" src="<?php
                  echo wp_get_attachment_url( get_woocommerce_term_meta( $trademark->term_taxonomy_id, 'thumbnail_id', true ) )
                ?>">
              </div>
              <div class="card-block">
                <p class="card-text text-center ng-binding"><?php echo $trademark->name ?></p>
              </div>
            </a>
            </div>
          </div>
        <?php endforeach;
      } elseif (isset($_GET['device'])) {
        $id = $_GET['device'];
        $taxonomies = get_terms( array(
          'taxonomy' => 'product_cat',
        ) );
        $trademarks = get_terms('product_cat',array('parent' => $id));
        foreach ($trademarks as $trademark) : ?>
          <div class="col-xs-12 col-md-4 col-lg-3">
            <div class="product">
            <a href="<?php echo get_site_url().'/repair/mobile?productId='.$trademark->term_id ?>">
              <div class="picture-container">
                <img class="card-img" alt="Alcatel" src="<?php
                  echo wp_get_attachment_url( get_woocommerce_term_meta( $trademark->term_taxonomy_id, 'thumbnail_id', true ) )
                ?>">
              </div>
              <div class="card-block">
                <p class="card-text text-center ng-binding"><?php echo $trademark->name ?></p>
              </div>
            </a>
            </div>
          </div>
        <?php endforeach;
      } elseif (isset($_GET['productId'])) {

        $id = $_GET['productId'];
        $products = new WP_Query( array(
          'post_type'   => 'product',
          'posts_per_page' => '-1',
          'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'terms' => $id,
                'operator' => 'IN',
            )
        )
  
      ) );
        $args = array(
          'post_type'             => 'product',
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => 1,
          'posts_per_page'        => '12',
          'tax_query'             => array(
               array(
                   'taxonomy'  => 'product_cat',
                   'field'     => 'term_id',
                   'terms'     => array($id),
                   'operator'  => 'IN',
               )
          )
       );
       
       $trademarks = new WP_Query( $args );
      //  echo '<pre>';
      //  print_r($products->posts);
      //  echo '</pre>';

        foreach ($products->posts as $trademark) : ?>
          <div class="col-xs-12 col-md-4 col-lg-3">
            <div class="product">
            <a href="<?php echo $trademark->guid ?>">
              <div class="picture-container">
                <img class="card-img" alt="Alcatel" src="<?php
                  echo get_the_post_thumbnail_url($trademark->ID);
                ?>">
              </div>
              <div class="card-block">
                <p class="card-text text-center ng-binding"><?php echo $trademark->post_title ?></p>
              </div>
            </a>
            </div>
          </div>
        <?php endforeach;

      } else {
        //Handle the case where there is no parameter
      }
    ?>
  </div>

</section>

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