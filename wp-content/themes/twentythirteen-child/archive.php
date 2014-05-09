<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
    <div class="Categories">
    
    <div class="recentpost clearfix">
        <div class="recentpost-Categories"><a href="#"><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', true ) ); ?></a></div>
        
      
    </div>
    <?php if ( category_description() ) : // Show an optional category description ?>
    <div class="archive-meta"><?php echo category_description(); ?></div>
    <?php endif; ?>
    
    
    
    </div>
    <?php /* The loop */ ?>
    <div id="jpages-table">
                <?php 
				$i=1;
				while ( have_posts() ) : the_post(); ?>
               <?php get_template_part( 'content', get_post_format() ); ?>
				 <?php 
				 $i++;
				 endwhile; ?>
            
    
    </div>
    
   
    
   
    <?php else : ?>
    <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
    </div>
    
    <div class="postbottom-Categories">
                             
                             
                             
                               
                               
                               <div class="peginate clearfix">
                               		<div id="paginationdemo" class="demo">
              						<?php echo wpbeginner_numeric_posts_nav();?>
				
                               
                               </div>
                               </div>
                             
                             </div>
  
    
    
    
    </div>
    
    </div>
    </div>
    
    
    
    
    
    <script type="text/javascript">
		jQuery(document).ready(function($){
			
			
			
			
			$("#demo5").paginate({
				count 		: 2,
				start 		: 1,
				display     : 1,
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
<?php get_sidebar(); ?>
<?php get_footer(); ?>