<?php
/**
 * Functions which enhance the theme layout by hooking into WordPress
 *
 * @package online_cv_resume
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !function_exists('online_cv_resume_body_loader') ):
	/**
	 *  Page Loader
	 *
	 * @param     NUll
	 * @return    $html
	 */
	function online_cv_resume_body_loader( ) {
		if( apply_filters( 'online_cv_resume_page_loader',get_theme_mod( 'op_enable_page_loader' , true ) ) != true ) return false;
	?>
    <div id="loader-wrapper">
        <div id="loader">
            <span class="loader-inner"></span>
        </div>
    </div>
    <?php
	}
endif;


add_action('online_cv_resume_aside_common','online_cv_resume_body_loader',10);

if( !function_exists('online_cv_resume_aside_navigation') ):
	/**
	 * Aside Navigation
	 *
	 * @param     NUll
	 * @return    $html
	 */
	function online_cv_resume_aside_navigation( ) {
	?>
    	<button class="side-bar-icon" id="aside-nav-actions">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <?php $op_menu_style = apply_filters( 'online_cv_resume_aside_menu_style',get_theme_mod( 'op_aside_menu_style' ,'fixed' ) ); ?>
        <div id="aside-nav-wrapper" class="<?php echo esc_attr( $op_menu_style );?>">
        	<div class="scroll-type-<?php echo esc_attr( $op_menu_style );?>">
        	<?php if( apply_filters( 'online_cv_resume_porfile_pic', get_theme_mod( 'show_porfile_pic' ,true ) ) == true ) :?>
        
        <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() || get_header_image() !="" ) { ?>
			<?php $header = ( get_header_image() != "" ) ? 'background-image: url('. esc_url( get_header_image() ).'); background-size:cover;' : ''; 
			
			  $op_bg = wp_get_attachment_image_src( absint( get_theme_mod( 'profile_bg' ) ) , 'full' );
			  if( is_array( $op_bg ) && $op_bg[0] != "" ){
				  $header = ( get_header_image() != "" ) ? 'background-image: url('. esc_url( $op_bg[0] ).'); background-size:cover;' : ''; 
			  }
			?>
            
            <div class="profile-wrp">
            
                <div class="wp-header-image" style=" <?php echo esc_attr( $header );?>"></div>
                <?php $profile_pic = wp_get_attachment_image_src( absint( get_theme_mod( 'profile_pic' ) ) , 'full' ); ?>
                <div class="my-photo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php if( is_array( $profile_pic ) && $profile_pic[0] != "" ) : ?>
                
                		<img src="<?php echo esc_url( $profile_pic[0] );?>" alt="<?php echo esc_attr( get_theme_mod( 'profile_title' ) );?>" />
                        
                <?php else: ?>
                
					<?php the_custom_logo(); ?>
                    
                <?php endif;?>
                </a></div>
                
            </div>
            <?php }?>
            
            <?php endif;?>
            
            <?php if(  apply_filters( 'online_cv_resume_show_profile_heading', get_theme_mod( 'show_profile_heading','true' ) ) == true) : 
				$op_profile_title = apply_filters( 'online_cv_resume_profile_title', get_theme_mod( 'profile_title') );
			?>
            
				<?php if( $op_profile_title !="" ) : ?>
                      <h3 class="site-heading"><?php echo esc_html( $op_profile_title ); ?></h3>
                <?php else : ?>
                     <h3 class="site-heading"><?php bloginfo( 'name' ); ?></h3>
                <?php endif;?>
                
            <?php endif;?>
            
             <?php if( apply_filters( 'online_cv_resume_show_porfile_desc', get_theme_mod( 'show_porfile_desc','true' ) ) == true) :
			 
					 $op_profile_description = apply_filters( 'online_cv_resume_profile_description', get_theme_mod( 'profile_description') );
			  ?>
            
					<?php if( $op_profile_description !="" ) : ?>
                         <div class="site-subtitle"><?php echo esc_html( $op_profile_description ); ?></div>
                    <?php else : ?>
                        <?php $description = get_bloginfo( 'description', 'display' );
                              if ( $description || is_customize_preview() ) : ?>
                             <div class="site-subtitle"><?php echo esc_html( $description ); ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    
            <?php endif; ?>
            
            <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary',
                'depth'	          => 3, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'nav',
                'container_id'    => 'theme-menu-list',
                'menu_class'      => 'navbar-nav ml-auto',
             
            ) );
            ?>
             </div>	  
        </div> <!-- /.aside-nav-wrapper -->
        
    
    <?php
	}
