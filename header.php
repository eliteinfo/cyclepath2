<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
 <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
        <link href="<?php bloginfo('template_directory'); ?>/css/settings.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?php bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet" />
         <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/jquery.mCustomScrollbar.css" />
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.js"></script>
        <script type="text/javascript">
            $(document).scroll(function () {
                var y = $(this).scrollTop();
                if (y > 200) {
                    $('.top_part').addClass("top_part2");
                } else {
                    $('.top_part').removeClass("top_part2");
                }
				
            });
        </script>
     <?php if(is_front_page()){ ?>  
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/instafeed.min.js"></script>
<script type="text/javascript">
$(document).ready(function($) {	
        var feed = new Instafeed({
  
            userId: 1293465433,
            accessToken: '1293465433.d2d5d35.202d10ba59e54af2b0f977c7cefbe3cc',
            get: 'user',			
            clientId: 'd2d5d35c73a54eb08945464167361a88',
            limit: 3,
		resolution: 'low_resolution',
            template: '<li><div class="photo_box"><a href="{{link}}" target="_blank"><img src="{{image}}" alt="{{caption}}"/></a></div></li>',
        });
        feed.run();
});
</script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".pro_typebox select").each(function(){
            $(this).wrap("<span class='select-wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".pro_typebox select").change(function(){
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })
</script>
  <script type="text/javascript"  src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>
  
  <script type="text/javascript">
		$(window).load(function() {
		$('.flexslider').flexslider({
		animation: "slide",
		slideshow: "true",
		slideshowSpeed: "1600",
		pauseOnHover: "true",
		controlNav: "thumbnails"
	});
});
  </script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script>
		$(document).ready(function(){
				$("#content-4").mCustomScrollbar({
					theme:"rounded-dots",
					scrollInertia:400
				});
		})
	</script>
    <script type="text/javascript">
$(document).ready(function(){
$('.holder > a').click(function() {
$(this).parent().next('.custom-select').slideToggle('slow'); 
	return false;
});
});
</script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--top start-->
<div class="top_part">
          <div class="top">
    <div class="wrapper">
              <div class="logo"> <a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="" /></a> </div>
              <div class="small_logo"> <a href="index.html"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="" /></a> </div>
              <div class="top_right">
        <div class="client_part">
                  <ul class="sign_info">
                  <?php if ( is_user_logged_in() ) {?>
            <li><a href="http://54.72.90.40/CyclePathWP/my-account/">My Account</a></li>
            <?php } else {?>
                 <li><a href="http://54.72.90.40/CyclePathWP/my-account">sign up</a></li>
            <li><a href="http://54.72.90.40/CyclePathWP/my-account/">login</a></li>
            <?php }?>
            <li><a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></a></li>
          </ul>
                  <div class="curr_list">
            <div class="curr_box">
            <?php echo do_shortcode('[woocs]'); ?>
                      <!--<ul>
                <li><a href="#">USD</a>
                          <ul>
                    <li><a href="#">CAD</a></li>
                  </ul>
                        </li>
              </ul>-->
                    </div>
          </div>
                </div>
	        <div class="menu_part">
                  <div id="mainmenu"> <a class="menu_link" href="#"></a>

             <?php if (function_exists('wp_nav_menu')) { 
	wp_nav_menu( array( 'menu_id'=>'menu','menu_class' => 'menu', 'container' =>false, 'theme_location' => 'mainnav', 'fallback_cb'=>'','depth' =>4) );
} 
   ?> 
          </div>
                  <div class="top_search">
          <form method="get" id="search" action="<?php bloginfo('home'); ?>/">
            <input type="text" value=""  name="s" id="s" placeholder="Search Here"  />
            <input type="submit" id="searchsubmit" value="Submit" />
          </form>
          </div>
                  <div class="top_call"><?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('top_phone') ) : ?>
            <?php endif; ?></div>
                </div>
      </div>
            </div>
  </div>
        </div>
