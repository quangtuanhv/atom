<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package atom
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main this-is-my-single">
		<div class="row py-5">
			<h3 class="text-center col-md-12">
			<span>Sélectionnez la marque de l'appareil que vous souhaitez réparer</span>
			</h3>
			<!-- Search form -->
				<div class="md-form mt-0 col-md-4 my-3 ml-auto mr-auto">
						<input class="form-control" type="text" placeholder="Faites directement une recherche" aria-label="Search">
				</div>
		</div>
		<?php

		while ( have_posts() ) :
			the_post();

			print_r(is_product_category());

			get_template_part( 'template-parts/content', get_post_type() );

			//  the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
