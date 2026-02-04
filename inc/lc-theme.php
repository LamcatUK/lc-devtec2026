<?php
/**
 * LC Theme Functions
 *
 * This file contains theme-specific functions and customizations for the LC Mindspace 2025 theme.
 *
 * @package lc-mindspace2025
 */

defined( 'ABSPATH' ) || exit;

require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-acf-theme-palette.php';
require_once LC_THEME_DIR . '/inc/lc-posttypes.php';
require_once LC_THEME_DIR . '/inc/lc-taxonomies.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';
require_once LC_THEME_DIR . '/inc/lc-news.php';

/**
 * Editor styles: opt-in so WP loads editor.css in the block editor.
 * With theme.json present, this just adds your custom CSS on top (variables, helpers).
 */
add_action(
    'after_setup_theme',
    function () {
        add_theme_support( 'editor-styles' );
        add_editor_style( 'css/custom-editor-style.min.css' );
    },
    5
);

/**
 * Neutralise legacy palette/font-size support (if parent/Understrap adds them).
 * theme.json is authoritative, but some themes still register supports in PHP.
 * Remove them AFTER the parent has added them (high priority).
 */
add_action(
    'after_setup_theme',
    function () {
        remove_theme_support( 'editor-color-palette' );
        remove_theme_support( 'editor-gradient-presets' );
        remove_theme_support( 'editor-font-sizes' );
    },
    99
);

/**
 * (Optional) Ensure custom colours *aren't* forcibly disabled by parent.
 * If Understrap disables custom colours, this re-enables them so theme.json works fully.
 */
add_filter( 'should_load_separate_core_block_assets', '__return_true' ); // performance nicety.

// Remove unwanted SVG filter injection WP.
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Remove comment-reply.min.js from footer.
 *
 * @return void
 */
function remove_comment_reply_header_hook() {
    wp_deregister_script( 'comment-reply' );
}
add_action( 'init', 'remove_comment_reply_header_hook' );

/**
 * Remove comments menu from WordPress admin.
 *
 * @return void
 */
function remove_comments_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_comments_menu' );

/**
 * Remove unwanted page templates from the theme.
 *
 * @param array $page_templates Array of page templates.
 * @return array Modified array of page templates.
 */
function child_theme_remove_page_template( $page_templates ) {
    unset( $page_templates['page-templates/blank.php'], $page_templates['page-templates/empty.php'], $page_templates['page-templates/left-sidebarpage.php'], $page_templates['page-templates/right-sidebarpage.php'], $page_templates['page-templates/both-sidebarspage.php'] );
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );

/**
 * Remove Understrap post formats support.
 *
 * @return void
 */
function remove_understrap_post_formats() {
    remove_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page(
        array(
            'page_title' => 'Site-Wide Settings',
            'menu_title' => 'Site-Wide Settings',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
        )
    );
}

/**
 * Initialize widgets and navigation menus.
 *
 * Registers custom navigation menus, unregisters default Understrap sidebars and menus,
 * and configures the editor color palette.
 *
 * @return void
 */
function widgets_init() {

    register_nav_menus(
        array(
            'primary_nav'  => 'Primary Nav',
            'footer_menu1' => 'Footer Menu 1',
            'footer_menu2' => 'Footer Menu 2',
        )
    );

    unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
    unregister_sidebar( 'statichero' );
    unregister_sidebar( 'left-sidebar' );
    unregister_sidebar( 'right-sidebar' );
    unregister_sidebar( 'footerfull' );
    unregister_nav_menu( 'primary' );

    add_theme_support( 'disable-custom-colors' );
}
add_action( 'widgets_init', 'widgets_init', 11 );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Register custom Lamcat dashboard widget.
 *
 * @return void
 */
function register_lc_dashboard_widget() {
    wp_add_dashboard_widget(
        'lc_dashboard_widget',
        'Lamcat',
        'lc_dashboard_widget_display',
    );
}
add_action( 'wp_dashboard_setup', 'register_lc_dashboard_widget' );

/**
 * Display the Lamcat dashboard widget content.
 *
 * @return void
 */
function lc_dashboard_widget_display() {
    ?>
    <div style="display: flex; align-items: center; justify-content: space-around;">
        <img style="width: 50%;"
            src="<?= esc_url( get_stylesheet_directory_uri() . '/img/lc-full.jpg' ); ?>">
        <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
            href="mailto:hello@lamcat.co.uk/">Contact</a>
    </div>
    <div>
        <p><strong>Thanks for choosing Lamcat!</strong></p>
        <hr>
        <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
        <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
    </div>
    <?php
}

// phpcs:disable
// CF 7 select parameters
// function get_url_param($atts)
// {
//     $value = '';
//     if (isset($_GET[$atts['name']])) {
//         $value = sanitize_text_field($_GET[$atts['name']]);
//     }
//     return $value;
// }
// add_shortcode('url_param', 'get_url_param');

/*
add_filter(
    'wpseo_breadcrumb_links',
    function ($links) {
        global $post;
        // if (is_tax('location')) {
        //     // $t = get_the_category($post->ID);
        //     $breadcrumb[] = array(
        //         'url' => '/location/',
        //         'text' => 'Locations',
        //     );

        //     array_splice($links, 1, -2, $breadcrumb);
        // }
        // if (is_singular('member')) {
        //     // $t = get_the_category($post->ID);
        //     $breadcrumb[] = array(
        //         'url' => '/member/',
        //         'text' => 'Members',
        //     );

        //     array_splice($links, 1, -2, $breadcrumb);
        // }
        return $links;
    }
);
*/
// phpcs:enable

/**
 * Filter post excerpts to modify the "read more" link.
 *
 * @param string $post_excerpt The post excerpt.
 * @return string The modified post excerpt.
 */
function understrap_all_excerpts_get_more_link( $post_excerpt ) {
    if ( is_admin() || ! get_the_ID() ) {
        return $post_excerpt;
    }
    return $post_excerpt;
}

/**
 * Remove Yoast SEO breadcrumbs from Revelanssi's search results
 *
 * @param string $content The post content.
 * @return string The modified post content.
 */
function wpdocs_remove_shortcode_from_index( $content ) {
    if ( is_search() ) {
        $content = strip_shortcodes( $content );
    }
    return $content;
}
add_filter( 'the_content', 'wpdocs_remove_shortcode_from_index' );

add_action(
    'admin_head',
    function () {
        echo '<style>
        .block-editor-page #wpwrap {
        overflow-y: auto !important;
        }
   </style>';
    }
);

/**
 * Enqueue theme scripts and styles.
 *
 * @return void
 */
function lc_theme_enqueue() {
    $the_theme = wp_get_theme();
    // phpcs:disable
    // wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    // wp_enqueue_style('slick-styles', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), true);
    // wp_enqueue_style('slick-theme-styles', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', array(), true);
    // wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), null, true);
    // wp_enqueue_style('aos-style', "https://unpkg.com/aos@2.3.1/dist/aos.css", array());
    // wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);
    // wp_enqueue_style('glightbox-stylesheet', get_stylesheet_directory_uri() . '/css/glightbox.min.css', array(), $the_theme->get('Version'));
    // wp_enqueue_script('glightbox-scripts', get_stylesheet_directory_uri() . '/js/glightbox.min.js', array(), null, true);
    // phpcs:enable
    wp_deregister_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'lc_theme_enqueue' );
