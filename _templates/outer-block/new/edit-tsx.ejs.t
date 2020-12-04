---
to: <%= name %>/edit.tsx
---

import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { Fragment } from '@wordpress/element';
import { BlockEditProps } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import { InspectorControls } from '@wordpress/block-editor';

export interface <%= h.capitalize(name) %>Attributes extends Record<string, any> {
}

export interface <%= h.capitalize(name) %>Props extends BlockEditProps<<%= h.capitalize(name) %>Attributes> {
	attributes: <%= h.capitalize(name) %>Attributes;
}

const Edit: React.FC<any> = ({ attributes, setAttributes }: <%= h.capitalize(name) %>Props) => {

	const blockStyle = {
		color: '#fff',
	};

	const ALLOWED_BLOCKS = [ ];
	return (
		<Fragment>
			<InspectorControls>
				
			</InspectorControls>
			<div className="<%= name %>-editor-container alstradocs-editor-block-container alstradocs-editor-outer-block-container" style={blockStyle}>
				<InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
			</div>
		</Fragment>
	);

}

export default Edit;