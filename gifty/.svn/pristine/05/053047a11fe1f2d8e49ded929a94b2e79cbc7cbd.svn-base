window.Gifty = {
    key:     gifty_wp_data['module_code'],
    trigger: gifty_wp_data['module_icon_visibility'] === '1'
};

(function (e, t) {
    var n   = e.createElement(t)
    n.async = true
    n.src   = 'https://static.gifty.nl/js/widget.js'
    var r   = e.getElementsByTagName(t)[0]
    r.parentNode.insertBefore(n, r)
})(document, 'script')

window.onload = function () {
    const triggers = document.getElementsByClassName('menu-item-object-gifty-trigger-open')

    for (let i = 0; i < triggers.length; i++) {
        let trigger = triggers[i].getElementsByTagName('a')[0]
        trigger.setAttribute('href', 'javascript:Gifty.toggle();')
    }
}
