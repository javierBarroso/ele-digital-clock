<?php


if (!defined('ABSPATH')) {
	exit();
}

if ( ! function_exists( 'get_plugins' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if(!class_exists('Eledc_Digital_Clock_Plugin')){

	final class Eledc_Digital_Clock_Plugin
	{
	
		const MINIMUM_ELEMENTOR_VERSION  = '3.6.0';
	
		const MINIMUM_PHP_VERSION = '7.0';
	
		private static $_instance = null;
	
		public static function instance()
		{
	
			if (is_null(self::$_instance)) {
				self::$_instance = new self;
			}
	
			return self::$_instance;
		}
	
		public function __construct()
		{
			if ($this->is_compatible() && add_action('admin_menu', array($this, 'elementor_version'))) {
				add_action('elementor/init', [$this, 'init']);
			}
			add_action('elementor/editor/before_enqueue_scripts', function() {			
				wp_enqueue_style('eledclock-css', ELE_DIGITAL_CLOCK_URL . 'includes/css/elementor_custom_icons.css');			
			});
		}
	
		function elementor_version(){
	
			if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
				return false;
			}
			return true;
		}
	
		public function is_compatible()
		{
	
			if (!is_plugin_active('elementor/elementor.php')) {
				add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
				return false;
			}
	
			if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
				add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
				return false;
			}
	
			return true;
		}
	
		public function admin_notice_missing_main_plugin()
		{
	
			if (isset($_GET['activate'])) unset($_GET['activate']);
	
			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__('"%1$s" requires "%2$s" to be used.', 'ele-digital-clock'),
				'<strong>' . esc_html__('Ele Digital Clock', 'ele-digital-clock') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'ele-digital-clock') . '</strong>'
			);
	
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}
	
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version()
		{
	
			if (isset($_GET['activate'])) unset($_GET['activate']);
	
			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'ele-digital-clock'),
				'<strong>' . esc_html__('Ele Digital Clock', 'ele-digital-clock') . '</strong>',
				'<strong>' . esc_html__('Elementor', 'ele-digital-clock') . '</strong>',
				self::MINIMUM_ELEMENTOR_VERSION
			);
	
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}
	
		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function admin_notice_minimum_php_version()
		{
	
			if (isset($_GET['activate'])) unset($_GET['activate']);
	
			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'ele-digital-clock'),
				'<strong>' . esc_html__('Ele Digital Clock', 'ele-digital-clock') . '</strong>',
				'<strong>' . esc_html__('PHP', 'ele-digital-clock') . '</strong>',
				self::MINIMUM_PHP_VERSION
			);
	
			printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
		}
	
		public function init()
		{
			add_action('elementor/widgets/register', [$this, 'register_widgets']);
			add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
			wp_enqueue_style('eledclock-css', ELE_DIGITAL_CLOCK_URL . '/includes/css/eledClock_style.css');
            wp_enqueue_script('eledclock-js', plugin_dir_url(__FILE__) . '/js/eledClock_script.js');
			
		}
	
		public function register_widgets($widgets_manager)
		{
	
			require_once(__DIR__ . '/widgets/ele-digital-clock-widget.php');
	
			$widgets_manager->register(new Eledc_Digital_Clock_Widget());
		}
	
	
		function add_elementor_widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'jb-eledc-widget',
				[
					'title' => esc_html__('Clocks', 'ele-digital-clock'),
					'icon' => 'fa fa-plug',
				]
			);
		}
	}
}

