<?php

$user = elgg_get_logged_in_user_entity();

if (!$user->isAdmin() && $user->role !== 'publisher') {
	register_error(elgg_echo('actionunauthorized'));
	forward(REFERER);
}

$guid = get_input('guid');

$entity = get_entity($guid);

$entity->featured = null;

system_message(elgg_echo('featured_content:unfeature:success'));
