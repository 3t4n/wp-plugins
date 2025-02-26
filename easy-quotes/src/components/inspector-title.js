import { __ } from '@wordpress/i18n';
import {
	PanelBody,
	BaseControl,
	ToggleControl,
	ButtonGroup,
	Button,
	__experimentalInputControl as InputControl
} from '@wordpress/components';

export class InspectorTitle extends React.Component {
	componentDidMount() {}

	render() {
		const { isCustomTitle, customTitle, headerTag } = this.props.attributes;

		const { setAttributes } = this.props;

		return (
			<PanelBody
				title={ __( 'Title', 'easy-quotes' ) }
				initialOpen={ false }
			>
				<ToggleControl
					label={ __( 'Custom title', 'easy-quotes' ) }
					checked={ isCustomTitle }
					onChange={ ( isCustomTitle ) =>
						setAttributes( { isCustomTitle } )
					}
					__nextHasNoMarginBottom
				></ToggleControl>
				<InputControl
					disabled={ ! isCustomTitle }
					onChange={ ( customTitle ) =>
						setAttributes( { customTitle } )
					}
					placeholder={ __( 'My Custom Title', 'easy-quotes' ) }
					value={ customTitle }
				></InputControl>
				<BaseControl
					className="la-component-margin-top"
					label={__('Header Tag', 'easy-quotes')}
					__nextHasNoMarginBottom
				>
					<ButtonGroup
						onClick={ ( button ) =>
							setAttributes( { headerTag: button.target.value } )
						}
					>
						<Button variant={ headerTag == 'h1' ? 'primary' : 'secondary' } value="h1">h1</Button>
						<Button variant={ headerTag == 'h2' ? 'primary' : 'secondary' } value="h2">h2</Button>
						<Button variant={ headerTag == 'h3' ? 'primary' : 'secondary' } value="h3">h3</Button>
						<Button variant={ headerTag == 'h4' ? 'primary' : 'secondary' } value="h4">h4</Button>
						<Button variant={ headerTag == 'h5' ? 'primary' : 'secondary' } value="h5">h5</Button>
						<Button variant={ headerTag == 'h6' ? 'primary' : 'secondary' } value="h6">h6</Button>
					</ButtonGroup>
				</BaseControl>
			</PanelBody>
		);
	}
}
