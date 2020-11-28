<?php
/**
 * Plugin Name: Online CV Resume 
 * Plugin URI:  https://themeforest.net/user/athemeart
 * Description: It provides the set of modules to create different kinds of content for Arzot theme ...
 * Version:     1.10.0
 * Author:      Athemeart
 * Author URI:  https://themeforest.net/user/athemeart
 * Text Domain: online-cv-resume-elements-addon
 * License:     GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages
 *
 * @package online-cv-resume-elements-addon
 * @author  Athemeart
 * @version 1.9.3
 * @license GPL-3.0
 * @copyright  2019, Athemeart
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// If class `Jet_Elements` doesn't exists yet.
if ( ! class_exists( 'Arzot_Elements_Addon' ) ) {
	
	 /**
	 * Sets up and initializes the plugin.
	 */
	class Arzot_Elements_Addon {
		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * A reference to an instance of cherry framework core class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private $core = null;

		/**
		 * Holder for base plugin URL
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string
		 */
		private $plugin_url = null;

		/**
		 * Plugin version
		 *
		 * @var string
		 */

		private $version = '1.10.0';

		/**
		 * Holder for base plugin path
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string
		 */
		private $plugin_path = null;

		/**
		 * Sets up needed actions/filters for the plugin to initialize.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {

			// Load the core functions/classes required by the rest of the plugin.
			add_action( 'after_setup_theme', array( $this, 'get_core' ), 1 );
			

			// Internationalize the text strings used.
			add_action( 'init', array( $this, 'lang' ), -999 );
			// Load files.
			add_action( 'init', array( $this, 'init' ), -999 );
			
			// Load admin enqueue scripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), -999 );
			
			add_action('elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ), 1);

			// Register activation and deactivation hook.
			register_activation_hook( __FILE__, array( $this, 'activation' ) );
			register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
		}

		/**
		 * Loads the core functions. These files are needed before loading anything else in the
		 * plugin because they have required functions for use.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public function get_core() {

			
		}

		/**
		 * Returns plugin version
		 *
		 * @return string
		 */
		public function get_version() {
			return $this->version;
		}

		/**
		 * Manually init required modules.
		 *
		 * @return void
		 */
		public function init() {
			
			$this->load_files();
			$this->wp_enqueue();
			
			

		}
		public function widgets_registered(){
			require $this->plugin_path('elements/arzot-about-me.php');
			require $this->plugin_path('elements/arzot-service.php');
			require $this->plugin_path('elements/arzot-counter.php');
		    require $this->plugin_path('elements/arzot-price.php');
			require $this->plugin_path('elements/arzot-testimonials.php');
			require $this->plugin_path('elements/arzot-clients-logo.php');
			require $this->plugin_path('elements/arzot-achievement.php');
			require $this->plugin_path('elements/arzot-time-line.php');
			require $this->plugin_path('elements/arzot-progress-bar.php');
			require $this->plugin_path('elements/arzot-project-portfolio.php');
			require $this->plugin_path('elements/arzot-social-link.php');
			
		}

		/**
		 * Show recommended plugins notice.
		 *
		 * @return void
		 */
		public function required_plugins_notice() {
			require $this->plugin_path( 'includes/lib/class-tgm-plugin-activation.php' );
			add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
		}

		/**
		 * Register required plugins
		 *
		 * @return void
		 */
		public function register_required_plugins() {

			$plugins = array(
				array(
					'name'     => 'Elementor',
					'slug'     => 'elementor',
					'required' => true,
				),
			);

			$config = array(
				'id'           => 'be-elements-addon',
				'default_path' => '',
				'menu'         => 'tgmpa-install-plugins',
				'parent_slug'  => 'plugins.php',
				'capability'   => 'manage_options',
				'has_notices'  => true,
				'dismissable'  => true,
				'dismiss_msg'  => '',
				'is_automatic' => false,
				'strings'      => array(
					'notice_can_install_required'     => _n_noop(
						'Be Elements Addon for Elementor requires the following plugin: %1$s.',
						'Be Elements Addon for Elementor requires the following plugins: %1$s.',
						'be-elements-addon'
					),
					'notice_can_install_recommended'  => _n_noop(
						'Be Elements Addon for Elementor recommends the following plugin: %1$s.',
						'Be Elements Addon for Elementor recommends the following plugins: %1$s.',
						'be-elements-addon'
					),
				),
			);

			tgmpa( $plugins, $config );

		}

		/**
		 * Check if theme has elementor
		 *
		 * @return boolean
		 */
		public function has_elementor() {
			return defined( 'ELEMENTOR_VERSION' );
		}

		/**
		 * [elementor description]
		 * @return [type] [description]
		 */
		public function elementor() {
			return \Elementor\Plugin::$instance;
		}

		/**
		 * Returns utility instance
		 *
		 * @return object
		 */
		public function utility() {
		
		}

		/**
		 * Load required files.
		 *
		 * @return void
		 */
		public function load_files() {
			
			require $this->plugin_path( 'includes/elementor-helper.php' );
			require $this->plugin_path( 'includes/arzot-helper.php' );
			
			
		}

		/**
		 * Returns path to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_path( $path = null ) {

			if ( ! $this->plugin_path ) {
				$this->plugin_path = trailingslashit( plugin_dir_path( __FILE__ ) );
			}

			return $this->plugin_path . $path;
		}
		/**
		 * Returns url to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_url( $path = null ) {

			if ( ! $this->plugin_url ) {
				$this->plugin_url = trailingslashit( plugin_dir_url( __FILE__ ) );
			}

			return $this->plugin_url . $path;
		}

		/**
		 * Loads the translation files.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function lang() {
			load_plugin_textdomain( 'be-elements-addon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Get the template path.
		 *
		 * @return string
		 */
		public function template_path() {
			return apply_filters( 'be-elements-addon/template-path', 'be-elements-addon/' );
		}

		/**
		 * Returns path to template file.
		 *
		 * @return string|bool
		 */
		public function get_template( $name = null ) {

			$template = locate_template( $this->template_path() . $name );

			if ( ! $template ) {
				$template = $this->plugin_path( 'templates/' . $name );
			}

			if ( file_exists( $template ) ) {
				return $template;
			} else {
				return false;
			}
		}


		/**
		 * Load  enqueue script & Style
		 *
		 * @return void
		 */
		public function wp_enqueue() {
			
			
		}
		
		/**
		 * Load  enqueue script & Style for wp-admin
		 *
		 * @return void
		 */
		public function admin_enqueue_scripts( $hook ) {
			 if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
				wp_enqueue_style( 'arzot-elements', $this->plugin_url( 'asset/arzot-admin-elements.css' ), '1.0.0' );
				
				wp_enqueue_script( 'arzot-metabox-gallery', $this->plugin_url( 'asset/arzot-admin-metabox-gallery.js' ), 0, '1.0', true );
			  }
			
		}


		/**
		 * Do some stuff on plugin activation
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function activation() {
		}

		/**
		 * Do some stuff on plugin activation
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function deactivation() {
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

	}
}

if ( ! function_exists( 'arzot_elements' ) ) {

	/**
	 * Returns instanse of the plugin class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function arzot_elements() {
		return Arzot_Elements_Addon::get_instance();
	}
	arzot_elements();
}

if( class_exists('Puc_v4_Factory') ):
Puc_v4_Factory::buildUpdateChecker(
	'https://eds.edatastyle.com/product/online-cv-resume/online-cv-resume-elements-addon.json',
	__FILE__,
	'online-cv-resume-elements-addon'
);
endif;