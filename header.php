<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-devtec2026
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta
		charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preload"
		href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/inter-v20-latin-300.woff2' ); ?>"
		as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload"
		href="<?= esc_url( get_stylesheet_directory_uri() . '/fonts/inter-v20-latin-600.woff2' ); ?>"
		as="font" type="font/woff2" crossorigin="anonymous">
	<?php
	if ( is_front_page() ) {
		?>
	<script type="application/ld+json">

	</script>
		<?php
	}
	if ( ! is_user_logged_in() ) {
		if ( get_field( 'ga_property', 'options' ) ) {
			?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async
		src="https://www.googletagmanager.com/gtag/js?id=<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config',
			'<?= esc_attr( get_field( 'ga_property', 'options' ) ); ?>'
		);
	</script>
			<?php
		}
		if ( get_field( 'gtm_property', 'options' ) ) {
			?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer',
			'<?= esc_attr( get_field( 'gtm_property', 'options' ) ); ?>'
		);
	</script>
	<!-- End Google Tag Manager -->
			<?php
		}
	}
	if ( get_field( 'google_site_verification', 'options' ) ) {
		echo '<meta name="google-site-verification" content="' . esc_attr( get_field( 'google_site_verification', 'options' ) ) . '" />';
	}
	if ( get_field( 'bing_site_verification', 'options' ) ) {
		echo '<meta name="msvalidate.01" content="' . esc_attr( get_field( 'bing_site_verification', 'options' ) ) . '" />';
	}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
	<?php understrap_body_attributes(); ?>>
	<?php
	do_action( 'wp_body_open' );
	?>
<header id="wrapper-navbar" class="fixed-top p-0" itemscope
	itemtype="http://schema.org/WebSite">
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<div class="d-flex justify-content-between w-100 w-lg-auto align-items-center py-3">
				<div class="logo-container d-flex align-items-center"><a href="/" class="logo navbar-brand" aria-label="DevTec Properties Homepage"></a></div>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
					aria-label="Toggle navigation">
					<i class="fas fa-bars"></i>
				</button>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<div class="w-100 d-flex flex-column justify-content-lg-between align-items-lg-center">
					<!-- Contact Details (Hidden on Mobile) -->
					<div class="contact-info d-none d-lg-flex gap-3 w-100 justify-content-end align-items-center pb-2">
						<span><i class="fa-regular fa-envelope text-accent-400"></i> <?= do_shortcode( '[contact_email]' ); ?></span>
						<span><i class="fa-solid fa-phone text-accent-400"></i> <?= do_shortcode( '[contact_phone]' ); ?></span>
					</div>
					<!-- Navigation -->
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary_nav',
							'container'      => false,
							'menu_class'     => 'navbar-nav w-100 justify-content-end gx-6rem',
							'fallback_cb'    => '',
							'depth'          => 3,
							'walker'         => new Understrap_WP_Bootstrap_Navwalker(),
						)
					);
					?>
				</div>
			</div>
		</div>
	</nav>
</header>