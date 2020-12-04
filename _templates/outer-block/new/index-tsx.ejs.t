---
to: <%= name %>/index.tsx
---

import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { withSelect } from '@wordpress/data';
import { registerBlockType } from '@wordpress/blocks';
import Edit from './edit';
import save from './save';
import blockData from './block.json';

registerBlockType(blockData.name, {
    title: blockData.title,
	category: blockData.category,
	icon: 'smiley',
	attributes: {
	},
	edit: withSelect((select: any, props: any) => {
		return { 
		};
	})(Edit) as React.FC<any>,
	save: save,
});



