<?php
/**
 * The sidebar shop widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package asbab
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>

<div id="shop-widget-area" class="widget-area shop-widget-area col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</div><!-- #shop-widget-area -->
