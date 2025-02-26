jQuery(document).ready(function() {
    jQuery(".required_login").click(function(e) {
        if (!AS_LOGGED_IN) {
            e.preventDefault();
            jQuery('.as_redirectto').val(AS_SEARCHURL+'?'+jQuery(this.form).serialize());
            tb_show(null,"#TB_inline?height=350&width=700&inlineId=as_login",null);
        }
    });
    jQuery(".show_login").click(function(e) {
        e.preventDefault();
        jQuery('.as_redirectto').val('/');
        tb_show(null,"#TB_inline?height=350&width=700&inlineId=as_login",null);
    });
});
