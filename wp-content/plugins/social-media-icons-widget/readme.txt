=== Social Icons Widget ===
Contributors: dannisbet
Tags: social, media, widget, follow, profile, icons, About.me, Behance, Dribbble, Email, Facebook, Flickr, Forrst, FourSquare, GitHub, Google+, Instagram, Klout, LinkedIn, Medium, Path, Pinterest, RSS, StumbleUpon, Technorati, Tumblr, Twitter, Vimeo, WordPress, Yelp, YouTube, Zerply
Donate link: https://github.com/dannisbet/social-icons-widget
Requires at least: 3.5.1
Tested up to: 3.9
Stable tag: 14.05
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Displays a list of social media website icons and a link to your profile.

== Description ==

The Social Media Icons widget takes a simple, extendable approach to displaying links to your social media profiles in WordPress. The purpose of this plugin was to strip away the complexities I found most other plugins to have and simply display a set of basic social icons in an unordered list. There's no frills and no fanciness, making it easy to style to your website's look.

= Extending =

By default, the Social Icons Widget provides a variety of popular social media websites. Developers can easily add more social media websites by creating a filter in the active theme's functions.php file like such:

	function add_new_icons($icon_list) {
		$icon_list['Full Website Name'] = 'full-website-id';
 
		return $icon_list;
	}
	add_filter('social_icon_accounts', 'add_new_icons');

The full-website-id should reflect the name of the image you create in each of the icon folder sizes, or in your custom icon directory. It is also used to populate the class field of the icon when the widget displays. The Social Icon Widget looks for .gif, .jpg, .jpeg, and .png in order and returns the first extention it finds.

The widget can also be branched via its [GitHub page](https://github.com/dannisbet/social-icons-widget).

= Custom Icons =

Custom icons are easy to add. To enable them, select "Custom" from the Icon Type dropdown in the widget settings. In the directory of your active theme, create a folder titled 'social_icons'. Within that directory, add folders titled 'small', 'medium', and 'large' for each icon size you wish to use. Add your icons in .gif, .jpg, .jpeg, or .png format, using the name of the ID in the $social_accounts array (details above).

= Icons =

Default icons are from the [Simple Icons](http://simpleicons.org/) set created by Dan Leech.

Email envelope icon is from Cy Me at [Noun Project](http://thenounproject.com/term/envelope/24786/).

== Installation ==

Download the zip file and upload to your WordPress installation. Upon activation, widget is available under Appearance > Widgets. Drag the widget into your sidebar, adjust the settings, and populate the profiles you wish to show on your website.

== Frequently Asked Questions ==

Coming soon.

== Screenshots ==

1. Some examples of how the plugin displays by default in its various settings available via the widget.
2. Widget settings via the Appearance > Widgets screen.

== Changelog ==

= 14.05 =
* Fixed broken image links when WordPress is installed under a directory.

= 14.04 =
* Added new options for About.me, Email, GitHub, Medium, and WordPress profile links
* Updated all icons to Simple Icons set

= 14.03 =
* Removed @getimagesize function for compatibility purposes
* New accounts are now added via WordPress filter rather than editing core plugin code

= 2013.05 =
* Fixed image and CSS paths

= 2013.04 =
* Initial commit

= trunk =
* Initial commit

== Upgrade Notice ==

= 14.03 =
Removed @getimagesize function for compatibility purposes. New accounts are now added via WordPress filter rather than editing core plugin code.

= 2013.05 =
Fixed image and CSS paths

= 2013.04 =
Initial commit to WordPress plugin repository