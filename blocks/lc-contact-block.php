<?php
/**
 * Block template for LC Contact Block.
 *
 * @package lc-devtec2026
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="contact-block">
	<div class="container">
		<div class="row p-5">
			<div class="col-md-6">
				<h2 class="h2 has-top-border">Get in touch</h2>
				<p class="mb-4">We welcome enquiries relating to development opportunities, joint ventures, or potential sites aligned with our approach.</p>
				<ul class="fa-ul">
					<li class="mb-2"><span class="fa-li"><i class="fas fa-phone"></i></span> <?= do_shortcode( '[contact_phone]' ); ?></li>
					<li><span class="fa-li"><i class="fas fa-envelope"></i></span> <?= do_shortcode( '[contact_email]' ); ?></li>
				</ul>
			</div>
			<div class="col-md-6">
				<h2 class="has-top-border">Send an enquiry</h2>
				<p class="mb-4">If you're assessing a potential site or scheme, please include the location, current status, and any known constraints. We'll review and respond where appropriate.</p>
				<?= do_shortcode( '[contact-form-7 id="618227c"]' ); ?>
			</div>
		</div>
	</div>
</section>
<?php

add_action(
	'wp_footer',
	function () {
		?>
<script>
(function () {

	/* auto-grow textarea (starts at 1 row, expands on input) */
	document.addEventListener('input', function (event) {
		if (event.target.tagName.toLowerCase() !== 'textarea') {
			return;
		}
		event.target.style.height = 'auto';
		event.target.style.height = event.target.scrollHeight + 'px';
	});

	function initForm(form) {
		const button = form.querySelector('button.js-cf7-submit');

		// Correct selector for your actual CF7 output
		const checkbox = form.querySelector('.wpcf7-form-control-wrap[data-name="privacy"] input[type="checkbox"]');

		if (!button || !checkbox) {
			return;
		}

		function sync(source) {
			button.disabled = !checkbox.checked;
		}

		// initial
		sync('init');

		checkbox.addEventListener('change', function () {
			sync('change');
		});

		// If CF7 resets the form after submit, re-evaluate
		form.addEventListener('wpcf7reset', function () {
			sync('wpcf7reset');
		});
	}

	document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('.wpcf7 form').forEach(initForm);
	});
})();
</script>
		<?php
	},
	9999
);
