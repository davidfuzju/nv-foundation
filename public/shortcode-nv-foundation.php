<?php
if (! defined('ABSPATH')) {
	die();
}

/**
 * Shortcode for showing referral system related data.
 *
 * @return string
 */
function nv_foundation_user_param_shortcodes_init()
{
	function nv_foundation_user_param($atts = array())
	{
		$para     = $atts['var'];

		switch ($para) {
			case 'member_id': // [nv-foundation var="member_id"]
				ob_start();
				require NV_FOUNDATION_PATH . 'public/partials/member-id.php';

				return ob_get_clean();
			case 'userid-query': // [nv-foundation var="userid-query"]

				wp_enqueue_script('userid-query', plugin_dir_url(__FILE__) . 'js/nv-foundation-userid-query.js', array(), NV_FOUNDATION_VERSION, true);
				wp_enqueue_style('userid-query-styles', plugin_dir_url(__FILE__) . 'css/nv-foundation-userid-query.css', array(), NV_FOUNDATION_VERSION);
				wp_localize_script('jquery', 'ajaxurl', admin_url('admin-ajax.php'));

				ob_start();
				require NV_FOUNDATION_PATH . 'public/partials/userid-query.php';

				return ob_get_clean();
		}

		// [nv-foundation var="valid_invited_count"]
		return '';
	}

	add_shortcode('nv-foundation', 'nv_foundation_user_param');
}

add_action('init', 'nv_foundation_user_param_shortcodes_init');
