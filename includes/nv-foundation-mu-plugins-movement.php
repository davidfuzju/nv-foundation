<?php
register_activation_hook(__FILE__, 'my_plugin_move_to_muplugins');

function my_plugin_move_to_muplugins()
{
	$mu_plugins_dir = WP_CONTENT_DIR . '/mu-plugins';
	$source_file = plugin_dir_path(__FILE__) . 'nv-foundation-authenticate-errors-handler.php';
	$target_file = $mu_plugins_dir . '/nv-foundation-authenticate-errors-handler.php';

	if (is_dir($mu_plugins_dir) && file_exists($source_file)) {
		copy($source_file, $target_file);
	}
}
