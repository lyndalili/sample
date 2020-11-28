<?php
/**
 * Class: Arzot_achievement_Widgets
 * Name: Arzot Achievement
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

class Arzot_achievement_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-achievement';
	}

	public function get_title() {
		return __( 'Achievement Box', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image arzot-achievement';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'achievement', 'Education', 'Experience', 'Education box' ];
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
				'label' => esc_html__( 'Achievement Content', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Experience', 'arzot-elements-addon' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		
		$repeater->add_control(
			'item_achievement',
			array(
				'label'   => esc_html__( 'Achievement', 'arzot-elements-addon' ),
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
						'item_title'  		=> esc_html__( 'Facebook', 'arzot-elements-addon' ),
						'item_achievement'  => esc_html__( 'Ux Designer (1991 - 1996)', 'arzot-elements-addon' ),
						'item_content'      =>esc_html__( 'Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes, euismod sagittis free super of the linal ', 'arzot-elements-addon' ),
					),
					array(
						'item_title'  		=> esc_html__( 'themeforest', 'arzot-elements-addon' ),
						'item_achievement'  => esc_html__( 'Senior Ui/Ux Designer (1998 - 1930)', 'arzot-elements-addon' ),
						'item_content'      =>esc_html__( 'Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes, euismod sagittis free super of the linal ', 'arzot-elements-addon' ),
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
			<div class="qualification-block mb-80">
				<h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
				<div class="row">
				
					<?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
									foreach( $settings['item_list'] as $list ){ 
									?>
								<div class="<?php echo esc_attr( $settings['columns_md'] );?> <?php echo esc_attr( $settings['columns_sm'] );?> <?php echo esc_attr( $settings['columns_xs'] );?>" data-aos="fade-up">
										<div class="single-block shadow-box">
												<h5 class="title"><?php echo isset( $list['item_title'] ) ? esc_html( $list['item_title'] ) : ''; ?></h5>
												<span><?php echo isset( $list['item_achievement'] ) ? esc_html( $list['item_achievement'] ) : ''; ?></span>
												<p><?php echo isset( $list['item_content'] ) ? esc_html( $list['item_content'] ) : ''; ?></p>
										</div>
								</div>
			
						<?php }  endif;?>
						
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
		<div class="qualification-block mb-80">
			<h4 class="inner-title">{{{settings.heading}}}</h4>
			<div class="row">
				<#	_.each( settings.item_list, function( list, index ) { #>

					<div class="{{{ settings.columns_md }}} {{{ settings.columns_sm }}} {{{ settings.columns_xs }}} ">
						<div class="single-block shadow-box">
							<h5 class="title">{{{list.item_title}}}</h5>
							<span>{{{list.item_achievement}}}</span>
							<p>{{{list.item_content}}}</p>
						</div>
					</div>

				<# }); #> 
			</div>
		</div>
	</div>
       
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_achievement_Widgets() );
