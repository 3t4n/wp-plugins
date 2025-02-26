import {
  PanelBody,
  Button,
  CheckboxControl,
  TextControl,
  Icon,
} from '@wordpress/components';
import { Fragment } from '@wordpress/element';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import { useState } from 'react';
import { swatch } from '@wordpress/icons';
import axios from 'axios';

const imageEditor = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { setAttributes, attributes, isSelected, name } = props;
    const imageUrl = attributes.url;
    if (!isSelected || name !== 'core/image' || !imageUrl) {
      return <BlockEdit {...props} />;
    }
    const [keywords, setKeywords] = useState('');
    const [enableKeywords, setEnableKeywords] = useState(false);
    const [isGenerating, setIsGenerating] = useState(false);
    const hasNoApiKey = !altgoo.has_api_key;
    const isImageFileTypeNotAllowed = imageUrl ? ![
      'png',
      'jpeg',
      'jpg',
      'webp',
      'gif',
    ].includes(imageUrl.split('.').at(-1)) : true;
    const shouldDisableUI =
      hasNoApiKey || isGenerating || isImageFileTypeNotAllowed;
    const [notificationBar, setNotificationBar] = useState(null);

    const handleGenerateClick = async () => {
      setIsGenerating(true);
      try {
        const response = await axios.post(
          altgoo.ajax_url,
          {
            action: 'altgoo_generate_alt_text_single',
            security: altgoo.security_generate_alt_text_single,
            image_url: imageUrl,
            image_id: attributes.id,
            keywords: enableKeywords ? keywords : '',
          },
          {
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
          }
        );
        const error_code = response.data.error_code;

        if (error_code) {
          console.log(error_code);
          switch (error_code) {
            case 400: {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  Invalid image url or unsupported image type. See{' '}
                  <a href="https://www.alttextgo.com/faq" target="_blank">
                    supported image file types
                  </a>
                  .
                </div>
              );
              break;
            }
            case 401: {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  Invalid API Key provided. Please set up a valid API key in{' '}
                  <a href={altgoo.settings_url}>plugin settings</a> to generate.
                </div>
              );
              break;
            }
            case 402: {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  You have used up all your credits.{' '}
                  <a href={altgoo.settings_url} target="_blank">
                    Top up
                  </a>
                </div>
              );
              break;
            }
            case 403: {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  Inapproriate image content or SEO keywords.
                </div>
              );
              break;
            }
            case 'api_request_failed': {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  Internet connection error. Please check your internet
                  connection!
                </div>
              );
              break;
            }
            default: {
              setNotificationBar(
                <div style={{ color: 'red' }}>
                  Failed to generate, no credit used. Please try again!
                </div>
              );
              break;
            }
          }
        } else {
          setAttributes({ alt: response.data.alt_text });
          setNotificationBar(
            <div style={{ color: 'green' }}>
              Successfully generated! Used 1 credit.
            </div>
          );
        }
      } catch (error) {
        setNotificationBar(
          <div style={{ color: 'red' }}>
            Failed to generate, no credit used. Please try again!
          </div>
        );
      }
      setIsGenerating(false);
    };

    return (
      <Fragment>
        <InspectorControls>
          <PanelBody title="AltTextGo" initialOpen={true}>
            <div>
              <CheckboxControl
                label="Add SEO keywords"
                checked={enableKeywords}
                onChange={(checked) => setEnableKeywords(checked)}
                disabled={shouldDisableUI}
              />
              {enableKeywords && (
                <TextControl
                  onChange={(keywords) => {
                    setKeywords(keywords);
                  }}
                  value={keywords}
                  disabled={shouldDisableUI}></TextControl>
              )}
              <Button
                variant="primary"
                size="compact"
                onClick={handleGenerateClick}
                icon={isGenerating ? <Icon icon={swatch} /> : null}
                disabled={shouldDisableUI}>
                {isGenerating ? 'Generating...' : 'Generate Alt Text'}
              </Button>
              {hasNoApiKey ? (
                <div style={{ marginTop: '16px' }}>
                  No API key found. Please set up your key in{' '}
                  <a href={altgoo.settings_url}>plugin settings</a> to generate.
                </div>
              ) : isImageFileTypeNotAllowed ? (
                <div style={{ marginTop: '16px' }}>
                  This image file type is not supported for generation. See{' '}
                  <a href="https://www.alttextgo.com/faq" target="_blank">
                    supported image file types
                  </a>
                  .
                </div>
              ) : null}
              <div style={{ marginTop: '16px' }}>{notificationBar}</div>
            </div>
          </PanelBody>
        </InspectorControls>
        <BlockEdit {...props} />
      </Fragment>
    );
  };
}, 'image');

// Register the filter
addFilter('editor.BlockEdit', 'ALTGOO/customImageEditor', imageEditor);
