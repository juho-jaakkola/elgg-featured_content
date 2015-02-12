<?php
/**
 * Plugin for managing and displaying featured content
 */

elgg_register_event_handler('init', 'system', 'featured_content_init');

/**
 * Initialize the plugin.
 */
function featured_content_init() {
	elgg_register_plugin_hook_handler('register', 'menu:entity', array('\FeaturedContent\EntityMenu', 'setUp'));
	elgg_register_plugin_hook_handler('register', 'menu:user_hover', array('\FeaturedContent\UserHoverMenu', 'setUp'));

	elgg_register_action('featured_content/feature', __DIR__ . '/actions/featured_content/feature.php');
	elgg_register_action('featured_content/unfeature', __DIR__ . '/actions/featured_content/unfeature.php');

	elgg_register_action('featured_content/make_publisher', __DIR__ . '/actions/featured_content/make_publisher.php');
	elgg_register_action('featured_content/unmake_publisher', __DIR__ . '/actions/featured_content/unmake_publisher.php');

	elgg_extend_view('page/elements/sidebar', 'featured_content/sidebar', 300);
}
