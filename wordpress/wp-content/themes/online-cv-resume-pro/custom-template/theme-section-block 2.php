<?php
/*
Template Name: Theme Section Block
*/
/**
 * The template for displaying Home Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package online_cv_resume
 */

get_header();
?>
<div id="main-page" class="home-page-wrp">

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile; // End of the loop.
		?>

</div><!-- #primary -->

<?php

get_footer();
