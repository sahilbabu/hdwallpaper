<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<div class="chrismisBox fLeft">
   <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('homepage-thumb'); ?></a>
		<?php else: ?>
        <img src="<?php echo get_template_directory_uri(); ?>-child/images/chrismisImg.jpg">
        <?php endif; ?>
    <h5>	<?php if ( is_single() ) : ?>
		<?php the_title(); ?>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		
		<?php endif; // is_single() ?></h5>
    </article>
</div>
