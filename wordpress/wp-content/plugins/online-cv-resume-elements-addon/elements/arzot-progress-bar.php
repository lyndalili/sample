<?php
/**
 * Class: Arzot_Progress_Bar_Widgets
 * Name: Arzot Skills
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

class Arzot_Progress_Bar_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-progress';
	}

	public function get_title() {
		return __( 'Progress Bar', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-skill-bar progress';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'skills', 'experience', 'expert','progress'];
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
				'label' => esc_html__( 'Skills', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Skills', 'arzot-elements-addon' ),
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
			'percent',
			[
				'label' => __( 'Percent', 'arzot-elements-addon' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
			]
		);

		
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'item_title'  		=> esc_html__( 'web development', 'arzot-elements-addon' ),
						'percent'  		=> absint(60),
					),
					array(
						'item_title'  		=> esc_html__( 'HTML/CSS', 'arzot-elements-addon' ),
						'percent'  		=> absint(70),
					),
					array(
						'item_title'  		=> esc_html__( 'Print Design', 'arzot-elements-addon' ),
						'percent'  		=> absint(45),
					),
					array(
						'item_title'  		=> esc_html__( 'Graphic Design', 'arzot-elements-addon' ),
						'percent'  		=> absint(90),
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
          <div class="skill-progress mb-80">
            <h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
            <div class="row">
				<?php if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
                foreach( $settings['item_list'] as $list ){ 
                ?>
                
               <div class="col-md-6" data-aos="fade-up">
                    <div class="skill-bar">
                        <h6 class="skill-title">
							<?php echo isset( $list['item_title'] ) ? esc_html( $list['item_title'] ) : ''; ?>
						</h6>
                        <div class="progress">
							<div class="progress-bar progress-bar-striped" 
								data-percent="<?php echo isset( $list['percent'] ) ? absint( $list['percent'] ) : ''; ?>" 
								style="transition: width 3s ease 0s; width: <?php echo absint( $list['percent'] ); ?>%; "
							>
                                <span class="percent-text">
									<span class="count"><?php echo absint( $list['percent'] ) ?></span>
									<?php echo esc_html__( '%', 'arzot-elements-addon' );?>
								</span>
                            </div>
                        </div>
                    </div> <!-- /.skill-bar -->
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
		<div class="skill-progress mb-80">
			<h4 class="inner-title">{{{settings.heading}}}</h4>
			<div class="row">
				<#	_.each( settings.item_list, function( list, index ) { #>

					<div class="col-md-6">
						<div class="skill-bar">
							<h6 class="skill-title">
								{{{list.item_title}}}
							</h6>
							<div class="progress">
								<div class="progress-bar progress-bar-striped" 
									data-percent="{{{list.percent}}}" 
									style="transition: width 3s ease 0s; width:{{{list.percent}}}%; "
								>
									<span class="percent-text">
										<span class="count">{{{list.percent}}}</span>%
									</span>
								</div>
							</div>
						</div>
					</div>

				<# }); #> 
			</div>
       
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Progress_Bar_Widgets() );
