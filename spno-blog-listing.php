<?php
/*
 * Plugin Name: Blog Listing
 * Description: A simple shortcode-based blog listing plugin to easily embed and display your blog posts in an organized, card-style layout on your site.
 * Version: 1.0.0
 * Author: webpiloten. nonstop online <kontakt@web-piloten.de>
 * Author URI: https://www.web-piloten.de
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define( 'SPNO_BLOG_LISTING_VERSION', '1.0.0' );

function register_spno_blog_listing_styles() {
    wp_enqueue_style( 'spno_blog_listing', plugins_url('public/css/style.css', __FILE__), array(), SPNO_BLOG_LISTING_VERSION );
}
add_action( 'init', 'register_spno_blog_listing_styles' );

function spno_blog_listing_shortcode( $attrs = array(), $content = '' ) {

    $attrs = array_merge(array(
        'order' => 'DESC',
        'orderby' => 'date',
        'showposts' => 3,
        'colclasses' => 'col-sm-6 col-lg-6 col-xl-4'
    ) , $attrs );

    $content .= '<div class="row spno-blog-listing">';

    query_posts ( $attrs );

    while (have_posts()) {
        the_post();

        $content .= '<div class="spno-blog-listing-col' . ' ' . $attrs['colclasses'] .'" role="listitem">';
            $content .= '<div class="card post-box box-standard">';
                $content .= '<div class="card-body">';
                    $content .= '<div class="post-badges">';
                        foreach (array_slice(get_categories() ? get_the_category() : [], 0, 1 ) as $category) {
                            $content .= '<a class="badge" href = "' . get_category_link($category) .  '">' . $category->name . '</a>';
                        }
                    $content .= '</div>';

                    $images = call_user_func( function () {
                        if ( ! class_exists( 'DOMDocument' ) ) {
                            return null;
                        }

                        $dom = new DOMDocument();

                        if ( ! $dom->loadHTML( get_the_content() ) ) {
                            return null;
                        }

                        $html = [];
                        $urls = [get_the_post_thumbnail_url()];

                        /** @var DOMElement $img */
                        foreach ( $dom->getElementsByTagName( 'img' ) as $img ) {
                            if (in_array($img->getAttribute('src'), $urls)) {
                                continue;
                            }

                            $urls[] = $img->getAttribute('src');
                            $html[] = $dom->saveHTML( $img );
                        }

                        shuffle( $html );

                        return current( $html );
                    } );

                    $content .= '<div class="post-image-wrapper' . (is_string($images) ? ' post-image-hover-wrapper' : '') . '">';
                        $content .= '<a href="' . get_permalink() . '" title=".' . get_the_title() . '" class="post-image-link">';
                            $content .= get_the_post_thumbnail();

                            if (is_string($images)) {
                                $content .= $images;
                            }
                        $content .= '</a>';
                    $content .= '</div>';

                    $content .= '<div class="post-info">';
                        $content .= '<a href="' . get_permalink() . '" title=".' . get_the_title() . '" class="post-name">';
                            $content .= get_the_title();
                        $content .= '</a>';
                    $content .= '</div>';

                    $content .= '<div class="post-teaser">';
                    {
                        $text = strip_tags(get_the_content());

                        if (strlen($text)  > 300) {
                            $text = substr($text, 0, 300) . "...";
                        }

                        $content .= $text;
                    }
                    $content .= '</div>';

                    $content .= '<div class="post-author">';
                        $content .= get_the_author_link();
                    $content .= '</div>';
                $content .= '</div>';
            $content .= '</div>';
        $content .= '</div>';
    }

    wp_reset_query();

    $content .= '</div>';

    return $content;
}
add_shortcode( 'spno_blog_listing', 'spno_blog_listing_shortcode' );
