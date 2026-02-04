<?php
/**
 * LC Hero Block Template.
 *
 * @var array $block The block settings and attributes.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

$class_name = $block['className'] ?? '';
$shadow     = ( false !== strpos( $class_name, 'no-shadow' ) ) ? '' : 'shadow-1';

$background = get_field( 'background' );

?>
<section class="hero shadow-1">
    <?php
    if ( $background ) {
        echo wp_get_attachment_image( $background, 'full', false, array( 'class' => 'hero__bg' ) ) ?? null;
    }
    ?>
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-6 order-2 order-md-1 d-flex flex-column justify-content-center align-items-start">
                <h1 class="mb-3 text-purple-400">
                    <?= esc_html( get_field( 'title' ) ); ?>
                </h1>
                <?php
                if ( get_field( 'content' ) ) {
                    ?>
                <div class="fs-500">
                    <?= esc_html( get_field( 'content' ) ); ?>
                </div>
                    <?php
                }
                if ( get_field( 'cta' ) ) {
                    $cta    = get_field( 'cta' );
                    $target = $cta['target'] ? $cta['target'] : '_self';
                    ?>
                <a class="btn btn-primary mt-4"
                    href="<?= esc_url( $cta['url'] ); ?>"
                    target="<?= esc_attr( $target ); ?>">
                    <?= esc_html( $cta['title'] ); ?>
                </a>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6 order-1 order-md-2">
                <?php
                if ( get_field( 'feature_images' ) ) {
                    ?>
                <div class="hero__carousel carousel slide carousel-fade <?= esc_attr( $shadow ); ?>" data-bs-ride="carousel">
                    <?php
                    $a = 'active';
                    foreach ( get_field( 'feature_images' ) as $f ) {
                        ?>
                    <div class="carousel-item <?= esc_attr( $a ); ?>">
                        <?= wp_get_attachment_image( $f, 'full', false, array( 'class' => 'd-block w-100' ) ); ?>
                    </div>
                        <?php
                        $a = '';
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
<?php
if ( ! is_front_page() ) {
    ?>
<section class="breadcrumbs pt-4 container-xl">
    <?php
    if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
    }
    ?>
</section>
    <?php
}
?>