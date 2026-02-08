<?php
/**
 * Block template for LC Hero.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="hero">
	<div class="container d-flex align-items-center h-100">
		<div class="row">
			<div class="col-md-6 my-auto">
				<h1 class="hero__title mb-4"><?php the_field( 'title' ); ?></h1>
				<?php
				if ( get_field( 'intro' ) ) {
					?>
				<p class="hero__subtitle mb-4"><?php the_field( 'intro' ); ?></p>
					<?php
				}
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
			<div class="col-md-6">
				<div class="hero__image-container d-flex justify-content-end align-items-center">
					<?php
					if ( get_field( 'image' ) ) {
						echo wp_get_attachment_image( get_field( 'image' ), 'full', false, array( 'class' => 'hero__image' ) );
					}
					?>
					<div class="hero__image-overlay"></div>
				</div>
			</div>
		</div>
	</div>
</section>