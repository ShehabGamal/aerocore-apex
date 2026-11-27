<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page, post, property
 */
defined( 'ABSPATH' ) || exit;
get_header();
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
get_footer();
