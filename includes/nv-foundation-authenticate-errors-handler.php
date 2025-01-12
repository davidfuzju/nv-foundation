<?php

/**
 * Authenticates a user, confirming the username and password are valid.
 *
 * @since 2.8.0
 *
 * @param WP_User|WP_Error|null $user WP_User or WP_Error object from a previous callback. Default null.
 * @param string $username Username for authentication.
 * @param string $password Password for authentication.
 * @return WP_User|WP_Error WP_User on success, WP_Error on failure.
 */
if (! function_exists('wp_authenticate_username_password')) :
    function wp_authenticate_username_password($user, $username, $password)
    {
        if ($user instanceof WP_User) {
            return $user;
        }

        if (empty($username) || empty($password)) {
            if (is_wp_error($user)) {
                return $user;
            }

            $error = new WP_Error();

            if (empty($username)) {
                $error->add('empty_username', __('<strong>Error:</strong> The username field is empty.'));
            }

            if (empty($password)) {
                $error->add('empty_password', __('<strong>Error:</strong> The password field is empty.'));
            }

            return $error;
        }

        $user = get_user_by('login', $username);

        if (! $user) {
            return new WP_Error(
                'invalid_username',
                sprintf(
                    /* translators: %s: User name. */
                    __('<strong>Error:</strong> The username <strong>%s</strong> is not registered on this site. If you are unsure of your username, try login with SMS instead.'),
                    $username
                )
            );
        }

        /**
         * Filters whether the given user can be authenticated with the provided password.
         *
         * @since 2.5.0
         *
         * @param WP_User|WP_Error $user WP_User or WP_Error object if a previous
         * callback failed authentication.
         * @param string $password Password to check against the user.
         */
        $user = apply_filters('wp_authenticate_user', $user, $password);
        if (is_wp_error($user)) {
            return $user;
        }

        if (! wp_check_password($password, $user->user_pass, $user->ID)) {
            return new WP_Error(
                'incorrect_password',
                sprintf(
                    /* translators: %s: User name. */
                    __('<strong>Error:</strong> The password you entered for the username %s is incorrect.'),
                    '<strong>' . $username . '</strong>'
                ) .
                    ' <a href="' . wp_lostpassword_url() . '">' .
                    __('Lost your password?') .
                    '</a>'
            );
        }

        return $user;
    }
endif;
