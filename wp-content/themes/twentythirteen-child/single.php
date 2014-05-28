<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="bodyArea">
                    	<div class="bodyInner clearfix">
                        	
                            	<div class="lftBar fLeft clearfix">
                            		  <?php get_sidebar( 'left' ); ?>
                                      <?php /* The loop */ ?>
								<?php 
								global $post;
								while ( have_posts() ) : the_post(); 
								$categories = get_the_category($post->ID);

								?>
                              <div class="bannerOuter fRight">
                              <div class="recentpost clearfix recentpost-Categories">
                                	<div ><a href="#"><?php the_title(); ?></a></div>
                                  
                                </div>
                              
                              
                              	<div class="product-main-baner" id="product-main-baner">
                           	    <?php the_post_thumbnail('slider-thumb');
								 $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-thumb');
								  $large_image_full = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
								  $fb_cover = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '850x315-thumb');
								  $fb_cover = realpath(str_replace(get_bloginfo('url'), '.', $fb_cover[0]));
								  $fb_profile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '230x230-thumb');
								  $fb_profile = realpath(str_replace(get_bloginfo('url'), '.', $fb_profile[0]));
								  $tw = realpath(str_replace(get_bloginfo('url'), '.', $large_image_url[0]));
								?>
                                
                                <!--<a href="<?php echo $large_image_url[0];?>&w=569&h=303"><button>Download <?php the_title(); ?></button></a>-->
                                <a href="<?php echo site_url('/');?>download.php?download_file=<?php print urlencode($large_image_url[0]);?>&w=800&h=600"><button>Download <?php the_title(); ?></button></a>
                       
                                	<form id="download_photo" name="download_photo" method="post" enctype="multipart/form-data">
                                            <input type="hidden" title="hidden" name="download_photo_url" id="download_photo_url" value="<?php print $tw; ?>" />
                                    </form>
                                </div>
                                <div class="extra-links">
                                <ul>

                                <li class="facebook-disply"><a target="_blank" href="<?php echo site_url('/');?>process.php?pid=<?php print urlencode($fb_profile);?>&action=2">Set as Facebook Display Picture</a></li>
                                <li><a target="_blank" href="<?php echo site_url('/');?>process.php?pid=<?php print urlencode($fb_cover);?>&action=1">Set as Facebook Cover</a></li>
                                <li><a href="#">Set as Google plus</a></li>
                                <li><a href="#">Set as Twitter</a></li>
                               </ul>
                               </div>
                               <div class="clr"></div>
                               <div class="extra-cont">
                                    <div class="row-fluid">
                                        <div class="span3"><h4 class="widgettitle">HD</h4></div>
                                        <div class="span9">
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1600&h=1200">1600X1200</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=3840&h=2160">3840X2160</a>
                                            <a class="btn btn-warning"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=3554&h=1999">3554X1999</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2880&h=1620">2880X1620</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2560&h=1440">2560X1440</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2400&h=1350">2400X1350</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2048&h=1152">2048X1152</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1920&h=1080">1920X1080</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1600&h=900">1600X900</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1366&h=768">1366X768</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1280&h=720">1280X720</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1024&h=576">1024X576</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=960&h=540">960X540</a></div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span3"><h4 class="widgettitle">WIDE</h4></div>
                                        <div class="span9">
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1600&h=1200">1600X1200</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=3840&h=2160">3840X2160</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=3554&h=1999">3554X1999</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2880&h=1620">2880X1620</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2560&h=1440">2560X1440</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2400&h=1350">2400X1350</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=2048&h=1152">2048X1152</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1920&h=1080">1920X1080</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1600&h=900">1600X900</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1366&h=768">1366X768</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1280&h=720">1280X720</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=1024&h=576">1024X576</a>
                                            <a class="btn"  href="http://www.wallrgb.com/download.php?download_file=http%3A%2F%2Fwww.wallrgb.com%2Fwp-content%2Fuploads%2F2014%2F05%2Fsky_sun_sea_path_reflection_clouds_ripples_horizon_line_wallpaper_3840x2160.jpg&w=960&h=540">960X540</a></div>
                                    </div>

                                </div>
                               <div class="product-main-baner content-area">
                           	   
                                
                       
                                	<?php the_content(); ?>
                              
                                </div>
                          
                          		<div class="recentpost clearfix">
                                	<div class="recentpost-product"><a href="#">Related wallpaper</a></div>
                                	
                                  
                                </div>
                       
                                <div class="recentpostOuter">
                           
                               
                               <?php
							   $exclude_ids = $post->ID;	
							   
							   $exclude_ids = array( $post->ID);
$my_query = new WP_Query( array( 'post_type'=>'post','cat'=>$categories[0]->term_id,'showposts'=>6,'orderby'=>'rand', 'post__not_in' => $exclude_ids ) );						   
								
								
								if ( $my_query->have_posts() ) { 
								 ?>
                                  <div class="chrismis clearfix">
                                 <?php
								 
								 while ( $my_query->have_posts() ) { 
								 
									$my_query->the_post();
									?>
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
                       					</div>
										<?php
                                        if($i==2)
                                        {
                                            $i=0;
                                        ?>
                                            </div><div class="chrismis clearfix">
                                        <?php
                                        }
                                        else
                                        {
                                            $i++;
                                        }
										?>
                                        
                                        <?php
                                }
                                ?>                        
                                
                                </div>
                               <?php
				
							}
							wp_reset_postdata();
							?> 
                            </div>
                            <?php endwhile; ?> 
                            </div>
                           </div>
                           </div>
                            <?php get_sidebar( 'right' ); ?>
                            
                        </div>
                    </div>
<?php get_footer(); ?>