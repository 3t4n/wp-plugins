import {
	DropdownMenu, MenuItem, MenuGroup,
} from '@wordpress/components'

const DifficultyDropDown = ({attributes, setAttributes}) => {
  return (
    <DropdownMenu
    icon={'coffee'}
    label="Choisir une difficulté"
    className='menu-icon-simplequizblock'>
    {
      ({ onClose }) => (
        <>
          <MenuGroup>

            <MenuItem isSelected={attributes.difficulty === 'all'}
              icon={attributes.difficulty === 'all' ? 'yes' : null}
              onClick={() => {
                setAttributes({ difficulty: 'all' })
                onClose()
              }}>
              Toutes
            </MenuItem>
            <MenuItem isSelected={attributes.difficulty === 'facile'}
              icon={attributes.difficulty === 'facile' ? 'yes' : null}
              onClick={() => {

                setAttributes({ difficulty: 'facile' })
                onClose()
              }}>
              Facile
            </MenuItem>
            <MenuItem isSelected={attributes.difficulty === 'normal'}
              icon={attributes.difficulty === 'normal' ? 'yes' : null}
              onClick={() => {
                setAttributes({ difficulty: 'normal' })
                onClose()
              }}>
              Normal
            </MenuItem>
            <MenuItem isSelected={attributes.difficulty === 'difficile'}
              icon={attributes.difficulty === 'difficile' ? 'yes' : null}
              onClick={() => {
                setAttributes({ difficulty: 'difficile' })
                onClose()
              }}>
              Difficile
            </MenuItem>
          </MenuGroup>
        </>
      )
    }
  </DropdownMenu>
  )
}

export default DifficultyDropDown