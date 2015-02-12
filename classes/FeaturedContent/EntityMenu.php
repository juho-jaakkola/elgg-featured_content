<?php

namespace FeaturedContent;

use ElggMenuItem, ElggObject;

class EntityMenu {
	/**
	 *
	 */
	 public function setUp ($hook, $type, $menu, $params) {
	 	if (!elgg_is_logged_in()) {
	 		return $menu;
	 	}

	 	$user = elgg_get_logged_in_user_entity();

		if (!$user->isAdmin() && $user->role !== 'publisher') {
	 		return $menu;
		}

		$entity = $params['entity'];

		// We don't want to feature users, sites nor groups
		if (!$entity instanceof ElggObject) {
			return $menu;
		}

		if ($entity->featured) {
			$action = 'unfeature';
			$icon = 'star-alt';
		} else {
			$action = 'feature';
			$icon = 'star';
		}

		$menu[] = ElggMenuItem::factory(array(
			'name' => 'featured',
			'text' => elgg_view_icon($icon),
			'href' => "action/featured_content/$action?guid={$entity->guid}",
			'is_action' => true,
		));

		return $menu;
	 }
}
