<?php
/**
 * Functions which enhance the theme by hooking into WordPress kirki plugins
 *
 * @package online_cv_resume
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( class_exists( 'Kirki' ) ) :
/**
 * Class online_cv_resume_Kirki
 */
class online_cv_resume_Kirki extends Kirki {
	
	/**
	* @var striang
	*/
	protected $panel;
	
	/**
	* @var striang
	*/
	protected $config_id;
	
	/**
	 * The single instance of the class
	 *
	 * @var ATA_WC_Variation_Swatches_Admin
	 */
	protected static $instance = null;

	/**
	 * Main instance
	 *
	 * @return ATA_WC_Variation_Swatches_Admin
	 */
	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	/**
	 * Class constructor.
	 */
	public function __construct() {
			$this->panel ='online_cv_resume';
			$this->config_id ='online_cv_resume_config_id';
			
			$this->online_cv_resume_panel();
			$this->online_cv_resume_pic_title();
			$this->online_cv_resume_styling_options();
			$this->online_cv_resume_blog_options();
			
			$this->online_cv_resume_typography();
			$this->online_cv_resume_sidebar();
	}
	
	public function online_cv_resume_panel(){
		
			$this->add_panel( $this->panel, array(
				'priority'    => 30,
				'title'       => esc_attr__( 'Theme Options', 'online-cv-resume-pro' ),
			) );
			
	}
	