<!--top end--> 
<!--header start-->
<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
   $children = get_term_children($term->term_id, get_query_var('taxonomy'));
   $taxonomy = 'product_cat';
   $taxonomy2 ='category';
   $category = single_term_title("", false);
   $catid = get_cat_ID($category);
   
 if(is_front_page()){ ?>
<div class="header">
          <?php echo do_shortcode('[rev_slider homeslider]'); ?>
        </div>
        <?php } else {?> 
        <div class="inner_header">
        <div class="inner_hr_box">
       <?php if (is_shop()) { if ( has_post_thumbnail() ) { $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id(21, 'thumbnail') );  ?>
        <div class="inner_hr_img"><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=1800&amp;h=511&amp;zc=3&amp;a=t" alt="" /></div>
                  <?php }  } else if(is_page()) { if ( has_post_thumbnail() ) { $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
        <div class="inner_hr_img"><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=1800&amp;h=511&amp;zc=3&amp;a=t" alt="" /></div>
<div class="page_title_cont"> <div class="wrapper">
    <div class="page_title">
		<h1><?php the_title(); ?></h1>
      </div>
  </div></div>
        <?php } else { ?>
        
<div class="page_title_cont noimg">        <div class="wrapper">
    <div class="page_title">
		<h1><?php the_title(); ?></h1>
      </div>
  </div></div>
		<?php }?>
                 <?php   } else if (is_tax('product_cat') && sizeof($children)>0) {  
$thumbnailsrc =  get_field('header_image',$taxonomy.'_'.$term->term_id); if($thumbnailsrc){  ?>
        <div class="inner_hr_img"><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=1800&amp;h=511&amp;zc=3&amp;a=t" alt="" /></div>
				 <?php  } } else if(is_category('660')|| is_category('661')) { $thumbnailsrc =  get_field('header_image',$taxonomy2.'_'.$catid); ?>
                 <div class="inner_hr_img"><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=1800&amp;h=511&amp;zc=3&amp;a=t" alt="" /></div>
                 <div class="page_title_cont">        <div class="wrapper">
    <div class="page_title">
		<h1><?php single_cat_title(); ?></h1>
      </div>
  </div></div>
                 <?php } else {  ?>
    <div class="wrapper">
    <div class="inner_title">
    <?php if(is_singular('product') || is_tax('product_cat') || is_tax('product_brand') ) { ?>
        <?php woocommerce_breadcrumb(); ?>
        <?php }  else { ?>
        <nav class="woocommerce-breadcrumb"><a href="<?php echo get_option('home'); ?>/">Home</a> <?php if (is_home() || is_single()) { echo 'Blog'; } else if (is_search()) { echo 'Search Result'; } else if (is_404())  { echo 'Error 404'; } else if(is_archive()) { single_cat_title(); } ?></nav>
        <?php } ?>
      </div>
  </div>
  <?php } ?>
  </div>
    </div>
  
  <?php }?>
  
  
<!--header end--> 
<!--mid start-->
<div class="wrapper">
          <div class="mid">
        
   <?php if (is_tax('product_cat') && sizeof($children) < 1) {?>
          <div class="pro_searchbg">
      <div class="pro_box">
        <div class="pro_typebox">
        <?php  
		$taxonomy = 'product_cat';
		$args = array(
		'parent' => $term->parent, 
);
$tax_terms = get_terms($taxonomy,$args);

	 ?>
        <div class="holder"><a href="#">Categories</a></div>
          <ul class="custom-select" >
            <?php foreach ($tax_terms as $tax_term) { ?>
<li class="<?php echo $tax_term->slug ?>"><a href="<?php echo esc_attr(get_term_link($tax_term, $taxonomy)) ?>"><?php echo $tax_term->name ?></a></li>
<?php }?>     
          </ul>
        </div>
      </div>
      <div class="pro_box">
        <div class="pro_typebox">
        <div class="holder"><a href="#">Brands</a></div>
 <?php  $taxonomy2 = 'product_brand';
$tax_terms2 = get_terms($taxonomy2);
	 ?>
          <ul class="custom-select">
            <?php foreach ($tax_terms2 as $tax_term2) { ?>
<li class="<?php echo $tax_term2->slug ?>"><a href="<?php echo esc_attr(get_term_link($tax_term2, $taxonomy2)) ?>"><?php echo $tax_term2->name ?></a></li>
<?php }?>     
          </ul>
        </div>
      </div>
      <div class="pro_box">
        <div class="pro_typebox no_bg">
         <form method="get" id="search" action="<?php bloginfo('home'); ?>/">
            <input type="text" value=""  name="s" id="s" placeholder="Search Here"  />
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </div>
    
    <?php } ?>