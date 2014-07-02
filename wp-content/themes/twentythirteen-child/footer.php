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
            <a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>-child/images/logo.png" width="294" height="79" alt="" /></a></div>




        <?php
        $defaults = array(
            'theme_location' => '',
            'menu' => 'Footer Menu',
            'container' => 'div',
            'container_class' => 'footerMenu fRight',
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

<!-- Histats.com  START (hidden counter)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="html hit counter" ><script  type="text/javascript" >
    try {Histats.start(1,2631119,4,0,0,0,"");
        Histats.track_hits();} catch(err){};
    </script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2631119&101" alt="html hit counter" border="0"></a></noscript>
<!-- Histats.com  END  -->

<script>

    jQuery(document).ready(function($) {
        var res = get_resolution();
        var asp_ratio = res[4];
        var width = res[0];
        var height = res[1];
        $(".ratio").html('<div class="wide"><p>Aspect Ratio:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+asp_ratio+'</p><p class="none">Resolution :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + width + ' X ' + height + '</p></div>');
        if($('#size_'+width + 'X'+height).length > 0) {
            $('#size_'+width + 'X'+height).addClass('btn-warning');   
        }
    });

    function gcd(a, b) {

        return (b == 0) ? a : gcd(b, a % b);

    }



    function get_resolution() {

        var w = screen.width;

        var h = screen.height;

        var r = gcd(w, h);

        var resolution = w / r + ":" + h / r;

        var ratio = (jQuery.browser.mobile) ? 'Mobile' : asp_ratio(resolution);

        var ret = [w, h, r, resolution, ratio];

        return ret;
    }

    function asp_ratio(resolution) {

        var ret = '';

        switch (resolution) {

            case "683:384":

            case "16:9":

                ret = 'HD';

                break;

            case "16:10":

            case "5:3":

                ret = 'Wide';

                break;

            case "4:3":

            case "5:4":

                ret = 'Standard';

                break;

            case "9:16":

                ret = 'Mobile';

                break;

            default:

                ret = 'Other';

                break;

        }

        return ret;

    }

</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1459918874245839&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>