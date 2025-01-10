<?php
add_filter('authenticate', 'nv_authenticate_errors_handler', 99, 3);
/**
 * 在 authenticate 阶段，自定义登录错误提示
 *
 * @param WP_User|WP_Error|null $user     当前认证结果（可能是 WP_Error 对象）
 * @param string                $username 用户名
 * @param string                $password 密码
 * @return WP_User|WP_Error|null
 */
function nv_authenticate_errors_handler($user, $username, $password)
{
    // 若当前返回是 WP_Error 对象，说明认证失败
    if (is_wp_error($user)) {
        // 取出错误码
        $error_code = $user->get_error_code();

        // 如果错误码是 'invalid_username'
        if ('invalid_username' === $error_code) {
            // 删掉原先的错误信息
            $user->remove('invalid_username');
            $user->add(
                'invalid_username',
                sprintf(
                    __(
                        '<strong>Error:</strong> The username <strong>%s</strong> is not registered on this site. If you are unsure of your username, try login with sms instead.'
                    ),
                    $username
                )
            );
        }
    }

    return $user;
}
