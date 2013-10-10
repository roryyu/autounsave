<?php
/**
 * @package autounsave
 * @version 0.1
 */
/*
Plugin Name: Autounsave
Plugin URI: http://weibo.com/1959988637
Description: This is a plugin for Autounsave
Author: Rory
Version: 0.1
Author URI: http://weibo.com/1959988637
*/

define('AUTOUNSAVE_PLUGIN_URL', plugin_dir_url( __FILE__ ));
add_action('after_setup_theme','autounsave_javascript' );
function autounsave_javascript() {
	if(AUTOUNSAVE&&is_admin()){		
		wp_enqueue_script('autounsave',AUTOUNSAVE_PLUGIN_URL.'autounsave.js',array('jquery'),'1.0');
	}
}
add_action('wp_ajax_autounsave_action', 'autounsave_action_callback');
add_action('wp_ajax_nopriv_autounsave_action', 'autounsave_action_callback');
function autounsave_action_callback() {
	global $wpdb;
	$myrows = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_status='auto-draft'" );
	$wpdb->get_results( "DELETE FROM $wpdb->posts WHERE post_status='auto-draft' OR post_type='revision'" );
	$wpdb->get_results( "DELETE FROM $wpdb->postmeta WHERE meta_key='_edit_lock' OR meta_key='_edit_last'" );	
	die();
}