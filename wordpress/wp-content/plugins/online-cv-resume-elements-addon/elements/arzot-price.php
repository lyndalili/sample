<?php
/**
 * Class: Arzot Price Widgets
 * Name: Arzot Price
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

class Arzot_Price_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-price';
	}

	public function get_title() {
		return __( 'Pricing Plan', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-price-table be-eae-pe';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'price', 'money', 'price box', 'price item' ];
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
				'label' => esc_html__( 'Price Box', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Pricing Plan', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label'       => esc_html__( 'Icon', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::ICON,
				
			)
		);

		$repeater->add_control(
			'price_type',
			array(
				'label'   => esc_html__( 'Price Type', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'amount',
			[
				'label' => __( 'Amount', 'arzot-elements-addon' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$repeater->add_control(
			'amount_side',
			array(
				'label'   => esc_html__( 'Amount Side Text', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'text',
			array(
				'label'   => esc_html__( 'Content', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'buynow',
			[
				'label' => __( 'Buy Now Link', 'arzot-elements-addon' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'price_type'  => esc_html__( 'REGULER', 'arzot-elements-addon' ),
						'amount'     => esc_html__( '10', 'arzot-elements-addon' ),
						'amount_side'     => esc_html__( 'hour', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-code',
						'text'     => '<ul><li>Web Development</li><li>Advetising</li><li>Game Development</li><li>Music Writing</li></ul>',
						'buynow'     => '#',	
						
					),
					array(
						'price_type'  => esc_html__( 'PREMIUM', 'arzot-elements-addon' ),
						'amount'     => esc_html__( '23', 'arzot-elements-addon' ),
						'amount_side'     => esc_html__( 'hour', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-code',
						'text'     => '<ul><li>Web Development</li><li>Advetising</li><li>Game Development</li><li>Music Writing</li></ul>',
						'buynow'     => '#',	
					),
					array(
						'price_type'  => esc_html__( 'CORPORATE', 'arzot-elements-addon' ),
						'amount'     => esc_html__( '30', 'arzot-elements-addon' ),
						'amount_side'     => esc_html__( 'hour', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-code',
						'buynow'     => '#',	
						'text'     => '<ul><li>Web Development</li><li>Advetising</li><li>Game Development</li><li>Music Writing</li></ul>',
					),
					
				),
				'title_field' => '{{{ price_type }}}',
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
			<div class="pricing-plan mb-80">
				<h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
				<div class="row">
				<?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
						foreach( $settings['item_list'] as $list ):
						?>
						<div class="<?php echo esc_attr( $settings['columns_md'] );?> <?php echo esc_attr( $settings['columns_sm'] );?> <?php echo esc_attr( $settings['columns_xs'] );?>" data-aos="fade-up">
							<div class="plan-table shadow-box">
								<div class="icon-box"><i class="<?php echo ( $list['item_icon'] != "" ) ? esc_html( $list['item_icon'] ) : '';?>"></i></div>
								<p class="plan-name"><?php echo ( $list['price_type'] != "" ) ? esc_html( $list['price_type'] ) : '';?></p>
								

								<h4 class="price"><?php echo ( $list['amount'] != "" ) ? esc_html( $list['amount'] ) : '';?> <sub>/<?php echo ( $list['amount_side'] != "" ) ? esc_html( $list['amount_side'] ) : '';?></sub></h4>
								
								<?php echo $list['text'];?> 
								
								<a href="<?php echo ( $list['buynow'] != "" ) ? esc_html( $list['buynow'] ) : '';?> " class="theme-line-button"><?php echo esc_html__( 'Buy Now', 'arzot-elements-addon' )?></a> </div>
							<!-- /.plan-table  --> 
						</div>
						<?php endforeach; endif;?>
				</div>
			<!-- /.row --> 
			</div>
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
		<div class="pricing-plan mb-80">
			<h4 class="inner-title">{{{settings.heading}}}</h4>
			<div class="row">

				<#	_.each( settings.item_list, function( list, index ) { #>
					<div class="{{{ settings.columns_md }}} {{{ settings.columns_sm }}} {{{ settings.columns_xs }}} ">
						<div class="plan-table shadow-box">

							<div class="icon-box">
								<i class="{{{ list.item_icon }}}"></i>
							</div>
							<p class="plan-name">
								{{{ list.price_type }}}
							</p>
							

							<h4 class="price">
								{{{ list.amount }}}
								<sub>/{{{ list.amount_side }}}</sub>
							</h4>
							
							{{{list['text']}}}
							
							<a href="{{{list.buynow }}}" class="theme-line-button">
								Buy Now
							</a> 
						</div>
					</div>
				<# }); #> 

			</div>
		</div>
	</div>
     
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Price_Widgets() );
