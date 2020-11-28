<?php 
/*
Title: My Demo Widget
Description: A description of what my widget does
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
piklist('field', array(
    'type' => 'text',
    'field' => 'heading',
    'label' => esc_html__( 'Title', 'online-cv-resume-pro' ),
    'description' => esc_attr__( 'Add hero heading', 'online-cv-resume-pro' ),
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));
piklist('field', array(
    'type' => 'text',
    'field' => 'heading-2nd',
    'label' => esc_html__( '2nd heading', 'online-cv-resume-pro' ),
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));
piklist('field', array(
    'type' => 'text',
    'field' => 'typing_text',
    'label' => esc_html__( 'Typing Text', 'online-cv-resume-pro' ),
	'description' => esc_attr__( 'use ( , ) to spareate , like as web developer, designer, etc', 'online-cv-resume-pro' ),
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));





piklist('field', array(
    'type' => 'file',
    'field' => 'profile_image',
    'label' => esc_html__( 'Profile Image Image', 'online-cv-resume-pro' ),
    'options' => array(
      'modal_title' => esc_attr__( 'Upload Image', 'online-cv-resume-pro' ),
      'button' => esc_attr__( 'Add Image', 'online-cv-resume-pro' ),
    )
));

piklist('field', array(
    'type' => 'file',
    'field' => 'bg_image',
    'label' => esc_html__( 'Background Image', 'online-cv-resume-pro' ),
    'options' => array(
      'modal_title' => esc_attr__( 'Upload Image', 'online-cv-resume-pro' ),
      'button' => esc_attr__( 'Add Image', 'online-cv-resume-pro' ),
    )
));


piklist('field', array(
    'type' => 'text',
    'field' => 'resume_btn_text',
    'label' => esc_html__( 'Resume button text', 'online-cv-resume-pro' ),
	
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));


piklist('field', array(
    'type' => 'text',
    'field' => 'resume_btn_link',
    'label' => esc_html__( 'Resume button Link', 'online-cv-resume-pro' ),
	
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));

piklist('field', array(
    'type' => 'text',
    'field' => 'hire_me_btn_text',
    'label' => esc_html__( 'Hire me button text', 'online-cv-resume-pro' ),
	
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));


piklist('field', array(
    'type' => 'text',
    'field' => 'hire_me_btn_link',
    'label' => esc_html__( 'Hire me button Link', 'online-cv-resume-pro' ),
	
    'attributes' => array(
      'class' => 'widefat online-cv-heading'
    )
));




