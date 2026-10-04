<?php
/**
 * Title: Hero
 * Slug: karol-portfolio/hero
 * Categories: karol-portfolio
 * Description: Intro hero with name, role and a short statement.
 *
 * @package karol-portfolio
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"level":1,"fontSize":"x-large"} -->
	<h1 class="wp-block-heading has-x-large-font-size"><?php esc_html_e( 'Karol — WordPress &amp; Gutenberg Developer', 'karol-portfolio' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"fontSize":"large","textColor":"muted"} -->
	<p class="has-muted-color has-text-color has-large-font-size"><?php esc_html_e( 'I build modern block themes and custom blocks for the WordPress editor.', 'karol-portfolio' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'See my work', 'karol-portfolio' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
