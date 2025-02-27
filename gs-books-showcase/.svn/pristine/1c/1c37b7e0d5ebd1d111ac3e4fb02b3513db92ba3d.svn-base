(function($) {

    class GsBookShowcase extends React.Component {

        static slug = 'gs_book_showcase';

        componentDidUpdate() {
            this.triggerScriptProcess();
        }

        triggerScriptProcess() {
            if ( interval ) return;
            let count = 0;
            let interval = setInterval( () => {
                $(document).trigger( 'gsbooks:scripts:reprocess' );
                if ( count > 20 ) clearInterval( interval );
                count++;
            }, 100 );
        }
      
        render() {
            return <div className='gs-book-showcase' dangerouslySetInnerHTML={{ __html: this.props.__shortcode }}></div>
        }
    }

    $(window).on('et_builder_api_ready', (event, API) => {
        API.registerModules([GsBookShowcase]);
    });

})(jQuery);