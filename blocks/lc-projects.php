<?php
/**
 * Block template for LC Projects.
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

$block_id = ! empty( $block['id'] ) ? 'projects-swiper-' . $block['id'] : 'projects-swiper';

?>
<section class="projects <?= esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-4">
				<h2 class="has-top-border">Projects</h2>
				<div class="mb-4"><?= wp_kses_post( get_field( 'intro' ) ); ?></div>
				<a href="/portfolio/" class="button" data-text="View Portfolio">
					<span>View Portfolio</span>
				</a>
			</div>
			<div class="col-md-8">
				<div id="<?= esc_attr( $block_id ); ?>" class="projects__swiper swiper">
					<div class="swiper-wrapper">
						<?php
						$projects = new WP_Query(
							array(
								'post_type'      => 'project',
								'posts_per_page' => -1,
							)
						);
						if ( $projects->have_posts() ) {
							while ( $projects->have_posts() ) {
								$projects->the_post();
								?>
								<div class="swiper-slide">
									<a href="<?= esc_url( get_permalink() ); ?>" class="project-card d-block h-100">
										<div class="project-card__image-container">
											<?= get_the_post_thumbnail( get_the_ID(), 'medium_large', array( 'class' => 'project-card__image' ) ); ?>
										</div>
										<div class="project-card__content p-3">
											<h3 class="project-card__title mb-2"><?= get_the_title(); ?></h3>
											<div class="project-card__location mb-1"><?php the_field( 'location' ); ?></div>
											<div class="project-card__details"><?php the_field( 'area' ); ?> · GDV <?php the_field( 'gdv' ); ?></div>
										</div>
									</a>
								</div>
								<?php
							}
						}
						wp_reset_postdata();
						?>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var el = document.getElementById('<?= esc_js( $block_id ); ?>');
		if (!el || typeof Swiper === 'undefined') {
			return;
		}
		new Swiper(el, {
			slidesPerView: 1,
			spaceBetween: 24,
			pagination: {
				el: el.querySelector('.swiper-pagination'),
				clickable: true
			},
			breakpoints: {
				992: {
					slidesPerView: 2
				}
			}
		});
	});
</script>
