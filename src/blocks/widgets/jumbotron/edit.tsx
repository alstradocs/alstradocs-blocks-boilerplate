
import * as React from 'react';
import { __ } from '@wordpress/i18n';
import { InspectorControls, RichText, MediaUploadCheck, MediaUpload } from '@wordpress/block-editor';
import { PanelBody, Button, ResponsiveWrapper, PanelRow } from '@wordpress/components';
import { BlockEditProps } from '@wordpress/blocks';
import { Fragment } from '@wordpress/element';
import { InnerBlocks } from '@wordpress/block-editor';

export interface JumbotronAttributes extends Record<string, any> {
	primary: string;
	secondary: string;
	mediaId: number;
	mediaUrl: string;
}

export interface JumbotronProps extends BlockEditProps<JumbotronAttributes> {
	media: any;
	attributes: JumbotronAttributes;
}

const Edit: React.FC<any> = ({ media, attributes, setAttributes }: JumbotronProps) => {
	const removeMedia = () => {
		setAttributes({
			mediaId: 0,
			mediaUrl: ''
		});
	}

	const onSelectMedia = (media: any) => {
		setAttributes({
			mediaId: media.id,
			mediaUrl: media.url
		});
	}

	const blockStyle = {
		color: '#fff',
		backgroundImage: attributes.mediaUrl != '' ? 'url("' + attributes.mediaUrl + '")' : 'url("https://via.placeholder.com/1440x722.png")'
	};

	const ALLOWED_BLOCKS = [ 'alstradocs/alstradocs-blocks-boilerplate-landing-form' ];
	return (
		<Fragment>
			<InspectorControls>
				<PanelBody title={__('Heading Text')}>
					<PanelRow>
						<RichText
							label={__('Primary Text')}
							placeholder="Primary text"
							value={attributes.primary}
							onChange={(value: string) => setAttributes({ primary: value })}
						/>
					</PanelRow>
					<PanelRow>
						<RichText
							label={__('Secondary Text')}
							placeholder="Secondary text"
							value={attributes.secondary}
							onChange={(value: string) => setAttributes({ secondary: value })}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody
					title={__('Select block background image', 'awp')}
					initialOpen={true}
				>
					<div className="editor-post-featured-image">
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectMedia}
								value={attributes.mediaId}
								allowedTypes={['image']}
								render={({ open }) => (
									<Button
										className={attributes.mediaId == 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
										onClick={open}
									>
										{attributes.mediaId == 0 && __('Choose an image', 'awp')}
										{media != undefined &&
											<ResponsiveWrapper
												naturalWidth={media.media_details.width}
												naturalHeight={media.media_details.height}
											>
												<img src={media.source_url} />
											</ResponsiveWrapper>
										}
									</Button>
								)}
							/>
						</MediaUploadCheck>
						{attributes.mediaId != 0 &&
							<MediaUploadCheck>
								<MediaUpload
									title={__('Replace image', 'awp')}
									value={attributes.mediaId}
									onSelect={onSelectMedia}
									allowedTypes={['image']}
									render={({ open }) => (
										<Button onClick={open} isDefault isLarge>{__('Replace image', 'awp')}</Button>
									)}
								/>
							</MediaUploadCheck>
						}
						{attributes.mediaId != 0 &&
							<MediaUploadCheck>
								<Button onClick={removeMedia} isLink isDestructive>{__('Remove image', 'awp')}</Button>
							</MediaUploadCheck>
						}
					</div>
				</PanelBody>
			</InspectorControls>
			<div className="brainbox-editor-container" style={blockStyle}>
				<div><h1>{ attributes.primary }</h1></div>
				<div><h4>{ attributes.secondary }</h4></div>
				<InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
			</div>
		</Fragment>
	);

}

export default Edit;