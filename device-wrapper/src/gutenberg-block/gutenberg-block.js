//  Import CSS.
import './editor.scss';
import './style.scss';


const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { ServerSideRender } = wp.editor;
import * as devicesData from '../devices.json';
import { useState, Fragment } from '@wordpress/element';
import {
    BlockControls,
    InspectorControls,
    MediaUpload, MediaUploadCheck,
    PanelColorSettings,
} from '@wordpress/block-editor';
import {
    PanelBody, PanelRow,
    RadioControl, ToggleControl, ToolbarGroup, Button,
    CustomSelectControl, SelectControl, TextControl,
    __experimentalUnitControl as UnitControl,
    __experimentalDivider as Divider,
    Flex, FlexBlock, FlexItem
} from '@wordpress/components';

const attrs_obj = {
    'method': {
        'type': 'string',
        'default': 'src',
    },
    'device': {
        'type': 'string',
        'default': 'iphone_14_pro_v2',
    },
    'fit': {
        'type': 'string',
        'default': 'cover',
    },
    'link': {
        'type': 'string',
        'default': '',
    },
    'new_tab': {
        'type': 'boolean',
        'default': true,
    },
    'width': {
        'type': 'string',
        'default': '',
    },
    'units': {
        'type': 'string',
        'default': 'px',
    },
    'rotate': {
        'type': 'boolean',
        'default': false,
    },
    'autoplay': {
        'type': 'boolean',
        'default': false,
    },
    'play_button': {
        'type': 'boolean',
        'default': false,
    },
    'controls': {
        'type': 'boolean',
        'default': false,
    },
    'loop': {
        'type': 'boolean',
        'default': true,
    },
    'mute': {
        'type': 'boolean',
        'default': true,
    },
    'video_preview': {
        'type': 'string',
        'default': '',
    },
    'autoplay_on_view': {
        'type': 'boolean',
        'default': false,
    },

    'align': {
        'type': 'string',
        'default': '',
    },
    'media_type': {
        'type': 'string',
        'default': 'image',
    },
    'mediaURL': {
        'type': 'string',
        'default': '',
    },
    'mediaID': {
        'type': 'number',
        'default': 0,
    },
    'previewMediaID': {
        'type': 'number',
        'default': 0,
    },
    'anchor': {
        'type': 'string',
        'default': '',
    },
}

