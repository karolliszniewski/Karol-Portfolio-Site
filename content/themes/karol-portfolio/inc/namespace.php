<?php
/**
 * Theme setup and server-side behaviour.
 *
 * @package karol-portfolio
 */

namespace Karol\Portfolio;

/**
 * Wire up theme hooks.
 */
function bootstrap(): void {
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );
	add_action( 'init', __NAMESPACE__ . '\\register_pattern_categories' );
}

/**
 * Declare theme support.
 */
function setup(): void {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', [ 'style', 'script', 'navigation-widgets' ] );
}

/**
 * Enqueue the theme stylesheet (cache-busted by file mtime).
 */
function enqueue_assets(): void {
	wp_enqueue_style(
		'karol-portfolio',
		get_stylesheet_uri(),
		[],
		(string) filemtime( get_theme_file_path( 'style.css' ) )
	);
}

/**
 * Register the theme's block-pattern category.
 */
function register_pattern_categories(): void {
	register_block_pattern_category(
		'karol-portfolio',
		[ 'label' => __( 'Karol Portfolio', 'karol-portfolio' ) ]
	);
}
