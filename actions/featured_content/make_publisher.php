<?php
/**
 * Grant publisher role to a user
 */

$user = elgg_get_logged_in_user_entity();

if (!$user->isAdmin() && $user->role !== 'publisher') {
	register_error(elgg_echo('actionunauthorized'));
}

$guid = get_input('guid');

$user = get_user($guid);

$user->role = 'publisher';

system_message(elgg_echo('featured_content:make_publisher:success', array($user->name)));
