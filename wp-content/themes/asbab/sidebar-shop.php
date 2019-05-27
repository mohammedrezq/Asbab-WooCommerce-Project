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

<div id="shop-widget-area" class="widget-area shop-widget-area">
	<?php dynamic_sidebar( 'sidebar-shop' ); ?>
</div><!-- #shop-widget-area -->