if (device_wrapper.can_use_premium_code) {
    attrs_obj['bg_color'] = {
        'type': 'string',
        'default': '',
    };
    attrs_obj['device_color'] = {
        'type': 'string',
        'default': '',
    };
}

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType('device-wrapper/block-device-wrapper', {
    title: __('Device Wrapper', 'device-wrapper'),
    description: __('Display a device mockup with custom content.', 'device-wrapper'),
    icon: <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path d="M1430 5106 c-66 -19 -107 -42 -155 -91 -60 -60 -93 -130 -106 -223 -6 -51 -9 -829 -7 -2287 l3 -2210 23 -57 c46 -114 134 -194 244 -224 76 -20 2177 -21 2253 0 71 18 111 41 160 91 57 57 93 129 105 212 13 89 13 4393 0 4482 -22 151 -124 269 -267 306 -49 13 -211 15 -1133 14 -826 -1 -1085 -4 -1120 -13z m1197 -299 c70 -64 5 -188 -89 -170 -94 18 -107 157 -18 192 33 13 80 4 107 -22z m1118 -2247 l0 -1785 -1190 0 -1190 0 -3 1775 c-1 976 0 1781 3 1788 3 10 247 12 1192 10 l1188 -3 0 -1785z m-885 -2175 l0 -105 -305 0 -305 0 0 105 0 105 305 0 305 0 0 -105z" /> </g> </svg>,
    category: 'media',
    keywords: [
        __('device', 'device-wrapper'), __('mockup', 'device-wrapper'), __('frame', 'device-wrapper'), __('gadget', 'device-wrapper'),
    ],
    attributes: attrs_obj,
    supports: {
        anchor: true,
        align: true,
    },

    /**
     * The edit function describes the structure of your block in the context of the editor.
     * This represents what the editor will render when the block is used.
     *
     * The "edit" property must be a valid function.
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     *
     * @param {Object} props Props.
     * @returns {Mixed} JSX Component.
     */
    edit: function (props) {
        const {
            setAttributes,
            attributes: {
                method,
                device,
                fit,
                link,
                new_tab,
                width,
                units,
                autoplay,
                rotate,
                play_button,
                controls,
                loop,
                mute,
                video_preview,
                autoplay_on_view,
                bg_color,
                device_color,
                align,
                media_type,
                mediaURL,
                mediaID,
                previewMediaID,
                previewMediaUrl,
                anchor,
                className
            },
        } = props;

        let colorOptions = [];
        if (device_wrapper.can_use_premium_code) {
            colorOptions = [
                {
                    value: bg_color,
                    onChange: (value) => setAttributes({ bg_color: value }),
                    label: __('Background color', 'device-wrapper'),
                    help: __("Choose device screen color.", 'device-wrapper')
                },
            ];
        }

        if (device !== 'iwatch_7' && device_wrapper.can_use_premium_code) {
            colorOptions.push({
                value: device_color,
                onChange: (value) => setAttributes({ device_color: value }),
                label: __('Device color', 'device-wrapper'),
                help: __("Choose device border color.", 'device-wrapper')
            })
        }

        const controlStyles = {
            backgroundPosition: 'left center',
            backgroundRepeat: 'no-repeat',
            backgroundSize: '40px auto',
            paddingLeft: '45px'
        }

        //console.log(devicesData);

        const deviceControlOptions = [];

        devicesData.forEach(device => {
            deviceControlOptions.push({
                name: __(device.value, 'device-wrapper'),
                key: device.key,
                style: { ...controlStyles, backgroundImage: `url(${device_wrapper.pluginIconUrl}${device.icon})` },
            })
        });

        const unitsOptions = [
            { value: 'px', label: 'px', default: 0 },
            { value: '%', label: '%', default: 0 },
            { value: 'em', label: 'em', default: 0 },
            { value: 'vw', label: 'vw', default: 0 },
            { value: 'vh', label: 'vh', default: 0 },
            { value: 'rem', label: 'rem', default: 0 },
        ];

        const isVideo = () => {
            if (media_type === 'video') {
                return true;
            }
            return false;
        }

        const isIframe = () => {
            if (media_type === 'iframe') {
                return true;
            }
            return false;
        }

        return (
            <Fragment>
                <BlockControls>
                    {method === 'src' && <ToolbarGroup>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) => {
                                    //console.log( media )
                                    setAttributes({ mediaID: Number(media.id), media_type: media.type });
                                }
                                }
                                allowedTypes={['image', 'video']}
                                value={mediaID}
                                render={({ open }) => (
                                    <Button onClick={open}>{__("Select media for the device", 'device-wrapper')}</Button>
                                )}
                            />
                        </MediaUploadCheck>
                    </ToolbarGroup>}
                </BlockControls>
                <InspectorControls>
                    <PanelBody
                        title={__("Mockup settings", 'device-wrapper')}
                        initialOpen={true}
                    >
                        <PanelRow className="components-panel__row_full-width">
                            <CustomSelectControl
                                label={__("Select Device", 'device-wrapper')}
                                value={deviceControlOptions.find((option) => option.key === device)}
                                options={deviceControlOptions}
                                onChange={(value) => setAttributes({ device: value.selectedItem.key })}
                            />
                        </PanelRow>
                        { devicesData.find((option) => option.key === device && option['can-rotate']) && <PanelRow>
                            <ToggleControl
                                label={__("Rotate Device to 90deg", 'device-wrapper')}
                                checked={rotate}
                                onChange={(value) => setAttributes({ rotate: value })}
                            />
                        </PanelRow>
                        }
                        <Divider />
                        <PanelRow className="components-panel__row_full-width">
                            <SelectControl
                                label={__("Content source", 'device-wrapper')}
                                help={__("Where should content be taken from.", 'device-wrapper')}
                                value={method}
                                options={[
                                    { label: __("Media Library", 'device-wrapper'), value: 'src' },
                                    { label: __("Custom URL", 'device-wrapper'), value: 'url' },
                                    { label: __("$_POST variable", 'device-wrapper'), value: 'post' },
                                    { label: __("$_GET variable", 'device-wrapper'), value: 'get' },
                                ]}
                                onChange={(value) => setAttributes({ method: value, mediaID: 0, mediaURL: '', media_type: 'image' })}
                            />
                        </PanelRow>
                        {method !== 'src' && <PanelRow>
                            <TextControl
                                label={method === 'url' ? __("Media URL", 'device-wrapper') : __("Variable name", 'device-wrapper')}
                                value={mediaURL}
                                onChange={(value) => setAttributes({ mediaURL: value })}
                            />
                        </PanelRow>}
                        {method !== 'src' && <PanelRow>
                            <SelectControl
                                label={__("Media Type", 'device-wrapper')}
                                help={__("Select which media type returns from the URL above.", 'device-wrapper')}
                                value={media_type}
                                options={[
                                    { label: __("Image", 'device-wrapper'), value: 'image' },
                                    { label: __("Video", 'device-wrapper'), value: 'video' },
                                    { label: __("iFrame", 'device-wrapper'), value: 'iframe' },
                                ]}
                                onChange={(value) => setAttributes({ media_type: value })}
                            />
                        </PanelRow>}
                        <Divider />
                        <PanelRow>
                            <RadioControl
                                label={__("How to fit", 'device-wrapper')}
                                selected={fit}
                                options={[
                                    { label: __("Cover", 'device-wrapper'), value: 'cover' },
                                    { label: __("Contain", 'device-wrapper'), value: 'contain' },
                                    { label: __("Overflow", 'device-wrapper'), value: 'overflow' },
                                    { label: __("Overflow X", 'device-wrapper'), value: 'overflow-x' },
                                    { label: __("Overflow Y", 'device-wrapper'), value: 'overflow-y' },
                                ]}
                                onChange={(value) => setAttributes({ fit: value })}
                            />
                        </PanelRow>
                        {!isVideo() && !isIframe() && <PanelRow>
                            <TextControl
                                label={__("Link", 'device-wrapper')}
                                help={__("Set link which opens on content click or leave blank if none required.", 'device-wrapper')}
                                value={link}
                                onChange={(value) => setAttributes({ link: value })}
                            />
                        </PanelRow>}
                        {!isVideo() && !isIframe() && link && <PanelRow>
                            <ToggleControl
                                label={__("Open link in a new tab", 'device-wrapper')}
                                checked={new_tab}
                                onChange={(value) => setAttributes({ new_tab: value })}
                            />
                        </PanelRow>}
                        <PanelRow>
                            <UnitControl
                                label={__('Width of the device', 'device-wrapper')}
                                value={`${width}`}
                                unit={`${units}`}
                                units={unitsOptions}
                                onChange={(value) => setAttributes({ width: value })}
                                onUnitChange={(value) => setAttributes({ units: value })}
                            />
                        </PanelRow>
                        {isVideo() && <div>
                            <Divider />
                            <PanelRow>
                                <ToggleControl
                                    label={__("Autoplay Video", 'device-wrapper')}
                                    checked={autoplay}
                                    onChange={(value) => setAttributes({ autoplay: value })}
                                />
                            </PanelRow>
                            {autoplay && <PanelRow>
                                <ToggleControl
                                    label={__("Autoplay on view", 'device-wrapper')}
                                    help={__("Play video once it in the viewport.", 'device-wrapper')}
                                    checked={autoplay_on_view}
                                    onChange={(value) => setAttributes({ autoplay_on_view: value })}
                                />
                            </PanelRow>}
                            <PanelRow>
                                <ToggleControl
                                    label={__("Add play button to video", 'device-wrapper')}
                                    checked={play_button}
                                    onChange={(value) => setAttributes({ play_button: value })}
                                />
                            </PanelRow>
                            <PanelRow>
                                <ToggleControl
                                    label={__("Video Controls", 'device-wrapper')}
                                    checked={controls}
                                    onChange={(value) => setAttributes({ controls: value })}
                                />
                            </PanelRow>
                            <PanelRow>
                                <ToggleControl
                                    label={__("Loop Video", 'device-wrapper')}
                                    checked={loop}
                                    onChange={(value) => setAttributes({ loop: value })}
                                />
                            </PanelRow>
                            <PanelRow>
                                <ToggleControl
                                    label={__("Mute Video", 'device-wrapper')}
                                    checked={mute}
                                    onChange={(value) => setAttributes({ mute: value })}
                                />
                            </PanelRow>
                            <PanelRow>
                                <MediaUploadCheck>
                                    <Flex direction='column'>
                                        <FlexItem>
                                            <label>{__("Video Preload Image", 'device-wrapper')}</label>
                                        </FlexItem>
                                        <FlexBlock>
                                            <MediaUpload
                                                onSelect={(media) => {
                                                    setAttributes({ previewMediaID: Number(media.id) });
                                                }
                                                }
                                                allowedTypes={['image']}
                                                value={previewMediaID}
                                                render={({ open }) => {
                                                    // https://wordpress.stackexchange.com/a/237574/186146
                                                    if (previewMediaID) {
                                                        wp.media.attachment(previewMediaID).fetch().then(function (data) {
                                                            //console.log(data)
                                                            setAttributes({ previewMediaUrl: data.sizes.thumbnail.url })
                                                        })
                                                    }
                                                    return (
                                                        <div>
                                                            {previewMediaUrl && <img src={previewMediaUrl} onClick={open} className="components-button" />}
                                                            <Button variant="secondary" onClick={open}>
                                                                {!previewMediaUrl && __("Select Preload Image", 'device-wrapper')}
                                                                {previewMediaUrl && __("Change Preload Image", 'device-wrapper')}
                                                            </Button>
                                                            {previewMediaUrl && <Button isDestructive variant="link" onClick={() => setAttributes({ previewMediaID: 0, previewMediaUrl: '' })}>{__("Remove Preload Image", 'device-wrapper')}</Button>}
                                                        </div>
                                                    )
                                                }}
                                            />
                                        </FlexBlock>
                                    </Flex>
                                </MediaUploadCheck>
                            </PanelRow>
                        </div>}
                    </PanelBody>
                    {device_wrapper.can_use_premium_code &&
                        <PanelColorSettings
                            title={__('Color settings', 'device-wrapper')}
                            colorSettings={
                                colorOptions
                            }
                        />}
                </InspectorControls>

                <ServerSideRender
                    block={props.name}
                    attributes={{
                        device: device,
                        method: method,
                        fit: fit,
                        link: link,
                        new_tab: new_tab,
                        rotate: rotate,
                        width: width,
                        units: units,
                        autoplay: autoplay,
                        play_button: play_button,
                        controls: controls,
                        loop: loop,
                        mute: mute,
                        autoplay_on_view: autoplay_on_view,
                        bg_color: bg_color,
                        device_color: device_color,
                        media_type: media_type,
                        mediaURL: mediaURL,
                        mediaID: mediaID,
                        previewMediaID: previewMediaID,
                        align: align,
                        anchor: anchor,
                        //class: className,
                    }}
                />

            </Fragment>
        );
    },
    getEditWrapperProps(attrs) {
        return { 'data-align': attrs.align };
    },

    /**
     * The save function defines the way in which the different attributes should be combined
     * into the final markup, which is then serialized by Gutenberg into post_content.
     *
     * The "save" property must be specified and must be a valid function.
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     *
     * @param {Object} props Props.
     * @returns {Mixed} JSX Frontend HTML.
     */
    save: () => { return null }
});
