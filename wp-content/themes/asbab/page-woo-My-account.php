<?php
/**
 * Template Name: My Account Woocommerce page
 */

get_header();
?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main row">
            <div class="col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 col-sm-12 col-xs-12">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page-myaccount' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
            </div>
            <div class="col-lg-4 col-lg-pull-8 col-md-4 col-md-pull-8 col-sm-12 col-xs-12 smt-40 xmt-40">
               <?php  get_sidebar('shop'); ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php


get_footer();
