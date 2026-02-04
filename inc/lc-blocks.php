<?php
/**
 * Register ACF blocks for the lc-mindspace theme.
 *
 * This file defines and registers custom ACF blocks.
 *
 * @package lc-devtec2026
 */

/**
 * Register ACF blocks.
 *
 * @return void
 */
function acf_blocks() {
	if ( function_exists( 'acf_register_block_type' ) ) {

		// INSERT NEW BLOCKS HERE.

	}
}
add_action( 'acf/init', 'acf_blocks' );

// Gutenburg core modifications.
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );

/**
 * Modify core block type arguments to add custom render callbacks.
 *
 * @param array  $args Block type arguments.
 * @param string $name Block type name.
 * @return array Modified block type arguments.
 */
function core_image_block_type_args( $args, $name ) {
	if ( 'core/paragraph' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/heading' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}
	if ( 'core/list' === $name ) {
		$args['render_callback'] = 'modify_core_add_container';
	}

	return $args;
}

/**
 * Modify core block content by wrapping it in a container.
 *
 * @param array  $attributes Block attributes.
 * @param string $content Block content.
 * @return string Modified block content.
 */
function modify_core_add_container( $attributes, $content ) {
	ob_start();

	// Check if this is a list block with fa-list class.
	if ( isset( $attributes['className'] ) && strpos( $attributes['className'], 'fa-list' ) !== false ) {
		// Extract icon class if specified (e.g., fa-list fa-check becomes fa-check).
		$icon_class = 'fa-check'; // default icon.
		if ( preg_match( '/fa-list\s+(fa-[\w-]+)/', $attributes['className'], $matches ) ) {
			$icon_class = $matches[1];
		}

		// Convert to FontAwesome list.
		$content = convert_to_fa_list( $content, $icon_class );
	}

	?>
<div class="container-xl">
	<?= wp_kses_post( $content ); ?>
</div>
	<?php
	$content = ob_get_clean();
	return $content;
}

