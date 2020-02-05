<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php
		wp_enqueue_style( 'Font_Awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css' );
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' );
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/css/style.css' );
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', array(), '3.3.1', true );
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/single-product.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'zoom', get_template_directory_uri() . '/js/jquery.zoom.min.js', array(), '1.0.0', true );
	?>
  <?php wp_head(); ?>
  
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<script>
//   jQuery( document ).ready(function() {
    
//   if(jQuery("body").hasClass("woocommerce-checkout")){
//   var styleSheets = document.styleSheets;
  
// 	var href = "<?php echo get_template_directory_uri() . '/css/bootstrap.min.css' ;?>"
// 	for (let i = 0; i < styleSheets.length; i++) {
//     if(styleSheets[i].href == null) continue;
//     console.log(styleSheets[i].href);
// 		if (styleSheets[i].href.indexOf(href) != -1) {
//       console.log(styleSheets[i].href);
// 			styleSheets[i].disabled = true;
// 			// break;
// 		}
// 	}
// }
// console.log( "ready!" );
// });
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atom' ); ?></a>

	<header id="masthead" class="site-header">
			<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container">
        <a class="navbar-brand waves-effect" href="<?php echo get_site_url()?>" target="_blank">
          <img src="<?php echo get_template_directory_uri() . '/img/logo-atom-top.png'?>" class="logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if( is_front_page()) echo 'active' ?>" >
              <a class="nav-link waves-effect" href="<?php echo get_site_url()?>">Home</a>
            </li>
            <li class="separator">&nbsp;<a>&nbsp;</a></li>
            <li class="nav-item <?php if( is_page_template( 'template-parts/repair.php' )) echo 'active'?>">
              <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/repair' ?>">Repair</a>
            </li>
            <li class="separator">&nbsp;<a>&nbsp;</a></li>
            <li class="nav-item <?php if( is_page_template( 'template-parts/contact.php' )) echo 'active'?>">
              <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/contact' ?>">Contact</a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
  </header>

	<div id="content" class="site-content">
