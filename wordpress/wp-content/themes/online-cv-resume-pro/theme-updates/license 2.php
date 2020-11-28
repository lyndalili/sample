<?php
/**
 * This is just a demonstration of how theme licensing works with
 * Wordpress Licensing System.
 *
 * @package WordPress
 * @subpackage WPLS Sample Theme
 */

// This is the URL our updater / license checker pings. This should be the URL of the site with WPLS installed
if(!defined('WPLS_SAMPLE_STORE_URL'))
define( 'WPLS_SAMPLE_STORE_URL', 'https://edatastyle.com/' ); // add your own unique prefix to prevent conflicts

// The name of your product. This should match the download name in WPLS exactly
define( 'WPLS_SAMPLE_THEME_CODE', 'online-cv-resume-pro' ); // add your own unique your-wpls-theme-product-code to prevent conflicts
define( 'WPLS_SAMPLE_THEME_SLUG', 'online-cv-resume-pro' ); // add your own unique your-wpls-theme-product-slug to prevent conflicts
		
/***********************************************
* Add our menu item
***********************************************/

function wpls_sample_theme_license_menu() {
	add_menu_page( 'Licensed Theme', 'Licensed Theme', 'manage_options', 'licensed-theme', 'wpls_sample_theme_license_page' );
}
add_action('admin_menu', 'wpls_sample_theme_license_menu');

/***********************************************
* Sample settings page, substitute with yours
***********************************************/

function wpls_sample_theme_license_page() {
	$license 	= get_option( 'wpls_sample_theme_license_key' );
	$status 	= get_option( 'wpls_sample_theme_license_key_status' );
	?>
	<div class="wrap">
		<h2><?php _e('Licensed Theme Options'); ?></h2>
		<form method="post" action="options.php">

			<?php settings_fields('wpls_sample_theme_license'); ?>

			<table class="form-table">
				<tbody>
					<tr valign="top">	
						<th scope="row" valign="top">
							<label for="wpls_sample_license_url"><?php _e('Where you get license?'); ?></label>
						</th>
                        <td>
	                        <?php _e('Please visit <a href="https://edatastyle.com/my-account-2/orders/">https://edatastyle.com/my-account-2/orders/</a> to get your product license or check your email inbox / spam or contact with e2getway@gmail.com to get your product license .'); ?>
                        </td>
					</tr>                    
					<tr valign="top">
						<th scope="row" valign="top">
							<label for="wpls_sample_theme_license_key"><?php _e('License Key:'); ?></label>
						</th>
						<td>
							<input id="wpls_sample_theme_license_key" name="wpls_sample_theme_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>" />
							<p class="description"><?php _e('Enter your license key'); ?></p>
						</td>
					</tr>
					<?php if( false !== $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php _e('Action Button:'); ?>
							</th>
							<td>
								<?php if( $status == 'true' ) { ?>
									<?php wp_nonce_field( 'wpls_sample_theme_nonce', 'wpls_sample_theme_nonce' ); ?>
									<input type="submit" class="button-secondary" name="wpls_theme_license_deactivate" value="<?php _e('Deactivate License'); ?>"/>
									<span style="color:green;"><?php _e('Active'); ?></span>
								<?php } else {
									wp_nonce_field( 'wpls_sample_nonce', 'wpls_sample_nonce' ); ?>
									<input type="submit" class="button-secondary" name="wpls_theme_license_activate" value="<?php _e('Activate License'); ?>"/>
								<?php } ?>
							</td>
						</tr>
                        <tr valign="top">
                        <th scope="row" valign="top"><?php _e('License data:');?></th>
                        <?php $data = wpls_sample_theme_get_license_data() ?>
                        <td><?php 
							echo $data->info->message;
						?></td>
                        </tr>
					<?php } ?>
				</tbody>
			</table>
			<?php submit_button(); ?>

		</form>
	<?php
}

function wpls_sample_theme_register_option() {
	// creates our settings in the options table
	register_setting('wpls_sample_theme_license', 'wpls_sample_theme_license_key', 'wpls_theme_sanitize_license' );
}
add_action('admin_init', 'wpls_sample_theme_register_option');


/***********************************************
* Gets rid of the local license status option
* when adding a new one
***********************************************/

function wpls_theme_sanitize_license( $new ) {
	$old = get_option( 'wpls_sample_theme_license_key' );
	if( $old && $old != $new ) {
		delete_option( 'wpls_sample_theme_license_key_status' ); // new license has been entered, so must reactivate
	}
	return $new;
}

/***********************************************
* Illustrates how to activate a license key.
***********************************************/

function wpls_sample_theme_activate_license() {

	if( isset( $_POST['wpls_theme_license_activate'] ) ) {
	 	if( ! check_admin_referer( 'wpls_sample_nonce', 'wpls_sample_nonce' ) )
			return; // get out if we didn't click the Activate button

		global $wp_version;
		$license = trim( get_option( 'wpls_sample_theme_license_key' ) );
		
		
		$license_data = wpls_sampleRequest (WPLS_SAMPLE_STORE_URL, $license, WPLS_SAMPLE_THEME_CODE);
		update_option( 'wpls_sample_theme_license_key_status', $license_data->valid );

	}
}
add_action('admin_init', 'wpls_sample_theme_activate_license');

/***********************************************
* Illustrates how to deactivate a license key.
* This will descrease the site count
***********************************************/

function wpls_sample_theme_deactivate_license() {

	if( isset( $_POST['wpls_theme_license_deactivate'] ) ) {

		// run a quick security check 
	 	if( ! check_admin_referer( 'wpls_sample_theme_nonce', 'wpls_sample_theme_nonce' ) ) 	
			return; // get out if we didn't click the Activate button

			delete_option( 'wpls_sample_theme_license_status' );
	}
}
add_action('admin_init', 'wpls_sample_theme_deactivate_license');

function wpls_sample_theme_get_license_data() {

	global $wp_version;
	$license = get_option( 'wpls_sample_theme_license_key' );
		
	$license_data = wpls_sampleRequest (WPLS_SAMPLE_STORE_URL, $license, WPLS_SAMPLE_THEME_CODE);
	return $license_data;
}

if( !function_exists('wpls_sampleRequest')){
	function wpls_sampleRequest ($server, $license, $product){
	
		/*$domain = $_SERVER['SERVER_NAME']; 
		if (substr($domain, 0, 4) == "www.") { $domain = substr($domain, 4);}
	
			$data = array(
				'wpls-verify'	=> $license, 
				'product'		=> urlencode( $product ), // the CODE of our product in WPLS
				'domain'		=> $domain,
				'validip'		=> isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'],
				'timeout'     	=> 10,
				'sslverify' 	=> false,
				'httpversion' 	=> '1.0',
			);
		
			$licenseServer = $server;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $licenseServer);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_TIMEOUT, 600);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 600);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$json_data = curl_exec($ch);
			curl_close($ch);
			
		$result = json_decode( $json_data );*/
		
	$url = 'https://edatastyle.com/?wpls-verify='.trim($license);
	
	$request = wp_remote_get( $url );
	
	if( is_wp_error( $request ) ) {
		return false; // Bail early
	}
	$body = wp_remote_retrieve_body( $request );
	$result = json_decode( $body );
		
		
		return $result;
	}
}