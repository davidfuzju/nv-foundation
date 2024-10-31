<?php

/**
 * Handles options of the plugin
 */
final class NV_Foundation_Settings
{

	private static $instance;
	public $page_slug = 'nv-foundation';

	/**
	 * Sets up needed actions/filters for the admin options to initialize.
	 */
	public function __construct()
	{

		if (! is_admin()) {
			return;
		}

		$this->load_settings();
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance()
	{

		if (! self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function load_settings()
	{
		add_action('admin_menu', array($this, 'add_options_page'));
	}

	public function add_options_page()
	{
		add_options_page(
			'NV Foundation Options',
			'NV Foundation',
			'manage_options',
			$this->page_slug,
			array($this, 'get_options_page_html')
		);
	}

	public function get_options_page_html()
	{
		if (! current_user_can('manage_options')) {
			return;
		}

		require_once NV_FOUNDATION_PATH . 'admin/partials/options/nv-foundation-admin-setting-view.php';
	}
}

NV_Foundation_Settings::get_instance();
