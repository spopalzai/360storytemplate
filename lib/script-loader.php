<?php
/**
 * Script Loader
 *
 * @package Vivid
 */

$GLOBALS['tr_styles']  = array();
$GLOBALS['tr_scripts'] = array();

// Functions ----------------------
function enqueue_style( $handle, $src = '', $priority = 10 ) {

	if( is_array( $handle ) ) {
		$GLOBALS['tr_styles'][10] = $GLOBALS['tr_styles'][10] + $handle;
	}
	else {
		$GLOBALS['tr_styles'][$priority][$handle] = $src;
	}
}

function enqueue_script( $handle, $src = '', $priority = 10 ) {

	if( is_array( $handle ) ) {
		$GLOBALS['tr_scripts'][10] = $GLOBALS['tr_scripts'][10] + $handle;
	}
	else {
		$GLOBALS['tr_scripts'][$priority][$handle] = $src;
	}
}

function print_sources( $type ) {

	$template = '';
    switch($type) {
        case 'styles':
            $template = '<link href="%s" rel="stylesheet" type="text/css"/>';
            break;
        case 'scripts':
            $template = '<script src="%s"></script>';
            break;
    }

	$tabs = '';
	foreach($GLOBALS["tr_{$type}"] as $priority ) {
		foreach( $priority as $src ) {
			echo $tabs . sprintf( $template, $src ) . "\n";
			$tabs = "\t\t";
		}
    }
}
function print_styles() { print_sources( 'styles' ); }
function print_scripts() { print_sources( 'scripts' ); }
