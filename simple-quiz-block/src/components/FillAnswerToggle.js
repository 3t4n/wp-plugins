import {
	ToggleControl
} from '@wordpress/components'

const FillAnswerToggle = ({attributes, setAttributes}) => {
  return (
    <ToggleControl
    label="Plein"
    checked={attributes.fill}
    onChange={()=> setAttributes({fill: !attributes.fill})}
    className='menu-icon-simplequizblock'
    />
  )
}

export default FillAnswerToggle