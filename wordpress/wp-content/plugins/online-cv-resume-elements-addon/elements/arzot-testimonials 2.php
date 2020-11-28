<?php
/**
 * Class: Arzot_Testimonials_Widgets
 * Name: Arzot Testimonials
 * Slug: 
 */
namespace Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Arzot_Testimonials_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-testimonials';
	}

	public function get_title() {
		return __( 'Testimonial', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return ' eicon-testimonial-carousel arzot-testimonials';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'feature', 'service', 'box', 'item' ];
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
			'section_items_data',
			array(
				'label' => esc_html__( 'Testimonial Content', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Testimonial', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'name',
			array(
				'label'       => esc_html__( 'Name', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'position',
			array(
				'label'       => esc_html__( 'Position', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label'   => esc_html__( 'Content', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);

		
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'name'  => esc_html__( 'Dylan Moore', 'arzot-elements-addon' ),
						'position'     => esc_html__( 'Ceo, Demochimp', 'arzot-elements-addon' ),
						'content'     => esc_html__('Praesent ut tortor consectetur, semper sapien non, lacinia augue. Aenean arcu libero ', 'arzot-elements-addon'),
					),
					array(
						'name'  => esc_html__( 'Rene Tromp', 'arzot-elements-addon' ),
						'position'     => esc_html__( 'Ceo, Demochimp', 'arzot-elements-addon' ),
						'content'     => esc_html__('Praesent ut tortor consectetur, semper sapien non, lacinia augue. Aenean arcu libero ', 'arzot-elements-addon'),

					),
					array(
						'name'  => esc_html__( 'Dylan Moore', 'arzot-elements-addon' ),
						'position'     => esc_html__( 'Ceo, Demochimp', 'arzot-elements-addon' ),
						'content'     => esc_html__('Praesent ut tortor consectetur, semper sapien non, lacinia augue. Aenean arcu libero ', 'arzot-elements-addon'),

					),
					
				),
				'title_field' => '{{{ name }}}',
			)
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
		$image = '';
	 ?>

		<div class="theme-ribbon-content">
			<div class="testimonial mb-80">
				<h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
				<div class="client-slider" data-aos="fade-up">
				<?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
							foreach( $settings['item_list'] as $list ){
					
				if( isset( $list['image'] ) && $list['image']['url'] != "" ){
					$image = '<img src="'.esc_url($list['image']['url']).'" alt="">';
				}	
				?>

					<div class="item">
						<div class="single-block border-box">
							<div class="d-sm-flex align-items-start"> <?php echo $image;?>
								<div class="text">
									<h6 class="name"><?php echo isset( $list['name'] ) ? esc_html( $list['name'] ) : ''; ?> </h6>
									<span><?php echo isset( $list['position'] ) ? esc_html( $list['position'] ) : ''; ?></span>
									<p><?php echo isset( $list['content'] ) ? esc_html( $list['content'] ) : ''; ?> </p>
									
								</div>
								<!-- /.text --> 
							</div>
						</div>
						<!-- /.single-block  --> 
					</div><!-- /.item -->
				
				<?php } endif;?>
				</div>
			</div>
			<!-- /.row --> 
			<div class="clearfix"></div>
		</div>
      
        
<?php 
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

<div class="theme-ribbon-content">
		<div class="testimonial mb-80">
			<h4 class="inner-title">{{{settings.heading}}}</h4>
			<div class="client-slider">
				<#	_.each( settings.item_list, function( list, index ) { #>

					<div class="item">
						<div class="single-block border-box">
							<div class="d-sm-flex align-items-start"> 
								<img src="{{{list.image.url}}}" alt="">

								<div class="text">
									<h6 class="name">{{{list.name}}}</h6>
									<span>{{{list.position}}}</span>
									<p>{{{list.content}}}</p>									
								</div>
								<!-- /.text --> 
							</div>
						</div>
						<!-- /.single-block  --> 
					</div><!-- /.item -->

				<# }); #> 
			</div>
	</div>
</div>
      
	<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Testimonials_Widgets() );
