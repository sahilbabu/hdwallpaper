<?php
/**
* Template Name: Home Page
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
get_header();
?>

<!--  bodyArea start  -->

<div class="bodyArea">
<div class="bodyInner clearfix">
	<div class="lftBar fLeft clearfix">
		  <?php get_sidebar( 'left' ); ?>
		
	  <div class="bannerOuter fRight">
	  
		<div class="product-main-baner">
        <div class="slider2">
        <?php							   
				$my_query_banner = new WP_Query("post_type=post&&showposts=3&orderby=rand");
				
				if ( $my_query_banner->have_posts() ) { 
				 while ( $my_query_banner->have_posts() ) { 
					$my_query_banner->the_post();?>
                    <?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									?>
                                      <a href="<?php echo the_permalink();?>">
                                      <?php 
									  the_post_thumbnail('slider-thumb');
									  ?>
                                      </a>
                                      <?php
									} 
									?>
		
        <?php
				 }
		}
		wp_reset_postdata();
		?>
        </div>
		</div>
		<div class="boxer">
			<h2>2014 Porche Boxer by TechArt 2 Wallpapers</h2>
			<p>HD Wallpapers Inn Provides Best PC, Desktop and High Definition Wallpapers. We Upload a Great Collection Of HD Wallpapers 1080p Everyday in High Resolutions.</p>
		</div>
		<?php

	   
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'DESC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false 
			
			); 
			
			
			 $categories = get_categories( $args ); 
			
			foreach($categories as $categor)
			{
	  ?>
				<div class="recentpostOuter">
						
						  <div class="recentpost clearfix">
								<div class="recentbutton fLeft"><a href="<?php echo site_url($categor->slug);?>"><?php echo $categor->name;?></a></div>
								
							  <div class="socialButton fRight">
							  <?php echo do_shortcode('[hupso]');?>
								  
							</div>
							</div>
							<div class='chrismis clearfix'>
				<?php							   
				$my_query = new WP_Query("post_type=post&cat=".$categor->cat_ID."&showposts=3&orderby=rand");
				
				if ( $my_query->have_posts() ) { 
				 while ( $my_query->have_posts() ) { 
					$my_query->the_post();?>
									
									<div class="chrismisBox fLeft">
									
									<?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									?>
                                      <a href="<?php echo the_permalink();?>">
                                      <?php 
									  the_post_thumbnail('homepage-thumb');
									  ?>
                                      </a>
                                      
                                      <?php
									} 
									?>
									
									
									<h5><a href="<?php echo the_permalink();?>"><?php echo the_title();?></a></h5>
									<p><?php echo the_date();?></p>
									
									</div>												
				<?php
					   
				   }
				}
				?>
	</div>
</div>	                      
<?php
}
wp_reset_postdata();
?>
<!--<div class="postbottom">
    <div class="peginate clearfix">
        <div id="paginationdemo" class="demo">
            <div id="p1" class="pagedemo _current"></div>
            <div id="p2" class="pagedemo"></div>
            <div id="p3" class="pagedemo"></div>
            <div id="p4" class="pagedemo"></div>
            <div id="p5" class="pagedemo"></div>
            <div id="p6" class="pagedemo"></div>
            <div id="p7" class="pagedemo"></div>
            <div id="p8" class="pagedemo"></div>
            <div id="p9" class="pagedemo"></div>
            <div id="p10" class="pagedemo"></div>
        <div id="demo5">                   
    </div>
</div>
</div>
	 
</div>--> 
</div>
</div>
</div>
<?php get_sidebar( 'right' ); ?>
	
	
</div>
</div>
<!--  bodyArea End  -->
<?php //get_sidebar(); ?>
<?php 
get_footer(); 
?>
