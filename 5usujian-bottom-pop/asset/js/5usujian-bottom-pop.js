var wysjBpFront = {
		content: jQuery('.wysj-bp-content'),
		close: jQuery('.wysj-bp-close'),
		submitBtn: jQuery("#wysj-bp-submit"),
		closeSuccess: function(){
			jQuery("#wysj-bp-welcome").removeClass('wysj-bp-welcome-show')
		}
	}
jQuery(function() {
	jQuery(window).load(function() {
		jQuery("#wysj-bp-welcome").removeClass('wysj-preload');
	});
	wysjBpFront.submitBtn.on('click', function(event) {
		jQuery(this).prop("disabled",true).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-sendding').val("正在发送...");
		var data = {};
		data.action = 'wysj_bt_pop_save_submit';
		//推入输入框、下拉菜单数据
		var inputs = jQuery(".wysj-btpop-front-input");
		inputs.removeClass('wysj-required');
		for (var i = 0; i < inputs.length; i++) {
			//当必填无值时
			if (inputs.eq(i).attr('required') == "required" && (inputs.eq(i).val() == "" || inputs.eq(i).val() == null)) {
				inputs.eq(i).addClass('wysj-required')
				wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-failed').val("发送失败，请检查输入内容");
				return
			}else{
				data[inputs.eq(i).attr('name')] = inputs.eq(i).val();
			}
		};
		//推入单选按钮数据
		var radios = jQuery(".wysj-btpop-front-radio:checked");
		for (var s = 0; s < radios.length; s++) {
			data[radios.eq(s).attr('name')] = radios.eq(s).val();
		};
		//推入多选下拉框数据
		var multi = jQuery(".wysj-bp-multi");
		jQuery(".select2-container").removeClass('wysj-required');
		for (var b = 0; b < multi.length; b++) {
			//当必填无值时
			if (multi.eq(b).attr('required') == "required" && (multi.eq(b).val() == "" || multi.eq(b).val() == null)) {
				multi.eq(b).next('span').addClass('wysj-required')
				wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-failed').val("发送失败，请检查输入内容");
				return
			}else{//非必填时
				if (multi.eq(b).val() == null) {
					data[multi.eq(b).attr('name')] = ''
				}else{
					data[multi.eq(b).attr('name')] = multi.eq(b).val().toString();
				}
			}
		};
		jQuery.ajax({
			url: wysj_bottom_pop.ajaxurl,
			type: 'POST',
			data: data,
			beforeSend: function(){

			},
			error: function(){
				wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-failed').val("发送失败，请检查网络");
				jQuery("#wysj-bp-captcha-img").attr("src",wysj_bottom_pop.captchaUrl+"?"+Math.random());
			},
			success: function(res){
				if(res == false || res == ''){
					wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-failed').val("网络错误，请联系网站管理员");
					jQuery("#wysj-bp-captcha-img").attr("src",wysj_bottom_pop.captchaUrl+"?"+Math.random());
					jQuery("input[name=wysj_bp_captcha]").val('')
				}else if(res == "captcha_error"){
					wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-failed').val("发送失败，验证码输入错误");
					jQuery("#wysj-bp-captcha-img").attr("src",wysj_bottom_pop.captchaUrl+"?"+Math.random());
					jQuery("input[name=wysj_bp_captcha]").val('')
				}else{
					wysjBpFront.submitBtn.prop("disabled",false).removeClass('wysj-bp-submit-sendding wysj-bp-submit-success wysj-bp-submit-failed').addClass('wysj-bp-submit-success').val("发送成功");
					jQuery("#wysj-bp-captcha-img").attr("src",wysj_bottom_pop.captchaUrl+"?"+Math.random());
					jQuery("#wysj-bp-welcome").addClass('wysj-bp-welcome-show')
					jQuery("input[name=wysj_bp_captcha]").val('')
				}
			}
		})
		
	});
});