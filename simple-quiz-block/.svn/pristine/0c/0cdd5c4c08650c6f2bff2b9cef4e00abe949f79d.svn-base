import {
	DropdownMenu, MenuItem, MenuGroup,
} from '@wordpress/components'


const CategoryDropDown = ({attributes, setAttributes}) => {
  return (
    <DropdownMenu
    icon={'lightbulb'}
    label="Choisir une catégorie"
    className='menu-icon-simplequizblock'
  >
    {
      ({ onClose }) => (
        <MenuGroup>
          <MenuItem isSelected={attributes.category === 'all'}
            icon={attributes.category === 'all' ? 'yes' : null}
            onClick={() => {
              setAttributes({ category: 'all' })
              onClose()
            }}>
            Toutes
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'tv_cinema'}
            icon={attributes.category === 'tv_cinema' ? 'yes' : null}
            onClick={() => {
              setAttributes({ category: 'tv_cinema' })
              onClose()
            }}>
            Tv et Cinema
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'art_litterature'}
            icon={attributes.category === 'art_litterature' ? 'yes' : null}
            onClick={() => {
              setAttributes({ category: 'art_litterature' })
              onClose()
            }}>
            Art et Litterature
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'actu_politique'}
            icon={attributes.category === 'actu_politique' ? 'yes' : null}
            onClick={() => {
              setAttributes({ category: 'actu_politique' })
              onClose()
            }}>
            Actu et politique
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'sport'} 
          icon={attributes.category === 'sport' ? 'yes' : null}
          onClick={() => {
            setAttributes({ category: 'sport' })
            onClose()
          }}>
            Sport
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'jeux_videos'} 
          icon={attributes.category === 'jeux_videos' ? 'yes' : null}
          onClick={() => {
            setAttributes({ category: 'jeux_videos' })
            onClose()
          }}>
            Jeux Videos
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'culutre_generale'} 
          icon={attributes.category === 'culutre_generale' ? 'yes' : null}
          onClick={() => {
            setAttributes({ category: 'culutre_generale' })
            onClose()
          }}>
            Culture générale
          </MenuItem>
          <MenuItem isSelected={attributes.category === 'musique'} 
          icon={attributes.category === 'musique' ? 'yes' : null}
          onClick={() => {
            setAttributes({ category: 'musique' })
            onClose()
          }}>
            Musique
          </MenuItem>
        </MenuGroup>
      )
    }

  </DropdownMenu>
  )
}

export default CategoryDropDown