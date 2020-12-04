---
to: <%= name %>/save.tsx
---
import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { BlockSaveProps } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import { <%= h.capitalize(name) %>Attributes } from './edit';

export interface <%= h.capitalize(name) %>SaveProps extends BlockSaveProps<<%= h.capitalize(name) %>Attributes> {
	attributes: <%= h.capitalize(name) %>Attributes;
}

const save: React.FC<any> = () => {
	return (
		
		<InnerBlocks.Content/>
	);
}

export default save;




