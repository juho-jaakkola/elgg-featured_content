<?php

namespace FeaturedContent;

use ElggMenuItem, ElggUser;

class UserHoverMenu {
	/**
	 * Set up items for user_hover menu
	 */
	 public function setUp ($hook, $type, $menu, $params) {
	 	if (!elgg_is_logged_in()) {
	 		return $menu;
	 	}

	 	$current_user = elgg_get_logged_in_user_entity();

		// Allow only admins and publishers to grant/remove publisher roles
		if (!$current_user->isAdmin() && $current_user->role !== 'publisher') {
	 		return $menu;
		}

		$user = $params['entity'];

		// User cannot make/unmake himseld a publisher
		if ($user->guid === $current_user->guid) {
			return $menu;
		}

		if (!$user instanceof ElggUser) {
			return $menu;
		}

		if ($user->role === 'publisher') {
			$action = 'unmake_publisher';
			$text = elgg_echo('featured_content:unmake_publisher');
		} else {
			$action = 'make_publisher';
			$text = elgg_echo('featured_content:make_publisher');
		}

		$menu[] = ElggMenuItem::factory(array(
			'name' => 'publisher',
			'text' => $text,
			'href' => "action/featured_content/$action?guid={$user->guid}",
			'is_action' => true,
		));

		return $menu;
	 }
}
