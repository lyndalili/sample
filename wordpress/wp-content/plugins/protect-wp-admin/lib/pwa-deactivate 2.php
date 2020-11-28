<?php
/*
 * Protect WP-Admin (C)
 * Deactivate plugin using URL
 * */
?>
<?php 
if ( ! defined( 'ABSPATH' ) && !isset($_GET['disable_pwa']) ) exit; // Exit if accessed directly
if(isset($_GET['disable_pwa']))
{
	require_once('../../../../wp-load.php' );
	$array = get_option('active_plugins');
    $array_without_strawberries = array_diff($array, array('protect-wp-admin/protect-wp-admin.php'));
    update_option( 'active_plugins', $array_without_strawberries );
    echo "<strong>protect-wp-admin</strong> plugin has been disabled"; 
    flush_rewrite_rules();
    wp_die();
}
?>
