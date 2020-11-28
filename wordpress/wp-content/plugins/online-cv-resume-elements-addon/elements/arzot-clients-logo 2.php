<?php
/**
 * Class: Arzot_Clients_Logo_Widgets
 * Name: Arzot Client Logo
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

class Arzot_Clients_Logo_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-client-logo';
	}

	public function get_title() {
		return __( 'Client Logo', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return ' eicon-logo arzot-client-logo';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'carousel', 'logo', 'Client', 'logo carousel', 'logo slider',];
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
				'default' => esc_html__( 'Clients', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Client Logo', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::MEDIA,
			)
		);
		$repeater->add_control(
			'name',
			array(
				'label'       => esc_html__( 'Client Name', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'link',
			array(
				'label'       => esc_html__( 'Name', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::TEXT,
			)
		);
		
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'name'  => 'themeforest',
						'image'  => '#',
						'link'  => '#',
					),
					array(
						'name'  => 'athemeart',
						'image'  => '#',
						'link'  => '#',
					),
					
					
				),
				'title_field' => '{{{ name }}}',
			)
		);

		$this->end_controls_section();
		
		
	
		$this->start_controls_section(
			'columns',
			array(
				'label' => esc_html__( 'Columns', 'arzot-elements-addon' ),
			)
		);
		
		$this->add_control(
			'columns_md',
			[
				'label' => __( 'Columns Desktops', 'arzot-elements-addon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-md-12' => __( 'Columns 1', 'arzot-elements-addon' ),
					'col-md-6' => __( 'Columns 2', 'arzot-elements-addon' ),
					'col-md-4' => __( 'Columns 3', 'arzot-elements-addon' ),
					'col-md-3' => __( 'Columns 4', 'arzot-elements-addon' ),
					
				],
				'default' => 'col-md-6',
			]
		);
		
		$this->add_control(
			'columns_sm',
			[
				'label' => __( 'Columns Tablets', 'arzot-elements-addon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-sm-12' => __( 'Columns 1', 'arzot-elements-addon' ),
					'col-sm-6' => __( 'Columns 2', 'arzot-elements-addon' ),
					'col-sm-4' => __( 'Columns 3', 'arzot-elements-addon' ),
					'col-sm-3' => __( 'Columns 1', 'arzot-elements-addon' ),
					
				],
				'default' => 'col-sm-6',
			]
		);
		
		$this->add_control(
			'columns_xs',
			[
				'label' => __( 'Columns Phones', 'arzot-elements-addon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'col-12' => __( 'Columns 1', 'arzot-elements-addon' ),
					'col-6' => __( 'Columns 2', 'arzot-elements-addon' ),
					'col-4' => __( 'Columns 3', 'arzot-elements-addon' ),
					'col-3' => __( 'Columns 4', 'arzot-elements-addon' ),
					
				],
				'default' => 'col-12',
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
	 ?>

		<div class="theme-ribbon-content">
			<div class="partner mb-80">
				<h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
				<div class="partner-logo" data-aos="fade-up">
					<?php 
						if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
												
						foreach( $settings['item_list'] as $list ) {
							if( isset( $list['image'] ) && $list['image']['url'] != "" ){
								$image = wp_get_attachment_image_url( $list['image']['id'], 'thumbnail' );
							}	
						?>
	
						<?php if( isset( $list['image'] ) && $list['image']['url'] != "" ) : ?>
							<div class="item">
								<a href="<?php echo esc_url($list['link']); ?>" target="_blank">
									<img src="<?php echo esc_url( $image );?>" alt="<?php echo esc_url($list['name']);?>">
								</a>
							</div>
						<?php endif;?>
					
	
							
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
		<div class="partner mb-80">
			<h4 class="inner-title">{{{settings.heading}}}</h4>
			<div class="partner-logo">
				<#	_.each( settings.item_list, function( list, index ) { #>
					
					<a href="{{{list.link}}}" style="width:150px; height:150px;">
						<img src="{{{list.image.url}}}" alt="{{{list.name}}}">
					</a>

				<# }); #> 
			</div>
		</div>
	</div>
      
	<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Clients_Logo_Widgets() );
