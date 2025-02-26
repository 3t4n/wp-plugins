document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', (e) => {
        if (e.target.closest('.assist-for-wcag-btn-reset') || e.target.classList.contains('assist-for-wcag-btn-reset')) {
            e.target.closest('div').querySelectorAll('input[data-default]').forEach(input => input.value = input.dataset.default)
        }
    });
    document.addEventListener('change', (e) => {
        if (e.target.id === 'assist_for_wcag_load_widget') {
            change(e.target);
        }
    });

    function change(input) {
        if (!input) return;
        if (input.checked) {
            document.querySelectorAll('.assist_for_wcag_load_widget').forEach(el => el.closest('tr').style.display = 'table-row');
            document.querySelectorAll('.assist_for_wcag_not_load_widget').forEach(el => el.closest('tr').style.display = 'none');
        } else {
            document.querySelectorAll('.assist_for_wcag_load_widget').forEach(el => el.closest('tr').style.display = 'none');
            document.querySelectorAll('.assist_for_wcag_not_load_widget').forEach(el => el.closest('tr').style.display = 'table-row');
        }
    }

    change(document.getElementById('assist_for_wcag_load_widget'))
});