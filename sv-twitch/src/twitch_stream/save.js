export default ( { attributes, className } ) => {
    const { 
        username,
        autoplay,
        allowfullscreen,
    } = attributes;

    return (
        <div className={ className }>
            <iframe 
                src={ 
                    'https://player.twitch.tv/?channel=' 
                    + username
					+ '&parent=' + window.location.hostname
                    + '&autoplay=' + autoplay 
                    + '&allowfullscreen=' + allowfullscreen
                } 
                frameborder="0" 
                allowfullscreen=""
                scrolling="no" 
                height="378" 
                width="620"
                ></iframe>
        </div>
    ); 
}