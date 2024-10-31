<?php

/**
 * The admin-specific functionality of the plugin.
 */
class NV_FOUNDATION_Admin
{

	/**
	 * The ID of this plugin.
	 */
	private $identifier;

	/**
	 * The version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct($identifier, $version)
	{

		$this->identifier = $identifier;
		$this->version = $version;
		$this->load_dependencies();
	}

	/**
	 * Loads admin related dependencies
	 */
	public function load_dependencies()
	{
		require_once NV_FOUNDATION_PATH . '/admin/class-nv-foundation-options.php';

		if (is_admin()) {
			add_filter(
				'plugin_action_links',
				function ($links, $file) {
					if (plugin_basename('nv-foundation/nv-foundation.php') === $file) {
						$links[] = '<a href="' . admin_url('options-general.php?page=nv-foundation') . '">' . __('Settings', 'nv-foundation') . '</a>';
						$links[] = '<a href="https://github.com/davidfuzju/nv-foundation">' . __('Documentation & Support', 'nv-foundation') . '</a>';
					}

					return $links;
				},
				10,
				2
			);
		}
	}
}
