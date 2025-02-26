document.addEventListener('DOMContentLoaded', function () {
    const options = accpOptions || {};

    // Disable Right Click
    if (options.disable_all || options.disable_right_click) {
        document.addEventListener('contextmenu', (e) => e.preventDefault());
    }

    // Disable Drag/Drop
    if (options.disable_all || options.disable_drag_drop) {
        document.addEventListener('dragstart', (e) => e.preventDefault());
        document.addEventListener('drop', (e) => e.preventDefault());
    }

    // Disable Text Selection
    if (options.disable_all || options.disable_text_selection) {
        document.body.style.userSelect = 'none'; // Отключение выделения текста через CSS
        document.addEventListener('mousedown', (e) => {
            if (e.button === 0) { // ЛКМ
                e.preventDefault(); // Предотвращаем выделение текста
            }
        });
    }

    // Disable F3, F6, F9, F12
    if (options.disable_all || options.disable_f3 || options.disable_f6 || options.disable_f9 || options.disable_f12) {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'F3' && options.disable_f3) e.preventDefault();
            if (e.key === 'F6' && options.disable_f6) e.preventDefault();
            if (e.key === 'F9' && options.disable_f9) e.preventDefault();
            if (e.key === 'F12' && options.disable_f12) e.preventDefault();
        });
    }

    // Disable CTRL combinations
    if (options.disable_all) {
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && ['c', 'v', 'x', 's', 'a', 'u', 'f', 'p', 'h', 'l', 'k', 'o'].includes(e.key)) {
                e.preventDefault();
            }
        });
    } else {
        if (options.disable_ctrl_c) disableCtrlCombination('c');
        if (options.disable_ctrl_v) disableCtrlCombination('v');
        if (options.disable_ctrl_x) disableCtrlCombination('x');
        if (options.disable_ctrl_s) disableCtrlCombination('s');
        if (options.disable_ctrl_a) disableCtrlCombination('a');
        if (options.disable_ctrl_u) disableCtrlCombination('u');
        if (options.disable_ctrl_f) disableCtrlCombination('f');
        if (options.disable_ctrl_p) disableCtrlCombination('p');
        if (options.disable_ctrl_h) disableCtrlCombination('h');
        if (options.disable_ctrl_l) disableCtrlCombination('l');
        if (options.disable_ctrl_k) disableCtrlCombination('k');
        if (options.disable_ctrl_o) disableCtrlCombination('o');
    }

    // Disable ALT+D
    if (options.disable_all || options.disable_alt_d) {
        document.addEventListener('keydown', (e) => {
            if (e.altKey && e.key === 'd') e.preventDefault();
        });
    }

    // Helper function for disabling CTRL+Key combinations
    function disableCtrlCombination(key) {
        document.addEventListener('keydown', (e) => {
            if ((e.ctrlKey || e.metaKey) && e.key === key) {
                e.preventDefault();
            }
        });
    }
});