<?php
/**
 * Template Tags
 *
 * @package Vivid
 */

 // Layout ------------------------------------------------------------------------
 function get_header( $config = array() ) {

	 $templates[] = 'partials/header.php';
     $located = locate_template( $templates, false );

	 if( $located ) {
		 extract( $config );

		 if( isset( $body_class ) && $body_class ) {
			 add_body_class( $body_class );
		 }
		 if( isset( $styles ) && $styles ) {
			 enqueue_style( $styles );
		 }
		 if( isset( $scripts ) && $scripts ) {
			 enqueue_script( $scripts );
		 }
		 require_once $located;
	 }
 }

 function get_footer( $config = array() ) {

	 $templates[] = 'partials/footer.php';
     $located = locate_template( $templates, false );

	 if( $located ) {
		 extract( $config );
		 require_once $located;
	 }
 }

 // Markup ------------------------------------------------------------------------
 function add_body_class($class) {
     if(!empty($class)) {
         global $body_classes;
         $body_classes[] = is_array($class) ? join(' ', $class) : $class;
     }
 }
 function body_class($class='') {
     global $body_classes;

     add_body_class($class);

     if(empty($body_classes)) {
         return;
     }

     echo ' class="' . join( ' ', array_unique($body_classes)) . '"';
 }
