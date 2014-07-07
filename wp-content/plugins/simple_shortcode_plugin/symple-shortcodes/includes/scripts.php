<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 * @package Symple Shortcodes Plugin
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @License: GNU General Public License version 2.0
 * @License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
if( !function_exists ('symple_shortcodes_scripts') ) :
	function symple_shortcodes_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script( 'symple_tabs', plugin_dir_url( __FILE__ ) . 'js/symple_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		wp_register_script( 'symple_toggle', plugin_dir_url( __FILE__ ) . 'js/symple_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'symple_accordion', plugin_dir_url( __FILE__ ) . 'js/symple_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_style('symple_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/symple_shortcodes_styles.css');
		
		//@Since v1.1
		wp_register_script('symple_googlemap',  plugin_dir_url( __FILE__ ) . 'js/symple_googlemap.js', array('jquery'), '1.0', true);
		wp_register_script('symple_googlemap_api', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), '1.0', true);
		
		//@Since v1.3
		wp_register_script( 'symple_skillbar', plugin_dir_url( __FILE__ ) . 'js/symple_skillbar.js', array ( 'jquery' ), '1.0', true );
	}
	add_action('wp_enqueue_scripts', 'symple_shortcodes_scripts');
endif;