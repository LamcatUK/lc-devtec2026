<?php
/**
 * Block template for LC Two Col Feature Text.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="two-col-feature-text">
	<div class="container py-5">
		<h2 class="has-purple-400-color mb-4"><?= esc_html( get_field( 'title' ) ); ?></h2>
		<div class="row">
			<div class="col-lg-6">
				<?= wp_kses_post( get_field( 'left_content' ) ); ?>
			</div>
			<div class="col-lg-6">
				<?= wp_kses_post( get_field( 'right_content' ) ); ?>
			</div>
		</div>
	</div>
</section>