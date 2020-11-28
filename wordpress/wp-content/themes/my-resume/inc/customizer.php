<?php
/**
 * My Resume: Customizer
 *
 * @subpackage My Resume
 * @since 1.0
 */

use WPTRT\Customize\Section\My_Resume_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( My_Resume_Button::class );

	$manager->add_section(
		new My_Resume_Button( $manager, 'my_resume_pro', [
			'title'       => __( 'My Resume Pro', 'my-resume' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'my-resume' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/resume-wordpress-theme/', 'my-resume')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'my-resume-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'my-resume-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function my_resume_customize_register( $wp_customize ) {

	$wp_customize->add_setting('my_resume_show_site_title_initials',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('my_resume_show_site_title_initials',array(
       'type' => 'text',
       'label' => __('Site Title Initials','my-resume'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'my_resume_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'my-resume' ),
	    'description' => __( 'Description of what this panel does.', 'my-resume' ),
	) );

	$wp_customize->add_section( 'my_resume_theme_options_section', array(
    	'title'      => __( 'General Settings', 'my-resume' ),
		'priority'   => 30,
		'panel' => 'my_resume_panel_id'
	) );

	$wp_customize->add_setting('my_resume_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'my_resume_sanitize_choices'	        
	));
	$wp_customize->add_control('my_resume_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','my-resume'),
        'section' => 'my_resume_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','my-resume'),
            'Right Sidebar' => __('Right Sidebar','my-resume'),
            'One Column' => __('One Column','my-resume'),
            'Three Columns' => __('Three Columns','my-resume'),
            'Four Columns' => __('Four Columns','my-resume'),
            'Grid Layout' => __('Grid Layout','my-resume')
        ),
	));

	//Banner Section
	$wp_customize->add_section( 'my_resume_banner_section' , array(
    	'title' => __( 'Banner Section', 'my-resume' ),
		'priority' => null,
		'panel' => 'my_resume_panel_id'
	) );

	$wp_customize->add_setting( 'my_resume_banner_page', array(
		'default' => '',
		'sanitize_callback' => 'my_resume_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'my_resume_banner_page', array(
		'label' => __( 'Select Banner Page', 'my-resume' ),
		'description' => __('Image Size (800px 450px)', 'my-resume'),
		'section' => 'my_resume_banner_section',
		'type' => 'dropdown-pages'
	) );

	$wp_customize->add_setting('my_resume_banner_designation',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('my_resume_banner_designation',array(
	   	'type' => 'text',
	   	'label' => __('Designation','my-resume'),
	   	'section' => 'my_resume_banner_section',
	));

	$wp_customize->add_setting('my_resume_facebook',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_facebook',array(
		'label'	=> __('Add Facebook Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('my_resume_twitter',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_twitter',array(
		'label'	=> __('Add Twitter Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('my_resume_linkedin',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('my_resume_linkedin',array(
		'label'	=> __('Add Linkedin Link','my-resume'),
		'section'	=> 'my_resume_banner_section',
		'type'		=> 'url'
	));

	// Testimonial Section 
	$wp_customize->add_section('my_resume_testimonial_section',array(
		'title'	=> __('Testimonials Section','my-resume'),
		'panel' => 'my_resume_panel_id',
	));

	$wp_customize->add_setting('my_resume_testimonial_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_testimonial_title',array(
		'label'	=> __('Section Title','my-resume'),
		'section'	=> 'my_resume_testimonial_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('my_resume_testimonials_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'my_resume_sanitize_choices',
	));
	$wp_customize->add_control('my_resume_testimonials_cat',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Testimonials Post','my-resume'),
		'description' => __('Image Size (50px 50px)', 'my-resume'),
		'section' => 'my_resume_testimonial_section',
	));

	// Our Skills
	$wp_customize->add_section('my_resume_skills_section',array(
		'title'	=> __('Our Skills','my-resume'),
		'panel' => 'my_resume_panel_id',
	));

	$wp_customize->add_setting('my_resume_skills_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_skills_title',array(
		'label'	=> __('Section Title','my-resume'),
		'section'	=> 'my_resume_skills_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cats[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('my_resume_skills_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'my_resume_sanitize_choices',
	));
	$wp_customize->add_control('my_resume_skills_cat',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Skills Post','my-resume'),
		'description' => __('Image Size (70px 70px)', 'my-resume'),
		'section' => 'my_resume_skills_section',
	));

	//Footer
    $wp_customize->add_section( 'my_resume_footer', array(
    	'title'      => __( 'Footer Text', 'my-resume' ),
		'priority'   => null,
		'panel' => 'my_resume_panel_id'
	) );

    $wp_customize->add_setting('my_resume_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('my_resume_footer_copy',array(
		'label'	=> __('Footer Text','my-resume'),
		'section'	=> 'my_resume_footer',
		'setting'	=> 'my_resume_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'my_resume_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'my_resume_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'my_resume_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'my_resume_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'my-resume' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'my-resume' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'my_resume_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'my_resume_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'my_resume_customize_register' );

function my_resume_customize_partial_blogname() {
	bloginfo( 'name' );
}

function my_resume_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function my_resume_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function my_resume_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}