jQuery(window).load(function() { 

	jQuery('#wptime-plugin-preloader').delay(500).fadeOut("slow");
	
	setTimeout(wptime_plugin_remove_preloader, 3000);
	function wptime_plugin_remove_preloader() {	
		jQuery('#wptime-plugin-preloader').remove();
	}

});