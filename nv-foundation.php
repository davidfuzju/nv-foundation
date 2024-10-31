<?php

/**
 * NuVous foundation
 *
 * @link              https://github.com/davidfuzju/nv-foundation
 * @since             1.1.1
 *
 * @wordpress-plugin
 * Plugin Name:       NV Foundation
 * Plugin URI:        https://github.com/davidfuzju/nv-foundation
 * Description:       
 * Version:           1.0.0
 * Author:            David FU <david.fu.zju@gmail.com>
 * Author URI:        https://github.com/davidfuzju
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nv-foundation
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
	die;
}

// holds the plugin path.
define('NV_FOUNDATION_PATH', plugin_dir_path(__FILE__));
define('NV_FOUNDATION_URI', plugin_dir_url(__FILE__));
define('NV_FOUNDATION_VERSION', '1.0.0');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-nv-foundation.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_nv_foundation()
{
	NV_Foundation::get_instance();
}

// runs the plugin.
run_nv_foundation();

do_action('nv_foundation_loaded');
