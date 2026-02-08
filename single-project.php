<?php
/**
 * The template for displaying all single projects
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;

get_header();

$img = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ?? null;

?>
<main id="main" class="project">
	<?php
	$content = get_the_content();
	$blocks  = parse_blocks( $content );
	?>
	<section class="hero">
		<div class="container d-flex align-items-center h-100">
			<div class="row">
				<div class="col-md-6 my-auto">
					<h1 class="hero__title mb-4"><?= get_the_title(); ?></h1>
					<div class="hero__subtitle mb-2"><?php the_field( 'location' ); ?></div>
					<div class="hero__subtitle mb-4">Area <?php the_field( 'area' ); ?> · GDV <?php the_field( 'gdv' ); ?> </div>
					<a href="/contact/" class="button" data-text="Contact">
						<span>Contact</span>
					</a>
				</div>
				<div class="col-md-6">
					<div class="hero__image-container d-flex justify-content-end align-items-center">
						<?= get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'hero__image' ) ); ?>
						<div class="hero__image-overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<article>
		<div class="container-xl pb-5">
			<?php
			foreach ( $blocks as $block ) {
				echo render_block( $block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			?>
			<div class="text-center">
				<a href="/portfolio/" class="button" data-text="Back to Portfolio">
					<span>Back to Portfolio</span>
				</a>
			</div>
		</div>
	</article>
	<section class="cta has-secondary-400-background-color has-background-color">
	<div class="container py-5">
		<h2 class="mb-5">Assessing a potential site or scheme?</h2>
		<a href="/contact/" class="button"
			data-text="Discuss an Opportunity">
			<span>Discuss an Opportunity</span>
		</a>
	</div>
</section>
	
</main>
<?php
get_footer();
