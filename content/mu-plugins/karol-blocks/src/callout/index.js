/**
 * Callout block — edit + save.
 *
 * @package karol-blocks
 */

import { useBlockProps, RichText } from '@wordpress/block-editor';
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import metadata from './block.json';
import './style.scss';
import './editor.scss';

registerBlockType( metadata.name, {
	/**
	 * Block editor view.
	 */
	edit: ( { attributes, setAttributes } ) => {
		const blockProps = useBlockProps( { className: 'karol-callout' } );

		return (
			<div { ...blockProps }>
				<RichText
					placeholder={ __( 'Write a callout…', 'karol-blocks' ) }
					tagName="p"
					value={ attributes.content }
					onChange={ content => setAttributes( { content } ) }
				/>
			</div>
		);
	},

	/**
	 * Saved block markup.
	 */
	save: ( { attributes } ) => {
		const blockProps = useBlockProps.save( { className: 'karol-callout' } );

		return (
			<div { ...blockProps }>
				<RichText.Content tagName="p" value={ attributes.content } />
			</div>
		);
	},
} );
