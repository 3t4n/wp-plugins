jQuery(document).ready(function(){

    jQuery('.app_wpadminpasswd_generate_do').pGenerator({
        'bind': 'click',
        'passwordElement': '.app_wpadminpasswd',
        'displayElement': '.app_wpadminpasswd',
        'passwordLength': 18,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': false,
        'onPasswordGenerated': function(generatedPassword) {
        	//alert('My new generated password is ' + generatedPassword);
        }
    });

    jQuery('.app_wploginpasswd_generate_do').pGenerator({
        'bind': 'click',
        'passwordElement': '.app_wploginpasswd',
        'displayElement': '.app_wploginpasswd',
        'passwordLength': 18,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': false,
        'onPasswordGenerated': function(generatedPassword) {
        	//alert('My new generated password is ' + generatedPassword);
        }
    });

});