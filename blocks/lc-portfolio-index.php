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

			if ( $portfolio_query->have_posts() ) :
				while ( $portfolio_query->have_posts() ) :
					$portfolio_query->the_post();
					?>
					<div class="col-md-4 mb-4">
						<a href="<?= get_the_permalink(); ?>" class="portfolio-card h-100">
							<div class="card-image">
								<?php the_post_thumbnail( 'medium_large', array( 'class' => 'portfolio-card__image' ) ); ?>
							</div>
							<div class="card-body">
								<h2 class="card-title"><?php the_title(); ?></h2>
								<div><?= get_field( 'location', get_the_ID() ); ?></div>
								<div>GDV <?= get_field( 'gdv', get_the_ID() ); ?></div>
							</div>
						</a>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p>No portfolio items found.</p>';
			endif;
			?>
		</div>
	</div>
</section>