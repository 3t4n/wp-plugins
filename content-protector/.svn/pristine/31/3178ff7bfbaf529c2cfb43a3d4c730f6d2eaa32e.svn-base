import {
	Button,
	Card,
	CardBody,
	CardHeader,
	__experimentalSpacer as Spacer,
	Notice,
	Animate,
	ColorPalette,
	RangeControl,
	FontSizePicker,
	__experimentalBoxControl as BoxControl, ToggleControl, FlexBlock, Flex,
} from '@wordpress/components';
import { useContext, useEffect, useState } from '@wordpress/element';
import { SettingsContext } from '../context/SettingsContext';
import DimensionControl from '../components/DimensionControl';

const { __ } = wp.i18n;

function DesignSettings() {
	const { settings, updateSetting, saveSettings, settingsSaved, setSettingsSaved } = useContext( SettingsContext );

	const [ borderRadius, setBorderRadius ] = useState( parseInt( settings.form_border_radius ) );
	const [ buttonBorderRadius, setButtonBorderRadius ] = useState( parseInt( settings.button_border_radius ) );
	const [ headlineFontSize, setHeadlineFontSize ] = useState( parseInt( settings.headline_font_size ) );
	const [ instructionFontSize, setInstructionFontSize ] = useState( parseInt( settings.instruction_font_size ) );
	const [ buttonFontSize, setButtonFontSize ] = useState( settings.button_font_size ? parseInt( settings.button_font_size ) : 16 );
	const [ headlineFontWeight, setHeadlineFontWeight ] = useState( parseInt( settings.headline_font_weight ) );
	const [ instructionFontWeight, setInstructionFontWeight ] = useState( parseInt( settings.instruction_font_weight ) );
	const [ buttonFontWeight, setButtonFontWeight ] = useState( parseInt( settings.button_font_weight ) );
	const [ showPassword, setShowPassword ] = useState( false );
	const [ hideHeadline, setHideHeadline ] = useState( false );
	const [ centerForm, setCenterForm ] = useState( false );
	const [ buttonState, setButtonState ] = useState( false );

	const [ isOpenSections, setIsOpenSections ] = useState( {
		form: true,
		spacing: true,
		instruction: true,
		button: true,
	} );

	const toggleSection = ( section ) => {
		setIsOpenSections( ( prevState ) => ( {
			...prevState,
			[ section ]: ! prevState[ section ],
		} ) );
	};

	const instructionFallbackFontSize = 16;
	const buttonFallbackFontSize = 14;
	const fallbackFontSize = 24;

	const fontColors = [
		{ name: 'passster', color: '#6804cc' },
		{ name: 'white', color: '#fff' },
		{ name: 'black', color: '#000' },
	];

	const backgroundColors = [
		{ name: 'passster', color: '#6804cc' },
		{ name: 'light-grey', color: '#FAFAFA' },
		{ name: 'black', color: '#000' },
	];

	const [ formPadding, setFormPadding ] = useState( {
		top: '10px',
		left: '30px',
		right: '30px',
		bottom: '30px',
	} );

	const [ formMargin, setFormMargin ] = useState( {
		top: '0',
		left: '0',
		right: '0',
		bottom: '0',
	} );

	const [ buttonPadding, setButtonPadding ] = useState( {
		top: '10px',
		left: '10px',
		right: '10px',
		bottom: '10px',
	} );

	const [ buttonMargin, setButtonMargin ] = useState( {
		top: '0',
		left: '0',
		right: '0',
		bottom: '0',
	} );

	const fontSizes = [
		{
			name: __( 'Small' ),
			slug: 'small',
			size: 12,
		},
		{
			name: __( 'Medium' ),
			slug: 'medium',
			size: 16,
		},
		{
			name: __( 'Big' ),
			slug: 'big',
			size: 24,
		},
	];

	const setSavingSettings = () => {
		saveSettings();
		setSettingsSaved( true );

		setTimeout( function() {
			setSettingsSaved( false );
		}, 2000 );
	};

	useEffect( () => {
		if ( settings.show_password ) {
			setShowPassword( settings.show_password );
		}

		if ( settings.center_form ) {
			setCenterForm( settings.center_form );
		}

		if ( settings.form_margin ) {
			setFormMargin( settings.form_margin );
		}

		if ( settings.form_padding ) {
			setFormPadding( settings.form_padding );
		}

		if ( settings.button_margin ) {
			setButtonMargin( settings.button_margin );
		}

		if ( settings.button_padding ) {
			setButtonPadding( settings.button_padding );
		}
	}, [ settings ] );

	return ( <div className={ 'inner-settings' }>
		<Card>
			<CardHeader
				onClick={ () => toggleSection( 'form' ) }
				className="header_collapse"
			>
				<span>{ __( 'Form', 'content-protector' ) }</span>
				<span>
					{ isOpenSections.form ? (
						<span className="dashicons dashicons-arrow-up-alt2" />
					) : (
						<span className="dashicons dashicons-arrow-down-alt2" />
					) }
				</span>
			</CardHeader>
			{ isOpenSections.form && (
				<CardBody>
					<DimensionControl
						label={ __( 'Form width', 'ollie-blocks' ) }
						value={ settings.form_max_width }
						onChange={ ( value ) => {
							updateSetting( 'form_max_width', value );
						} }
					/>
					<Spacer margin={ 5 } />
					<label className={ 'formatted-label' }>{ __( 'Form position', 'content-protector' ) }</label>
					<ToggleControl
						label={ __( 'Center Form', 'content-protector' ) }
						help={
							centerForm
								? __( 'Center the password form in the middle of the page.', 'content-protector' )
								: __( 'Do not center the password form.', 'content-protector' )
						}
						checked={ centerForm }
						onChange={ ( value ) => {
							setCenterForm( value );
							updateSetting( 'center_form', value );
						} }
					/>
					<Spacer margin={ 5 } />
					<label className={ 'formatted-label' }>{ __( 'Background Color', 'content-protector' ) }</label>
					<span>
						<ColorPalette
							colors={ backgroundColors }
							value={ settings.form_background_color }
							onChange={ ( value ) => {
								updateSetting( 'form_background_color', value );
							} }
						/>
					</span>
					<label className={ 'formatted-label' }>{ __( 'Spacing Controls', 'content-protector' ) }</label>
					<Flex>
						<FlexBlock>
							<BoxControl
								label={ __( 'Margin', 'content-protector' ) }
								values={ formMargin }
								help={ __( 'Margin is the space around an element. The higher the value the more space is around the password form.', 'content-protector' ) }
								onChange={ ( value ) => {
									setFormMargin( value );
									updateSetting( 'form_margin', value );
								} }
							/>
						</FlexBlock>
						<FlexBlock>
							<BoxControl
								label={ __( 'Padding', 'content-protector' ) }
								values={ formPadding }
								help={ __( 'Padding is the space between an element and its content. The higher the value the more space is inside the password form.', 'content-protector' ) }
								onChange={ ( value ) => {
									setFormPadding( value );
									updateSetting( 'form_padding', value );
								} }
							/>
						</FlexBlock>
					</Flex>

					<Spacer margin={ 5 } />
					<RangeControl
						label={ __( 'Border Radius', 'content-protector' ) }
						value={ borderRadius }
						onChange={ ( value ) => {
							setBorderRadius( value );
							updateSetting( 'form_border_radius', value );
						} }
						help={ __( 'The higher the border radius the more rounded are the corners of the form.', 'content-protector' ) }
						min={ 0 }
						max={ 100 }
					/>
					<Spacer margin={ 5 } />
					<ToggleControl
						label={ __( 'Show Password', 'content-protector' ) }
						help={
							showPassword
								? __( 'Add a checkbox to show the password before submitting.', 'content-protector' )
								: __( 'Do not add a checkbox to view the password', 'content-protector' )
						}
						checked={ showPassword }
						onChange={ ( value ) => {
							setShowPassword( value );
							updateSetting( 'show_password', value );
						} }
					/>
				</CardBody>
			) }

		</Card>
		<Spacer margin={ 5 } />
		<Card>
			<CardHeader
				onClick={ () => toggleSection( 'spacing' ) }
				className="header_collapse"
			>
				<span>{ __( 'Headline', 'content-protector' ) }</span>
				<span>
					{ isOpenSections.spacing ? (
						<span className="dashicons dashicons-arrow-up-alt2" />
					) : (
						<span className="dashicons dashicons-arrow-down-alt2" />
					) }
				</span>
			</CardHeader>
			{ isOpenSections.spacing && (
				<CardBody>
					<label className={ 'formatted-label' }>{ __( 'Font Controls', 'content-protector' ) }</label>
					<Spacer margin={ 5 } />
					<label className={ 'formatted-label' }>{ __( 'Color', 'content-protector' ) }</label>
					<span>
						<ColorPalette
							colors={ fontColors }
							value={ settings.headline_font_color }
							onChange={ ( value ) => {
								updateSetting( 'headline_font_color', value );
							} }
						/>
					</span>
					<FontSizePicker
						fontSizes={ fontSizes }
						value={ headlineFontSize }
						fallbackFontSize={ fallbackFontSize }
						onChange={ ( value ) => {
							setHeadlineFontSize( value );
							updateSetting( 'headline_font_size', value );
						} }
					/>
					<Spacer margin={ 5 } />
					<RangeControl
						label={ __( 'Font weight', 'content-protector' ) }
						value={ headlineFontWeight }
						onChange={ ( value ) => {
							setHeadlineFontWeight( value );
							updateSetting( 'headline_font_weight', value );
						} }
						min={ 100 }
						step={ 100 }
						max={ 700 }
					/>
					<Spacer margin={ 5 } />
					<ToggleControl
						label={ __( 'Hide Headline', 'content-protector' ) }
						help={
							hideHeadline
								? __( 'The password form will be shown without the headline', 'content-protector' )
								: __( 'The password form will include the headline', 'content-protector' )
						}
						checked={ hideHeadline }
						onChange={ ( value ) => {
							setHideHeadline( value );
							updateSetting( 'hide_headline', value );
						} }
					/>
				</CardBody>
			) }
		</Card>
		<Spacer margin={ 5 } />
		<Card>
			<CardHeader
				onClick={ () => toggleSection( 'instruction' ) }
				className="header_collapse"
			>
				<span>{ __( 'Instruction', 'content-protector' ) }</span>
				<span>
					{ isOpenSections.instruction ? (
						<span className="dashicons dashicons-arrow-up-alt2" />
					) : (
						<span className="dashicons dashicons-arrow-down-alt2" />
					) }
				</span>
			</CardHeader>
			{ isOpenSections.instruction && (
				<CardBody>
					<label className={ 'formatted-label' }>{ __( 'Font Controls', 'content-protector' ) }</label>
					<Spacer margin={ 5 } />
					<label className={ 'formatted-label' }>{ __( 'Color', 'content-protector' ) }</label>
					<span>
						<ColorPalette
							colors={ fontColors }
							value={ settings.instruction_font_color }
							onChange={ ( value ) => {
								updateSetting( 'instruction_font_color', value );
							} }
						/>
					</span>
					<FontSizePicker
						fontSizes={ fontSizes }
						value={ instructionFontSize }
						fallbackFontSize={ instructionFallbackFontSize }
						onChange={ ( value ) => {
							setInstructionFontSize( value );
							updateSetting( 'instruction_font_size', value );
						} }
					/>
					<Spacer margin={ 5 } />
					<RangeControl
						label={ __( 'Font weight', 'content-protector' ) }
						value={ instructionFontWeight }
						onChange={ ( value ) => {
							setInstructionFontWeight( value );
							updateSetting( 'instruction_font_weight', value );
						} }
						min={ 100 }
						step={ 100 }
						max={ 700 }
					/>
				</CardBody>
			) }

		</Card>
		<Spacer margin={ 5 } />
		<Card>
			<CardHeader
				onClick={ () => toggleSection( 'button' ) }
				className="header_collapse"
			>
				<span>{ __( 'Button', 'content-protector' ) }</span>
				<span>
					{ isOpenSections.button ? (
						<span className="dashicons dashicons-arrow-up-alt2" />
					) : (
						<span className="dashicons dashicons-arrow-down-alt2" />
					) }
				</span>
			</CardHeader>
			{ isOpenSections.button && (
				<CardBody>
					<label className={ 'formatted-label' }>{ __( 'Color Controls', 'content-protector' ) }</label>
					<Spacer margin={ 5 } />
					{ buttonState
						? <>
							<label
								className={ 'formatted-label' }>{ __( 'Background Color (Hover)', 'content-protector' ) }</label>
							<span>
								<ColorPalette
									colors={ backgroundColors }
									value={ settings.button_background_color_hover }
									onChange={ ( value ) => {
										updateSetting( 'button_background_color_hover', value );
									} }
								/>
							</span>
							<Spacer margin={ 5 } />
							<label className={ 'formatted-label' }>{ __( 'Font Color (Hover)', 'content-protector' ) }</label>
							<span>
								<ColorPalette
									colors={ fontColors }
									value={ settings.button_font_color_hover }
									onChange={ ( value ) => {
										updateSetting( 'button_font_color_hover', value );
									} }
								/>
							</span>
						</>
						: <>
							<label className={ 'formatted-label' }>{ __( 'Background Color', 'content-protector' ) }</label>
							<span>
								<ColorPalette
									colors={ backgroundColors }
									value={ settings.button_background_color }
									onChange={ ( value ) => {
										updateSetting( 'button_background_color', value );
									} }
								/>
							</span>
							<Spacer margin={ 5 } />
							<label className={ 'formatted-label' }>{ __( 'Font Color', 'content-protector' ) }</label>
							<span>
								<ColorPalette
									colors={ fontColors }
									value={ settings.button_font_color }
									onChange={ ( value ) => {
										updateSetting( 'button_font_color', value );
									} }
								/>
							</span>
						</>
					}
					<ToggleControl
						label={ __( 'Change button State', 'content-protector' ) }
						help={
							buttonState
								? __( 'Set colors (hover)', 'content-protector' )
								: __( 'Set colors', 'content-protector' )
						}
						checked={ buttonState }
						onChange={ ( value ) => {
							setButtonState( value );
						} }
					/>
					<label className={ 'formatted-label' }>{ __( 'Spacing Controls', 'content-protector' ) }</label>
					<Flex>
						<FlexBlock>
							<BoxControl
								label={ __( 'Margin', 'content-protector' ) }
								values={ buttonMargin }
								help={ __( 'Margin is the space around an element. The higher the value the more space is around the password form.', 'content-protector' ) }
								onChange={ ( value ) => {
									setButtonMargin( value );
									updateSetting( 'button_margin', value );
								} }
							/>
						</FlexBlock>
						<FlexBlock>
							<BoxControl
								label={ __( 'Padding', 'content-protector' ) }
								values={ buttonPadding }
								help={ __( 'Padding is the space between an element and its content. The higher the value the more space is inside the password form.', 'content-protector' ) }
								onChange={ ( value ) => {
									setButtonPadding( value );
									updateSetting( 'button_padding', value );
								} }
							/>
						</FlexBlock>
					</Flex>
					<Spacer margin={ 5 } />
					<RangeControl
						label={ __( 'Border Radius', 'content-protector' ) }
						value={ buttonBorderRadius }
						help={ __( 'The higher the border radius the more rounded are the corners of the button.', 'content-protector' ) }
						onChange={ ( value ) => {
							setButtonBorderRadius( value );
							updateSetting( 'button_border_radius', value );
						} }
						min={ 0 }
						max={ 100 }
					/>
					<Spacer margin={ 5 } />
					<label className={ 'formatted-label' }>{ __( 'Font Controls', 'content-protector' ) }</label>
					<FontSizePicker
						fontSizes={ fontSizes }
						value={ buttonFontSize }
						fallbackFontSize={ buttonFallbackFontSize }
						onChange={ ( value ) => {
							setButtonFontSize( value );
							updateSetting( 'button_font_size', value );
						} }
					/>

					<Spacer margin={ 5 } />
					<RangeControl
						label={ __( 'Font weight', 'content-protector' ) }
						value={ buttonFontWeight }
						onChange={ ( value ) => {
							setButtonFontWeight( value );
							updateSetting( 'button_font_weight', value );
						} }
						min={ 100 }
						step={ 100 }
						max={ 700 }
					/>
				</CardBody>
			) }
		</Card>

		{
			settingsSaved &&
			<Animate type="slide-in" options={ { origin: 'top' } }>
				{ () => (
					<Notice status="success" isDismissible={ false }>
						<p>
							{ __( 'Settings saved successfully.', 'content-protector' ) }
						</p>
					</Notice>
				) }
			</Animate>
		}
		<div className={ 'save-settings' }>
			<Button onClick={ setSavingSettings }
				variant="primary">{ __( 'Save Settings', 'content-protector' ) }</Button>
		</div>
	</div> );
}

export default DesignSettings;
