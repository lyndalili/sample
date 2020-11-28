<?php 
/*
Title: Home Page Hero Section
Description: A Home Page Hero Section
*/

$bg_style  = '';
$call_while = '';
if( isset ( $settings['bg_image'] )  ){
$bg_image_ids = $settings['bg_image'];
if(  count( $bg_image_ids ) > 0 ){
	$bg_url = wp_get_attachment_url( $bg_image_ids[0] );
	if( $bg_url != "" ){
		$bg_style = 'background:url('.esc_url( $bg_url ).') no-repeat center  center; background-size:cover;';
		$call_while = 'call-white-text';
	}
}}
?>
<section id="home" class="<?php echo esc_attr( $call_while );?>" style=" <?php echo esc_attr( $bg_style );?>">
    <div class="main-wrapper"  >
    	<?php if( is_array( $settings['profile_image'] ) && $settings['profile_image'][0] != "" ) :?>
        <img src="<?php echo esc_url(  wp_get_attachment_url( $settings['profile_image'][0] ) );?>" alt="<?php echo ( isset($settings['heading']) && $settings['heading'] != "" ) ? esc_html($settings['heading']) : '';?>" class="user-img">
        <?php endif;?>
        <?php echo ( isset($settings['heading']) && $settings['heading'] != "" ) ? '<h1 class="author-name">'.esc_html($settings['heading']).'</h1>' : '';?>
        
        <p class="cd-headline clip is-full-width">
      
         <?php echo ( isset($settings['heading-2nd']) && $settings['heading-2nd'] != "" ) ? '<span>'.esc_html($settings['heading-2nd']).'</span>' : '';?>
           <?php if( isset( $settings['typing_text'] ) && $settings['typing_text'] != "" ) : 
		    $op_secondary_color = apply_filters('online_cv_resume_secondary_color_scheme', get_theme_mod( 'secondary_color_scheme','#1ed373' ) ) ;
		   	 ?>
            <span class="typer" data-colors="<?php echo esc_attr( $op_secondary_color );?>" id="main" data-words="<?php echo esc_attr( $settings['typing_text'] );?>" data-delay="100" data-deleteDelay="1000"></span>
          
            <?php endif;?>
           
          
        </p>
         <?php if( isset( $settings['resume_btn_text'] ) &&  isset( $settings['resume_btn_link'] ) ) :?>
             <a href="<?php echo esc_url( $settings['resume_btn_link'] );?>" class=" theme-btn"><span><?php echo esc_html( $settings['resume_btn_text'] );?></span></a>
           <?php endif;?>
             <?php if( isset( $settings['hire_me_btn_text'] ) &&  isset( $settings['hire_me_btn_link'] ) ) :?>
             <a href="<?php echo esc_url( $settings['hire_me_btn_link'] );?>" class=" theme-btn"><span><?php echo esc_html( $settings['hire_me_btn_text'] );?></span></a>
           <?php endif;?>
    </div> <!-- /.main-wrapper -->
</section>
