<?php
/**
 * Block template for LC USPs.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="lc_usps">
	<div class="container py-5">
		<?php
		if ( get_field( 'title' ) ) {
			?>
			<h2 class="lc_usps__title text-center mb-4 has-purple-400-color"><?= esc_html( get_field( 'title' ) ); ?></h2>
			<?php
		}
		?>
		
		<div class="row justify-content-center g-4">
			<?php
			if ( have_rows( 'usps' ) ) {
				while ( have_rows( 'usps' ) ) {
					the_row();
					?>
					<div class="col-md-6 col-lg-4">
						<div class="lc_usps__card">
							<?php if ( get_sub_field( 'title' ) ) : ?>
								<h3 class="lc_usps__card-title has-pink-400-color"><?= esc_html( get_sub_field( 'title' ) ); ?></h3>
							<?php endif; ?>
							<?php
							if ( get_sub_field( 'content' ) ) {
								?>
								<div class="lc_usps__card-content"><?= esc_html( get_sub_field( 'content' ) ); ?></div>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>

