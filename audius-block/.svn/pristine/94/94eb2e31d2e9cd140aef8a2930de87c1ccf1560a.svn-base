import { registerBlockType } from '@wordpress/blocks'
import { useState } from '@wordpress/element'
import { SelectControl, TextControl } from '@wordpress/components'
import { decodeHashId } from './utils'

let audiusProvider = ''

fetch('https://api.audius.co', {
    method: 'GET'
}).then((response) => {
    response.json().then((data) => {
        audiusProvider = data.data[0]
    })
})

const blockStyle = {
	backgroundColor: '#fff',
	color: '#858199',
    padding: '1.2em',
    borderRadius: '8px',
    boxShadow: '0 2px 5px -2px rgba(133,129,153,.25)'
};

const headerBlock = {
    width: '100%',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'space-between',
    marginBottom: '4px'
}

const trackBlockContainer = {
    width: '100%',
    display: 'flex', 
    flexDirection: 'column'
}

const trackBlock = {
    backgroundColor: '#fff',
    color: '858199',
    borderRadius: '8px',
    display: 'flex', 
    alignItems: 'center'
}

const EditBlock = (props) => {
    const { attributes, setAttributes } = props
    const [ searchTracks, setSearchTracks ] = useState([])
    const [ trendingTracks, setTrendingTracks ] = useState([])
    const [ trackUrl, setTrackUrl ] = useState('')
    const [ trackSource, setTrackSource ] = useState('url')
    let height = '400'
    if(attributes.trackEmbedStyle == 'compact'){
        height = '120'
    } else if(attributes.trackEmbedStyle == 'card'){
        height = '400'
    } else if(attributes.trackEmbedStyle == 'tiny'){
        height = '20'
    }

    const hasValidIframeUrl = () => {
        return attributes.iframeUrl && 
            typeof(attributes.iframeUrl) == 'string' &&
            attributes.iframeUrl.includes('https://audius.co/embed/track?')
    }
    const handleTrackUrlChanged = async (trackUrl) => { 
        const trackTest = trackUrl.match(/\d+$/)
        if(trackTest.length > 0){
            const trackId = trackTest[0]
            setTrackUrl( trackUrl ) 
            setAttributes({ trackId }) 
            const apiUrl = `${audiusProvider}/v1/resolve?url=${trackUrl}&app_name=Wordpress`
            const response = await fetch(apiUrl, { method: 'GET' })
            const track = (await response.json()).data
            const trackOwnerId = decodeHashId(track.user.id)
            setAttributes({ trackOwnerId }) 
            const trackEmbedStyle = attributes.trackEmbedStyle || 'card'
            const iframeUrl = `https://audius.co/embed/track?id=${trackId}&ownerId=${trackOwnerId}&flavor=${trackEmbedStyle}`
            setAttributes({ iframeUrl })
        }
        
    }
    const handleEmbedStyleChanged = async (trackEmbedStyle) => {
        setAttributes({ trackEmbedStyle })
        const trackId = attributes.trackId
        const trackOwnerId = attributes.trackOwnerId
        if(trackUrl && trackId && trackOwnerId){
            const iframeUrl = `https://audius.co/embed/track?id=${trackId}&ownerId=${trackOwnerId}&flavor=${trackEmbedStyle}`
            setAttributes({ iframeUrl })
        } else if(hasValidIframeUrl()){
            const iframeUrl = `https://audius.co/embed/track?id=${trackId}&ownerId=${trackOwnerId}&flavor=${trackEmbedStyle}`
            setAttributes({ iframeUrl })
        }
    }
    const handleTrackSourceChanged = async (source) => {
        setTrackSource(source)
        if(source == 'trending'){
            const trendingUrl = `${audiusProvider}/v1/tracks/trending?app_name=Wordpress`
            const response = await fetch(trendingUrl, { method: 'GET' })
            const tracks = ((await response.json()).data).slice(0,10)
            setTrendingTracks([].concat(tracks))
        }
    }
    const handleSearchQueryChanged = async (query) => {
        const searchUrl = `${audiusProvider}/v1/tracks/search?query=${query}&app_name=Wordpress`
        const response = await fetch(searchUrl, { method: 'GET' })
        const tracks = ((await response.json()).data).slice(0,10)
        setSearchTracks([].concat(tracks))
    }
    const restartProcess = () => {
        setAttributes({ iframeUrl: null })
    }
    return (
      <div className='audius-block'>
        <div style={ blockStyle }>
            <div style={headerBlock}>
                <svg width="140" height="52" viewBox="0 0 93 24" >
                    <g fill="none" fillRule="evenodd" stroke="none" strokeWidth="1">
                        <g fill="#7e1bcc" transform="translate(-35 -16)">
                            <g transform="translate(32 16)">
                                <path d="M88.522 14.969l1.313-1.55c.839.661 1.775 1.01 2.76 1.01.632 0 .972-.217.972-.577v-.024c0-.348-.28-.54-1.434-.805-1.812-.408-3.21-.912-3.21-2.641v-.024c0-1.561 1.252-2.69 3.295-2.69 1.447 0 2.577.385 3.501 1.117l-1.18 1.645c-.777-.54-1.628-.829-2.382-.829-.571 0-.851.24-.851.54v.025c0 .384.292.552 1.471.816 1.957.42 3.173 1.045 3.173 2.618v.024c0 1.717-1.374 2.737-3.44 2.737-1.508 0-2.942-.468-3.988-1.392zM76.879 12.53V7.812h2.395v4.671c0 1.213.62 1.79 1.568 1.79.948 0 1.568-.553 1.568-1.73v-4.73h2.395v4.658c0 2.714-1.568 3.902-3.987 3.902-2.42 0-3.94-1.212-3.94-3.842zm-6.88 3.686V7.812h2.37v8.405h-2.37zm-8.971-2.065c1.41 0 2.346-.768 2.346-2.125v-.024c0-1.345-.936-2.125-2.346-2.125h-.96v4.274h.96zm-3.319-6.34h3.283c3.039 0 4.802 1.73 4.802 4.155v.024c0 2.425-1.787 4.226-4.851 4.226h-3.234V7.812zm-12.425 4.72v-4.72h2.395v4.671c0 1.213.62 1.79 1.568 1.79.948 0 1.569-.553 1.569-1.73v-4.73h2.395v4.658c0 2.714-1.569 3.902-3.988 3.902-2.42 0-3.939-1.212-3.939-3.842zm-7.043.371l-.949-2.39-.96 2.39h1.909zm-2.067-5.15h2.273l3.623 8.464h-2.528l-.62-1.5h-3.283l-.608 1.5h-2.48l3.623-8.465zM27.66 23.01a.653.653 0 01-.573.98l-6.62-.005-6.606-.005-5.298-.003a.653.653 0 01-.572-.98l2.559-4.37a.663.663 0 01.572-.326l6.012.004a.655.655 0 00.573-.979l-.509-.873-2.756-4.721a.666.666 0 00-1.145 0l-.406.693-2.656 4.537a.663.663 0 01-.573.326l-5.11-.004a.653.653 0 01-.573-.98l2.705-4.62L13.303.378a.665.665 0 011.146 0l3.507 6.01 3.098 5.307 6.605 11.316z"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                { hasValidIframeUrl() &&
                    <div style={{ display: 'flex', alignItems: 'center', cursor: 'pointer' }} onClick={ () => restartProcess() }>
                        <svg fill="#858199" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M9 13.5c-2.49 0-4.5-2.01-4.5-4.5S6.51 4.5 9 4.5c1.24 0 2.36.52 3.17 1.33L10 8h5V3l-1.76 1.76C12.15 3.68 10.66 3 9 3 5.69 3 3.01 5.69 3.01 9S5.69 15 9 15c2.97 0 5.43-2.16 5.9-5h-1.52c-.46 2-2.24 3.5-4.38 3.5z"/></svg>
                        <p className="dfont" style={{ margin: '0px', marginLeft: '3px', fontSize: '14px' }}>Start Over</p>
                    </div>
                }
                
                
            </div>
            {/* { !hasValidIframeUrl() &&
                <div style={{ marginBottom: '10px' }}>
                    <ButtonGroup label="Track Source">
                        <Button value="search" isPressed={ trackSource == 'search'} onClick={ () => handleTrackSourceChanged('search') }>Search</Button>
                        <Button value="url" isPressed={ trackSource == 'url'} onClick={ () => handleTrackSourceChanged('url') }>Track URL</Button>
                        <Button value="trending" isPressed={ trackSource == 'trending'} onClick={ () => handleTrackSourceChanged('trending') }>Trending</Button>
                    </ButtonGroup>
                </div>
            } */}
            
            { trackSource == 'url' && !hasValidIframeUrl() &&
                <div>
                    <TextControl
                        type='text'
                        label='Paste A Track Url'
                        value={ trackUrl }
                        onChange={ handleTrackUrlChanged }
                    ></TextControl>
                </div>
            }
            { trackSource == 'search' && !hasValidIframeUrl() &&
                <div>
                    <TextControl
                        type='text'
                        label='Search Audius'
                        value={ attributes.searchQuery }
                        onChange={ handleSearchQueryChanged }
                    ></TextControl>
                </div>
            }
            <div>
                <SelectControl style={{ display: 'flex' }}
                    label="Embed Style"
                    value={ attributes.trackEmbedStyle }
                    options={ [
                        { label: 'Card', value: 'card' },
                        { label: 'Compact', value: 'compact' },
                        { label: 'Tiny', value: 'tiny' }
                    ] }
                    onChange={ handleEmbedStyleChanged }
                ></SelectControl>
                {/* <div style={trackBlockContainer}>
                    { trendingTracks.map( item => {
                        (
                            <div key={item.id} style={ trackBlock }>
                                { item.title }
                            </div>
                        )
                    })
                    }
                </div> */}
                { attributes.iframeUrl &&
                    <div>
                        <iframe src={ attributes.iframeUrl } height={ height } width='100%' allow="encrypted-media"/> 
                    </div>
                }
            </div>
        </div>
      </div>
    )
  }
  const SaveBlock = ({ attributes }) => {
    const url = attributes.iframeUrl
    const trackId = attributes.trackId
    const trackOwnerId = attributes.trackOwnerId
    let height = '120'
    if(attributes.trackEmbedStyle == 'compact'){
        height = '120'
    } else if(attributes.trackEmbedStyle == 'card'){
        height = '400'
    } else if(attributes.trackEmbedStyle == 'tiny'){
        height = '20'
    }
    return(         
        <div>          
            <iframe data-style={attributes.trackEmbedStyle} data-track={trackId} data-owner={trackOwnerId} src={ url } height={ height } width='100%' allow="encrypted-media"/>         
        </div>
    )
  }
 
registerBlockType('audius/embed-block', {
    title: 'Audius',
    icon: 'format-audio',
    attributes: {
        iframeUrl: {
            type: 'string',
            source: 'attribute',
            selector: 'iframe',
            attribute: 'src',
        },
        trackEmbedStyle: {
            type: 'string',
            source: 'attribute',
            selector: 'iframe',
            attribute: 'data-style'
        },
        trackId: {
            type: 'string',
            source: 'attribute',
            selector: 'iframe',
            attribute: 'data-track'
        },
        trackOwnerId: {
            type: 'string',
            source: 'attribute',
            selector: 'iframe',
            attribute: 'data-owner'
        }
    },
    category: 'embed',
    edit: EditBlock,
    save: SaveBlock
})
