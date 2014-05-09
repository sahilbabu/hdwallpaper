<div class="categories fLeft">
                                	
<div class=" by clearfix">
    <div class="byboxesImg fLeft"><img src="<?php echo get_template_directory_uri(); ?>-child/images/boxesImg.jpg" width="14" height="14" alt="" /></div>
    <div class="bytext fLeft">
    	<p>Search By Categories</p>
	</div>
</div>

<div class=" threed clearfix">
	<div class="byboxesImg fLeft"><img src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg" width="14" height="14" alt="" /></div>
    <div class="three fLeft">
        <p>3D</p>
    </div>
</div>

<div class="alfa">
	<ul>
	<?php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
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
	<li> <?php							   
	$my_query = new WP_Query("post_type=post&cat=".$categor->cat_ID."&showposts=1&orderby=date&order=DESC");
	
	if ( $my_query->have_posts() ) { 
		while ( $my_query->have_posts() ) { 
		$my_query->the_post();
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail('40x27-thumb');
				} 
		
		}
	}?>
	   
			<p><a href="<?php echo $categor->slug;?>"><?php echo $categor->name;?></a></p>
		</li>
	<?php
	}
	?>
    	<li>
		<img src="<?php echo get_template_directory_uri(); ?>-child/images/3dimg9.jpg" width="40" height="27" alt="" /> 
			<p><a href="#">See more</a></p>
		</li>
	</ul>


 <div class="filter">
    <h4>Filter by</h4>
 </div>
 
 <div class=" resolation clearfix">
 <div class="resolationbutton fLeft">
    <a href="#">Aspect Ratio</a>
   
    </div>
    <div class="resolationbutton2 fLeft">
    <a href="#">Resolution</a>
   
    </div>
 </div>

<div class="Resolutions">
    <h4>Resolutions</h4>
 </div>

<div class="hdwide">
<ul>
    <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Wide</a></p>
    </li>
    <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">HD</a></p>
    </li>
    <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Standard</a></p>
    </li>
    <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Mobile Ratio</a></p>
    </li>
     <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Iphone Brands </a></p>
    </li>
     <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Dual</a></p>
    </li>
     <li>
    <img width="40" height="27" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
        <p><a href="#">Other</a></p>
    </li>
   
</ul>

</div>
<div class=" topwallpaper clearfix">
<div class="byboxesImg fLeft"><img width="14" height="14" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/wightboxes.jpg"></div>
<div class="bytext fLeft">
<p>Top Wallpapers</p>
</div>
</div>
<div class="beautiful">
 <?php if ( is_active_sidebar( 'my-top-posts-box' ) ) : ?>
    <ul id="my-top-posts-box-sidebar">
        <?php dynamic_sidebar( 'my-top-posts-box' ); ?>
    </ul>
 <?php endif; ?>
</div>
</div>

</div>