<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package online_cv_resume
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function online_cv_resume_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'online_cv_resume_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function online_cv_resume_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'online_cv_resume_pingback_header' );


/**
 * Remove Menu Icons by ThemeIsle alert.
 */
if( !function_exists(' online_cv_resume__icons_settings_js_data ') ): 
	add_filter('menu_icons_settings_js_data','online_cv_resume__icons_settings_js_data');
	function online_cv_resume__icons_settings_js_data( $val ){
		$val['text']['settingsInfo'] = '';
		return $val;
	}
endif;


if( ! function_exists( 'online_cv_resume__thmeme_import_files' ) ) :
	/**
	*
	*/
	function online_cv_resume__thmeme_import_files( $array  ) {
		$array[] = array(
				'import_file_name'			=> esc_html__( 'One Page Import', 'online-cv-resume-pro' ),
				
				'local_import_file'			=> trailingslashit( get_stylesheet_directory() ) . 'inc/demo-data/demo-one.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo-one.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo-one.dat',

		
				
				'import_notice'				=> esc_html__( 'After import demo data, just set static homepage from settings > reading, check widgets & menus. All data will be override Take Back up all', 'online-cv-resume-pro' ),
				'import_preview_image_url'     => esc_url( get_template_directory_uri().'/screenshot.png' ),
				'preview_url'                => 'https://eds.edatastyle.com/demo/online-cv-resume/one-page/',
				
			);
		$array[] = array(
				'import_file_name'			=> esc_html__( 'Standard Page Import', 'online-cv-resume-pro' ),
				
				'local_import_file'			=> trailingslashit( get_stylesheet_directory() ) . 'inc/demo-data/demo-standard.xml',
				'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/standard.wie',
				'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-data/standard.dat',
				
				'import_notice'				=> esc_html__( 'After import demo data, just set static homepage from settings > reading, check widgets & menus. All data will be override Take Back up all', 'online-cv-resume-pro' ),
				'import_preview_image_url'     => esc_url( get_template_directory_uri().'/screensho-standard.png' ),
				'preview_url'                => 'https://eds.edatastyle.com/demo/online-cv-resume/one-page/',
				
			);	
		return $array;	
	}
	add_filter( 'pt-ocdi/import_files', 'online_cv_resume__thmeme_import_files' );
	
	
endif;



if( ! function_exists( 'bc_after_import_setup' ) ) :

	function bc_after_import_setup() {
			// Assign menus to their locations.
			$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		
			set_theme_mod( 'nav_menu_locations', array(
					'main-menu' => $main_menu->term_id,
				)
			);
		
			// Assign front page and posts page (blog page).
			$front_page_id = get_page_by_title( 'Home' );
			$blog_page_id  = get_page_by_title( 'Blog' );
		
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $front_page_id->ID );
			update_option( 'page_for_posts', $blog_page_id->ID );
			
			$run_once = get_option('menu_check');
			if (!$run_once){
				//give your menu a name
				$name = 'All Pages';
				//create the menu
				$menu_id = wp_create_nav_menu($name);
				//then get the menu object by its name
				$menu = get_term_by( 'name', $name, 'nav_menu' );
			
				
				//then you set the wanted theme  location
				$locations = get_theme_mod('nav_menu_locations');
				$locations['primary'] = $menu->term_id;
				set_theme_mod( 'nav_menu_locations', $locations );
			
				// then update the menu_check option to make sure this code only runs once
				update_option('menu_check', true);
			}
	
	
		}
	add_action( 'pt-ocdi/after_import', 'bc_after_import_setup' );
endif;