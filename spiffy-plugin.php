<?php
/**
 * Spiffy Plugin Boilerplate
 * Built from: The WordPress Plugin Boilerplate.
 *
 * REPLACE!!!
 * Spiffy Plugin
 * Spiffy_Plugin
 * spiffy-plugin
 *
 * 
 *
 * @package   Spiffy Plugin
 * @author    Tiffany Israel <tiffany@smorecreative.com>
 * @license   GPL-2.0+
 * @link      http://wwww.smorecreative.com
 * @copyright 2014 S'more Creative
 *
 * @wordpress-plugin
 * Plugin Name: Spiffy Plugin
 * Plugin URI:  http://wwww.tiffanyisrael.com/me
 * Description: A wordpress plugin for preferred defaults
 * Version:     1.0.0
 * Author:      Tiffany Israel
 * Author URI:  http://www.tiffanyisrael.com
 * Text Domain: spiffy-plugin-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



// Register hooks that are fired when the plugin is activated, deactivated, and uninstalled, respectively.
// Spiffy Plugin: replace Spiffy_Plugin with the name of the plugin defined in `class-spiffy-plugin.php`
register_activation_hook( __FILE__, array( 'Spiffy_Plugin', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Spiffy_Plugin', 'deactivate' ) );

// Spiffy Plugin: replace Spiffy_Plugin with the name of the plugin defined in `class-spiffy-plugin.php`
// Spiffy_Plugin::get_instance();


// 
// 
// Set Permalink to postname automatically
add_action( 'init', function() {
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/%postname%/' );
} );


// 
// 
// Adds featured image thumbnail to post backend 
add_action( 'right_now_content_table_end' , 'wph_right_now_content_table_end' );

if (function_exists( 'add_theme_support' )){
	add_filter('manage_posts_columns', 'posts_columns', 5);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
	add_filter('manage_pages_columns', 'posts_columns', 5);
	add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}
function posts_columns($defaults){
	$defaults['wps_post_thumbs'] = __('Thumbs');
	return $defaults;
}
function posts_custom_columns($column_name, $id){
	if($column_name === 'wps_post_thumbs'){
		echo the_post_thumbnail( array(125,80) );
	}
}


// Include Custom Post Type file
// include	'cpt.php';



// If Advanced Custom Fields is turned on
if ( is_plugin_active('js_composer/js_composer.php') ) {	
	include 'visual_composer.php';
}

// Add SVG Mime type
// https://css-tricks.com/snippets/wordpress/allow-svg-through-wordpress-media-uploader/
function spiffy_mime_types_svg($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'spiffy_mime_types_svg');
