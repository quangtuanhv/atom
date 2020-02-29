<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">


	<div class="container-fluid">
	<?php
echo do_shortcode('[smartslider3 slider=1]');
?>
		<!-- <section class="card bg-main row wow fadeIn" id="intro">

		<div class="card-body text-white text-center py-5 px-5 my-5">

			<img src="http://www.atom-electronic.fr/img/icons/logo-atom-top.png" class="logo-titre img-responsive">
			<h1 class="mb-4 text-white">
			<strong>Réparation de smartphones et tablettes</strong>
			</h1>
			<a href="<?php #echo get_site_url().'/repair'?>" class="btn btn-outline-white px-5 btn-lg btn-rounded hover-new-style">Tarifs →
			</a>

		</div>
		</section> -->
		<section class="row features-small mt-5 wow fadeIn">
			<div class="col-md-10 offset-md-1">
				<div class="row">

					<div class="col-md-4">
						<div class="row">
						<div class="col-12 mb-2 text-center">
							<img src="<?php echo get_template_directory_uri().'/img/stopwatch.svg' ?>" class="icon-svg">
							<h5 class="feature-title font-bold f-30 mb-1 mt-4">VOTRE DEVIS<br>EN 60 SECONDES</h5>
							<hr class="hidden-xs">
							<p class="grey-text mt-2">Seulement quelques clics pour indiquer votre appareil (iPhone, Samsung…), sa panne et obtenir le prix de la réparation de votre smartphone ou tablette.</p>
						</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
						<div class="col-12 mb-2 text-center">
						<img src="<?php echo get_template_directory_uri().'/img/parts.svg' ?>" class="icon-svg">
							<h5 class="feature-title font-bold f-30 mb-1 mt-4">PIÈCES DÉTACHÉES DE QUALITÉ SUPÉRIEURE</h5>
							<hr class="hidden-xs">
							<p class="grey-text mt-2">Pour vous garantir une qualité de service irréprochable, les Captain Repairs sont des professionnels de la réparation rigoureusement vérifiés.</p>
						</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
						<div class="col-12 mb-2 text-center">
							<img src="<?php echo get_template_directory_uri().'/img/tools.svg' ?>" class="icon-svg">
							<h5 class="feature-title font-bold f-30 mb-1 mt-4">VOTRE SMARTPHONE RÉPARÉ EN 45 MINUTES</h5>
							<hr class="hidden-xs">
							<p class="grey-text mt-2">Nous réparons la plupart des pannes : écran cassé, batterie défaillante, bouton défectueux , … Vos appareils sont testés avant et après chaque réparation.</p>
						</div>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- khuyến mãi -->
		<!-- <section class="slide">
			<?php
				// $args = array(
				// 	'post_type'      => 'product',
				// 	'posts_per_page' => -1,
				// 	'meta_query'     => array(
				// 			'relation' => 'OR',
				// 			array( // Simple products type
				// 				'key'           => '_sale_price',
				// 				'value'         => 0,
				// 				'compare'       => '>',
				// 				'type'          => 'numeric'
				// 			),
				// 			array( // Variable products type
				// 				'key'           => '_min_variation_sale_price',
				// 				'value'         => 0,
				// 				'compare'       => '>',
				// 				'type'          => 'numeric'
				// 			)
				// 		)
				// );
				// $loop = new WP_Query( $args );
				// if ( $loop->have_posts() ) {
				// 	echo '<h1 class="elegantshadow">Les promotions</h1>';
				// 	echo '<ul id="sale-home" class="products owl-carousel home-list">';
				// 	while ( $loop->have_posts() ) : $loop->the_post();
				// 		woocommerce_get_template_part( 'content', 'product' );
				// 	endwhile;
				// 	echo '</ul>';
				// } else {
				// 	echo __( 'No products found' );
				// }
				// wp_reset_postdata();
			?>
		</section> -->
		<!-- kết thúc khuyến mãi -->
		<section class="row repair-button">
			<div class="col-md-10 offset-md-1">
				<div class="text-center mt-5 mb-5">
					<h1 class="text-white mt-5 mb-5">Qualité Prix Productivité</h1>
					<a href="<?php echo get_site_url().'/repair'?>" class="btn btn-outline-white px-5 btn-rounded btn-lg hover-new-style"> Consulter nos tarifs </a>
				</div>		
			</div>		
		</section>
		<section class="container my-5">
			<div class="row">
				<div class="text-center mt-5 mb-5">
					<div id="cloud" behavior="alternate" class="" >
						<img src="<?php echo get_template_directory_uri().'/img/alcatelLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/appleLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/samsungLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/sonyLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/wikoLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/xiaomiLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/nokiaLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/nexusLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/lgLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/huaweiLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/htcLogo.svg'?>" class="h-45">
						<img src="<?php echo get_template_directory_uri().'/img/archosLogo.svg'?>" class="h-45">
					</div>
				</div>		
			</div>		
		</section>
		<section class="map">
			<div class="row">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15216.889012897182!2d-149.577031!3d-17.544602!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x499c272088d8d15a!2sAtom%20electronic!5e0!3m2!1sen!2s!4v1570406643939!5m2!1sen!2s" class="main-map" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
		</section>

		<section class="mb-4 container">
		<h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
		
		<div class="row">

			<div class="col-md-8 mb-md-0 mb-5 offset-md-2">
				<?php if ( is_active_sidebar( 'contact-1' ) ) : ?>
					<div id="header-widget-area-contact" class="chw-widget-area widget-area" role="complementary">
					<?php dynamic_sidebar( 'contact-1' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		</section>
		<!--Section: Contact v.2-->

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
		<script>
jQuery(document).ready(function() {
	
	jQuery("ul#sale-home li.product.sale").addClass("text-center col-8 ml-auto mr-auto")
});
	$(".owl-carousel").owlCarousel({
	loop:true,
    margin:10,
    responsiveClass:true,
	nav: false,
	autoplay:true,
    autoplayTimeout:2000 ,
    responsive:{
        0:{
            items:1,
            nav:false,
        },
        600:{
            items:3,
            nav:false,
        },
        1000:{
            items:5,
            nav:false,
            loop:true,
        }
    }
});

</script>
<?php
get_footer();
