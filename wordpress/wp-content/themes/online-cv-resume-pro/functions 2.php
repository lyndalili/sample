<?php
/**
* Implement kirki config.
*/
require get_template_directory() . '/inc/kirki.config.php';

/**
 * Implement the theme Core feature.
 */
require get_template_directory() . '/inc/theme-core.php';


require get_template_directory() . '/inc/post-related-hook.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
* Implement the theme Layout.
*/
require get_template_directory() . '/inc/theme-layout-hook.php';


/**
* Implement the Custom Style.
*/
require get_template_directory() . '/inc/custom-style.php';


/**
* Implement Recommended plugins & required plugins.
*/

require_once get_template_directory() . '/inc/tgm/plugins.php';


require get_template_directory().'/theme-updates/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://eds.edatastyle.com/product/online-cv-resume/online-cv-resume-pro.json',
	__FILE__,
	'online-cv-resume-pro'
);