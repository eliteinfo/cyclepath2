<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
</div>
        </div>
<!----mid End-----> 
<?php if(is_front_page()){?>  
<!--partner start-->
<div class="partner_part">

          <div id="partner_logo" class="owl-carousel">
          <?php 

$images = get_field('client_logo');

if( $images ): ?>
 <?php foreach( $images as $image ): ?>
    <div class="item">
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
</div>

 <?php endforeach; ?>

<?php endif; ?>

  </div>
        </div>
<!--partner end-->
<?php } ?>   
<div class="bt_cycle"><img src="<?php bloginfo('template_directory'); ?>/images/cycle_icon.png" alt="" /></div>
<div class="newsletter_bg">
          <div class="wrapper">
    <div class="newsletter_box">
              <?php echo do_shortcode('[contact-form-7 id="107" title="newsletter"]'); ?>
</div>
</div>
</div>
     
<div class="footer_part">
          <div class="wrapper">
    <div class="footer">
       <?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('footer_widgets') ) : ?>
            <?php endif; ?>
            </div>
  </div>
        </div>
<?php if(is_front_page()){ ?>        
       <script type="text/javascript">
    $(document).ready(function() {
      $("#partner_logo").owlCarousel({
        autoPlay: 3000,
        items : 6,
        slideSpeed : 900,
		responsive:true,
		itemsDesktop : [1199,6],
		itemsDesktopSmall : [1000,3],
		itemsTablet : [768, 3],
		itemsTabletSmall : true,
		itemsMobile : [480, 2],
		autoPlay : true,
		stopOnHover : true
      });
    });
    </script>
    <?php } ?>
    
<?php wp_footer(); ?>
</body>
</html>
