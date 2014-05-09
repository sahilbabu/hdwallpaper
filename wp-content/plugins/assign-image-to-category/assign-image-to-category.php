<?php
/*
Plugin Name: Assign Image To Category
Plugin URI: http://wordpress.org/plugins/assign-image-to-category/
Description: This is Assign Image To Category.
Author: shahzad
Version: 1.0
Author URI: http://shahzadjam18.com
*/

function dwallpaper_project_updated_set_term( $post_id ) {
	
	 $large_image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full');
	
	 $terms_p = get_terms("resolution");
	
	if(!empty($large_image_full))
	{
	
	 if ( !empty( $terms_p ) && !is_wp_error( $terms_p ) ){
		 
		 foreach ( $terms_p as $term_p ) {
			 
		    $term_id = $term_p->term_id;
			$taxonomy_name = 'resolution';
			$termchildren = get_term_children( $term_id, $taxonomy_name );
			$k=0;
			foreach ( $termchildren as $child ) {
				$term = get_term_by( 'id', $child, $taxonomy_name );
				
				$diemention = explode('X', strtoupper($term->name));
				
				$tag = array( $term->term_id );
				if($diemention[0] <= $large_image_full[1] && $diemention[1] <= $large_image_full[2])
				{
			    	wp_set_post_terms( $post_id, $tag, $taxonomy_name, true);
					$k=1;
				}
				
				
			}
			if($k==1)
			{
				$tag = array( $term_id );
				wp_set_post_terms( $post_id, $tag, $taxonomy_name, true);
			}
			
		 }
	 } 
	
	}
}
add_action( 'save_post', 'dwallpaper_project_updated_set_term' );