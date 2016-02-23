<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>


	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="blog_list" id="post-<?php the_ID(); ?>">
        <div class="inner_blog">
          <h2><?php the_title() ?> <div class="blog_icn">
        <a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>&title=<?php the_title(); ?>" target="_blank"><i class="fa fa-facebook-official fa-1g"></i></a> <a href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink() ?>" target="_blank" ><i class="fa fa-twitter fa-1g"></i></a> <a  href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $thumbnailsrc ?>&url=<?php the_permalink() ?>&is_video=false&description=<?php the_title(); ?>" target="_blank"><i class="fa fa-pinterest fa-1g"></i></a></div></h2>
          <div class="inner_imgblog"><?php  if ( has_post_thumbnail() ) { $thumbnailsrc = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );  ?><img src="<?php bloginfo( 'template_directory' ); ?>/js/timthumb.php?src=<?php echo $thumbnailsrc ?>&amp;w=450&amp;h=280&amp;zc=1&amp;a=t" alt="" /><?php } ?></div>
          <h3>by <?php the_author() ?> <span>on</span> <?php the_time('j F Y') ?></h3>
          <?php the_content(); ?>
        </div>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
			</div>
	


<?php get_sidebar(); ?>

<div class="woocommerce-pagination"><ul class="page-numbers"><li><?php previous_post_link('%link', 'Previous'); ?></li><li><?php next_post_link('%link', 'Next'); ?></li></ul></div>

<?php get_footer(); ?>
