<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="prod_box">
<?php
global $post, $product, $woocommerce; 
 $attachment_ids = $product->get_gallery_attachment_ids(); 
if ( $attachment_ids ) { 
	?> 
     <div class="prod_dtl">
        <div class="prod_slider">
            <div class="flexslider">
            <ul class="slides">
    
            <?php 
		$loop = 0; 
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 ); 
		foreach ( $attachment_ids as $attachment_id ) { 
			$classes = array( 'zoom' ); 
			if ( $loop == 0 || $loop % $columns == 0 ) 
				$classes[] = 'first'; 
			if ( ( $loop + 1 ) % $columns == 0 ) 
				$classes[] = 'last'; 
			$image_link = wp_get_attachment_url( $attachment_id ); 
			if ( ! $image_link ) 
				continue; 
			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) ); 
			$image_class = esc_attr( implode( ' ', $classes ) ); 
			$image_title = esc_attr( get_the_title( $attachment_id ) );?> 
            <li data-thumb="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<? echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );?>&amp;w=60&amp;h=60&amp;zc=2"><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<? echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '%s', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );?>&amp;w=800&amp;h=550&amp;zc=2" /></li>
            <?php  
			$loop++; 
		} 
	?>
     </ul>
          </div>
          </div>
      </div>
            <?php 
}  else { ?>
	 <div class="prod_dtl">
        <div class="prod_slider">
        <?php $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
        <img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php  echo $thumbnailsrc ?>&amp;w=800&amp;h=550&amp;zc=2" />
        </div>
        </div>
	
<?php }
?> 
<div class="prod_dtr">
        <div class="content">
            <div class="cycle_shortinfo">
           <div class="prod_scroll"  id="content-4" > <h3>  <?php the_title() ?> </h3>
            <?php the_content(); ?></div>
			<?php 
			if( $product->is_type('simple') ){ ?>
				<div class="buy_prices" style="padding-bottom:15px;"><span>prices : </span> <div class="single_variation"><?php echo $product->get_price_html(); ?></div></div>

                
<?php woocommerce_simple_add_to_cart();

} elseif( $product->is_type( 'variable' ) ){ 
woocommerce_variable_add_to_cart(); 
}

if( get_field('pick_up_store') ) {?>
          <div class="pick_up">This Product Only Available for Store Pickup.</div>
<?php } ?>
  
          </div>
          </div>
      </div>
      </div>


	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
