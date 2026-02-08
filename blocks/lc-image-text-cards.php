<?php
/**
 * Block template for LC Image Text Cards.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

$line_left  = in_array( 'Yes', (array) get_field( 'lined_heading_left' ), true ) ? 'has-top-border' : '';
$line_right = in_array( 'Yes', (array) get_field( 'lined_heading_right' ), true ) ? 'has-top-border' : '';
?>
<section class="image-text-cards py-5 <?= esc_attr( $bg . ' ' . $fg ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="image-text-cards__card">
					<?php
					if ( ! empty( get_field( 'image_left' ) ) ) {
						echo wp_get_attachment_image( get_field( 'image_left' ), 'full', false, array( 'class' => 'image-text-cards__card-image' ) );
					}
					?>
					<div class="image-text-cards__card-body">
						<?php
						if ( ! empty( get_field( 'title_left' ) ) ) {
							echo '<h2 class="' . esc_attr( $line_left ) . ' mb-4">' . esc_html( get_field( 'title_left' ) ) . '</h3>';
						}
						if ( ! empty( get_field( 'content_left' ) ) ) {
							echo wp_kses_post( get_field( 'content_left' ) );
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="image-text-cards__card">
					<?php
					if ( ! empty( get_field( 'image_right' ) ) ) {
						echo wp_get_attachment_image( get_field( 'image_right' ), 'full', false, array( 'class' => 'image-text-cards__card-image' ) );
					}
					?>
					<div class="image-text-cards__card-body">
						<?php
						if ( ! empty( get_field( 'title_right' ) ) ) {
							echo '<h2 class="' . esc_attr( $line_right ) . ' mb-4">' . esc_html( get_field( 'title_right' ) ) . '</h3>';
						}
						if ( ! empty( get_field( 'content_right' ) ) ) {
							echo wp_kses_post( get_field( 'content_right' ) );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>