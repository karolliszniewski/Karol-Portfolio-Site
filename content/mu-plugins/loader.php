<?php
/**
 * Must-use loader. WordPress only autoloads top-level files in mu-plugins/,
 * so subdirectory modules are required explicitly here.
 *
 * @package karol-portfolio-site
 */

namespace Karol\Site\Mu_Loader;

const MODULES = [
	'karol-blocks/plugin.php',
];

foreach ( MODULES as $module ) {
	$path = __DIR__ . '/' . $module;

	if ( is_readable( $path ) ) {
		require_once $path;
	}
}
