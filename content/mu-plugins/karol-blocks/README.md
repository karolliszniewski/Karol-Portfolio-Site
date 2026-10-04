# Karol Blocks

Custom blocks for the portfolio, built to **Human Made plugin conventions** (see the handbook
[File Structure](https://engineering.hmn.md/standards/structure/) page) and the modern WordPress
block toolchain (`block.json` + `@wordpress/scripts`).

## Why it's structured this way
- **`plugin.php` is the only side-effect file** — defines `PLUGIN_DIR`, loads `inc/namespace.php`, calls
  `bootstrap()`. (HM: the main plugin file holds the only side effects; complex setup goes in `bootstrap()`.)
- **`inc/namespace.php`** — `Karol\Blocks\bootstrap()` wires hooks; `register_blocks()` auto-registers every
  built block from `build/` via its `block.json`.
- **`src/<block>/`** — each block's source: `block.json` (metadata), `index.js` (edit/save), `style.scss`
  (frontend+editor), `editor.scss` (editor only).
- **`build/`** — compiled output from `@wordpress/scripts` (gitignored; generated, not hand-edited).

## Blocks
- **`karol/callout`** — a simple callout box (RichText paragraph, colour + spacing supports). The example
  "component" to learn the block workflow.

## Develop
```bash
cd public_html/wp-content/plugins/karol-blocks
npm install          # once
npm run build        # compile src/ -> build/
npm run start        # watch mode while developing
```
Then activate: **wp-admin → Plugins → Karol Blocks**, or:
```bash
npx @wordpress/env run cli wp plugin activate karol-blocks
```
Add the block in the editor: search **Callout**.

## Add another block
Create `src/<name>/` with its own `block.json` + `index.js`, run `npm run build`. `register_blocks()`
picks it up automatically — no PHP change needed.

## Note on the HM starter kit
HM's documented block starter is [`gutenberg-starter-kit`](https://github.com/humanmade/gutenberg-starter-kit)
(older webpack setup). This plugin uses the same idea with the current `@wordpress/scripts` + `block.json`
toolchain, kept to their plugin file-structure standard.
