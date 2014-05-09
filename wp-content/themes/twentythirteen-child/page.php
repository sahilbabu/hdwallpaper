<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="bodyArea">
	<div class="bodyInner clearfix">
    <div class="lftBar fLeft clearfix">
                            	
<?php get_sidebar('left'); ?>



    <div class="bannerOuter fRight">
    
    
    <div class="recentpostOuter">
                                  
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<div class="recentpost clearfix">
        <div class="recentpost-Categories"><?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<a href="#"><?php the_title(); ?></a>
                        </div></div>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="product-main-baner content-area"><?php the_content(); ?></div>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php //edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php //comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
    </div>
    </div>
    </div>
    </div>
    
    <?php get_sidebar('right'); ?>
    
    </div>
    </div>
    <!--  bodyArea End  -->
    <!-- #primary -->
<?php get_footer(); ?>