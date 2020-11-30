
import { __ } from '@wordpress/i18n';
import { LandingFormAttributes } from './edit';
import { BlockSaveProps } from '@wordpress/blocks';


export interface LandingFormSaveProps extends BlockSaveProps<LandingFormAttributes> {
	attributes: LandingFormAttributes;
}

const Save = () => { return null; }

export default Save;