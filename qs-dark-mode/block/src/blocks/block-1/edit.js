import { __ } from '@wordpress/i18n';
import { useEffect } from '@wordpress/element';
import {
	useBlockProps,
	BlockControls,
	InspectorControls,
	PanelColorSettings,
	__experimentalBlockAlignmentMatrixToolbar as BlockAlignmentMatrixToolbar,
	BlockAlignmentToolbar
} from '@wordpress/block-editor';
import { 
	
	ColorPicker ,
	ColorPalette ,
	Panel , 
	PanelBody, 
	PanelRow ,
	Card,
	RangeControl, 
    CardHeader,
    CardBody,
   	__experimentalText as Text,
	__experimentalNumberControl as NumberControl,
    __experimentalHeading as Heading,
} from '@wordpress/components';

import ServerSideRender from '@wordpress/server-side-render';
import './editor.scss';

export default function Edit({ attributes, setAttributes, clientId }) {
	
	const blockProps = useBlockProps();
	
	useEffect( () => {
        
        setAttributes( { blockId: clientId } );
        
    }, [] ); 

	return (
		<div {...blockProps}>
			{
				
			    <InspectorControls>
					<Panel header="Settings">
						<PanelBody initialOpen={ false } title="Active Color">
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Text Color</Heading>
									</CardHeader>
									<CardBody>
										<ColorPalette
											onChange={ ( nextColor ) => {
											setAttributes( { textColor: nextColor } );
											} }
											colors={ [
												{ name: 'red', color: '#f00' },
												{ name: 'white', color: '#fff' },
												{ name: 'blue', color: '#00f' },
											] }
											value={ attributes.textColor }
											
										/>
									</CardBody>
								</Card>
								
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Background</Heading>
									</CardHeader>
										<CardBody>
											<ColorPalette
												onChange={ ( nextColor ) => {
												setAttributes( { textBackground: nextColor } );
												} }
												colors={ [
													{ name: 'red', color: '#f00' },
													{ name: 'white', color: '#fff' },
													{ name: 'blue', color: '#00f' },
												] }
												value={ attributes.textBackground }
												
											/>
										</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Border</Heading>
									</CardHeader>
									<CardBody>
									<ColorPalette
											onChange={ ( nextColor ) => {
											setAttributes( { borderColor: nextColor } );
											} }
											colors={ [
												{ name: 'red', color: '#f00' },
												{ name: 'white', color: '#fff' },
												{ name: 'blue', color: '#00f' },
											] }
											value={ attributes.borderColor }
											
										/>
									</CardBody>
								</Card>
							</PanelRow>
						</PanelBody>
						<PanelBody initialOpen={ false } title="Inactive Color">
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Text Color</Heading>
									</CardHeader>
									<CardBody>
										<ColorPalette
											onChange={ ( nextColor ) => {
											setAttributes( { itextColor: nextColor } );
											} }
											colors={ [
												{ name: 'red', color: '#f00' },
												{ name: 'white', color: '#fff' },
												{ name: 'blue', color: '#00f' },
											] }
											value={ attributes.itextColor }
											
										/>
									</CardBody>
								</Card>
								
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Background</Heading>
									</CardHeader>
										<CardBody>
											<ColorPalette
												onChange={ ( nextColor ) => {
												setAttributes( { itextBackground: nextColor } );
												} }
												colors={ [
													{ name: 'red', color: '#f00' },
													{ name: 'white', color: '#fff' },
													{ name: 'blue', color: '#00f' },
												] }
												value={ attributes.itextBackground }
												
											/>
										</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Border</Heading>
									</CardHeader>
									<CardBody>
									<ColorPalette
											onChange={ ( nextColor ) => {
											setAttributes( { iborderColor: nextColor } );
											} }
											colors={ [
												{ name: 'red', color: '#f00' },
												{ name: 'white', color: '#fff' },
												{ name: 'blue', color: '#00f' },
											] }
											value={ attributes.iborderColor }
											
										/>
									</CardBody>
								</Card>
							</PanelRow>
						</PanelBody>
						<PanelBody initialOpen={ false } title="Position">
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Top</Heading>
									</CardHeader>
									<CardBody>
										
										<NumberControl
											isShiftStepEnabled={ true }
											onChange={ ( nextValue ) => {
												setAttributes( { swictherTop: nextValue } );
												} }
											shiftStep={ 1 }
											value={ attributes.swictherTop }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Left</Heading>
									</CardHeader>
									<CardBody>
										
										<NumberControl
											isShiftStepEnabled={ true }
											onChange={ ( nextValue ) => {
												setAttributes( { swictherLeft: nextValue } );
												} }
											shiftStep={ 1 }
											value={ attributes.swictherLeft }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Margin Left</Heading>
									</CardHeader>
									<CardBody>
										
										<NumberControl
											isShiftStepEnabled={ true }
											onChange={ ( nextValue ) => {
												setAttributes( { marginLeft: nextValue } );
												} }
											shiftStep={ 1 }
											value={ attributes.marginLeft }
										/>
									</CardBody>
								</Card>
							</PanelRow>
						</PanelBody>
						<PanelBody initialOpen={ false } title="Inactive Position">
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Top</Heading>
									</CardHeader>
									<CardBody>
										
										<NumberControl
											isShiftStepEnabled={ true }
											onChange={ ( nextValue ) => {
												setAttributes( { iswictherTop: nextValue } );
												} }
											shiftStep={ 1 }
											value={ attributes.iswictherTop }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardHeader>
										<Heading size={ 4 }>Left</Heading>
									</CardHeader>
									<CardBody>
										
										<NumberControl
											isShiftStepEnabled={ true }
											onChange={ ( nextiswictherLeft ) => {
												setAttributes( { ileft: nextiswictherLeft } );
												} }
											shiftStep={ 1 }
											value={ attributes.ileft }
										/>
									</CardBody>
								</Card>
							</PanelRow>
						
						</PanelBody>
						<PanelBody initialOpen={ false } title="Main Wrapper">
							<PanelRow>
								<Card>
									<CardBody>
										<NumberControl
										   
											label="Width"
											onChange={ ( nextwidth ) => {
												setAttributes( { width: nextwidth } );
												} }
											value={ attributes.width }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardBody>
										<NumberControl
											label="Height"
											onChange={ ( nextheight ) => {
												setAttributes( { height: nextheight } );
												} }
											value={ attributes.height }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardBody>
										<NumberControl
											label="Margin Top"
											onChange={ ( nexttop ) => {
												setAttributes( { topMargin: nexttop } );
												} }
											value={ attributes.topMargin }
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardBody>
										<NumberControl
											label="Margin Bottom"
											value={ attributes.bottomMargin }
											onChange={ ( nextValue ) => {
												setAttributes( { bottomMargin: nextValue } );
												} }
											
										/>
									</CardBody>
								</Card>
							</PanelRow>
							<PanelRow>
								<Card>
									<CardBody>
										<NumberControl
											label="Margin Top"
											onChange={ ( nexttop ) => {
												setAttributes( { topMargin: nexttop } );
												} }
											value={ attributes.topMargin }
										/>
									</CardBody>
								</Card>
							</PanelRow>
						</PanelBody>
					</Panel> 
				</InspectorControls>
			}
			{
			    <BlockControls>
					<BlockAlignmentToolbar 
					value={ attributes.textAlign }
					onChange={ ( nextAlign ) => {
					     setAttributes( { textAlign: nextAlign } );
					} } />	 	 
				</BlockControls>
			}
			<ServerSideRender
                block="qs-dark-mode/swicther-button"
                attributes={ attributes }
            />
		</div>
	);
}