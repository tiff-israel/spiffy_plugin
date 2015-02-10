<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package   Spiffy Plugin
 * @author    Tiffany Israel <tiffany@smorecreative.com>
 * @license   GPL-2.0+
 * @link      http://wwww.smorecreative.com
 * @copyright 2014 S'more Creative
 */

// If uninstall, not called from WordPress, then exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Spiffy Plugin: Define uninstall functionality here