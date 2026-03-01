<?php
/**
 * Custom taxonomies for the lc-mindspace theme.
 *
 * This file defines and registers custom taxonomies.
 *
 * @package lc-devtec2026
 */

/**
 * Register custom taxonomies for the theme.
 *
 * @return void
 */
function lc_register_taxes() {

	$args = array(
		'labels'             => array(
			'name'          => 'Project Categories',
			'singular_name' => 'Project Category',
		),
		'public'             => false,
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
	register_taxonomy( 'project_category', array( 'project' ), $args );
}
add_action( 'init', 'lc_register_taxes' );
