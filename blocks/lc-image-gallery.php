<?php
/**
 * Block template for LC Image Gallery.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="gallery">
	<div class="container">
		<div class="row py-5 justify-content-center" id="gallery_items">
			<?php
			foreach ( get_field( 'project_gallery' ) as $image ) {
				?>
			<div class="col-6 col-sm-4 col-md-3 mb-4 gallery-item-wrapper">
				<a href="<?= esc_url( wp_get_attachment_image_url( $image, 'full' ) ); ?>" class="project__link image-16x9 glightbox" data-gallery="project-gallery-all" data-type="image">
					<?= wp_get_attachment_image( $image, 'large', false, array( 'class' => 'project__image' ) ); ?>
				</a>
			</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
<?php

add_action(
	'wp_footer',
	function () {
		?>
<script>
document.addEventListener('DOMContentLoaded', function() {
	const lightbox = GLightbox({
		touchNavigation: true,
		loop: true
	});
});
</script>
		<?php
	}
);