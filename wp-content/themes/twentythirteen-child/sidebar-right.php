<?php
/**
Template Name: Sidebar Right
 */
?>
<?php    /* Widgetized sidebar, if you have the plugin installed. */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Right') ) : ?>
<div class="rightBar fRight">

<div class="youCanLogin fLeft">
 <?php if ( is_user_logged_in() ) {  echo "<h4>Welcome</h4>"; }else{ echo "<h4>You Can Login here</h4>";} ?>
</div>
<div class="login fLeft">

 <?php if ( is_active_sidebar( 'my-login-box' ) ) : ?>
    <ul id="lang-sidebar">
        <?php dynamic_sidebar( 'my-login-box' ); ?>
    </ul>
 <?php endif; ?>	
 
    <?php if ( !is_user_logged_in() ) { ?>
    <div class="signup fLeft">
        <a href="<?php echo site_url();?>/wp-login.php?action=register">Sign Up</a>
    </div>
    <?php } ?>
</div>

<div class="addChoices">
							<?php if ( is_active_sidebar( 'google-ads-box' ) ) : ?>
                            <ul id="google-ads-box-box-sidebar">
                                <?php dynamic_sidebar( 'google-ads-box' ); ?>
                            </ul>
                         <?php endif; ?>
 <div class="addborder"></div>
 
 
 
 
 
</div>


<div class="findus clearfix">
    <div class="findlft fLeft">
        <h3>Find Us On </h3>
    </div>
    
    
    <div class="findright fRight">
    <div class="findright fRight"><img alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/pettran.jpg"></div>
						
    </div>
    
    
    
    
</div>


<div class="fbicon clearfix">
<?php if ( is_active_sidebar( 'find-us-box' ) ) : ?>
                            <ul id="find-us-box-sidebar">
                                <?php dynamic_sidebar( 'find-us-box' ); ?>
                            </ul>
                         <?php endif; ?>

</div>
 <div class="findus02 clearfix">
    <div class="findlft02 fLeft">
      <h3>Find Us On </h3>
    </div>
    
    
    <div class="findright02 fRight"> 
    <img alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/pettran.jpg">
						</div>
    
   
    
    
</div> 

<div class="socialIcone clearfix">
<?php if ( is_active_sidebar('mysocialicone-box' ) ) : ?>
    <ul id="mysocialicone-box-box-sidebar">
        <?php dynamic_sidebar('mysocialicone-box'); ?>
    </ul>
 <?php endif; ?>


</div>


<div class="findus03 clearfix">
    <div class="findlft03 fLeft">
      <h3>Advertisement</h3>
    </div>
    
    
    <div class="findright03 fRight"><img alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/pettran.jpg"></div>    
</div>


<div class="sweetmessage clearfix">
<?php if ( is_active_sidebar( 'my-advertisement-box' ) ) : ?>
                            <ul id="my-advertisement-box-sidebar">
                                <?php dynamic_sidebar( 'my-advertisement-box' ); ?>
                            </ul>
                         <?php endif; ?>
</div>


<div class="findus04 clearfix">
    <div class="findlft04 fLeft">
        <h3>News in Pictures</h3>
    </div>
    
    
    <div class="findright04 fRight"><img src="<?php echo get_template_directory_uri(); ?>-child/images/pattren3.jpg"  alt="" /></div>
</div>


<div class="news clearfix">
<div class="newsIn">
<ul>
  <?php							   
				$my_query_banner = new WP_Query("post_type=post&showposts=12&orderby=rand");
				
				if ( $my_query_banner->have_posts() ) { 
				 while ( $my_query_banner->have_posts() ) { 
					$my_query_banner->the_post();?>
    <li><?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									  
									  ?>
                                      <a href="<?php echo the_permalink();?>">
                                      <?php the_post_thumbnail('55x55-thumb'); ?>
                                      </a>
									  <?php
									} 
									?></li>
                                    <?php
				 }
		}
		wp_reset_postdata();
		?>
</ul>

</div>

<div class="addborder02"></div>
</div>
</div>
<?php endif; ?>