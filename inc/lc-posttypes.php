<?php
/**
 * Custom Post Types Registration
 *
 * This file contains the code to register custom post types for the theme.
 *
 * @package lc-mindspace2025
 */

/**
 * Register custom post types for the theme.
 *
 * @return void
 */
function lc_register_post_types() {

	// phpcs:disable
	/*

	register_post_type(
		'testimonial',
		array(
			'labels'          => array(
				'name'               => 'Testimonials',
				'singular_name'      => 'Testimonial',
				'add_new_item'       => 'Add New Testimonial',
				'edit_item'          => 'Edit Testimonial',
				'new_item'           => 'New Testimonial',
				'view_item'          => 'View Testimonial',
				'search_items'       => 'Search Testimonials',
				'not_found'          => 'No testimonials found',
				'not_found_in_trash' => 'No testimonials in trash',
			),
			'has_archive'     => false,
			'public'          => false,
			'show_ui'         => true,
			'show_in_menu'    => true,
			'show_in_rest'    => true,
			'menu_position'   => 26,
			'menu_icon'       => 'dashicons-testimonial',
			'supports'        => array( 'title', 'editor' ),
			'capability_type' => 'post',
			'map_meta_cap'    => true,
			'rewrite'         => false,
		)
	);
	*/
	// phpcs:enable
}
add_action( 'init', 'lc_register_post_types' );
