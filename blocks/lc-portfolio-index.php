<?php
/**
 * Block template for LC Portfolio Index.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="portfolio-grid py-5">
	<div class="container">
		<div class="row">
			<?php
			// Query for portfolio items.
			$portfolio_query = new WP_Query(
				array(
					'post_type'      => 'project',
					'posts_per_page' => -1,
				)
			);

			if ( $portfolio_query->have_posts() ) {
				while ( $portfolio_query->have_posts() ) {
					$portfolio_query->the_post();

					// Get primary category from project_category taxonomy.
					$primary_term = null;

					// Check if Yoast SEO is active and get primary term.
					if ( class_exists( 'WPSEO_Primary_Term' ) ) {
						$wpseo_primary_term = new WPSEO_Primary_Term( 'project_category', get_the_ID() );
						$primary_term_id    = $wpseo_primary_term->get_primary_term();
						if ( $primary_term_id ) {
							$primary_term = get_term( $primary_term_id, 'project_category' );
						}
					}

					// Fall back to first term if no primary term is set.
					if ( ! $primary_term ) {
						$terms = get_the_terms( get_the_ID(), 'project_category' );
						if ( $terms && ! is_wp_error( $terms ) ) {
							$primary_term = $terms[0];
						}
					}

					$ptype = $primary_term ? $primary_term->name : '';
					?>
					<div class="col-md-4 mb-4">
						<a href="<?= get_the_permalink(); ?>" class="portfolio-card h-100">
							<div class="card-image">
								<?php the_post_thumbnail( 'medium_large', array( 'class' => 'portfolio-card__image' ) ); ?>
								<?php if ( $ptype ) : ?>
									<div class="project-card__pill"><?= esc_html( $ptype ); ?></div>
								<?php endif; ?>
							</div>
							<div class="card-body">
								<h2 class="card-title"><?php the_title(); ?></h2>
								<div><?= get_field( 'location', get_the_ID() ); ?></div>
								<div>GDV <?= get_field( 'gdv', get_the_ID() ); ?></div>
							</div>
						</a>
					</div>
					<?php
				}
				wp_reset_postdata();
			} else {
				echo '<p>No portfolio items found.</p>';
			}
			?>
		</div>
	</div>
</section>