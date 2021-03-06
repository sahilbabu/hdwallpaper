<?php
/**

 * The Header template for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Twenty_Thirteen

 * @since Twenty Thirteen 1.0

 */
?><!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) | !(IE 8)  ]><!-->

<html class="loading" <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <!--[if lt IE 9]>

            <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

            <![endif]-->

        <?php wp_head(); ?>

        <link href="<?php echo get_template_directory_uri(); ?>-child/css/style-pegination.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo get_template_directory_uri(); ?>-child/css/responsive.css" rel="stylesheet" type="text/css" />		

        <!-- bxSlider CSS file -->
        <script src="<?php echo get_template_directory_uri(); ?>-child/jquery.paginate.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>-child/js/responsive.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>-child/js/slider.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
        <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/ui-lightness/jquery-ui.css">
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>-child/jquery.fileDownload-master/src/Scripts/jquery.fileDownload.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>-child/js/detectmobilebrowser.js"></script>

        <script>

            jQuery(document).ready(function($) {

                $('.categories ul.category_left_list li')
                        .hide()
                        .filter(':lt(10)')
                        .show();

                $('.categories ul.category_left_list')
                        .append('<li class="see_more"><img height="27" width="40" alt="" src="<?php echo get_template_directory_uri(); ?>-child/images/3dimg9.jpg"><span>See more</span><span class="less">See less</span></li>')
                        .find('li:last')
                        .click(function() {
                            $(this)
                                    .siblings(':gt(1)')
                                    .toggle()
                                    .end()
                                    .find('span')
                                    .toggle();
                        });

                $('#hdwide2 ul li img').each(function(i) {
                    var subUl = $(this).parent().find('ul'); //Get the sub ul.
                    $(this).bind('click', function(e) {
                        e.preventDefault(); // Prevent the default action of the link
                        $('.expanded ul').hide(); // hide all the other ULs
                        subUl.toggle();
                    });
                });


                $('.resolationbutton a').click(function() {
                    $('.resolationbutton2').removeClass('active');
                    $('.resolationbutton').addClass('active');
                    $('#resulotion_l').hide();
                    $('#aspact_ration_l').show();
                });

                $('.resolationbutton2 a').click(function() {
                    $('.resolationbutton').removeClass('active');
                    $('.resolationbutton2').addClass('active');
                    $('#aspact_ration_l').hide();
                    $('#resulotion_l').show();


                });


                $(".slider2").slidesjs({
                    play: {
                        active: true,
                        // [boolean] Generate the play and stop buttons.
                        // You cannot use your own buttons. Sorry.
                        effect: "slide",
                        // [string] Can be either "slide" or "fade".
                        interval: 5000,
                        // [number] Time spent on each slide in milliseconds.
                        auto: true,
                        // [boolean] Start playing the slideshow on load.
                        swap: false,
                        // [boolean] show/hide stop and play buttons
                        pauseOnHover: false,
                        // [boolean] pause a playing slideshow on hover
                        restartDelay: 2500
                                // [number] restart delay on inactive slideshow
                    }

                });

            });
            $(window).load(function() {
                var html = document.getElementsByTagName('html')[0];
                setTimeout(function() {
                    html.className = html.className.replace(/loading/, '');
                }, 1000);
            });

        </script>

        <!-- image style  -->
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>-child/css/sass-compiled.css" />

        <!-- Modrnizr Lib -->
        <script src="<?php echo get_template_directory_uri(); ?>-child/libs/modernizr.js" type="text/javascript"></script>
        <!-- image style  -->

    </head>



    <body <?php body_class(); ?>>



        <!-- wrapper start -->

        <div id="wrapper">

            <!--  header start -->

            <div class="header">



                <div class="headerInner clearfix">

                    <div class="headerOuterLft fLeft clearfix">

                        <div class="welcome fLeft">

                            <p>Welcome To WallRGB.Com</p>

                        </div>



                        <div class="inputOuter fRight clearfix">

                            <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">

                                <input class="input fLeft" placeholder="Enter your search keywords here...." type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" / />



                                       <div class="inputButton fLeft" onClick="document.getElementById('searchform').submit();"></div>



                            </form>



                        </div>



                    </div>

                    <div class="your fRight">

                        <div class="display clearfix">

                            <h3>Your Display Features</h3>

                        </div>

                        <div class="ratio">

                            <div class="wide">

                                <p>Aspect Ratio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;checking...</p>

                                <p class="none">Resolution :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;checking...</p>

                            </div>



                        </div>

                        <div class="ratioBottom"></div>

                    </div>

                </div>



                <div class="logoOuter">



                    <div class="logoInner clearfix">

                        <div class="logo fLeft"><a class="home-link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>-child/images/logo.png" alt="" /></a></div>

                        <div class="googleBanner fRight">



                            <?php if (is_active_sidebar('top-banner-box')) : ?>

                                <ul id="lang-sidebar">

                                    <?php dynamic_sidebar('top-banner-box'); ?>

                                </ul>

                            <?php endif; ?>





                        </div>



                    </div>





                </div>

                <div class="menuOuter">



                    <div class="menuInner">







                        <?php
                        $defaults = array(
                            'theme_location' => '',
                            'menu' => 'Header Menu',
                            'container' => 'div',
                            'container_class' => 'menu clearfix',
                            'container_id' => '',
                            'menu_class' => '',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => ''
                        );



                        wp_nav_menu($defaults);
                        ?>





                    </div>

                </div>

                <!--  header end -->