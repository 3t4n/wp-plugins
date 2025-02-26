/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';
import {useState} from '@wordpress/element';

import ChannelVideos from "./components/channelVideos";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	InspectorControls
} from '@wordpress/block-editor';

import axios from "axios";
import youtubeApiRequest from "../../js/youtubeApiRequest";

import {
	TextControl,
	PanelBody,
	Button,
	ToggleControl,
	RangeControl,
	SelectControl
} from '@wordpress/components';

import './editor.scss';
import {useEffect} from "react";
import Shortcode from "../../js/shortcode";
import metadata from './block.json';

export default function Edit({attributes, setAttributes}) {
	const blockProps = useBlockProps();
	const [loading, setLoading] = useState(false);
	const [globalSettings, setGlobalSettings] = useState({});

	useEffect(() => {
		axios.get('/wp-json/social_patch/get-settings-data').then(function (response) {
			setGlobalSettings(response.data);
		}).catch(function (error) {
			console.log(error);
		});
	}, []);

	const handleButtonClick = () => {
		let apiRequest = new youtubeApiRequest(axios);

		if (apiRequest.validateUrl(attributes.channel)) {
			setLoading(true);
			apiRequest.handleChannelVideosRequest({
				"channel": attributes.channel,
				"order": attributes.orderBy,
				"part": "id,snippet",
				"maxResults": attributes.maxResults,
				"videoDuration": attributes.videoDuration,
				"api_token": globalSettings.pluginApiKey,
				'g_key': globalSettings.youtubeApiKey
			})
				.catch(function (error) {
					let cData = {type: "error", value: error.toJSON()};
					setAttributes({channelData: cData});
				})
				.then(({data = {}} = {}) => {
					setAttributes({channelData: data});
					setLoading(false);
				});
		}
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings')}>
					{
						Object.entries(metadata.attributes).map(([key, value]) => {
							switch (value.type) {
								case 'string':
									if (value.options !== undefined) {
										return (
											<SelectControl
												label={__(value.label ?? key)}
												value={attributes[key]}
												options={
													Object.entries(value.options).map(([key, item]) => {
														return {label: __(item.label), value: item.value}
													})
												}
												onChange={(value) => setAttributes({[key]: value})}
											/>
										)
									} else {
										return (
											<TextControl
												label={__(value.label ?? key)}
												value={attributes[key] || ''}
												onChange={(value) => setAttributes({[key]: value})}
											/>
										)
									}
								case 'boolean':
									return (
										<ToggleControl
											label={__(value.label ?? key)}
											checked={attributes[key]}
											onChange={() => setAttributes({[key]: !attributes[key]})}
										/>
									)
								case 'number':
									return (
										<RangeControl
											label={__(value.label ?? key)}
											onChange={(value) => setAttributes({[key]: value})}
											value={attributes[key]}
											min={value.min}
											max={value.max}
										/>
									)
							}
						})
					}
					<Button variant="secondary" onClick={handleButtonClick}>{__('Apply')}</Button>
					<Shortcode attributes={attributes} tag={'social_patch_youtube_channel_shortcode'} />
				</PanelBody>
			</InspectorControls>
			<div {...blockProps}>
				{!attributes.channelData.hasOwnProperty('results') && (<div className="ap-url-with-submit">
					<TextControl
						label={__('Channel url')}
						value={attributes.channel || ''}
						onChange={(value) => setAttributes({channel: value})}
						placeholder="https://www.youtube.com/@WordPress"
					/>
					<Button variant="secondary" onClick={handleButtonClick}>{__('Apply')}</Button>
				</div>)}
				<ChannelVideos wrapClass="ap-youtube-plugin" attributes={attributes} loading={loading}/>
			</div>
		</>
	);
}
