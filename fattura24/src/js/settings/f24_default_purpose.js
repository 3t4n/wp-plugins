/**
 * Questo file è parte del plugin WooCommerce v3.x di Fattura24
 * Autore: Fattura24.com <info@fattura24.com> 
 *
 * Script con cui imposto il valore predefinito per il campo 'Oggetto'
 * nelle impostazioni generali del plugin. Collegato al pulsante 'Predefinito'
 * a destra del campo di input
 */

window.addEventListener('load', () => {
    let dfPurpose = document.getElementById('fatt-24-inv-default-object');
        dfPurpose.addEventListener('click', function(e) {
        document.getElementById('fatt-24-inv-object').value = 'Ordine E-commerce (N)';
    });
});