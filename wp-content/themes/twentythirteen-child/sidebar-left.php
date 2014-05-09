<?php
/**
Template Name: Sidebar Left
 */
?>
<div id="sidebar-left">
<?php    /* Widgetized sidebar, if you have the plugin installed. */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Left') ) : ?>
	
				<div class="categories fLeft">
                                	
<div class=" by clearfix">
    <div class="byboxesImg fLeft"><img src="<?php echo get_template_directory_uri(); ?>-child/images/boxesImg.jpg" width="14" height="14" alt="" /></div>
    <div class="bytext fLeft">
    	<p>Search By Categories</p>
	</div>
</div>
<?php
$category_id = get_query_var('cat');
		if(isset($category_id))
		{
			?>
<div class=" threed clearfix">
	<div class="byboxesImg fLeft"><img src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg" width="14" height="14" alt="" /></div>
    <div class="three fLeft">
        <p><?php echo single_cat_title("",false);?></p>
    </div>
</div>
<?php
		}
?>
<div class="alfa">
	<ul>
	<?php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_order',
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
		
		$categories = get_the_category();
		$category_id = get_query_var('cat');
		if($category_id!=$categor->cat_ID)
		{
			?>
        <li> <?php							   
        $my_query = new WP_Query("post_type=post&cat=".$categor->cat_ID."&showposts=1&orderby=date&order=DESC");
        
        if ( $my_query->have_posts() ) { 
            while ( $my_query->have_posts() ) { 
            $my_query->the_post();
            
            
            
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                     ?>
                     <a href="<?php echo site_url($categor->slug);?>">
                     <?php the_post_thumbnail('40x27-thumb');
					 ?>
                     </a>
                     <?php
                    } 
            
            }
        }?>
           
                <p><a href="<?php echo site_url($categor->slug);?>"><?php echo $categor->name;?></a></p>
            </li>
        <?php
		}
	}
	?>
    	<!--<li>
		<img src="<?php echo get_template_directory_uri(); ?>-child/images/3dimg9.jpg" width="40" height="27" alt="" /> 
			<p><a href="#">See more</a></p>
		</li>-->
	</ul>


 <div class="filter">
    <h4>Filter by</h4>
 </div>
 
 <div class=" resolation clearfix">
 <div class="resolationbutton fLeft">
    <a href="javascript:void(0);">Aspect Ratio</a>
   
    </div>
    <div class="resolationbutton2 active fLeft">
    <a href="javascript:void(0);">Resolution</a>
   
    </div>
 </div>
<div id="aspact_ration_l" style="display:none;">
<div class="Resolutions">
    <h4>Aspect Ratio</h4>
 </div>

<div class="hdwide" id="hdwide">
<?php

$args = array(
    'orderby'       => 'term_order', 
    'order'         => 'ASC',
    'hide_empty'    => true, 
    'exclude'       => array(), 
    'exclude_tree'  => array(), 
    'include'       => array(),
    'number'        => '', 
    'fields'        => 'all', 
    'slug'          => '', 
    'parent'         => 0,
    'hierarchical'  => true, 
    'child_of'      => 0, 
    'get'           => '', 
    'name__like'    => '',
    'pad_counts'    => false, 
    'offset'        => '', 
    'search'        => '', 
    'cache_domain'  => 'core'
); 

$terms_p = get_terms("resolution",$args);

	 if ( !empty( $terms_p ) && !is_wp_error( $terms_p ) ){
		 
		 foreach ( $terms_p as $term_p ) {
			 $term_p = sanitize_term( $term_p, 'resolution' );

    		$term_p_link = get_term_link( $term_p, 'resolution' );
			$term_id = $term_p->term_id;
			 ?>
                
                    
				<?php
			 
		    $term_id = $term_p->term_id;
			$taxonomy_name = 'resolution';
			$termchildren = get_term_children( $term_id, $taxonomy_name );
			if(!empty($termchildren))
			{
				echo "<ul class='children' id='ul_box_".$term_id."'>";
			
				foreach ( $termchildren as $child ) {
					$term = get_term_by( 'id', $child, $taxonomy_name );
					$term = sanitize_term( $term, 'resolution' );

    				$term_link = get_term_link( $term, 'resolution' );
					?>
                    <li>
                <img width="40" height="27" alt="" id="box_<?php echo $term_id?>" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
						<p><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a></p>
					</li>
					<?php
					
					
				}
				echo "</ul>";
			}
							
		 }
	 } 

?>
  
   

</div>
</div>
<div id="resulotion_l">
<div class="Resolutions">
    <h4>Resolutions</h4>
 </div>

<div class="hdwide" id="hdwide2">
<ul>
<?php

$args = array(
    'orderby'       => 'term_order', 
    'order'         => 'ASC',
    'hide_empty'    => true, 
    'exclude'       => array(), 
    'exclude_tree'  => array(), 
    'include'       => array(),
    'number'        => '', 
    'fields'        => 'all', 
    'slug'          => '', 
    'parent'         => 0,
    'hierarchical'  => true, 
    'child_of'      => 0, 
    'get'           => '', 
    'name__like'    => '',
    'pad_counts'    => false, 
    'offset'        => '', 
    'search'        => '', 
    'cache_domain'  => 'core'
); 

$terms_p = get_terms("resolution",$args);

	 if ( !empty( $terms_p ) && !is_wp_error( $terms_p ) ){
		 
		 foreach ( $terms_p as $term_p ) {
			 $term_p = sanitize_term( $term_p, 'resolution' );

    		$term_p_link = get_term_link( $term_p, 'resolution' );
			$term_id = $term_p->term_id;
			 ?>
                <li>
                <img width="40" height="27" alt="" id="box_<?php echo $term_id?>" src="<?php echo get_template_directory_uri(); ?>-child/images/arrow.jpg"> 
                    <p><a href="<?php echo $term_p_link; ?>"><?php echo $term_p->name; ?></a></p>
                </li>
				<?php
			 
		    $term_id = $term_p->term_id;
			$taxonomy_name = 'resolution';
			$termchildren = get_term_children( $term_id, $taxonomy_name );
			if(!empty($termchildren))
			{
				echo "<ul class='children' style='display:none' id='ul_box_".$term_id."'>";
			
				foreach ( $termchildren as $child ) {
					$term = get_term_by( 'id', $child, $taxonomy_name );
					$term = sanitize_term( $term, 'resolution' );

    				$term_link = get_term_link( $term, 'resolution' );
					?>
					<li>
						<p><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a></p>
					</li>
					<?php
					
					
				}
				echo "</ul>";
			}
							
		 }
	 } 

?>
  
   
</ul>

</div>
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
		
<?php endif; ?>