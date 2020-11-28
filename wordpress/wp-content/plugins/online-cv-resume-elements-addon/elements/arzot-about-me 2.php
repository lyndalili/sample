<?php
/**
 * Class: Arzot_About_Me_Widgets
 * Name: Arzot About Me
 * Slug: 
 */
namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;
use Elementor\WYSIWYG;
use Elementor\MEDIA;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Arzot_About_Me_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-about-me';
	}

	public function get_title() {
		return __( 'About Me', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-meta-data arzot-about-me';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'about me', 'profile', 'about', 'about text' ];
	}
	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		
		$this->start_controls_section(
			'section_items_general',
			array(
				'label' => esc_html__( 'About Me Content', 'arzot-elements-addon' ),
			)
		);
		
		$this->add_control(
			'heading',
			[
				'label' => __( 'Title', 'arzot-elements-addon' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Heading', 'arzot-elements-addon' ),
				'default' => __( 'Jamel Grant', 'arzot-elements-addon' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'sub_heading',
			[
				'label' => __( 'Sub Heading', 'arzot-elements-addon' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Sub Heading', 'arzot-elements-addon' ),
				'default' => __( 'Web Developer & Designer', 'arzot-elements-addon' ),
			]
		);
		$this->add_control(
			'item_image',
			[
				'label'   => esc_html__( 'Choose image', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			]
		);
		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'arzot-elements-addon' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Default description', 'arzot-elements-addon' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);
		$this->end_controls_section();
		
		
		
	}
	
	/**
	 * Render heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$heading = ( isset( $settings['heading'] ) && $settings['heading'] != "" ) ? esc_html( $settings['heading'] ):'';
		$subheading = ( isset( $settings['sub_heading'] ) && $settings['sub_heading']  != "") ? esc_html( $settings['sub_heading'] ):'';

		$img = ( isset( $settings['item_image']['url'] ) && $settings['item_image']['url']  != "" ) ? '<img src="'.wp_get_attachment_image_url( $settings['item_image']['id'], 'large'  ).'" alt="'.esc_attr( $heading ).'">':'';
		$content = ( isset( $settings['content'] ) && $settings['content'] != "" ) ? $settings['content']:'';
		
		echo sprintf(
			'<div class="about-block-wrp">
        	<div class="img-holder">%1$s</div>
            <div class="text">
                <h2 class="name">%2$s</h2>
                <div class="pos">%3$s</div>
                %4$s
            </div> 
        	</div>',
			$img ,
			esc_html( $heading ),
			esc_html( $subheading ),
			$content
		);
	
	}

	/**
	 * Render heading widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	
	protected function _content_template() {
		?>
      	<div class="about-block-wrp">
			<div class="img-holder">
					<img src="{{{settings.item_image.url}}}" alt="{{{settings.heading}}}">
			</div>
			<div class="text">
				<h2 class="name">{{{settings.heading}}}</h2> 
				<div class="pos">{{{settings.sub_heading}}}</div>
				{{{settings.content}}}
			</div>
		</div>

		<?php
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_About_Me_Widgets() );