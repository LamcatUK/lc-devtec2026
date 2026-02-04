<?php
/**
 * LC Testimonials Block Template.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

$speciality = get_field( 'speciality' );

$term_slugs = array();

$args = array(
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
);


if ( is_array( $speciality ) && ! empty( $speciality ) ) {
    $args['tax_query'] = array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
        array(
            'taxonomy' => 'speciality',
            'field'    => 'term_id',
            'terms'    => $speciality,
        ),
    );
}

$q = new WP_Query( $args );
?>
<section class="testimonials py-5">
    <div class="testimonials__overlay"></div>
    <div class="container-xl">
        <h2 class="text-center mb-4 text-purple-400">Testimonials</h2>
        <div class="testimonials__carousel carousel slide carousel-fade w-lg-75 mx-auto" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner pb-4">
                <?php

                $a = 'active';

                while ( $q->have_posts() ) {
                    $q->the_post();
                    ?>
                <div class="carousel-item <?= esc_attr( $a ); ?>">
                    <div class="testimonials__words">
                        <div class="testimonials__content">
                            <?= wp_kses_post( get_the_content() ); ?>
                        </div>
                        <div class="testimonials__title text-center">
                            <strong class="has-purple-400-color"><?= esc_html( get_the_title() ); ?></strong>
                        </div>
                        <div class="testimonials__loca text-center">
                            <?= esc_html( get_field( 'location', get_the_ID() ) ); ?>
                        </div>
                    </div>
                </div>
                    <?php
                    $a = '';
                }
                ?>
            </div>
        </div>
    </div>
</section>