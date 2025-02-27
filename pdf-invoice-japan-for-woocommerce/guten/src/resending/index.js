import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import InvoicejapanResending from './components/invoicejapan-resending';

domReady( () => {
    const root = createRoot(
        document.getElementById( 'invoicejapanresending' )
    );

    root.render( <InvoicejapanResending /> );
} );
