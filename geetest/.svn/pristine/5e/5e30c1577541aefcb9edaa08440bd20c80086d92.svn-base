var captchaId = document.getElementById('captcha_id').value
var language = document.getElementById('language').value
var product = "popup"
var handlerEmbed = function (captchaObj) {
    // console.log(window.$);
    var targetBtn = jQuery('.gform_body')
    // var targetBtn = document.getElementsByClassName('gform_body')[0]
    var lot_number = '<input type="hidden" name="lot_number" id="lot_number" value="">'
    var captcha_output = '<input type="hidden" name="captcha_output" id="captcha_output" value="">'
    var pass_token = '<input type="hidden" name="pass_token" id="pass_token" value="">'
    var gen_time = '<input type="hidden" name="gen_time" id="gen_time" value="">'
    targetBtn.before(lot_number)
    targetBtn.before(captcha_output)
    targetBtn.before(pass_token)
    targetBtn.before(gen_time)
    captchaObj.appendTo(".gform_body")
    captchaObj.onSuccess(function (e) {
        var result = captchaObj.getValidate();
        document.getElementById('lot_number').value=result['lot_number'];
        document.getElementById('captcha_output').value=result['captcha_output'];
        document.getElementById('pass_token').value=result['pass_token'];
        document.getElementById('gen_time').value=result['gen_time'];
    })
};
initGeetest4({
    captchaId: captchaId,
    product: product,
    language: language
}, handlerEmbed);