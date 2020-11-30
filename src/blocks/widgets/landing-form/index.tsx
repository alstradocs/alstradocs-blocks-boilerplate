
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import Edit from './edit';
import Save from './save';
import blockData from './block.json';


registerBlockType( blockData.name, {
    title: blockData.title,
	category: blockData.category,
	icon: 'smiley',
	attributes: {
		"endpointURL": {
			"type": "string",
			"default": ""
		},
		"redirectToURL": {
			"type": "string",
			"default": ""
		}
	},
	edit: Edit,
	save: Save,
} );
