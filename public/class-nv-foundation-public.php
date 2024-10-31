<?php

/**
 * The public-facing functionality of the plugin.
 */
class NV_Foundation_Public
{

	/**
	 * The ID of this plugin.
	 */
	private $identity;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $wp_referral_code The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct($identity, $version)
	{
		$this->identity = $identity;
		$this->version = $version;
		$this->load_dependencies();
	}

	/**
	 * Loads plugin description
	 *
	 * @return void
	 */
	public function load_dependencies()
	{
		require_once NV_FOUNDATION_PATH . '/public/shortcode-nv-foundation.php';
	}
}