endif;


add_action('online_cv_resume_aside_common','online_cv_resume_aside_navigation',20);



if( !function_exists('online_cv_resume_aside_sidebar') ):
	/**
	 * Aside Sidebar
	 *
	 * @param     NUll
	 * @return    $sidebar widgets
	 */
	function online_cv_resume_aside_sidebar( ) {
		if( apply_filters( 'online_cv_resume_enable_sidebar', get_theme_mod( 'op_enable_sidebar' ,true ) ) == true ) :
	?>
        <button class="side-bar-icon" id="sidebar-actions">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <div class="sidewrapper sidenav">
        	<?php get_sidebar(); ?>
        </div>
    <?php
		endif;
	}
endif;


add_action('online_cv_resume_aside_common','online_cv_resume_aside_sidebar',30);

/*
* ---------------------------------------------------------------
* --------------------------- CONTANIR -------------------------- 
* ---------------------------------------------------------------
*/

if( !function_exists('online_cv_resume_container_wrp_start') ):
	/**
	 * Container Div
	 *
	 * @param     NUll
	 * @return    $sidebar widgets
	 */
	function online_cv_resume_container_wrp_start( ) {
	?>
    <div id="main-page">
        <!-- Blog Details -->
        <section class="our-blog">
          <div class="container">
            <div class="main-wrapper-bg">
              
                    <div class="row">
    <?php
	}
endif;


add_action('online_cv_resume_container_hook_before','online_cv_resume_container_wrp_start',5);


if( !function_exists('online_cv_resume_container_wrp_end') ):
	/**
	 * Container Div end
	 *
	 * @param     NUll
	 * @return    $sidebar widgets
	 */
	function online_cv_resume_container_wrp_end( ) {
	?>
    			</div>
        	</div>
         </div>
       </section>
     </div>
    <?php
	}
endif;


add_action('online_cv_resume_container_hook_after','online_cv_resume_container_wrp_end',999);



if ( ! function_exists( 'online_cv_resume_share_options' ) ) :

	/**
	 * Post Single Posts Navigation 
	 *
	 * @since 1.0.0
	 */
	function online_cv_resume_share_options( ) {
		if ( true == apply_filters ('online_cv_resume_single_posts_share_btn', get_theme_mod( 'op_single_posts_share_btn', true ) ) ): 
		$img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );
		?>
        <div class="social-icon">
		<h5> <?php echo  esc_html ( apply_filters ('online_cv_resume_single_posts_share_txt', get_theme_mod( 'single_posts_share_txt', esc_html__('Share this post','online-cv-resume-pro') )) );?></h5>
    <ul>
        <li><a class="facebook shadow-box" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i></a></li>
        <li><a class="twitter shadow-box" target="_blank" href="https://twitter.com/share?url=<?php the_permalink() ?>&amp;text=<?php the_title() ?>"><i class="fa fa-twitter"></i></a></li>
        <li><a class="pinterest shadow-box" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>&amp;media=<?php
		echo isset( $img[0] ) ? esc_url( $img[0] ) : ''; ?>&amp;description=<?php the_title() ?>"><i class="fa fa-pinterest"></i></a></li>
        <li><a class="google-plus shadow-box" target="_blank" href="//plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-google-plus"></i></a></li>
        <li><a class="linkedin shadow-box" target="_blank" href="<?php echo esc_url( 'http://www.linkedin.com/shareArticle?mini=true&url='.get_permalink(get_the_ID()).'&title='. get_the_title() ); ?>"><i class="fa fa-linkedin-square"></i></a></li>
    </ul>
</div>


        <?php
		endif;
	} 
	add_action('online_cv_resume_single_posts_footer','online_cv_resume_share_options',30);
	

endif;