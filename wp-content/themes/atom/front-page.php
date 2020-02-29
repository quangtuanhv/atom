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
	
		<section class="card bg-main row wow fadeIn" id="intro">

		<div class="card-body text-white text-center py-5 px-5 my-5">

			<img src="http://www.atom-electronic.fr/img/icons/logo-atom-top.png" class="logo-titre img-responsive">
			<h1 class="mb-4">
			<strong>Réparation de smartphones et tablettes</strong>
			</h1>
			<a href="<?php echo get_site_url().'/repair'?>" class="btn btn-outline-white btn-lg hover-new-style">Tarifs →
			</a>

		</div>
		</section>
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
		<section class="row repair-button">
			<div class="col-md-10 offset-md-1">
				<div class="text-center mt-5 mb-5">
					<h1 class="text-white mt-5 mb-5">Qualité Prix Productivité</h1>
					<a href="<?php echo get_site_url().'/repair'?>" class="btn btn-outline-white btn-lg hover-new-style"> Consulter nos tarifs </a>
				</div>		
			</div>		
		</section>
		<section class="container my-5">
			<div class="row">
				<div class="text-center mt-5 mb-5">
					<div id="cloud" behavior="alternate" >
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

<?php
get_footer();
