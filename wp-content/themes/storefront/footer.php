<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atom
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-4 col-lg-4 firstCol">
					<ul>
					<li>
						<p class="footer-title"> Plan de Site </p>
					</li>
					<li><a ui-sref="app.home" class="flink" href="#!/">Accueil</a></li>
					<li><a ui-sref="app.repair.device" class="flink" href="<?php echo get_site_url() . '/repair' ?>">Réparer</a></li>
					<li><a ui-sref="app.contact" class="flink" href="<?php echo get_site_url() . '/contact' ?>"">Contact</a></li>
					<li><a href="#!/" class="flink">Vision</a></li>
					<li><a ui-sref="app.mentions" class="flink" href="#!/mentions">Mentions</a></li>
					</ul>
				</div>

				<div class="col-12 col-md-4 col-lg-4 container-logo d-none d-md-block">
					<img src="<?php echo get_template_directory_uri() . '/img/logo-atom-top.png'?>" class="logo-titre footer-logo img-responsive">
				</div>

				<div class="col-6 col-md-4 col-lg-4">
					<ul>
					<li>
						<p class="footer-title"> Nous Contacter </p>
					</li>
					<li><a href="#" class="flink">Atom electronic</a></li>
					<li><a href="#" class="flink">98 713</a></li>
					<li><a href="#" class="flink">Papeete</a></li>
					<li><a ui-sref="app.contact" class="flink" href="<?php echo get_site_url() . '/contact' ?>">Contact</a></li>
					<li class="navbar-inline">
						<a href="https://www.facebook.com/Atom-electronic-223873891456189/" target="_blank"><span><img src="<?php echo get_template_directory_uri() . '/img/fb.png'?>" alt="facebook atom electronic tahiti papeete" class="footer-icon"></span></a>
						<a href="https://www.instagram.com/atomelectronic/" target="_blank"><span><img src="<?php echo get_template_directory_uri() . '/img/Ins.png'?>" alt="instagram atom electronic tahiti papeete" class="footer-icon"></span></a>
					</li>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
	// object-fit polyfill run
objectFitImages();

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});

</script>
</body>
</html>
