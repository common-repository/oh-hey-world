<?php
/**
 * Plugin Name: Oh Hey World
 * Plugin URI: http://wordpress.org/extend/plugins/oh-hey-world/
 * Description: Oh Hey World is the best way to arrive in a new city.
 * Version: 1.0.2
 * Author: Oh Hey World
 * Author URI: http://www.ohheyworld.com/
 */

define('OHW_API_HOST', 'www.ohheyworld.com');

require_once(dirname(__FILE__) . '/api-client.php');
require_once(dirname(__FILE__) . '/shortcodes.php');
require_once(dirname(__FILE__) . '/widget-badge.php');

class OHW {
	static function init() {
		wp_enqueue_style('ohw-public', plugins_url('css/public.css', __FILE__));
	}
}
add_action('init', array('OHW', 'init'));
