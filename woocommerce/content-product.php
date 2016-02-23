<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?>>

	

	<a href="<?php the_permalink(); ?>">

  <div class="cycle_img"><?php if ( has_post_thumbnail() ) { $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=400&amp;h=340&amp;zc=2&amp;a=t" alt="" /><?php } ?></div>
          <div class="product_sale">
           
            <div class="product_name"><?php the_title(); ?></div>
            <div class="product_prices"><?php if( $product->is_type('simple') ){?><?php echo $product->get_price_html(); ?><?php } else { echo woocommerce_price($product->min_variation_price); ?><?php } ?></div>
          </div>
          <div class="hover_bg">&nbsp;</div>

	</a>
     <div class="cart_box"><?php if( $product->is_type('simple') ){  ?> 
     <a data-quantity="1" data-product_sku="" data-product_id="<?php echo $post->ID ?>" rel="nofollow" href="/CyclePathWP/product-category/bikes/hybrid/?add-to-cart=<?php echo $post->ID ?>"><?php } else {?><a href="<?php the_permalink(); ?>"><?php } ?><img src="<?php bloginfo( 'template_directory' ); ?>/images/cart_icon.png" alt="" /></a></div>



</li>