	public function online_cv_resume_sidebar(){
		
		
			$this->add_section( 'global_section', array(
				'title'          => esc_attr__( 'Global Settings', 'online-cv-resume-pro' ),
				'panel'          => $this->panel,
				'priority'       => 10,
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_enable_page_loader',
				'label'       => esc_attr__( 'Enable Page Loader', 'online-cv-resume-pro' ),
				'section'     => 'global_section',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_enable_sidebar',
				'label'       => esc_attr__( 'enable sidebar', 'online-cv-resume-pro' ),
				'section'     => 'global_section',
				'default'     => true,
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'select',
				'settings'    => 'op_aside_menu_style',
				'label'       => esc_html__( 'Menu Style', 'online-cv-resume-pro' ),
				'section'     => 'global_section',
				'default'     => 'fixed',
				'choices'     => [
					'default' => esc_html__( 'default', 'online-cv-resume-pro' ),
					'fixed' => esc_html__( 'Fixed', 'online-cv-resume-pro' ),
				],
			) );
			
			$this->add_field( $this->config_id, array(
				'type'     => 'textarea',
				'settings' => 'op_copy_right',
				'label'    => esc_html__( 'Copyright Text', 'online-cv-resume-pro' ),
				'section'  => 'global_section',
				'default'  => esc_html__( 'Copyright &copy; 2016 - 2020 Yourwebsite', 'online-cv-resume-pro' ),
				'priority' => 10,
			) );
			
			

			

			
	}
	public function online_cv_resume_pic_title(){
		
			$this->add_section( 'profile_sections', array(
				'title'          => esc_attr__( 'Profile Pic / Title', 'online-cv-resume-pro' ),
				'panel'          => $this->panel,
				'priority'       => 100,
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'show_porfile_pic',
				'label'       => esc_attr__( 'Enable Profile Block', 'online-cv-resume-pro' ),
				'section'     => 'profile_sections',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
					'type'        => 'image',
					'settings'    => 'profile_pic',
					'label'       => esc_attr__( 'Profile image', 'online-cv-resume-pro' ),
					'description' => esc_attr__( 'Choose Your Profile image', 'online-cv-resume-pro' ),
					'section'     => 'profile_sections',
					'default'     => '',
					'priority' => 10,
					'choices'     => array(
					'save_as' => 'id',
				),
			) );
			$this->add_field( $this->config_id, array(
					'type'        => 'image',
					'settings'    => 'profile_bg',
					'label'       => esc_attr__( 'Profile Background image', 'online-cv-resume-pro' ),
					'description' => esc_attr__( 'Choose image', 'online-cv-resume-pro' ),
					'section'     => 'profile_sections',
					'default'     => '',
					'priority' => 10,
					'choices'     => array(
					'save_as' => 'id',
				),
			) );
			
			
		
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'show_profile_heading',
				'label'       => esc_attr__( 'Enable Profile Heading', 'online-cv-resume-pro' ),
				'section'     => 'profile_sections',
				'default'     => true,
			) );
			
			
			
			$this->add_field( $this->config_id, array(
				'type'     => 'text',
				'settings' => 'profile_title',
				'label'    => __( 'Profile Heading', 'online-cv-resume-pro' ),
				'section'  => 'profile_sections',
				'default'  => esc_attr__( 'Johnatan Doe', 'online-cv-resume-pro' ),
				'priority' => 15,
			 ) );
			 
			 $this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'show_porfile_desc',
				'label'       => esc_attr__( 'Enable Profile Description ', 'online-cv-resume-pro' ),
				'section'     => 'profile_sections',
				'default'     => true,
			) );
			
			 $this->add_field( $this->config_id, array(
				'type'     => 'textarea',
				'settings' => 'profile_description',
				'label'    => __( 'Profile Description ', 'online-cv-resume-pro' ),
				'section'  => 'profile_sections',
				'default'  => esc_attr__( 'I am a Wordpress Developer', 'online-cv-resume-pro' ),
				'priority' => 20,
			 ) );
			 
		
			
			
	}
	
	public function online_cv_resume_styling_options(){
			$this->add_section( 'styling_options', array(
				'title'          => esc_attr__( 'Styling Options', 'online-cv-resume-pro' ),
				'panel'          => $this->panel,
				'priority'       => 180,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'color',
				'settings'    => 'primary_color_scheme',
				'label'       => __( 'Primary Color Scheme', 'online-cv-resume-pro' ),
				'description' => esc_attr__( 'The theme comes with unlimited color schemes for your theme\'s styling.', 'online-cv-resume-pro' ),
				'section'     => 'styling_options',
				'default'     => '#777777',
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'color',
				'settings'    => 'secondary_color_scheme',
				'label'       => __( 'Secondary Color Scheme ', 'online-cv-resume-pro' ),
				'description' => esc_attr__( 'The theme comes with unlimited color schemes for your theme\'s styling.', 'online-cv-resume-pro' ),
				'section'     => 'styling_options',
				'default'     => '#1ed373',
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'color',
				'settings'    => 'tertiary_color_scheme',
				'label'       => __( 'Tertiary Color Scheme ', 'online-cv-resume-pro' ),
				'description' => esc_attr__( 'The theme comes with unlimited color schemes for your theme\'s styling.', 'online-cv-resume-pro' ),
				'section'     => 'styling_options',
				'default'     => '#3a3939',
			) );

			
	}
	
	public function online_cv_resume_blog_options(){
		
		
			$this->add_section( 'blog_options', array(
				'title'          => esc_attr__( 'Blog Options', 'online-cv-resume-pro' ),
				'panel'          => $this->panel,
				'priority'       => 230,
			) );
			
			$this->add_field( $this->config_id, array(
			'type'        => 'select',
			'settings'    => 'op_blog_columns',
			'label'       => __( 'Blog Columns', 'online-cv-resume-pro' ),
			'section'     => 'blog_options',
			'default'     => 'col-sm-12',
				'choices'     => array(
						'col-sm-12' => esc_attr__( 'Columns 1', 'online-cv-resume-pro' ),
						'col-sm-6' => esc_attr__( 'Columns 2', 'online-cv-resume-pro' ),
						'col-sm-4' => esc_attr__( 'Columns 3', 'online-cv-resume-pro' ),
				),
			) );
			
			$this->add_field( $this->config_id, array(
			'type'        => 'select',
			'settings'    => 'content_type',
			'label'       => __( 'Blog Loop Content Type', 'online-cv-resume-pro' ),
			'section'     => 'blog_options',
			'default'     => 'excerpt',
				'choices'     => array(
					'excerpt' => esc_attr__( 'Excerpt', 'online-cv-resume-pro' ),
					'full-content' => esc_attr__( 'Content', 'online-cv-resume-pro' ),
				),
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_posted_authors',
				'label'       => esc_attr__( 'Posted Authors ?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_posted_date',
				'label'       => esc_attr__( 'Posted Date ?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_posted_cat',
				'label'       => esc_attr__( 'Posted Categories ?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
	
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_posted_tags',
				'label'       => esc_attr__( 'Posted Tags ?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_single_posts_navigation',
				'label'       => esc_attr__( 'Single Posts Navigation?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
			$this->add_field( $this->config_id, array(
				'type'        => 'checkbox',
				'settings'    => 'op_single_posts_share_btn',
				'label'       => esc_attr__( 'Single Posts Share Button ?', 'online-cv-resume-pro' ),
				'section'     => 'blog_options',
				'default'     => true,
			) );
			
			
			

			
	}
	
	
	public function online_cv_resume_typography(){
		
		
			$this->add_section( 'typography', array(
				'title'          => esc_attr__( 'Typography', 'online-cv-resume-pro' ),
				'panel'          => $this->panel,
				'priority'       => 230,
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'typography',
				'settings'    => 'op_primary_typography',
				'label'       => esc_attr__( 'Primary fonts', 'online-cv-resume-pro' ),
				'section'     => 'typography',
				'default'     => array(
					'font-family'    => 'Roboto',
					'variant'        => 'regular',
					'letter-spacing' => '0',
				),
				'priority'    => 10,
				'output'      => array(
					array(
						'element' => 'body',
					),
				),
			) );
			
			$this->add_field( $this->config_id, array(
				'type'        => 'typography',
				'settings'    => 'op_secondary_typography',
				'label'       => esc_attr__( 'Secondary fonts', 'online-cv-resume-pro' ),
				'section'     => 'typography',
				'default'     => array(
					'font-family'    => 'K2D',
					'variant'        => 'regular',
					'letter-spacing' => '0',
				),
				'priority'    => 10,
				'output'      => array(
					array(
						'element' => 'body',
					),
				),
			) );
			
			
		
			
			

			
	}
	
	
}
online_cv_resume_Kirki::instance();

endif;