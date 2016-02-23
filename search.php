<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="blog_list">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			<div class="blog_fullbox" id="post-<?php the_ID(); ?>">
          <div class="blog_left"><?php  if ( has_post_thumbnail() ) { $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?>
        <img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=450&amp;h=280&amp;zc=1&amp;a=t" alt="" /> 
        <?php }?></div>
          <div class="blog_right">
            <div class="blog_date"><span>by</span> <?php the_author() ?> <span>on</span> <?php the_time('j F Y') ?></div> 
            <div class="blog_cntbg">
              <div class="left_cnt">
                <h3> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
               <?php the_excerpt(); ?></div>
              <div class="next_blog"><a href="<?php the_permalink() ?>"><img src="<?php bloginfo( 'template_directory' ); ?>/images/next_icon.png" alt="" /></a></div>
            </div>
          </div>
        </div>

		<?php endwhile; ?>

	

	<?php else : ?>

		<h2 >No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php kriesi_pagination(); ?>

	

<?php get_footer(); ?>
