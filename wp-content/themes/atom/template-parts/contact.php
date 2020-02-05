<?php
/*
 Template Name: Contact
 */
?>
<?php get_header(); ?>
 
<div id="content">

    <section class="card bg-contact-main row wow fadeIn" id="intro">
        <div class="card-body text-white text-center py-5 px-5 my-5">
            <h1 class="mb-4">
            <strong style="font-size: 48px;">CONTACTEZ NOUS</strong>
            </h1>
            
            <a href="#firstBlock">
                <img src="<?php echo get_template_directory_uri() . '/img/scroll-arrow-to-down.png'?>">            
            </a>

        </div>
    </section>
<span id="firstBlock" style="height: 50px;" class="d-block"></span>
<div class="container my-5">
    <div class="row">
      <h1 class="d-block mr-auto ml-auto">Coordonnées</h1>
    </div>
    <div class="row">

      <div class="offset-md-1 col-md-5 contact_ac_email">
        <div class="row" style="line-height: 34px;">
        <i class="fas fa-map-marked-alt fa-2x"></i>
          <div class="col-md-6  col-md-6">
            13 Rue Cook, Papeete.
          </div>
        </div>

        <div class="row mt-3" style="line-height: 34px;">
        <i class="fab fa-facebook fa-2x"></i>
          <div class="col-md-6 col-md-10">
            <a href="https://www.facebook.com/atomelectronic/">Atom electronic</a>
          </div>
        </div>
      </div>



      <div class="offset-md-1 col-md-5 contact_ac_email">

        <div class="row" style="line-height: 34px;">
        <i class="far fa-envelope fa-2x"></i>
          <div class="col-md-8 col-md-10">
            contact@atom-electronic.fr
          </div>
        </div>

        <div class="row mt-3" style="line-height: 34px;">
        <i class="fa fa-phone fa-2x"></i>
          <div class="col-md-8 col-md-10">
            <p>87 729 500</p>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <h1 class="d-block mr-auto ml-auto">Horaires</h1>
    </div>
    <div class="row contact_ac">
      <div class="col-md-5 offset-md-1">
        <ul>
          <li>Du Lundi au Vendredi : 8h à 17h</li>
        </ul>
      </div>
      <div class="col-md-5 offset-md-1">
        <ul>
          <li>Le Samedi : 8h à 12h</li>
        </ul>
      </div>
    </div>
  </div>
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
</div>
 
<?php get_footer(); ?>