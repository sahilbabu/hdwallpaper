=== Imaguard ===
Contributors: imaguard
Donate link: http://imaguard.com/
Tags: image handling, redirect, google image search
Requires at least: 3.5.1
Tested up to: 3.8.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Blur and add watermark to images to prevent image leeching / hotlinking or force direct hits on image files to show image inside blog layout.

== Description ==

Imaguard allows you to protect your images in two ways:

-A non-aggressive protection where any direct hits on your images are sent to a post page showing the image in your usual page layout.  This prevents your image from being used on remote sites that you don't approve and it will make sure people visiting the image file itself (f ex people clicking through from Google Image Search) will see the image in a page layout (with your site menus, widgets and ads).

-An aggressive protection where the image is darkened and a text is placed on top of the image if the image is accessed from remote sites you haven't approved or through a direct visit.  This is very useful to direct visitors from the new Google Image Search where Google will display a large preview of the image without redirecting the visitor to your site.  You can use this to make the image dark and put a text saying "Click to see" on top as a watermark.

The plugin is partly intended to prevent bandwidth stealing by external sites hotlinking your images - but may also greatly increase visitors from image search engines.  Particularly, as mentioned above, from Google Image Search after their latest update which no longer opens the image on top of your site but instead encourages visits directly to the image itself.

For the non-aggressive protection, Imaguard lets you set the dimensions for the image to be shown inside your normal site layout.  When clicked the image will show in a CSS popover in full size.  For the aggressive protection Imaguard lets you set the text to display over the image.

Imaguard lets you define a whitelist of sites that you want to allow as referrers.  Your own site is always allowed as a referrer - so any visitor clicking on a link to the image on your own site is allowed to view the image.  It you in addition want to allow a friend to directly link or include your images on his site, simply put his website www.friend.com on the whitelist.  Many users also put sites such as twitter.com and facebook.com on their whitelist.

Imaguard also allows you to define a list of "user agents" who can view your images in a normal way.  You will probably want to add googlebot to this list, but you can also set this to allow certain browsers and mobile devices to view images directly.

Imaguard uses htaccess rewrite to direct visitors correctly.  You MUST have rewrites enabled (WP permalink) in order to use Imaguard.  For the text-over-image functionality you must be using PHP5 with the GD library (this is the most common server configuration and chances are this is what you already have installed on your server).  See notes on installation below.

== Installation ==

To install you must:

1. Unzip and then copy the entire imaguard folder into your wp-content/plugins (if installing via Wordpress plugin direct installation, skip this step)

2. Make sure you have WP permalinks enabled at this stage. If not you must enable it.  Imaguard will not be able to correctly redirect offsite / none whitelisted visitors without WP permalinks enabled.

3. Go to your wp-admin dashboard and select plugins. You will see Imaguard on the list. Click 'activate'.

4. Under Settings you will now have a menu option called Imaguard. Open it and make sure you don't have any errors showing on top.  Two potential errors may be displayed here.  You may see a missing WP permalink error (see above).  Follow the steps to activate WP permalinks and then deactivate and reactivate the Imaguard plugin.  Or you may see an error stating that Imaguard was unable to update your htaccess file.  This usually means that the file permissions for your .htaccess file (in the WP root folder) are incorrect.  Either change the file permissions to chmod 666 or make sure that the webserver user has read rights (the latter is recommended).  If changing to chmod 666 you may want to make a note of your old chmod settings and change back after completing the Imaguard setup.

5. That is it. If you go via links on your site to any image, your site will be the referrer and the image will show normally. If you try to open an image directly, though, it will redirect and show the image inside your normal layout.  NB!  Your browser may cache image files so when testing the application it may initially seem not to work.  Either clear your cache, add '?anything' after the image name (e.g. 'test.jpg?123') to force your browser to reload the file, or open a new private browser session and test again.

Note: This plugin requires the GD Library which is usually installed with PHP5 in order for the text-over-image functions to work.

Note: If you use a WP cache plugin, you should refresh your cache both after installing Imaguard and after deactivating Imaguard.

== Frequently Asked Questions ==

= How do I know Imaguard is working properly? =

When testing Imaguard after installetion, you may experience some unexpected results due to caching.  First of all, make sure to refresh any WP cache plugin!  Then delete your browser cache to make sure all images are downloaded by your browser from fresh.

