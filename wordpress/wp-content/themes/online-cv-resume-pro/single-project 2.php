<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package online_cv_resume
 */

get_header();
?>
<?php
	/**
	* Hook - online_cv_resume_container_hook_before.
	*
	* @hooked online_cv_resume_container_wrp_start - 10
	*/
	do_action( 'online_cv_resume_container_hook_before' );
?>

	<div id="primary" class="content-area">


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	<?php
		$images = get_post_meta( get_the_ID(), 'vdw_gallery_id', true);
		if( !empty( $images ) && count( $images ) > 0 ):
		echo '<div class="col-md-12 project-gallery-image"><div class="row">';
		foreach ($images as $image) {
			$img = wp_get_attachment_image_src( $image, 'full' );
			echo '<div class="col-md-4 project-gallery-list">';
			?>
            <a href="<?php echo esc_attr( $img[0] );?>" class="image-popup"><?php echo wp_get_attachment_image( $image, 'medium' );?></a>
            <?php
			echo '</div>';
		}
		echo '</div></div>';
		endif;
		?>
	</div><!-- #primary -->
<?php
	/**
	* Hook - online_cv_resume_container_hook_after.
	*
	* @hooked online_cv_resume_container_wrp_end - 10
	*/
	do_action( 'online_cv_resume_container_hook_after' );
?>
<?php

get_footer();
