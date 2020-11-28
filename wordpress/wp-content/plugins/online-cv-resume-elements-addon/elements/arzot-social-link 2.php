<?php
/**
 * Class: Arzot_Follow_Me_Widgets
 * Name: Arzot Social Links
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

class Arzot_Follow_Me_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'follow-me';
	}

	public function get_title() {
		return __( 'Follow Me', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-share follow-me';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'share', 'follow', 'arzot', 'follow me' ];
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
				'default' => esc_html__( 'Follow Me ', 'arzot-elements-addon' ),
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
			'link',
			array(
				'label'   => esc_html__( 'Add Social Link', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		
		$this->add_control(
			'item_list',
			array(
				'type'        => Controls_Manager::REPEATER,
				'fields'      => array_values( $repeater->get_controls() ),
				'default'     => array(
					array(
						'item_icon'  	=>  esc_attr('fa fa-facebook'),
						'link'  		=> '#' ,
					),
					array(
						
						'item_icon'  	=> esc_attr('fa fa-facebook'),
						'link'  		=> '#' ,
					),
					array(
						
						'item_icon'  	=> esc_attr('fa fa-pinterest-p'),
						'link'  		=> '#' ,
					),
					array(
						
						'item_icon'  	=> esc_attr('fa fa-github-alt'),
						'link'  		=> '#' ,
					),
					array(
						
						'item_icon'  	=> esc_attr('fa fa-twitter'),
						'link'  		=> '#' ,
					),
					array(
						'item_icon'  	=> esc_attr('fa fa-twitter'),
						'link'  		=> '#' ,
					),
					
				),
				'title_field' => '{{{ link }}}',
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
			<div class="social-icon mb-80">
				<h4 class="inner-title"><?php echo esc_html( $heading );?></h4>   
				<ul>
					<?php 
					if( isset( $settings['item_list'] ) && count( $settings['item_list'] ) > 0 ): 
						foreach( $settings['item_list'] as $list ){ 
						?>

						<li>
							<a href="<?php echo esc_url($list['link']); ?>">
								<i class="<?php echo esc_attr($list['item_icon']); ?>"></i>
							</a>
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
	<div class="social-icon mb-80">
		<h4 class="inner-title">{{{settings.heading}}}</h4>   
		<ul>
			<#	_.each( settings.item_list, function( list, index ) { #>

			<li>
				<a href="{{{list.link}}}">
					<i class="{{{list.item_icon}}}"></i>
				</a>
			</li>

			<# }); #> 
		</ul>
	</div>
</div>
       
<?php	
	}
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Follow_Me_Widgets() );
