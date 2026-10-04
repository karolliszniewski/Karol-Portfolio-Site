# Karol Portfolio

A full WordPress site build — portfolio with a blog, case studies and a small WooCommerce shop — assembled as a
Composer-managed [WordPress Skeleton](https://roots.io/) and built to
[Human Made's engineering standards](https://engineering.hmn.md/).

## Stack
- **Composer-managed core** (`roots/wordpress-no-content`) in `wordpress/`; site content in `content/`
  (`WP_CONTENT_DIR`), not `wp-content`.
- **FSE block theme** `karol-portfolio` (`theme.json`-first, templates/parts/patterns).
- **Custom blocks** in a must-use module `karol-blocks` (`block.json` + `@wordpress/scripts`).
- **WooCommerce** via Composer.
- Local runtime via **Docker Compose** (official images); WordPress self-updates disabled — all updates go through
  Composer.

## Layout
```
composer.json            # core + third-party plugins
wp-config.php  index.php  # project bootstrap
docker-compose.yml
content/
  mu-plugins/karol-blocks/   # custom blocks (our code)
  themes/karol-portfolio/    # FSE theme (our code)
  plugins/                   # third-party (Composer, gitignored)
wordpress/                   # core (Composer, gitignored)
```

## Run locally
```bash
cp .env.example .env            # then fill in DB creds + fresh salts (api.wordpress.org/secret-key/1.1/salt/)
composer install                # installs core + plugins
docker compose up -d db wp      # http://localhost:8810
docker compose run --rm cli wp core install --url=http://localhost:8810 \
  --title="Karol Portfolio" --admin_user=admin --admin_password=... --admin_email=you@example.com
docker compose run --rm cli wp theme activate karol-portfolio
docker compose run --rm cli wp plugin activate woocommerce
```

## Standards
PHP, JS and CSS are linted against Human Made's configs (`humanmade/coding-standards`, `@humanmade/eslint-config`,
`@humanmade/stylelint-config`) and enforced in CI (`.github/workflows/ci.yml`).

## Conventions
Follows HM's [File Structure](https://engineering.hmn.md/standards/structure/) (custom code in `mu-plugins`,
third-party in `plugins`, theme is presentation-only) and [Style Guides](https://engineering.hmn.md/standards/style/).
Human Made's [`h2o`](https://github.com/humanmade/h2-block-theme) block theme was studied as a reference.
