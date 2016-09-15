<?php
/**
 * Init the engine
 *
 * @package Vivid
 */

define('ABSPATH', dirname(dirname(__FILE__)) . '/');

// Globals -------------------------------------------------
$GLOBALS['body_classes'] = array();
$GLOBALS['social'] = array(
	'facebook' => '',
	'twitter' => '',
	'google-plus' => ''
);

// Includes -------------------------------------------------
include_once 'functions.php';
include_once 'script-loader.php';
include_once 'template-tags.php';

// Vendors
$js = 'assets/js';
$vendors = 'assets/vendors';

// Basic Vendors CSS
enqueue_style( 'bootstrap', $vendors . '/bootstrap/css/bootstrap.min.css' );

// Basic Vendors JS
enqueue_script( 'jquery' ,'assets/vendors/jquery.min.js' );
enqueue_script( 'aframe' ,'assets/vendors/aframe.min.js' );

// Custom JS
enqueue_script( 'theme', $js . '/theme.init.js', 99 );
// enqueue_script( 'livereload', '//localhost:35729/livereload.js', 100 );
