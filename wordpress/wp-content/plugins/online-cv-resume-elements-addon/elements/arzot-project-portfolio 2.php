<?php
/**
 * Class: Be_Feature_Widgets
 * Name: Be Feature Box
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

class Arzot_Project_Portfolio_Widgets extends Widget_Base {
	
	public function get_name() {
		return 'arzot-arzot-project';
	}

	public function get_title() {
		return __( 'Project & Portfolio', 'arzot-elements-addon' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid arzot-arzot-project';
	}

	public function get_categories() {
		return [ 'arzot-group' ];
	}
	
	public function get_keywords() {
		return [ 'Project & Portfolio', 'Portfolio', 'Project' ];
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
				'label' => esc_html__( 'Portfolio Content', 'arzot-elements-addon' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'arzot-elements-addon' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Portfolio', 'arzot-elements-addon' ),
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
          <div class="portfolio-block mb-80">
            <h4 class="inner-title"><?php echo esc_html( $heading );?></h4>
						
						<?php
            $project_categories = get_terms( 'projects_cat' );
             
            if ( !empty($project_categories ) && ! is_wp_error( $project_categories ) ) {
             echo '<ul class="portfolio-list-unstyled"><li class="filter active" data-filter="all">'. __( 'all', 'arzot-elements-addon' ).'</li>';
            foreach ( $project_categories as $category ) {
                echo '<li class="filter" data-filter=".'.strtolower( esc_attr( $category->slug )) .'">'.esc_html( $category->name ).'</li>';
            }
             echo '</ul>';
            }?>
            <div class="online-cv-resume-pro-portfolio-grid">
            <div class="row" data-aos="fade-up">
            <?php
			$projects_array = new \WP_Query( array( 'posts_per_page' => -1, 'post_type' => 'project' ) );
			 if ( $projects_array->have_posts() ) :
			 while($projects_array->have_posts()) : $projects_array->the_post();
		
				$project_category = get_the_terms( get_the_ID(), 'projects_cat' );
		
				if ( $project_category && ! is_wp_error( $project_category ) ) {
					$project_cat_list = array();
					foreach ( $project_category as $category ) {
						$project_cat_list[] = strtolower( $category->slug );
					}
					$project_assigned_cat = join( " ", $project_cat_list );
				} else {
					$project_assigned_cat = '';
				}
		
				if ( $project_category && ! is_wp_error( $project_category ) ) {
					$project_cat_list = array();
					foreach ( $project_category as $category ) {
						$project_cat_list[] = $category->name;
					}
					$project_assigned_cat_name = join( ", ", $project_cat_list );
				} else {
					$project_assigned_cat_name = '';
				}
			?>
             <?php if ( has_post_thumbnail() ) :?>
            <div class="<?php echo esc_attr( $settings['columns_md'] );?> <?php echo esc_attr( $settings['columns_sm'] );?> <?php echo esc_attr( $settings['columns_xs'] );?> online-cv-resume-pro-portfolio-item mix <?php echo esc_attr( $project_assigned_cat );?>">
            
           		 <div class="portfolio-img"><img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' );?>" class="img-responsive" alt="<?php echo get_the_title();?>"></div>
                 <div class="portfolio-data">
                 	<h6 class="data-heading"><?php the_title();?></h6>
                    <p class="meta"><?php echo esc_html( $project_assigned_cat_name );?></p>
                    <div class="attr"> <a href="<?php the_permalink();?>"><span class="dashicons dashicons-admin-links"></span></a> <a href="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' );?>" class="image-popup">
                    <span class="dashicons dashicons-format-image"></span></a></div>
                 </div>
            </div>
            <?php endif;?>
			<?php
            endwhile;
				wp_reset_postdata(); 
				wp_reset_query();
            endif;
            ?>
            </div>
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
	<div class="portfolio-block mb-80">
		<h4 class="inner-title">{{{settings.heading}}}</h4>
	 </div>
</div>
       
<?php	
	 }
	
}


Plugin::instance()->widgets_manager->register_widget_type( new Arzot_Project_Portfolio_Widgets() );
