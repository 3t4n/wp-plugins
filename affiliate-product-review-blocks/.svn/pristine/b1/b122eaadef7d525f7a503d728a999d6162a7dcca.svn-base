const { __ } = wp.i18n;
import { RichText } from '@wordpress/block-editor';

const Save = ({ attributes, className }) => {
    const { title, scoreValue, scoreBarColor, barHeight, marginTop, marginBottom } = attributes;
    
    return(
        <div className={ `${className}` } style={{ marginTop: marginTop, marginBottom: marginBottom }}>
            <div className="score-bar-title">
                <RichText.Content
                    tagName="p"
                    className={ `score-bar-title-text` }
                    value={ title }
                />
                <p><b>{ scoreValue }</b></p>
            </div>
            <div className="score-bar-container" style={{ height: barHeight }}>
                <div className="score-bar-value" style={ { width: `${scoreValue*10}%`, backgroundColor: scoreBarColor, height: barHeight } }></div>
            </div>
        </div>
    );
}
export default Save; 