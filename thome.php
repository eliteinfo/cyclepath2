<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 	Template Name: Home Page 
 */

get_header(); ?>


      
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php echo $post->post_content ?>
                <div class="accessories_part">
              <div class="left_side">
        <div class="accessories_info">
                  <div class="accessories_box"> <a href="<?php the_field('box_1_link') ?>"><?php $img1 = get_field('box_1_image'); if($img1){ ?><img src="<?php echo $img1 ?>" alt="" /><?php } ?>
                    <div class="title_name">
                    <h2><?php the_field('box_1_title') ?></h2>
                  </div>
                    </a> </div>
                </div>
        <div class="accessories_info">
                  <div class="accessories_box"> <a href="<?php the_field('box_2_link') ?>"><?php $img2 = get_field('box_2_image'); if($img2){ ?><img src="<?php echo $img2 ?>" alt="" /><?php } ?>
                    <div class="title_name">
                    <h2><?php the_field('box_2_title') ?></h2>
                  </div>
                    </a></div>
                </div>
      </div>
              <div class="right_side">
        <div class="accessories_info">
                  <div class="accessories_box"> <a href="<?php the_field('box1_r_link') ?>"><?php $img3 = get_field('box1_r_image'); if($img3){ ?><img src="<?php echo $img3 ?>" alt="" /><?php } ?>
                    <div class="title_name"> <i class="fa fa-arrow-circle-right fa-3x"></i>
                    <h2><?php the_field('box_r_title') ?></h2>
                  </div>
                    </a> </div>
                </div>
        <div class="accessories_info">
                  <div class="accessories_box"> <a href="<?php the_field('box2_r_link') ?>"><?php $img4 = get_field('box2_r_image'); if($img4){ ?><img src="<?php echo $img4 ?>" alt="" /><?php } ?>
                    <div class="title_name"> <i class="fa fa-bookmark-o fa-4x"></i>
                    <h2><?php the_field('box2_r_title') ?></h2>
                  </div>
                    </a> </div>
                </div>
        <div class="accessories_info">
                  <div class="accessories_box"> <a href="<?php the_field('box3_r_link') ?>"><?php $img5 = get_field('box3_r_image'); if($img5){ ?><img src="<?php echo $img5 ?>" alt="" /><?php } ?>
                    <div class="title_name">
                    <h2><?php the_field('box3_r_title') ?></h2>
                  </div>
                    </a> </div>
                </div>
      </div>
            </div>
                
							</div>
		</div>
		<?php endwhile; endif; ?>
<div class="instagram_part">
              <ul>
        <li> <a href="https://www.instagram.com/Cyclepathoakville" target="_blank"> <img src="http://54.72.90.40/CyclePathWP/wp-content/themes/cyclepath/images/instagram_photo4.jpg" alt="" /> </a> </li>
       </ul>
       <ul id="instafeed">
       
      </ul>
            </div>
            

<?php get_footer(); ?>
