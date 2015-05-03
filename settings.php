<?php

	function WPTime_preloader_settings() {
		add_plugins_page( 'Preloader Settings', 'Preloader', 'update_core', 'WPTime_preloader_settings', 'WPTime_preloader_settings_page');
	}
	add_action( 'admin_menu', 'WPTime_preloader_settings' );
	
	function WPTime_preloader_register_settings() {
		register_setting( 'WPTime_preloader_register_setting', 'wptpreloader_bg_color' );
		register_setting( 'WPTime_preloader_register_setting', 'wptpreloader_image' );
	}
	add_action( 'admin_init', 'WPTime_preloader_register_settings' );
		
	function WPTime_preloader_settings_page(){ // settings page function
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
			<div class="wrap">
				<h2>Preloader Settings</h2>
				<?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ){ ?>
					<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
						<p><strong>Settings saved.</strong></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
					</div>
				<?php } ?>
            	<form method="post" action="options.php">
                	<?php settings_fields( 'WPTime_preloader_register_setting' ); ?>
                	<table class="form-table">
                		<tbody>
                        
                    		<tr>
                        		<th scope="row"><label for="wptpreloader_bg_color">Background Color</label></th>
                            	<td>
                                    <input class="regular-text" name="wptpreloader_bg_color" type="text" id="wptpreloader_bg_color" value="<?php echo esc_attr( $background_color ); ?>">
                                    <p class="description">Enter background color code, default color is white #FFFFFF.</p>
								</td>
                        	</tr>
                            
                    		<tr>
                        		<th scope="row"><label for="wptpreloader_image">Preloader Image</label></th>
                            	<td>
                                    <input class="regular-text" name="wptpreloader_image" type="text" id="wptpreloader_image" value="<?php echo esc_attr( $preloader_image ); ?>">
                                    <p class="description">Enter preloader image link, image size must to be 128x128 to be retina ready, <a href="http://preloaders.net" target="_blank">get free preloader image</a>.</p>
								</td>
                        	</tr>
                            
                    	</tbody>
                    </table>
                    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="Save Changes"></p>
                </form>
            	<div class="tool-box">
					<h3 class="title">Beautiful WordPress Themes</h3>
					<p>Get collection of 87 WordPress themes for $69 only, a lot of features and free support! <a href="http://j.mp/ET_WPTime_ref_pl" target="_blank">Get it now</a>.</p>
					<p>See also:</p>
						<ul>
							<li><a href="http://j.mp/GL_WPTime" target="_blank">Must Have Awesome Plugins.</a></li>
							<li><a href="http://j.mp/CM_WPTime" target="_blank">Premium WordPress themes on CreativeMarket.</a></li>
							<li><a href="http://j.mp/TF_WPTime" target="_blank">Premium WordPress themes on Themeforest.</a></li>
							<li><a href="http://j.mp/CC_WPTime" target="_blank">Premium WordPress plugins on Codecanyon.</a></li>
							<li><a href="http://j.mp/BH_WPTime" target="_blank">Unlimited web hosting for $3.95 only.</a></li>
						</ul>
					<p><a href="http://j.mp/GL_WPTime" target="_blank"><img src="<?php echo plugins_url( '/banner/global-aff-img.png', __FILE__ ); ?>" width="728" height="90"></a></p>
					<p><a href="http://j.mp/ET_WPTime_ref_pl" target="_blank"><img src="<?php echo plugins_url( '/banner/570x100.jpg', __FILE__ ); ?>"></a></p>
				</div>
            </div>
        <?php
	} // shortcodes page function

?>