Your site should look just as before.  However , if you check your site code the image tags for jpg images you should include a timestamp at the end (to prevent caching issues).  Now try to click on an image to see it in your browser.  Since your site is the referrer, it should again show as normal.  If you try to visit the image URL directly, though, Imaguard would protect the image since there is no referrer set for a direct visit.  To prevent caching problems you can add "?test" after image: http://yoursite.com/image/test.jpg?test.  This will force your browser to download the image again and you will see the image as it will look if visited directly or included by a remote site not on your referrer list.

If you know some of your images are already included in Google Image Search, and you are using the Imaguard aggressive protection, you can also search for your image.  The thumbnail should show in the normal way (as thumbnails are stored by Google) but the larger version should show as blackened with your text on top (it may take a few seconds to refresh).

= What referer sites should I whitelist? =

This is entirely up to you.  By whitelisting REFERRERS you allow your image to be displayed on remote sites.  Many people allow sites such as twitter.com and facebook.com.

= What user agents should I whitelist? =

Here are some common crawlers / search engine spiders that you may want to whitelist (as user agents) to allow images to be crawled and included in their search (most importantly Googlebot-Image):

Googlebot-Image
Googlebot
Googlebot-News
Googlebot-Video
Googlebot-Mobile
Mediapartners-Google
Mediapartners
Mediapartners-Google
AdsBot-Google

= Do I need to include a 'Powered by Imaguard' text =

No, not at all.  There is an option to do so in the settings, and we would GREATLY appreciate if you actually did.  In fact doing so will make more people use image protection systems and hopefully eventually force image leeches such as Google Image Search to include proper credits and links to the original site.  But if you prefer not to include such a note, simply make sure this functionality in the settings is disabled.

= I stopped using the Imaguard plugin and now none of my images work =

If you have installed Imaguard, make sure that you refresh your site cache if you use a WP cache plugin.  You should also manually review your .htaccess file in your wp root directory to confirm that there is no imaguard section there.  If you find a section marked imaguard, you should remove this (anything between # BEGIN imaguard and #END imaguard).

== Screenshots ==

1. The settings section of Imaguard.
2. Example of non-aggressive image protection. Image is shown in your blog layout when accessed directly and if clicked as a css popup as here.
3. Example of non-aggressive image protection. Image is shown in your blog layout when accessed directly.
4. Example of aggressive image protection with Imaguard.

== Changelog ==

= 1.0 =
* First release

= 1.2 =
Added user agent whitelist
Added text over image option
Fixed bug in htaccess regeneration

= 1.3 =
Fixed problem with tickbox jQuery CSS popup on some browsers (endless loading problem)
Fixed 500 error issue with certain characters on user agent list
Added optional credit line to watermark.  Remove by unchecking in settings
Amended deactivation tag to better remove htaccess footprint when deactivated
Added option to set redirect type 301 or 302
Added option to set font size
Added option to set vertical text position
Added option to set degree of darkness to add to images in aggressive mode
Added onward forward to image post instead of image preview page (note: this is still in beta mode)

= 1.3.2 =
Fixed a bug related to the show in post Beta function

= 1.3.3 =
Bug fix to keep compatibility with WP 3.8.1

== Upgrade Notice ==

= 1.0 =
This is the initial public release

= 1.2 =
To upgrade, deactivate the plugin then make sure to refresh your cache if you use a cache plugin.  Then remove the plugin files and the directory in wp-include/plugins/imaguard.  Review your .htaccess file in your wp root directory to confirm that there is no imaguard section there.  If you find a section marked imaguard, you should remove this (anything between # BEGIN imaguard and #END imaguard).

= 1.3 =
Several bugs fixed.  Upgrade is heighly recommended even if you are not looking for the improved functionalities as earlier versions had a problem in generating .htaccess files with invalid characters.

= 1.3.2 =
Minor bug fixes.  Upgrade is essential to use the 'show in post' beta function
and will also aid in upgrade from 1.2.x to 1.3.x by better settings migration.

= 1.3.3 =
Bug fix essential for WP 3.8.1 compatibility

NB! Before you upgrade, make a note of all your settings (whitelists, image resize etc).  These may be lost when upgrading and must then be copied back in.

`<?php code(); // goes in backticks ?>`

