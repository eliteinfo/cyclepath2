<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

$content_width = 450;

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="top widgettitle">',
		'after_title' => '</h5>',
	));
}

/** @ignore */

register_sidebars( 1,
array(
'name' => 'Top Phone',
'id' => 'top_phone',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => ''
)
);



register_sidebars( 1,
array(
'name' => 'Footer Widgets',
'id' => 'footer_widgets',
'before_widget' => '<div id="%1$s" class="footer_box %2$s">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>'
)
);



remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_theme_support( 'post-thumbnails' );

register_nav_menus( array('mainnav' => __( 'Main Navigation','weather'),'mobnav' => __( 'Mobile Navigation','weather') ) );



function woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '',
			'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' )
		) ) );
$breadcrumbs = new WC_Breadcrumb();

		if ( $args['home'] ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		wc_get_template( 'global/breadcrumb.php', $args );
	}

function kriesi_pagination($pages = '', $range = 10)
{  
     $showitems = ($range * 1)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='woocommerce-pagination'><ul class='page-numbers'>";
         if($paged > 1) echo "<li><a href='".get_pagenum_link($paged - 1)."'  class='prev'>Previous</a><li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='next'>Next</a></li>";  
         echo "</ul></div>\n";
     }
}


add_filter('woocommerce_product_categories_widget_args', 'woocommerce_show_empty_categories');
function woocommerce_show_empty_categories($cat_args){
	$cat_args['hide_empty']=1;
	return $cat_args;
}

add_filter ('add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout() {
    global $woocommerce;
    $checkout_url = $woocommerce->cart->get_checkout_url();
    return $checkout_url;
}	

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    
 
function woo_custom_cart_button_text() {
 
        return __( 'Buy Now', 'woocommerce' );
 
}

add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
    if ($value['price_html'] == '') {
        $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
    }
    return $value;
}, 10, 3);