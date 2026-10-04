# Karol Portfolio — block theme

A full-site-editing (FSE) WordPress block theme, built to **Human Made engineering conventions** as
interview prep. It deliberately mirrors the architecture of HM's own `h2o` theme
(`humanmade/h2-block-theme`), which sits alongside this one as the reference.

## Why it's structured this way (the HM conventions)
- **`functions.php` is the only side-effect file** — it loads `inc/namespace.php` and calls `bootstrap()`.
  Nothing else runs code at file scope. (HM standard: the theme/plugin entry file holds the only side effects.)
- **Namespaced, hook-wiring in `bootstrap()`** — `namespace Karol\Portfolio;`, hooks added as
  `add_action( 'init', __NAMESPACE__ . '\\fn' )`, same as `h2o`'s `H2O\bootstrap()`.
- **`inc/` holds the PHP** — one function-only namespace file (`namespace.php`). Classes, if added, go in
  `class-{slug}.php` inside an `inc/{namespace}/` dir (HM `inc/` convention).
- **`theme.json`-first** — colours, type scale, spacing and layout live in `theme.json` (v3), not CSS.
  `style.css` is just the theme header + the few things `theme.json` can't express.
- **Templates & parts as block HTML** — `templates/*.html`, `parts/*.html`.
- **Patterns registered from PHP** — files in `patterns/` are auto-registered by WordPress; kept as `.php`
  (not `.html`) so copy is translatable, exactly like `h2o/patterns/*.php`.

## Linting — Human Made coding standards
PHP (PHPCS):
```bash
composer install
composer run lint        # phpcs against vendor/humanmade/coding-standards (config: phpcs.xml.dist)
composer run lint:fix    # phpcbf
```

JS / CSS (ESLint + stylelint):
```bash
npx install-peerdeps --dev @humanmade/eslint-config@latest
npm install --save-dev stylelint @humanmade/stylelint-config
npm run lint:js
npm run lint:css
```
Configs: `.eslintrc.json` extends `@humanmade`; `.stylelintrc.json` extends `@humanmade/stylelint-config`.

## Layout
```
karol-portfolio/
  style.css              theme header + minimal CSS
  theme.json             design tokens + layout (v3)
  functions.php          side-effect entry → bootstrap()
  inc/namespace.php      setup(), enqueue_assets(), pattern category
  templates/             index, single, page, page-wide (custom template)
  parts/                 header, footer
  patterns/              hero.php (PHP-registered)
  assets/                css/, js/
  composer.json          humanmade/coding-standards (dev)
  phpcs.xml.dist         PHPCS ruleset → Human Made
  package.json           lint scripts + HM eslint/stylelint configs
```

## Develop
Theme is bind-mounted live via wp-env (see project README). Edit files here and refresh
`http://localhost:8810`. Build pages/templates in **Appearance → Editor** (Site Editor).
