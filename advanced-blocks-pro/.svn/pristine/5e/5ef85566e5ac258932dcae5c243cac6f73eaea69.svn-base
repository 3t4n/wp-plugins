import { typography ,arrowUp ,arrowRight ,arrowDown,arrowLeft} from '@wordpress/icons';
import {  AlignmentToolbar , BlockControls ,BlockAlignmentToolbar } from '@wordpress/block-editor';
const {DropdownMenu} = wp.components;


export const BBToolbar = (props)=>{
    const { attributes , setAttributes} = props;
    return(<>
    <BlockControls>
    <AlignmentToolbar
					value={ attributes.textAlign }
					onChange={ ( nextAlign ) => {
						setAttributes( { textAlign: nextAlign } );
					} }
				/>
        <DropdownMenu
            label="Select a direction"
            icon={typography}
            controls={ [
                {
                    title: 'Heading 1',
                    icon: arrowUp,
                    className:"is-active",
                    onClick: () => setAttributes({ html : 'h1'} ),
                },
                {
                    title: 'Heading 2',
                    icon: arrowRight,
                    onClick: () => setAttributes({ html : 'h2'} ),
                },
                {
                    title: 'Heading 3',
                    icon: arrowDown,
                    onClick: () => setAttributes({ html : 'h3'} ),
                },
                {
                    title: 'Heading 4',
                    icon: arrowLeft,
                    onClick: () => setAttributes({ html : 'h4'} ),
                },
            ] }
        />
        {/* <BlockAlignmentToolbar
            value={ attributes.textAlign }
            onChange={ ( nextAlign ) => {
                setAttributes( { textAlign: nextAlign } );
            } }
        /> */}
</BlockControls>
   
        </>)
}