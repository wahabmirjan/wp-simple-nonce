<?php
/*
Plugin Name: wp-simple-nonce
Version: 0.1-alpha
Description: A very simple NONCE system for WordPress Developers
Author: Cal Evans <cal@calevans.com>
Author URI: http://blog.calevans.com
Plugin URI: PLUGIN SITE HERE
Text Domain: wp-simple-nonce

THIS PLUGIN REQUIRES http://github.com/calevans/wp-session-manager

*/

if ( ! class_exists( 'WPSimpleNonce' ) ) {
	require_once( 'WPSimpleNonce.php' );
}
