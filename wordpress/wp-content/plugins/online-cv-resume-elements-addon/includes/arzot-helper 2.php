<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'init', 'arzot_toolkit_custom_post' );

if( !function_exists('arzot_toolkit_custom_post') ):
	function arzot_toolkit_custom_post() {
		
		
		register_post_type( 'project',
			array(
				'labels' => array(
					'name' => esc_html__( 'Projects', 'Post Type General Name', 'arzot-elements-addon' ),
					'singular_name' => esc_html__( 'Project', 'Post Type Singular Name', 'arzot-elements-addon' )
				),
				'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
				'menu_icon'   => 'dashicons-portfolio',
				'public' => true,
			)
		);
	
	}
endif;

if( !function_exists('arzot_toolkit_custom_post_taxonomy') ):
	function arzot_toolkit_custom_post_taxonomy() {
		register_taxonomy(
			'projects_cat',
			'project',                  
			array(
				'hierarchical'          => true,
				'label'                 => esc_html__( 'Project Category', 'arzot-elements-addon' ),  
				'query_var'             => true,
				'show_admin_column'     => true,
				'rewrite'               => array(
					'slug'              => 'project-category', 
					'with_front'    => true 
					)
				)
		);
	}
	add_action( 'init', 'arzot_toolkit_custom_post_taxonomy');

endif;



if( !function_exists('arzot_toolkit_custom_post_taxonomy') ||  !function_exists('arzot_gallery_meta_callback')):
  function arzot_add_gallery_metabox($post_type) {
    $types = array('project');
    if (in_array($post_type, $types)) {
      add_meta_box(
        'gallery-metabox',
         esc_html__( 'Gallery', 'arzot-elements-addon' ),
        'arzot_gallery_meta_callback',
        $post_type,
        'normal',
        'high'
      );
    }
  }
  add_action('add_meta_boxes', 'arzot_add_gallery_metabox');


  function arzot_gallery_meta_callback($post) {
    wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
    $ids = get_post_meta($post->ID, 'vdw_gallery_id', true);
    ?>
    <table class="form-table">
      <tr><td>
        <a class="gallery-add button" href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)"><?php echo esc_html__( 'Add image(s)', 'arzot-elements-addon' );?></a>

        <ul id="gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>

          <li>
            <input type="hidden" name="vdw_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
            <img class="image-preview" src="<?php echo $image[0]; ?>">
            <a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image"><?php echo esc_html__( 'Change image', 'arzot-elements-addon' );?></a><br>
            <small><a class="remove-image" href="#"> <?php echo esc_html__( 'Remove image', 'arzot-elements-addon' );?></a></small>
          </li>

        <?php endforeach; endif; ?>
        </ul>

      </td></tr>
    </table>
  <?php }


endif; 


if( !function_exists('arzot_gallery_meta_save') &&  !function_exists('arzot_gallery_meta_save')):

  function arzot_gallery_meta_save($post_id) {
    if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if(isset($_POST['vdw_gallery_id'])) {
      update_post_meta($post_id, 'vdw_gallery_id', $_POST['vdw_gallery_id']);
    } else {
      delete_post_meta($post_id, 'vdw_gallery_id');
    }
  }
  add_action('save_post', 'arzot_gallery_meta_save');
  
endif; 