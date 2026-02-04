<?php
/**
 * LC CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 *
 * @package LC_Theme
 */

defined( 'ABSPATH' ) || exit;

$class        = $block['className'] ?? '';
$bgcolour     = $block['backgroundColor'] ?? 'ivory';
$colour       = get_field( 'cta_colour' ) ? get_field( 'cta_colour' ) : 'white';
$title_colour = 'text-purple-400';

switch ( $colour ) {
    case 'white':
        $content      = '';
        $title_colour = 'text-purple-400';
        break;
    case 'teal-400':
        $content      = 'text-white';
        $title_colour = 'text-white';
        break;
    case 'purple-400':
        $content      = 'text-purple-400';
        $title_colour = 'text-white';
        break;
    default:
        $content      = '';
        $title_colour = 'text-purple-400';
        break;
}

?>
<div class="buffer-top has-<?= esc_attr( $bgcolour ); ?>-background-color has-background"></div>
<section
    class="cta pt-3 pb-5 has-<?= esc_attr( $bgcolour ); ?>-background-color has-background <?= esc_attr( $class ); ?>">
    <div class="container-xl">
        <div class="cta__card text-center shadow-1 bg-<?= esc_attr( $colour ); ?>">
            <div class="cta__overlay"></div>
            <h2 class="mb-3">
                <?= esc_html( get_field( 'title' ) ); ?>
            </h2>
            <div class="fs-500 mb-2 <?= esc_attr( $title_colour ); ?>"><i class="fa-solid fa-phone"></i>
                <?= wp_kses_post( contact_phone() ); ?>
            </div>
            <div class="fs-500 mb-3"><i class="fa-solid fa-paper-plane"></i>
                <?= wp_kses_post( contact_email() ); ?>
            </div>
            <a href="/contact-me/?subject=<?= esc_attr( get_field( 'subject' ) ); ?>" class="btn btn-primary">Get in touch</a>
            <?php
            if ( get_field( 'after' ) ) {
                ?>
            <div class="has-small-font-size pt-4">
                <?= wp_kses_post( get_field( 'after' ) ); ?>
            </div>
                <?php
            }
            ?>
        </div>
</section>
<div class="buffer-bottom has-<?= esc_attr( $bgcolour ); ?>-background-color has-background"></div>