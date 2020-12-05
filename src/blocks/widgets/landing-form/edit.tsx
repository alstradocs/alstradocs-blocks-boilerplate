
import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { BlockEditProps } from '@wordpress/blocks';
import { InspectorControls, RichText } from '@wordpress/block-editor';
import { PanelBody, PanelRow } from '@wordpress/components';


export interface LandingFormAttributes extends Record<string, any> {
	redirectToURL: string;
	endpointURL: string;
}

export interface LandingFormProps extends BlockEditProps<LandingFormAttributes> {
	attributes: LandingFormAttributes;
}

const Edit: React.FC<LandingFormProps> = ({ attributes, setAttributes }: LandingFormProps) => {
	return (
		<React.Fragment>
			<InspectorControls>
				<PanelBody title={__('Endpoint URL')}>
					<PanelRow>
						<RichText
							label={__('Endpoint URL')}
							placeholder="Endpoint URL"
							value={attributes.endpointURL}
							onChange={(value: string) => setAttributes({ endpointURL: value })}
						/>
					</PanelRow>
					<PanelRow>
						<RichText
							label={__('Redirect URL')}
							placeholder="Redirect URL"
							value={attributes.redirectToURL}
							onChange={(value: string) => setAttributes({ redirectToURL: value })}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<div className="alstradocs-editor-block-container">
				<div><h1>{ attributes.endpointURL }</h1></div>
				<div><h4>{ attributes.redirectToURL }</h4></div>
			</div>
		</React.Fragment>
	);
}

export default Edit; 