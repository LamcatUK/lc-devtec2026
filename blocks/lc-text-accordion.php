<?php
/**
 * Block template for LC Text Accordion.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';

?>
<section class="text-accordion py-5 <?= esc_attr( $bg . ' ' . $fg ); ?>">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-4">
				<?php
				if ( get_field( 'title' ) ) {
					?>
				<h2 class="h2 has-top-border mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
					<?php
				}
				echo wp_kses_post( get_field( 'content' ) );
				?>
			</div>
			<div class="col-lg-8">
				<?php
				if ( have_rows( 'accordion' ) ) {
					?>
				<div class="accordion" id="textAccordion">
					<?php
					while ( have_rows( 'accordion' ) ) {
						the_row();
						$index = get_row_index() - 1;
						?>
					<div class="accordion-item">
						<h2 class="accordion-header" id="heading<?= esc_attr( $index ); ?>">
							<button class="accordion-button <?= ( 0 !== $index ) ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= esc_attr( $index ); ?>" aria-expanded="<?= ( 0 === $index ) ? 'true' : 'false'; ?>" aria-controls="collapse<?= esc_attr( $index ); ?>">
								<?= esc_html( get_sub_field( 'title' ) ); ?>
							</button>
						</h2>
						<div id="collapse<?= esc_attr( $index ); ?>" class="accordion-collapse collapse <?= ( 0 === $index ) ? 'show' : ''; ?>" aria-labelledby="heading<?= esc_attr( $index ); ?>" data-bs-parent="#textAccordion">
							<div class="accordion-body">
								<?= wp_kses_post( get_sub_field( 'content' ) ); ?>
							</div>
						</div>
					</div>
						<?php
					}
					?>
				</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>