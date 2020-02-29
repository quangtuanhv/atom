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
    <script type="text/javascript">
      jQuery(document).ready(function($){
        $( "li.type-product.col-6.fix-img.col-md-4" ).wrapInner( "<div class='new product'></div>");
              
jQuery('.dropdown-toggle').click(function() {
    var location = jQuery(this).attr('href');
    window.location.href = location;
    return false;
});

});
(function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)
	</script>
<style>

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 0px;
  top: 1.2em;
}


.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}





.menu-area{background: #d61a5e}
.dropdown-menu{padding:0;margin:0;border:0 solid transition!important;border:0 solid rgba(0,0,0,.15);border-radius:0;-webkit-box-shadow:none!important;box-shadow:none!important}
.mainmenu a, .navbar-default .navbar-nav > li > a, .mainmenu ul li a , .navbar-expand-lg .navbar-nav .nav-link{color:#000;font-size:16px;text-transform:capitalize;padding:16px 15px;letter-spacing: 2px;display: block !important;}
/* 
.mainmenu .collapse ul > li:hover > a{background: #4CAF50;}
.mainmenu .collapse ul ul > li:hover > a, .navbar-default .navbar-nav .show .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .show .dropdown-menu > li > a:hover{background: #4CAF50;}
.mainmenu .collapse ul ul ul > li:hover > a{background: #4CAF50;} */

.mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu{background:#fff;}
/* .mainmenu .collapse ul ul ul, .mainmenu .collapse ul ul ul.dropdown-menu{background:#1E88E5} */
.mainmenu .collapse ul ul ul ul, .mainmenu .collapse ul ul ul ul.dropdown-menu{background:#64B5F6}

.mainmenu{background: none;border: 0 solid;margin: 0;padding: 0;min-height:20px;width: 100%;}
@media only screen and (min-width: 767px) {
.mainmenu .collapse ul li:hover> ul{display:block}
.mainmenu .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}

.mainmenu .collapse ul ul li{position:relative;border-bottom: 1px solid orangered;}
.mainmenu .collapse ul ul li:hover> ul{display:block}
.mainmenu .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}

.mainmenu .collapse ul ul ul li{position:relative;border-bottom: 1px solid orangered;}
.mainmenu .collapse ul ul ul li:hover ul{display:block}
.mainmenu .collapse ul ul ul ul{position:absolute;top:0;left:-100%;min-width:250px;display:none;z-index:1}

}
@media only screen and (max-width: 767px) {
.navbar-nav .show .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 35px}
.navbar-nav .show .dropdown-menu .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 45px}
}
</style>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atom' ); ?></a>

	<header id="masthead" class="site-header">
<!-- 			
<nav class="navbar navbar-expand-lg navbar-light bg fixed-top scrolling-navbar">
<div class="container">

  <a class="navbar-brand waves-effect" href="<?php echo get_site_url()?>">
    <img src="<?php echo get_template_directory_uri() . '/img/logo-atom-top.png'?>" class="logo-header"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php if( is_front_page()) echo 'active' ?>" >
        <a class="nav-link waves-effect" href="<?php echo get_site_url()?>">Home</a>
      </li>
      <li class="nav-item dropdown <?php if( is_shop()) echo 'active'?>">
        <a class="nav-link dropdown-toggle" href="<?php echo get_site_url() . '/product-category/shop' ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Tablette-Tél
    </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="<?php echo get_site_url().'/product-category/telephones-portables'?>">Téléphones portables</a>
            <ul class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/iphone/'?>">Iphone</a>
              <a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/smartphones-android/'?>">Smartphones Android</a>
              <a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/smartphones-windows/'?>">Smartphones Windows</a>
            </ul> 
          </li>

            

            </ul>
          </li>
      </li>
      <li class="nav-item  <?php if( is_page_template( 'template-parts/repair.php' )) echo 'active'?>">
        <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/repair' ?>">Repair</a>
      </li>
      <li class="nav-item <?php if( is_page_template( 'template-parts/contact.php' )) echo 'active'?>">
        <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/contact' ?>">Contact</a>
      </li>
    </ul>
  </div>
  </div>

</nav> -->
<!-- <div id="menu_area" class="menu-area"> -->
  <nav class="navbar-expand-lg mainmenu navbar navbar-expand-lg navbar-light bg fixed-top scrolling-navbar">
    <div class="container">
        <!-- <div class="row"> -->
              <a class="navbar-brand waves-effect" href="<?php echo get_site_url()?>">
              <img src="<?php echo get_template_directory_uri() . '/img/logo-atom-top.png'?>" class="logo-header"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if( is_front_page()) echo 'active' ?>" >
                      <a class="nav-link waves-effect" href="<?php echo get_site_url()?>">Home</a>
                    </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="<?php echo site_url('product-category/shop');?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tablette-Tél</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="<?php echo site_url('product-category/shop/telephones-portables');?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Téléphones portables</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                
                                <li><a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/iphone/'?>">Iphone</a></li>
                                <li><a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/smartphones-android/'?>">Smartphones Android</a></li>
                                <li><a class="dropdown-item" href="<?php echo get_site_url().'/product-category/shop/telephones-portables/smartphones-windows/'?>">Smartphones Windows</a></li>
                                <!-- <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown3</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                    </ul>
                                </li> -->
                                </ul>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item  <?php if( is_page_template( 'template-parts/repair.php' )) echo 'active'?>">
                          <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/repair' ?>">Repair</a>
                        </li>
                        <li class="nav-item <?php if( is_page_template( 'template-parts/contact.php' )) echo 'active'?>">
                          <a class="nav-link waves-effect" href="<?php echo get_site_url() . '/contact' ?>">Contact</a>
                        </li>
                    </ul>
                </div>
              <!-- </div> -->
            </div>
          </nav>
<!-- </div> -->

  </header>

	<div id="content" class="site-content mt-5">



