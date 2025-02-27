/**
 * Questo file è parte del plugin WooCommerce v3.x di Fattura24
 * Autore: Fattura24.com <info@fattura24.com> 
 *
 * Script con cui aggiungo ai link per scaricare il documento
 * l'attributo target="_blank" in modo da aprire una nuova scheda di navigazione
 */

window.addEventListener('load', () => {
    let orderElementsCollection = document.getElementsByClassName('orderPdfView');
    let invoiceElementsCollection = document.getElementsByClassName('invoicePdfView');
    let orderElements = [...orderElementsCollection];
    let invoiceElements = [...invoiceElementsCollection];

    orderElements.forEach(order => {
        order.setAttribute('target', '_blank');
    });

    invoiceElements.forEach(invoice => {
        invoice.setAttribute('target', '_blank');
    })
});    