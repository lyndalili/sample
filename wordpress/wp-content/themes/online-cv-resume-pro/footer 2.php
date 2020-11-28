<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package online_cv_resume
 */

?>
</div> <!-- #main-page -->

<div class="footer-copyright-wrp">
			<?php
				echo esc_html(  apply_filters( 'online_cv_resume_op_copy_right',  get_theme_mod( 'op_copy_right', 'Copyright &copy; 2016 - 2020 Yourwebsite' ) ) );
            ?>
        </div>
<?php wp_footer(); ?>

</body>
</html>
