<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Increase loop count
$woocommerce_loop['loop'] ++;
?>
<li <?php wc_product_cat_class(); ?>>
	<?php do_action( 'woocommerce_before_subcategory', $category ); 
	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
	    $image = wp_get_attachment_url( $thumbnail_id );
	?>

	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
	      <div class="tp_categori_name"><?php echo $category->name; ?></div>
          <div class="cycle_img"><?php  if ($image) {?><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $image ?>&amp;w=400&amp;h=340&amp;zc=2&amp;a=t" alt="" /><?php } ?>
          </div>
          <div class="product_sale">
            <div class="plus_box"><img src="<?php bloginfo( 'template_directory' ); ?>/images/plus_icon.png" alt="" /></div>
            <div class="bt_categori_name"><?php echo $category->name; ?></div>
          </div>
          <div class="hover_bg">&nbsp;</div>
	</a>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>
