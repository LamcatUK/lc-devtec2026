<?php
/**
 * LC Contact Block Template.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

// get gutenberg anchor ID.
$block_id = ! empty( $block['anchor'] ) ? $block['anchor'] : 'contact-' . $block['id'];

?>
<section id="<?= esc_attr( $block_id ); ?>" class="contact py-5">
    <div class="contact__overlay"></div>
    <div class="container-xl">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-4">
                <h2 class="text-purple-400">Get in touch</h2>
                <div class="mb-4">
                    <?= wp_kses_post( get_field( 'intro' ) ); ?></div>
                <div class="mb-2"><i class="fa-solid fa-phone"></i>
                    <?= do_shortcode( '[contact_phone]' ); ?>
                </div>
                <div class="mb-4"><i class="fa-solid fa-paper-plane"></i>
                    <?= do_shortcode( '[contact_email]' ); ?>
                </div>
                <h3 class="text-purple-400">Connect</h3>
                <div class="fs-500"><?= do_shortcode( '[social_icons class="has-600-font-size d-flex gap-4"]' ); ?></div>
            </div>
            <div class="col-lg-8">
                <h2 class="text-purple-400 mb-4">Send me a message</h2>
                <?= do_shortcode( '[contact-form-7 id="' . get_field( 'form_id' ) . '"]' ); ?>
            </div>
        </div>
    </div>
</section>