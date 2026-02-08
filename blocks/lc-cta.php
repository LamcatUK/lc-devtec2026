<?php
/**
 * Block template for LC CTA.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;


// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$classes = array();
if ( $bg ) {
	$classes[] = sanitize_html_class( $bg );
}
if ( $fg ) {
	$classes[] = sanitize_html_class( $fg );
}

?>
<section class="cta <?= esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="container py-5">
		<h2 class="mb-5"><?= wp_kses_post( get_field( 'title' ) ); ?></h2>
		<?php
		if ( get_field( 'link' ) ) {
			$link = get_field( 'link' );
			?>
		<a href="<?= esc_url( $link['url'] ); ?>" class="button"
			data-text="<?= esc_attr( $link['title'] ); ?>"
			<?= esc_html( $link['target'] ? ' target="' . $link['target'] . '"' : '' ); ?>>
			<span><?= esc_html( $link['title'] ); ?></span>
		</a>
			<?php
		}
		?>
	</div>
</section>