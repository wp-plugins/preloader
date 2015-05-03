<?php
/*
Plugin Name: Preloader
Plugin URI: http://wp-time.com/add-preloader-to-your-website-easily/
Description: Add preloader to your website easily, responsive and retina, full customize, compatible with all major browsers.
Version: 1.0
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2015 Qassim Hassan (email: qassim.pay@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Include Settings page
if ( is_admin() ){
	include(plugin_dir_path(__FILE__).'/settings.php');
}


// Include JavaScript and HTML Element
function WPTime_plugin_preloader_script(){	
	?>
    	<div id="wptime-plugin-preloader"></div>
    <?php	
	wp_enqueue_script( 'wptime-plugin-preloader-script', plugins_url( '/js/preloader-script.js', __FILE__ ), array('jquery'), null, false);
}
add_action('wp_enqueue_scripts', 'WPTime_plugin_preloader_script');


// Add CSS
function WPTime_plugin_preloader_css(){
	if( get_option('wptpreloader_bg_color') ){
		$background_color = get_option('wptpreloader_bg_color');
	}else{
		$background_color = '#FFFFFF';
	}
		
	if( get_option('wptpreloader_image') ){
		$preloader_image = get_option('wptpreloader_image');
	}else{
		$preloader_image = plugins_url( '/images/preloader.GIF', __FILE__ );
	}
	?>
    	<style type="text/css">
			#wptime-plugin-preloader{
				position: fixed;
				top: 0;
			 	left: 0;
			 	right: 0;
			 	bottom: 0;
				background:url(<?php echo $preloader_image; ?>) no-repeat <?php echo $background_color; ?> 50%;
				-moz-background-size:64px 64px;
				-o-background-size:64px 64px;
				-webkit-background-size:64px 64px;
				background-size:64px 64px;
				z-index: 99998;
				width:100%;
				height:100%;
			}
		</style>
    <?php
}
add_action('wp_head', 'WPTime_plugin_preloader_css');

?>