
import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { BlockSaveProps } from '@wordpress/blocks';
import { JumbotronAttributes } from './edit';
import { InnerBlocks } from '@wordpress/block-editor';

export interface JumbotronSaveProps extends BlockSaveProps<JumbotronAttributes> {
	attributes: JumbotronAttributes;
}

const save: React.FC<any> = () => {
	return (
		<InnerBlocks.Content/>
	);
}

export default save;

