<?php

$user = elgg_get_logged_in_user_entity();

if (!$user->isAdmin() && $user->role !== 'publisher') {
	register_error(elgg_echo('actionunauthorized'));
}

$guid = get_input('guid');

$entity = get_entity($guid);

$entity->featured = true;

system_message(elgg_echo('featured_content:feature:success'));
