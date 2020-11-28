<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


if ( ! function_exists( 'online_cv_resume_google_fonts' ) ) :
/**
 * Register Google fonts.
 *
 * @return string Google fonts URL for the theme.
 */
function online_cv_resume_google_fonts() {
    $fonts_url = '';
    $fonts     = array();

	
	$body 	= get_theme_mod( 'op_primary_typography');
	if ( is_array($body) || is_object($body) ) {
		if( count( $body ) > 0 ){
			$body_font	= $body['font-family'];
			$fonts[] 	= $body_font;
		}	
	}
	
	$sidebar_fonts 	= get_theme_mod( 'op_secondary_typography');
	if ( is_array($sidebar_fonts) || is_object($sidebar_fonts) ) {
		if( count( $sidebar_fonts ) > 0 ){
			$sidebar_fonts	= $sidebar_fonts['font-family'];
			$fonts[] 	= $sidebar_fonts;
		}
	}
	
   if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
        ), 'https://fonts.googleapis.com/css' );
        
    }
    return $fonts_url;
}
add_action( 'wp_enqueue_scripts', 'online_cv_resume_google_fonts' );
endif;

// add inline stylesheet

function online_cv_resume_custom_css() {
    wp_enqueue_style(
        'online_cv_resume_custom_style',
        get_template_directory_uri() . '/assets/css/color4.css'
    );
     
		
	    $op_primary_color = apply_filters('online_cv_resume_primary_color_scheme', get_theme_mod( 'primary_color_scheme','#777777' ) ) ;
		
		$custom_css = ' body,.contact-form .selectize-input,.contact-address .single-block p,.contact-address .single-block p a  {color:'.esc_attr( $op_primary_color ).'; }';
	  
	    $op_secondary_color = apply_filters('online_cv_resume_secondary_color_scheme', get_theme_mod( 'secondary_color_scheme','#1ed373' ) ) ;
		
		$custom_css .= '#main-page section#home p span b,#theme-menu-list ul li:hover > a,#theme-menu-list ul li.current_page_item > a,#aside-nav-wrapper .navbar-nav li:hover > a,#aside-nav-wrapper .cv-button,.about-block-wrp .text p a:hover,
.my-services .single-service-block h5 span,.fun-facts .single-counter-box .number,.pricing-plan .plan-table .icon-box,body .theme-line-button,body .theme-solid-button:hover,
.testimonial .single-block .text ul li,.our-blog .blog-post .info li a,.our-blog .blog-post:hover .read-more,.our-blog .blog-post .blog-title a:hover,
.contact-address .single-block .icon,.contact-address .single-block p a:hover,.isotop-menu-wrapper li.is-checked,.theme-sidebar .sidebar-search button,
.theme-sidebar .sidebar-recent-post .author a,.theme-sidebar .sidebar-recent-post li:hover .title a,.theme-top-button .right-side-drp .dropdownMenu .subscribe-form button,
.blog-details .main-post-wrapper .bottom-content .share-meta .share-option .share-icon li a:hover,.theme-top-button .btn-menu-mb,#aside-nav-wrapper .close-menu ,.meta-info a,ul.portfolio-list-unstyled li:focus, ul.portfolio-list-unstyled li:hover,.online-cv-resume-pro-portfolio-item .portfolio-data .data-heading,.theme-btn,
.navigation.posts-navigation a,.footer-copyright-wrp a,.widget ul li:hover:before,.widget ul li a:hover,.comments-area  a,.entry-content a,.my-services .single-service-block .online-cv-resume-pro-service-loop-heading span {color:'.esc_attr( $op_secondary_color ).'; }';



	$custom_css .= '#loader-wrapper,.switcher .switch-btn button,#theme-menu-list ul li > a:before,#aside-nav-wrapper .navbar-nav li > a:before,#main-page .inner-title:before,.blog-details .main-post-wrapper .author-meta li.tag a,
#main-page .inner-title:after,body .theme-line-button:before,body .theme-solid-button:before,.social-icon ul li a:hover,.theme-sidebar .sidebar-keyword ul li a:hover,
.blog-details .main-post-wrapper .mark-text .icon,.blog-details .main-post-wrapper .list-item li:before,.bottom-content .tag-meta li a:hover,
.blog-details .main-post-wrapper .bottom-content .share-meta .share-option:hover button,.comment-meta .single-comment .comment .reply:hover,.side-bar-icon span,
.theme-top-button .right-side-drp .dropdownMenu .social-icon li a:hover,.comment-meta .single-comment .comment .reply a:hover,.comment-form input[type="checkbox"]:checked,.navigation.posts-navigation a:after,.theme-btn:after,.woocommerce-product-search button,.widget_search .search-submit,#primary .search-form .search-submit,.woocommerce-product-search button,.widget h3.widget-title span,.blog-post:hover .article-img a.article-link ,ul.online-cv-resume-pro-vcard-time-line li::before{background:'.esc_attr( $op_secondary_color ).'; }';
	$custom_css .='.skill-progress .progress .progress-bar,.blog-post:hover .article-img a.article-link{background-color:'.esc_attr( $op_secondary_color ).'; }';
	
	
	$custom_css .= '.online-cv-resume-pro-portfolio-item:hover .portfolio-data{
			background:'.esc_attr( online_cv_resume_hex2rgba( $op_secondary_color,0.5 ) ).';
		}';
     $custom_css .= 'ul.online-cv-resume-pro-vcard-time-line li::before {
			-webkit-box-shadow:0 0 0 5px '.esc_attr( online_cv_resume_hex2rgba( $op_secondary_color,0.35 ) ).';
			box-shadow:0 0 0 5px '.esc_attr( online_cv_resume_hex2rgba( $op_secondary_color,0.35 ) ).';
		} ';
        
	$custom_css .='body .theme-line-button,.pricing-plan .plan-table:hover .icon-box,body .theme-solid-button,.theme-sidebar .sidebar-keyword ul li a:hover,.theme-top-button .right-side-drp .dropdownMenu .social-icon li a:hover ,.theme-btn,
