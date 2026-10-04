<?php
/**
 * Site configuration.
 *
 * @package karol-portfolio-site
 */

define( 'DB_NAME', getenv( 'DB_NAME' ) ?: 'wordpress' );
define( 'DB_USER', getenv( 'DB_USER' ) ?: 'wordpress' );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) ?: 'wordpress' );
define( 'DB_HOST', getenv( 'DB_HOST' ) ?: 'db' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wp_';

// Core is in wordpress/, so the WP address differs from the site address.
define( 'WP_HOME', getenv( 'WP_HOME' ) ?: 'http://localhost:8810' );
define( 'WP_SITEURL', WP_HOME . '/wordpress' );
define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
define( 'WP_CONTENT_URL', WP_HOME . '/content' );

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

// Core and plugins are updated via Composer, so block WordPress from updating itself.
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'DISALLOW_FILE_MODS', true );

define( 'AUTH_KEY', getenv( 'AUTH_KEY' ) );
define( 'SECURE_AUTH_KEY', getenv( 'SECURE_AUTH_KEY' ) );
define( 'LOGGED_IN_KEY', getenv( 'LOGGED_IN_KEY' ) );
define( 'NONCE_KEY', getenv( 'NONCE_KEY' ) );
define( 'AUTH_SALT', getenv( 'AUTH_SALT' ) );
define( 'SECURE_AUTH_SALT', getenv( 'SECURE_AUTH_SALT' ) );
define( 'LOGGED_IN_SALT', getenv( 'LOGGED_IN_SALT' ) );
define( 'NONCE_SALT', getenv( 'NONCE_SALT' ) );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/wordpress/' );
}

require_once ABSPATH . 'wp-settings.php';
