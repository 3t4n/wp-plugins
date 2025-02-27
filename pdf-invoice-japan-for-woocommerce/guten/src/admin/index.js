import domReady from '@wordpress/dom-ready';
import { createRoot } from '@wordpress/element';
import InvoicejapanAdmin from './components/invoicejapan-admin';

domReady( () => {
    const root = createRoot(
        document.getElementById( 'invoicejapanadmin' )
    );

    root.render( <InvoicejapanAdmin /> );
} );
