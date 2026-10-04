<?php
/**
 * Plugin setup and block registration.
 *
 * @package karol-blocks
 */

namespace Karol\Blocks;

/**
 * Wire up hooks.
 */
function bootstrap(): void {
	add_action( 'init', __NAMESPACE__ . '\\register_blocks' );
}

/**
 * Register every block built into build/.
 */
function register_blocks(): void {
	$build = PLUGIN_DIR . '/build';

	if ( ! is_dir( $build ) ) {
		return;
	}

	foreach ( (array) glob( $build . '/*', GLOB_ONLYDIR ) as $block_dir ) {
		register_block_type( $block_dir );
	}
}
