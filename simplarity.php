<?php
/*
Plugin Name: Simplarity
Description: A plugin for smashingmagazine.com
Version: 1.0.0
License: GPL-2.0+
*/

use Simplarity\Plugin;
use Simplarity\SettingsPage;

spl_autoload_register( 'simplarity_autoloader' ); // Register autoloader
function simplarity_autoloader( $class_name ) {
    if ( false !== strpos( $class_name, 'Simplarity' ) ) {
        $classes_dir = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
        $class_file = str_replace( '\\', DIRECTORY_SEPARATOR, $class_name ) . '.php';
        require_once $classes_dir . $class_file;
    }
}

add_action( 'plugins_loaded', 'simplarity_init' ); // Hook initialization function
function simplarity_init() {
	$plugin = new Plugin();
	$plugin['path'] = realpath( plugin_dir_path( __FILE__ ) ) . DIRECTORY_SEPARATOR;
	$plugin['url'] = plugin_dir_url( __FILE__ );
	$plugin['version'] = '1.0.0';
	$plugin['settings_page_properties'] = array(
		'parent_slug' => 'options-general.php',
		'page_title' =>  'Simplarity',
		'menu_title' =>  'Simplarity',
		'capability' => 'manage_options',
		'menu_slug' => 'simplarity-settings',
		'option_group' => 'simplarity_option_group',
		'option_name' => 'simplarity_option_name'
	);
	
	$plugin['settings_page'] = function ( $plugin ) {
		return new SettingsPage( $plugin['settings_page_properties'] );
	};
	
	$plugin->run();
}
