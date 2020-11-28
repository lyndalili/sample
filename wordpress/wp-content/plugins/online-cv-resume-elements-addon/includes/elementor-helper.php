<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! function_exists( 'arzot_elementor_init' ) ) {
	function arzot_elementor_init(){
		Plugin::instance()->elements_manager->add_category(
			'arzot-group',
			[
				'title'  => 'Online CV Resume ',
				'icon' => 'font'
			],
			1
		);
	
		//require_once plugin_dir_path( __FILE__ ).'elements/particles.php';
	}
	add_action('elementor/init','Elementor\arzot_elementor_init');

}


if ( ! function_exists( 'arzot_elementor_full_page_before_content' ) ) {
	/**
	 * Returns html for elementor fullwidth template.
	 *
	 * @since  1.0.0
	 * @return html
	 */
	function arzot_elementor_full_page_before_content(){
    	?>
    <div id="main-page">
        <section class="our-blog">
            <div class="main-wrapper-bg">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
        <?php
	}
	
    add_action( 'elementor/page_templates/header-footer/before_content','Elementor\arzot_elementor_full_page_before_content' );
}


if ( ! function_exists( 'arzot_elementor_full_page_after_content' ) ) {
	/**
	 * Returns html for elementor fullwidth template.
	 *
	 * @since  1.0.0
	 * @return html
	 */
	function arzot_elementor_full_page_after_content(){
     ?>				</div>
     		  </div>
        	</div>
         </div>
       </section>
     </div>
     <?php
	}
	
    add_action( 'elementor/page_templates/header-footer/after_content','Elementor\arzot_elementor_full_page_after_content' );
}





