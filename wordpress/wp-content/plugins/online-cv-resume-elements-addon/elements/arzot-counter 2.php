<?php
/**
 * Class: Arzot_Counter_Widgets
 * Name: Arzot Counter
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

class Arzot_Counter_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-counter';
	}

	public function get_title() {
		return __( 'Counter', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-counter arzot-counter';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'Counter', 'count', 'fun', 'achievement' ];
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
				'label' => esc_html__( 'Counter', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
		   'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Fun Fact', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'arzot-elements-addon' ),
				'label_block' => true,
				'type'    => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'number',
			[
				'label' => __( 'Price', 'arzot-elements-addon' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 10,
			]
		);
		$repeater->add_control(
			'sing',
			[
				'label' => __( 'Sing', 'arzot-elements-addon' ),
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
						'item_title'     => esc_html__( 'Happy Clients', 'arzot-elements-addon' ),
						'number'     => 256,
					),
					array(
						'item_title'     => esc_html__( 'Working Hours', 'arzot-elements-addon' ),
						'number'     => 256,
						'sing'     => 'K',
						
					),
					array(
						'item_title'     => esc_html__( 'Awards Won', 'arzot-elements-addon' ),
						'number'     => 256,
						
					),
					array(
						'item_title'     => esc_html__( 'Coffee Consumed', 'arzot-elements-addon' ),
						'number'     => 256,
						'sing'     => '$',
					),
					
				),
				'title_field' => '{{{ item_title }}}',
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
		
	
		
	
	  $this->start_controls_section(
            'section-plan-heading-style',
            [
                'label' => __( 'Color', 'arzot-elements-addon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
       );

		$this->add_control(
            'counter_color',
            [
                'label'     => __('Counter Color', 'arzot-elements-addon'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                                'type'  => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_2
                            ],
				'default' => '#1ed373',					
                'selectors'    => [
                                '{{WRAPPER}} .single-counter-box .number' => 'color: {{VALUE}}'
                            ]
            ]
		);
		$this->add_control(
            'text_color',
            [
                'label'     => __('Heading Color', 'arzot-elements-addon'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                                'type'  => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1
                            ],
				'default' => '#3a3939',					
                'selectors'    => [
                                '{{WRAPPER}} .single-counter-box h6' => 'color: {{VALUE}}'
                            ]
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
	<div class="fun-facts mb-80">
        <h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
        <div class="row">
        
           <?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
               
			   foreach( $settings['item_list'] as $list ):
			   		$number = ( $list['number'] != "" ) ? absint( $list['number'] ) : '';
			    ?>
               
            <div class="<?php echo esc_attr( $settings['columns_md'] );?> <?php echo esc_attr( $settings['columns_sm'] );?> <?php echo esc_attr( $settings['columns_xs'] );?>" data-aos="fade-up">
                <div class="single-counter-box shadow-box">
                    <h2 class="number"><span class="timer" data-from="0" data-to="<?php echo esc_attr( $number ); ?>" data-speed="1200" data-refresh-interval="5">0</span><?php echo ( $list['sing'] != "" ) ? esc_html( $list['sing'] ) : '';?></h2>
                    <h6><?php echo ( $list['item_title'] != "" ) ? esc_html( $list['item_title'] ) : '';?></h6>
                </div> <!-- /.single-counter-box -->
            </div>
          <?php endforeach; endif;?>
        </div> <!-- /.row -->
    </div>
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
      <div class="fun-facts mb-80">
          <h4 class="inner-title">{{{settings.heading}}}</h4>
          <div class="row">
			<# _.each( settings.item_list, function( list, index ) { #>
            <div class="{{{settings.columns_md}}} {{{settings.columns_sm}}} {{{settings.columns_xs}}} ">
                <div class="single-counter-box shadow-box">
                    <h2 class="number">
						<span class="timer" data-from="0" data-to="{{{list.number}}}" data-speed="1200" data-refresh-interval="5">
							{{{list.number}}}
						</span>
						{{{list.sing}}}
					</h2>

                    <h6>{{{list.item_title}}}</h6>
                </div> <!-- /.single-counter-box -->
            </div>
            <# }); #> 
          </div>
		  <div class="clearfix"></div>
		  
        </div>
    </div>
	<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Counter_Widgets() );
