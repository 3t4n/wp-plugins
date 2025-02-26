import { __ } from '@wordpress/i18n';
import { InspectorControls, RichText, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, Spinner } from '@wordpress/components';
import { useState } from '@wordpress/element';
import MarkdownIt from 'markdown-it';
import DOMPurify from 'dompurify';
import './editor.scss';


const md = new MarkdownIt();
/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 */
export default function Edit({ attributes, setAttributes }) {
    const [loading, setLoading] = useState(false);
    const apiKey = AIContentGeneratorSettings?.apiKey;
    const model = AIContentGeneratorSettings?.model || 'gpt-3.5-turbo';

    const calculateMaxTokens = (prompt, model) => {
        const modelTokenLimits = {
            "gpt-3.5-turbo": 4096,
            "gpt-4": 8192,
        };

        const modelLimit = modelTokenLimits[model] || 4096;
        const promptTokenCount = Math.ceil(prompt.length / 4);
        return Math.max(1, modelLimit - promptTokenCount);
    };

    const generateContent = async () => {
        setLoading(true);
        try {
            const prompt = attributes.prompt;
            const maxTokens = calculateMaxTokens(prompt, model);
            const response = await fetch('https://api.openai.com/v1/chat/completions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${apiKey}`,
                },
                body: JSON.stringify({
                    model: model,
                    messages: [{"role": "user", "content": prompt}],
                    max_tokens: maxTokens,
                }),
            });
            const data = await response.json();
			const generatedMarkdown = data.choices[0].message.content;

            // Convert Markdown to HTML
            const renderedHTML = md.render(generatedMarkdown);

            // Sanitize HTML
            const sanitizedHTML = DOMPurify.sanitize(renderedHTML);

            setAttributes({ content: sanitizedHTML });
        } catch (error) {
            console.error('Error generating content:', error);
        } finally {
            setLoading(false);
        }
    };

    const blockProps = useBlockProps();

    return (
        <>
            <InspectorControls>
                <PanelBody title="AI Settings">
                    <TextControl
                        label="Prompt"
                        value={attributes.prompt}
                        onChange={(prompt) => setAttributes({ prompt })}
                    />
                    <Button isPrimary onClick={generateContent} disabled={loading}>
                        {loading ? <Spinner /> : 'Generate Content'}
                    </Button>
                </PanelBody>
            </InspectorControls>
            <div {...blockProps}>
				
                <RichText
                    tagName="div"
                    value={attributes.content}
                    onChange={(content) => setAttributes({ content })}
                    placeholder={__('Generated content will appear here', 'ai-content-forge')}
                  
                />
				
            </div>
        </>
    );
}

/**
 * The save function describes the structure of your block in the saved content.
 */
export function save({ attributes }) {
	const blockProps = useBlockProps.save();

    return (
        <div {...blockProps}>
            {/* Render the Markdown as HTML dynamically */}
            <RichText.Content value={ attributes.content } />
        </div>
    );
}
