jQuery(function($) {
    $(document).ready(function() {
        $('#restrict_access').on('change', function() {
            $('#protected_roles_field').toggle(this.checked)
        })
    })
})