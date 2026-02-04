<?php
/**
 * Custom taxonomies for the lc-mindspace theme.
 *
 * This file defines and registers custom taxonomies.
 *
 * @package lc-mindspace2025
 */

/**
 * Register custom taxonomies for the theme.
 *
 * @return void
 */
function lc_register_taxes() {

	// phpcs:disable
	// Example: Uncomment and modify as needed.

	/*
	$args = array(
		'labels'             => array(
			'name'          => 'Categories',
			'singular_name' => 'Category',
		),
		'public'             => true,
		'publicly_queryable' => true,
		'hierarchical'       => true,
		'show_ui'            => true,
		'show_in_nav_menus'  => true,
		'show_tagcloud'      => false,
		'show_in_quick_edit' => true,
		'show_admin_column'  => true,
		'show_in_rest'       => true,
		'rewrite'            => false,
	);
	register_taxonomy( 'custom_category', array( 'post' ), $args );
	*/
	// phpcs:enable
}
add_action( 'init', 'lc_register_taxes' );
