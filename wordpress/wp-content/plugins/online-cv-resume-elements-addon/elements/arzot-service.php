<?php
/**
 * Class: Arzot_Services_Widgets
 * Name: Arzot Services
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

class Arzot_Services_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-service';
	}

	public function get_title() {
		return __( 'Service Box', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image be-eae-pe';
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
				'label' => esc_html__( 'Service Content', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'My Services', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_image',
			array(
				'label'   => esc_html__( 'Hover Background', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::MEDIA,
				
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label'       => esc_html__( 'Icon', 'arzot-elements-addon' ),
				'type'        => Controls_Manager::ICON,
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'item_content',
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
						'item_content'  => esc_html__( 'Lorem Ipsum has been the industry\'s standard dummy text ever since the unknown printer', 'arzot-elements-addon' ),
						'item_title'     => esc_html__( 'Professional Code', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-code',
					),
					array(
						'item_content'  => esc_html__( 'Lorem Ipsum has been the industry\'s standard dummy text ever since the unknown printer', 'arzot-elements-addon' ),
						'item_title'     => esc_html__( 'Creative Ideas', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-lightbulb-o',
					),
					array(
						'item_content'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'arzot-elements-addon' ),
						'item_title'     => esc_html__( 'User Friendly', 'arzot-elements-addon' ),
						'item_icon'     => 'fa fa-heart-o',
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
			'section-box-style',
			[
				'label' => __( 'Style', 'arzot-elements-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'box_style',
			[
				'label' => __( 'Box Style', 'arzot-elements-addon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon' 	 => 'Icon',
					'number' => 'Number',
				],
				'default' => 'number',
			]
		);
		
		$this->add_control(
			'icon_position',
			[
				'label' => __( 'icon position', 'arzot-elements-addon' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'side' 	 => 'Side Heading',
					'top' => 'Top Heading',
				],
				'default' => 'side',
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
            'heading_color',
            [
                'label'     => __('Heading Color', 'arzot-elements-addon'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                                'type'  => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1
                            ],
				'default' => '#3a3939',					
                'selectors'    => [
                                '{{WRAPPER}} .single-service-block .online-cv-resume-pro-service-loop-heading ' => 'color: {{VALUE}}'
                            ]
            ]
		);
		$this->add_control(
            'heading_icon',
            [
                'label'     => __('Icon Color', 'arzot-elements-addon'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                                'type'  => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1
                            ],
				'default' => '#1ed373',					
                'selectors'    => [
                                '{{WRAPPER}} .single-service-block .online-cv-resume-pro-service-loop-heading  span' => 'color: {{VALUE}}'
                            ]
            ]
		);
		
		$this->add_control(
            'heading_text',
            [
                'label'     => __('Text Color', 'arzot-elements-addon'),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                                'type'  => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1
                            ],
				'default' => '#777777',					
                'selectors'    => [
                                '{{WRAPPER}} .single-service-block .text' => 'color: {{VALUE}}'
                            ]
            ]
		);
		
		$this->end_controls_section();
		
		
		
		
		
		$this->start_controls_section(
			'section-tags-style',
			[
				'label' => __( 'Tag', 'arzot-elements-addon' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML Tag', 'arzot-elements-addon' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'arzot-elements-addon' ),
                    'h2' => __( 'H2', 'arzot-elements-addon' ),
                    'h3' => __( 'H3', 'arzot-elements-addon' ),
                    'h4' => __( 'H4', 'arzot-elements-addon' ),
                    'h5' => __( 'H5', 'arzot-elements-addon' ),
                    'h6' => __( 'H6', 'arzot-elements-addon' )
                ],
                'default' => 'h5',
            ]
        );
		
		$this->add_control(
            'feature_align',
            [
                'label' => __( 'Alignment', 'wts-eae' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'wts-eae' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'wts-eae' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'wts-eae' ),
                        'icon' => 'fa fa-align-right',
                    ]
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .single-service-block' => 'text-align: {{VALUE}};',
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
          <div class="my-services mb-80">
            <h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
            <div class="row">
              <?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
                         $i = 0;
                         foreach( $settings['item_list'] as $list ){ $i++;
                            $bg = '';
                            $text_color = '';	
                            
                        if( isset( $list['item_image'] ) && $list['item_image']['url'] != "" ){
                            $bg = 'background-image: url(\''.esc_url($list['item_image']['url']).'\'); background-position: center bottom; background-size: cover;';
                            $text_color = 'hover-white-text';
                        }	
                        
                         ?>
              <div class="<?php echo esc_attr( $settings['columns_md'] );?> <?php echo esc_attr( $settings['columns_sm'] );?> <?php echo esc_attr( $settings['columns_xs'] );?>" data-aos="fade-up">
                <div class="single-service-block shadow-box <?php echo esc_attr( $text_color );?> " style=" <?php echo esc_attr( $bg );?> ">
                  <<?php echo $settings['heading_tag'];?> class="online-cv-resume-pro-service-loop-heading"> <span class="<?php echo esc_attr( $settings['icon_position'] );?>">
                    <?php 
                            if( $settings['box_style'] == 'number' ) {
                                echo sprintf("%02d",$i);
                            }else{
                                echo  '<i aria-hidden="true" class="'.esc_attr( $list['item_icon'] ).'"></i>' ;
                            }
                         ?>
                    </span> <?php echo isset( $list['item_title'] ) ? esc_html( $list['item_title'] ) : ''; ?> </<?php echo $settings['heading_tag'];?>>
                  <div class="text"><?php echo esc_html( $list['item_content'] );?></div>
                </div>
                <!-- /.single-service-block --> 
              </div>
              <?php }?>
              <?php endif;?>
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
        <div class="my-services mb-80">
          <h4 class="inner-title">{{{settings.heading}}}</h4>
          <div class="row"> 
			<#  var i = 0;
            _.each( settings.item_list, function( list, index ) { i++; 
            #>
            <div class="{{{settings.columns_md}}} {{{settings.columns_sm}}} {{{settings.columns_xs}}}">
				<# if( list.item_image.url != '') { #>
			  		<div class="single-service-block shadow-box hover-white-text" 
				  		style= "background-image: url( {{{list.item_image.url}}} ); background-position: center bottom; background-size: cover;"> 
				<# } else { #>
                <div class="single-service-block shadow-box" > 
					<# } #>
					<{{{settings.heading_tag}}} class="online-cv-resume-pro-service-loop-heading"> 
					
						<span class="{{{settings.icon_position}}}"> 
							<# if( settings.box_style == 'number') {#>
							{{{ i }}}
							<# } else { #> <i aria-hidden="true" class="fa {{{list.item_icon}}}"></i> <# } #> 
						</span> 
						{{{list.item_title}}} 

					</{{{settings.heading_tag}}}>

				  <div class="text">{{{list.item_content}}} </div>
				  
                </div>
                <!-- /.single-service-block --> 
              </div>
            <# }); #> 
          </div>
          <div class="clearfix"></div>
        </div>
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Services_Widgets() );