.navigation.posts-navigation a{ border-color: '.esc_attr( $op_secondary_color ).';}';
      
	  
	$op_tertiary_color = apply_filters('online_cv_resume_tertiary_color', get_theme_mod( 'tertiary_color_scheme','#3a3939' ) ) ;
	$custom_css .='h1, h2, h3, h4, h5, h6,.social-icon h5,.comment-meta .single-comment .comment h6 a,#theme-menu-list ul li a, #aside-nav-wrapper .navbar-nav a{ color: '.esc_attr( $op_tertiary_color ).';}';
	  
	 $op_primary_font = get_theme_mod( 'op_primary_typography'); 
	 $custom_css .='body{  font-family: \''.esc_attr( online_cv_resume_google_font_render( $op_primary_font ) ).'\', sans-serif;}';
	 
	 $op_secondary_font = get_theme_mod( 'op_primary_typography'); 
	 $custom_css .='body .theme-line-button,body .theme-solid-button,#theme-menu-list ul li a,
#aside-nav-wrapper .navbar-nav a,#aside-nav-wrapper .cv-button,.testimonial .single-block .text span,.skill-progress .progress .progress-bar .percent-text,.our-blog .blog-post .read-more,ul.portfolio-list-unstyled li{  font-family: \''.esc_attr( online_cv_resume_google_font_render( $op_secondary_font ) ).'\', sans-serif;}';
	
    wp_add_inline_style( 'online_cv_resume_custom_style', $custom_css );
	
	
}
add_action( 'wp_enqueue_scripts', 'online_cv_resume_custom_css',999 );




if ( ! function_exists( 'online_cv_resume_google_font_render' ) ) : 
 function online_cv_resume_google_font_render( $value = array() ){
	$css = '';
	if ( isset( $value['font-family'] ) ) {
		$css .= 'font-family:' . $value['font-family'].';';
	}
	if ( isset( $value['variant'] ) ) {
		$css .= 'font-weight:' . $value['variant'].';';
	}
	if ( isset( $value['font-size'] ) ) {
		$css .= 'font-size:' . $value['font-size'].';';
	}
	if ( isset( $value['line-height'] ) ) {
		$css .= 'line-height:' . $value['line-height'].';';
	}
	if ( isset( $value['letter-spacing'] ) && $value['letter-spacing'] != 0 ) {
		$css .= 'letter-spacing:' . $value['line-height'].';';
	}
	
	return $css;
}
endif;


if ( ! function_exists( 'online_cv_resume_hex2rgba' ) ) :

	/**
	 * @since 1.0.0
	 */

	function online_cv_resume_hex2rgba($color, $opacity = false) {
	 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
	}
endif;