<?php
/*
 * Protect WP-Admin (C)
 * define all hooks
 * */
/************************************
 *  Hooks to overide option value before save it into database 
 * ************************************/
function pwa_update_field_rewrite_text( $new_value, $old_value ) {
$new_value = ($new_value==$old_value) ? $old_value : $new_value;
$new_value =  str_replace('/','-',trim(stripslashes(strip_tags($new_value))));
return $new_value;
}
add_filter( 'pre_update_option_pwa_rewrite_text', 'pwa_update_field_rewrite_text', 10, 2 );
add_filter( 'login_url', 'my_login_page', 10, 2 );
function my_login_page( $login_url, $redirect ) {
 $enable = get_option('pwa_active');
  $newurl = get_option('pwa_rewrite_text');
  if($enable && $newurl!='')
  {
    $login_url = str_replace("wp-login.php",$newurl,$login_url);
   }
   return $login_url;
}

add_action( 'login_form', 'replace_login_submit_form',1); 
function replace_login_submit_form() {
  $enable = get_option('pwa_active');
  $newurl = get_option('pwa_rewrite_text');
  if($enable && $newurl!='')
  {
  $your_content = ob_get_contents();
  $your_content = str_replace("wp-login.php",$newurl,$your_content);  
  ob_get_clean();
  echo $your_content;
  }
}
