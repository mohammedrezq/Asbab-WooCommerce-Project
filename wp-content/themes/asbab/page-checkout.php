<?php
/**
 * Template Name: Checkout WooCommerce
 */

get_header();
?>

    <div class="checkout-wrap pt--30">
        <div class="container">
            <div class="row">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .checkout-wrap -->

<?php
//get_sidebar();
get_footer();
