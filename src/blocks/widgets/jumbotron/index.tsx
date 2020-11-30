
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import * as React from 'react';
import Edit from './edit';
import save from './save';
import blockData from './block.json';
import { withSelect } from '@wordpress/data';

registerBlockType(blockData.name, {
    title: blockData.title,
	category: blockData.category,
	icon: 'smiley',
	attributes: {
		primary: {
			type: "string",
			default: ""
		},
		secondary: {
			type: "string",
			default: ""
		},
		mediaId: {
			type: 'number',
			default: 0
		},
		mediaUrl: {
			type: 'string',
			default: ''
		}
	},
	edit: withSelect((select: any, props: any) => {
		return { 
			media: props.attributes.mediaId ? select('core').getMedia(props.attributes.mediaId) : undefined 
		};
	})(Edit) as React.FC<any>,
	save: save,
});
