<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class NV_Foundation
{

	private static $instance;

	/**
	 * The unique identifier of this plugin.
	 */
	protected $identifier;

	/**
	 * The current version of the plugin.
	 */
	protected $version;

	/**
	 * The Options of NV Referral Code
	 */
	public $options;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 */
	public function __construct()
	{
		if (defined('WP_REFERRAL_CODE_VERSION')) {
			$this->version = WP_REFERRAL_CODE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->identifier = 'nv_foundation';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		add_action('init', array($this, 'init'), 1);

		$this->options = get_option(
			'nv_foundation_options',
			array()
		);
	}

	/**
	 * Returns an instance of the class
	 *
	 * @return NV_Foundation_Code
	 */
	public static function get_instance()
	{

		if (! self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-nv-foundation-admin.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-nv-foundation-public.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/nv-foundation-userid-query.php';
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 */
	private function define_admin_hooks()
	{
		$plugin_admin = new NV_FOUNDATION_Admin($this->get_identifier(), $this->get_version());
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 */
	private function define_public_hooks()
	{
		$plugin_public = new NV_Foundation_Public($this->get_identifier(), $this->get_version());
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 */
	public function get_identifier()
	{
		return $this->identifier;
	}

	/**
	 * Retrieve the version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}

	/**
	 * Handles initiation of plugin
	 */
	public function init() {}
}
