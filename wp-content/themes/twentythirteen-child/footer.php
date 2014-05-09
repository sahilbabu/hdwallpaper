<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

  <div class="footer clearfix">
               		<div class="footerInner clearfix">
                    	<div class="footerlogo fLeft">
                   	    <a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri(); ?>-child/images/logo.png" width="294" height="79" alt="" /></a></div>
                        
                      
                        
                        
                         <?php

				$defaults = array(
					'theme_location'  => '',
					'menu'            => 'Footer Menu',
					'container'       => 'div',
					'container_class' => 'footerMenu fRight',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);
				
				wp_nav_menu( $defaults );
				
				?>
                        	<!--<ul>
                    	<li><a href="#" class="active">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Link Exchange</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Site Map</a></li>
                        <li><a href="#">Images Sitemap </a></li>
                        
                        <li class="cl"><a href="#">Contact us</a></li>
                    </ul>-->
                        
                        
                   </div>  
               </div>	
              
        </div>
       <!-- wrapper end -->
       
		
<?php wp_footer(); ?>

</body>
</html>