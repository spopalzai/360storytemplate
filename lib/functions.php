<?php
/**
 * Core Funtions
 *
 * @package Vivid
 */


 // Loader --------------------------------------------------------------------
 function locate_template($template_names, $load = false, $require_once = true ) {
     $located = '';
     foreach ( (array) $template_names as $template_name ) {
         if ( !$template_name )
             continue;
         if ( file_exists(ABSPATH . '/' . $template_name)) {
             $located = ABSPATH . '/' . $template_name;
             break;
         }
     }

     if ( $load && '' != $located ) {
         if ( $require_once ) {
             require_once( $located );
         } else {
             require( $located );
         }
     }

     return $located;
 }

 function get_template_part( $slug, $args = array() ) {

     $templates = array();
     $templates[] = "{$slug}.php";

     $located = locate_template($templates);

     if($located) {
         if ( $args && is_array( $args ) ) {
     		extract( $args );
     	}

         include $located;
     }
 }

function get_uniqid( $prefix = '' ) {
	return uniqid( $prefix );
}

function get_social( $class = 'social-icon', $social = false ) {

	if( empty( $social ) ) {
		$social = $GLOBALS['social'];
	}

	printf( '<ul class="%s">', $class );

	foreach( $social as $icon => $url ) {
		printf( '<li><a href="%s" target="_blank"><i class="fa fa-%s"></i></a></li>', $url, $icon );
	}

	echo '</ul>';
}

function get_share( $url = '', $class = '' ) {

	$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$url = urlencode($url);

	$social = array(
		'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
		'twitter' => 'https://twitter.com/intent/tweet?via=tribunelabs&url=' . $url,
		'google-plus' => 'https://plus.google.com/share?url=' . $url
	);

	get_social( $class, $social );
}

function get_back_to_listing() {
	echo '<a href="/inside-machar-colony#listing">More 360<sup>o</sup> views</a>';
}
