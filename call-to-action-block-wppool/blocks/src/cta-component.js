const { Component } = wp.element;
const { __ } = wp.i18n;
const { MediaUpload } = wp.blockEditor;
const { Dashicon } = wp.components;

class CtaMedia extends Component {

    setSettings(media) {
		const { onChange } = this.props
		if (media && media.url) {
            onChange({ url: media.url, id: media.id, alt: media.alt });
        }
    }

    removeImage() {
        const { onChange } = this.props
		onChange({})
	}
    
    validateUrl(url) {
		if (['wbm', 'jpg', 'jpeg', 'gif', 'png', 'svg'].indexOf(url.split('.').pop().toLowerCase()) != -1) {
			return url;
		} else {
			return cta_gutenberg_locate.plugin + 'assets/images/cta_1.png';
		}
	}

    render() {
        const { value, label, className } = this.props;
        return (
            <div className={`cta-field cta-field-media-selector ${className?className:''}`}>
                { label && 
                    <span className="cta-field-label">{label}</span>
                }
                <div className="cta-field-content cta-field-media">
                    <MediaUpload
                        onSelect={val => this.setSettings(val)}
                        allowedTypes={['image']}
                        value={value}
                        render={({ open }) => (
                            <div>
                                {(value && value.url) ? 
                                    <div>
                                        <div className="cta-single-img">
                                            <span className="cta-media-image-parent" onClick={open}>
                                                <img src={this.validateUrl(value.url)} alt={value.alt} />
                                            </span>
                                        </div>
                                        <div className="cta-media-actions cta-field-button-list">
                                            <button className="cta-field-button" aria-label={__('Edit', 'cta-gutenberg')} onClick={open} role="button">
                                                <span aria-label={__('Edit', 'cta-gutenberg')} className="dashicons dashicons-edit" />
                                            </button>
                                            <button className="cta-field-button" aria-label={__('Remove', 'cta-gutenberg')} onClick={() => this.removeImage()} role="button">
                                                <span aria-label={__('Close', 'cta-gutenberg')} className="dashicons dashicons-no" />
                                            </button>
                                        </div>
                                    </div>
                                    :
                                    <div className="cta-single-img"><div onClick={open} className={"cta-placeholder-image"}><Dashicon icon="format-image" /></div></div>
                                }
                            </div>
                        )}
                    />
                </div>
            </div>
        );
    }
}

class CtaLayoutSelector extends Component {

    render() {
        const { value, label, options, columns = 2, className, onChange } = this.props;
        return (
            <div className={`cta-field cta-field-layout ${className?className:''}`}>
                { label && 
                    <span className="cta-field-label">{label}</span>
                }
                <div className="cta-field-content cta-field-layout-list">
                    {
                        options.map((data, index) => {
                            return (
                                <div
                                    key={index}
                                    onClick={() => onChange(data.value)}
                                    className={`${value == data.value ? 'active' : ''}`}
                                >
                                    {data.styleIcon && <span className={`cta-layout-style cta-layout-style-${data.value}`}>{data.styleIcon}</span>}
                                </div>
                            )
                        })
                    }
                </div>
            </div>
        );
    }
}

wp.ctaComponents = {
    CtaMedia,
    CtaLayoutSelector
}