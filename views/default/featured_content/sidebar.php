<?php
/**
 * List featured content as a sidebar module
 */

if (!elgg_in_context('activity')) {
	return;
}

elgg_set_context('widgets');

$items = elgg_list_entities_from_metadata(array(
	'type' => 'object',
	'metadata_name_value_pairs' => array(
		'name' => 'featured',
		'value' => true,
	),
	// Order by the time when the content was featured
	'order_by' => 'n_table.time_created DESC',
	'limit' => 5,
));

echo elgg_view_module('aside', elgg_echo('featured_content:sidebar:title'), $items);

elgg_pop_context();
