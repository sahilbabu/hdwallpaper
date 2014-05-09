<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
 <!--  bodyArea start  -->
             
<div class="bodyArea">
	<div class="bodyInner clearfix">
    <div class="lftBar fLeft clearfix">
                            	
<?php get_sidebar('left'); ?>

	<div class="bannerOuter fRight">
    
    
    <div class="recentpostOuter">

		<?php if ( have_posts() ) : ?>

    
    
			<header class="page-header">
				<div class="recentpost clearfix">
        <div class="recentpost-Categories"><a href="#"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></a></div>
        
      
    </div>
			</header>

			<?php /* The loop */ ?>
			<?php 
			
			
				$i=1;
				$j=0;
				while ( have_posts() ) : the_post(); 
				
				if($i > 3 || $j==0)
				{
					$i=1;
					$j=1;
				?>
                    <div class="chrismis clearfix">
				<?php
				}
				?>
               <?php  get_template_part( 'content', get_post_format() ); 
				if($i==3)
				{
					$i++;
				?>
					</div>
				<?php
				}
				else
				{
					$i++;
				}
				endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div>
    
    </div>
    
    
    
    <script type="text/javascript">
		jQuery(document).ready(function($){
			
			
			
			
			$("#demo5").paginate({
				count 		: 1,
				start 		: 1,
				display     : 3,
				border					: false,
				border_color			: '',
				text_color  			: '',
				background_color    	: '',	
				border_hover_color		: '',
				text_hover_color  		: '#fff',
				background_hover_color	: '#2aa3ce', 
				images					: false,
				mouse					: 'press',
				onChange     			: function(page){
											$('._current','#paginationdemo').removeClass('_current').hide();
											$('#p'+page).addClass('_current').show();
										  }
			});
		});
		</script>
    
<?php get_sidebar('right'); ?>
    
    </div>
    </div>
    <!--  bodyArea End  -->
    <!-- #primary -->
<?php get_footer(); ?>