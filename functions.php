<?php

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
	$code = 'class="btn"';
	return str_replace('<a href=', '<a '.$code.' href=', $output);
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
 
function posts_link_attributes() {
    return 'class="btn"';
}



add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );


function app_scripts(){
	  	wp_enqueue_script( 'jssor', get_stylesheet_directory_uri() . '/inc/js/jssor.js', array('jquery'));
	  	wp_enqueue_script( 'jssor.slider', get_stylesheet_directory_uri() . '/inc/js/jssor.slider.min.js', array('jquery'));
	  	wp_enqueue_script( 'default', get_stylesheet_directory_uri() . '/inc/js/default.js', array('jquery'));

}


add_action( 'wp_enqueue_scripts', 'app_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_stylesheet_directory() . '/inc/template-tags.php';


?>
