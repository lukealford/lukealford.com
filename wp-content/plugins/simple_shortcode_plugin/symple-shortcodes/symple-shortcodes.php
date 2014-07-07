<?php
/*
Plugin Name: Symple Shortcodes
Plugin URI: http://www.wpexplorer.com/symple-shortcodes
Description: A free shortcodes plugin
Author: AJ Clarke
Author URI: http://www.wpexplorer.com
Version: 1.4
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html



Include functions */
require_once( dirname(__FILE__) . '/includes/scripts.php' ); // Adds plugin JS and CSS
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php'); // Main shortcode functions
require_once( dirname(__FILE__) . '/includes/mce/symple_shortcodes_tinymce.php'); // Add mce buttons to post editor