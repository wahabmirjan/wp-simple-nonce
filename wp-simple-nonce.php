<?php
/*
Plugin Name: wp-simple-nonce
Version: 0.1-alpha
Description: A very simple NONCE system for WordPress Developers
Author: Cal Evans <cal@calevans.com>
Author URI: http://blog.calevans.com
Plugin URI: PLUGIN SITE HERE
Text Domain: wp-simple-nonce
*/

if ( ! class_exists( 'WPSimpleNonce' ) ) {
	require_once( 'WPSimpleNonce.php' );
}

add_shortcode( 'simpleNonce', 'WPSimpleNonce::createNonce' );
add_shortcode( 'simpleNonceField', 'WPSimpleNonce::createNonceField' );

