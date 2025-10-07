=== Blog Listing - Show recently blog posts in a card layout ===
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

A lightweight shortcode that renders a clean, card-style grid of posts. It’s theme-friendly, minimal by default, and fully configurable via familiar WordPress query parameters.

= Features =

* Simple shortcode: [spno_blog_listing]
* Grid/card layout with customizable column classes (e.g. Bootstrap-style utilities)
* Works with any theme; ships minimal CSS you can override or extend
* Supports all query_posts parameters for filtering, sorting, and limiting results
* Optional hover preview image extracted from the post content

= Usage =

Include the shortcode with the _spno_blog_listing_ identifier. Available options are all parameters from query_posts (see https://developer.wordpress.org/reference/functions/query_posts/) and colclasses, where you can add custom CSS classes like Bootstrap column breaks (a minimal version is included in the plugin CSS).

For example, to show the latest four blog posts in a four-column layout:

<code>
[spno_blog_listing orderby="date" order="DESC" showposts=4 colclasses="col-sm-6 col-lg-6 col-xl-3"][/spno_blog_listing]
</code>

== Changelog ==

### 1.0.0

- First release of this plugin

== Screenshots ==

1. Den Shortcode nahtlos in die vorhandene Seite einfügen und die jüngsten Blog-Posts anzeigen lassen.
2. Responsive Layout (anpassbar) über (vordefinierte) CSS Klassen für jedes Endgerät.
3. Unterstützt mehrere Layouttypen über (vordefinierte) CSS Klassen.
4. Weiteres Vorschaubild beim Hover aus dem Inhalt des Blog-Beitrags.
5. Flexible Konfiguration über Shortcode.
