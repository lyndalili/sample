<?php
/**
 * Class: Arzot_Time_Line_Widgets
 * Name: Arzot Time Line
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

class Arzot_Time_Line_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-timeline';
	}

	public function get_title() {
		return __( 'Time Line', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image arzot-achievement';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'achievement', 'Education', 'Experience', 'Time', 'line', 'Time Line' ];
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
				'label' => esc_html__( 'Time Line Content', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Time Line', 'arzot-elements-addon' ),
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
			'period',
			array(
				'label'   => esc_html__( 'Period', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		
		$repeater->add_control(
			'item_achievement',
			array(
				'label'   => esc_html__( 'Designation', 'arzot-elements-addon' ),
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
						'period'  		=> esc_html__( '2008 - 2011', 'arzot-elements-addon' ),
						'item_achievement'  => esc_html__( 'Ux Designer', 'arzot-elements-addon' ),
						'item_content'      =>esc_html__( 'Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes, euismod sagittis free super of the linal ', 'arzot-elements-addon' ),
					),
					array(
						'item_title'  		=> esc_html__( 'themeforest', 'arzot-elements-addon' ),
						'period'  		=> esc_html__( '2011 - 2014', 'arzot-elements-addon' ),
						'item_achievement'  => esc_html__( 'Senior Ui/Ux Designer', 'arzot-elements-addon' ),
						'item_content'      =>esc_html__( 'Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes, euismod sagittis free super of the linal ', 'arzot-elements-addon' ),
					),
					
					array(
						'item_title'  		=> esc_html__( ' Junior Designer', 'arzot-elements-addon' ),
						'period'  		=> esc_html__( '2011 - 2014', 'arzot-elements-addon' ),
						'item_achievement'  => esc_html__( 'Boombox Group', 'arzot-elements-addon' ),
						'item_content'      =>esc_html__( 'Investig ationes demons trave runt lectores legere liusry quod ii legunt saepius claritas Investig ationes, euismod sagittis free super of the linal ', 'arzot-elements-addon' ),
					),
				),
				'title_field' => '{{{ item_title }}}',
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
	 ?>

        <div class="theme-ribbon-content">
          <div class="qualification-block mb-80">
            <h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
            <ul class="online-cv-resume-pro-vcard-time-line">
            
				<?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
                foreach( $settings['item_list'] as $list ){ 
                ?>
                
                    <li data-aos="fade-up"><span class="item-period"><?php echo isset( $list['period'] ) ? esc_html( $list['period'] ) : ''; ?></span>
                        <div class="half-box">
                        	<h6><?php echo isset( $list['item_title'] ) ? esc_html( $list['item_title'] ) : ''; ?></h6>
                        	<span class="item-small"><?php echo isset( $list['item_achievement'] ) ? esc_html( $list['item_achievement'] ) : ''; ?></span>
                        	<p><?php echo isset( $list['item_content'] ) ? esc_html( $list['item_content'] ) : ''; ?> </p>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                   
          
                <?php }  endif;?>
                
            </ul>
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
		<ul class="online-cv-resume-pro-vcard-time-line">
			<#	_.each( settings.item_list, function( list, index ) { #>

				<li>
					<span class="item-period">
						{{{list.period}}}
					</span>
						<div class="half-box">
							<h6>{{{list.item_title}}}</h6>
							<span class="item-small">{{{list.item_achievement}}}</span>
							<p>{{{list.item_content}}}</p>
						</div>
						<div class="clearfix"></div>
				</li>

			<# }); #> 
		</ul>
	</div>
</div>
       
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Time_Line_Widgets() );
