<?php
/*
Plugin Name: Wordpress Before After-Image Comparator Filter Example
Version: 1.0.0
Plugin URI: http://blog.scrobble.me/wordpress-jquery-before-after-image-slider/
Description: This plugin demonstrates the usage of the filters available within my plugin.
Author: Adrian M&ouml;rchen
Author URI: http://www.adrian-moerchen.de
*/


add_filter('image_comparator_left_image', 'ic_comparator_left_image_filter', 10, 2);
add_filter('image_comparator_right_image', 'ic_comparator_right_image_filter', 10, 2);
add_filter('image_comparator_content', 'ic_comparator_content_filter', 10, 2);

/**
 * If the class 'left-login-required' is set, the user must be logged in to view the left image.
 *
 * @param $left_image_content  HTML code for the left image
 * @param $shortcode_parameters Array of the provided short code parameters.
 * @return Altered content.
 */
function ic_comparator_left_image_filter($left_image_content, $shortcode_parameters)
{
    if (strpos($shortcode_parameters['classes'], 'left-login-required') !== false && !is_user_logged_in()) {
        return '<h1>Please login to see the left image</h1>';
    }
    return $left_image_content;
}

/**
 * If the class 'right-login-required' is set, the user must be logged in to view the right image.
 *
 * @param $right_image_content  HTML code for the left image
 * @param $shortcode_parameters Array of the provided short code parameters.
 * @return Altered content.
 */
function ic_comparator_right_image_filter($right_image_content, $shortcode_parameters)
{
    if (strpos($shortcode_parameters['classes'], 'right-login-required') !== false && !is_user_logged_in()) {
        return '<h1>Please login to see the right image</h1>';
    }
    return $right_image_content;
}

/**
 * If the class 'login-required' is set, the user must be logged in to view the comparator.
 *
 * @param $content  HTML code for the left image
 * @param $shortcode_parameters Array of the provided short code parameters.
 * @return Altered content.
 */
function ic_comparator_content_filter($content, $shortcode_parameters)
{
    //** We add a space add the first position to avoid collisions with right-login-required and left-login-required */
    if (strpos(' ' . $shortcode_parameters['classes'], ' login-required') !== false && !is_user_logged_in()) {
        return '<h1>Please login to see the image comparator.</h1>';
    }
    return $content;
}