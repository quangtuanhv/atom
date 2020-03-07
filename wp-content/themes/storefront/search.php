<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area container">
    <div class="row">
      <div class="col-md-6 col-12 ml-auto">
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>        
      </div>
    </div>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						/* translators: %s: search term */
						printf( esc_attr__( 'Search Results for: %s', 'storefront' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
      <div class="row">

			<?php
			while ( have_posts() ) :
        the_post();
    ?>
    		<article class="col-md-4 col-sm-6 col-12">
          <div class="wrap-entity">
            <?php if(is_product()): ?>
            <?php endif ?>
          <?php if ( has_post_thumbnail()) :  ?>
              <div class="item-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="nofollow">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
            <?php endif; ?>
            <div class="hk-contents">
                <?php
                the_title( sprintf( '<h4><a href="%s" rel="nofollow">', esc_url( get_permalink() ) ), '</a></h4>' );
                global $product;
                ?>

                <?php if ( $product !== null && $price_html = $product->get_price_html() ) : ?>
                  <span class="price"><?php echo $price_html; ?></span>
                <?php
                  $args = [ 'class' => 'btn d-block w-responsive mr-auto ml-auto btn-sm btn-success'];
                  echo apply_filters(
                    'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                    sprintf(
                      '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
                      esc_url( $product->add_to_cart_url() ),
                      esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                      esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
                      isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                      esc_html( $product->add_to_cart_text() )
                    ),
                    $product,
                    $args
                  );
                 endif; ?>
                <p><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></p>
            </div>
          </div>  
        </article>
      <?php endwhile; ?>
      </div>
      <div class="row">
        <?php do_action( 'storefront_loop_after' ); ?>
      </div>
    <?php
		else :

			get_template_part( 'content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
