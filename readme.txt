=== Blog Listing ===
Contributors: webpiloten
Tags: Blog, listing, shortcode
Stable tag: 1.0.0
Requires at least: 6.8
Requires PHP: 7.2
Tested up to: 6.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.paypal.com/donate/?hosted_button_id=2A44PM6GGK2GG

A simple shortcode-based blog listing plugin to easily embed and display your blog posts in an organized, card-style layout on your site.

== Description ==

A simple shortcode-based blog listing plugin to easily embed and display your blog posts in an organized, card-style layout on your site.

= Usage =

Include the shortcode with the _spno_blog_listing_ identifier. Available options are all parameters from _query_posts_ https://developer.wordpress.org/reference/functions/query_posts/ and the colclasses where you can add custom css classes like bootstrap column breaks (minimal version available in the plugin css).

For example, you could use this shortcode to show the latest four blog posts with a two-column layout:

<code>
[spno_blog_listing orderby="date" order="DESC" showposts=4 colclasses="col-sm-6 col-lg-6 col-xl-3"][/spno_blog_listing]
</code>

== Frequently Asked Questions ==

- Currently no FAQ

== Changelog ==

### 1.0.0

- First release of this plugin

== Upgrade Notice ==

- Currently no action neeeded

== Screenshots ==

- Currently no screenshots available

== Donate ==

<form action="https://www.paypal.com/donate" method="post" target="_top">
<input type="hidden" name="hosted_button_id" value="Z8CQ7EL5X2T6L" />
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_DE/i/scr/pixel.gif" width="1" height="1" />
</form>

https://www.paypal.com/donate/?hosted_button_id=2A44PM6GGK2GG
