<?php

/**
 * User Id shortcode view
 */

// 检查用户是否已登录
?>
<?php if (!empty($user_id)) : ?>
<?php echo esc_html($user_id); ?>
<?php else : ?>
<?php echo esc_html('None'); ?>
<?php endif; ?>