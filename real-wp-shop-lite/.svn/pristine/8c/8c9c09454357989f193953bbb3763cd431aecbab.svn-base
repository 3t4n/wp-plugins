jQuery(document).ready(function($) {

	if ($('a.switch-tmce').length) $('a.switch-tmce').click(); 

	$('select.dropsearch').chosen({
		placeholder_text: "Choose a product..."
	});

	$('select.pc').chosen({
		placeholder_text: "Choose a category..."
	});	

	$('select#dp').chosen({
		placeholder_text: "Choose a product..."
	});	

	$('select#gc').chosen({
		placeholder_text: "Choose a category..."
	});	

	if ($('div.wrap.cats').length) $('select').chosen();
	if ($('div.wrap.payos').length) $('select').chosen();

	$('#wpbody-content').on('change', 'select.dropsearch', function() {


		var sv = $(this).val();
		
		var u = vkrwps_admin.preloader;

		var prodImg = vkrwps_admin.updir + sv + '.jpg';
		var prodImgPath = '<img src=' + prodImg + ' >';

		$.ajax({
		    type: "POST",
		    async: true,
		    url: vkrwps_admin.ajax_url,
		    data: {
		        action: 'EDIT_PROD',
		        sv: sv,
		        preload: vkrwps_admin.preloader
		    },
		    dataType: "json",
		    cache: false,

		    beforeSend: function() {
		    	$('.pl').html(vkrwps_admin.preloader);
		        $('a.switch-tmce').click();

		    },

		    success: function(response){
		        var r = (new Date()).getTime();



				

				$('input#pid').val(response.id);

				$('input#pn').val(response.name);

				$('input#sku').val(response.sku);

				$('select').val( response.cat_id );

				$('textarea#pd').val(response.description);

				$('input#pp').val(response.price);

				$('input#sp').val(response.shipping);

				$('input#pw').val(response.weight);

				var stock = response.in_stock;
				if (stock == 'yes') {
					$("#instockyes").attr('checked', 'checked');
				} else if (stock == 'no') {
					$("#instockno").attr('checked', 'checked');
				}

				$('td.img').html(prodImgPath).find('img').prop('src', function(_, src) {
	                 return src + '?v=' + r;
	            });

				$('select.pc').trigger("liszt:updated");

				tinyMCE.init({
			    	mode : "textareas"
			  	});	
				tinymce.get('pd').setContent(response.description);	
				tinymce.get('ld').setContent(response.long_description);

		    },

		    complete: function(response) {
		    	$('.pl').html('');

				$('div.getpid').click(function() {
					var pid = $('div.getpid').text();
					if (pid != '') {
						$('select.dropsearch').val(pid).trigger('change');
					}
				});
		    }

		}); // end ajax

	});

	$('div.getpid').click(function() {
		var pid = $('div.getpid').text();
		if (pid != '') {
			$('select.dropsearch').val(pid).trigger('change');
		}
	});

	$('div.getpid').trigger('click');	

	$('td.pl').html('');

	$('input.addcat').click(function() {

		var v = $('#cat-name').val();
		
		if ( v.length < 3 ) {
			alert('Please enter category name that is longer than 3 characeters.');
			return false;
		} 

	});

	$('input.editcat').click(function() {

		var v = $('#cns').val();
		var v2 = $('input#new-cat-name').val().length;
		
		if ( v == 'choosecat' ) {
			alert('Please choose a category to edit.');
			return false;
		} 

		if ( v2 < 3 ) {
			alert('Please enter category name that is longer than 3 characeters.');
			return false;
		} 

	});

	$('input.delcat').click(function() {

		if ( confirm( 'Are you sure you want to delete this category?' ) ) {

			var v = $('#dc').val();
		
			if ( v == 'choosecat' ) {
				alert('Please choose a category to delete.');
				return false;
			} 

		} else {
			return false;
		}
	});

	$('input.delpo').click(function() {

		if ( confirm( 'Are you sure you want to delete this payment option?' ) ) {

			var v = $('#delcat').val();
		
			if ( v == 0 ) {
				alert('Please choose a payment option to delete.');
				return false;
			} 

		} else {
			return false;
		}
	});

	$('input.addprod').click(function() {

		var prodName = $('#prod-name').val().length;
		var price = $('#price').val().length;
		var sku = $('#sku').val().length;		
		var priceVal = $('#price').val().length;
		var file = $('input[type="file"]').val();
		var cat = $('select#gc').val();

		if ( prodName < 2 || price < 1 || sku < 1 ||cat == 'choosecat' ) {

			alert('Please fill all the required fields.');

			if ( $('#prod-name').val().length < 2 ) {
				$('#prod-name').addClass('rb');
			}

			if ( $('#price').val().length < 1 ) {
				$('#price').addClass('rb');
			}

			if ( $('#sku').val().length < 1 ) {
				$('#sku').addClass('rb');
			}

			if ( $('select#gc').val() == 'choosecat' ) {
				$('div#gc_chzn').addClass('rb');
			}
			
			return false;
		} 


	});

	$('#prod-name').blur(function() {
		if ( $('#prod-name').val().length > 2 ) {
			$('#prod-name').removeClass('rb');
		}
	});

	$('#price').blur(function() {
		if ( $('#price').val().length > 1 ) {
			$('#price').removeClass('rb');
		}
	});

	$('#sku').blur(function() {
		if ( $('#sku').val().length > 2 ) {
			$('#sku').removeClass('rb');
		}
	});

	$('select#gc').change(function() {
		if ( $('select#gc').val() != 'choosecat' ) {
			$('div#gc_chzn').removeClass('rb');
		}
	});

	$('input.delcat').click(function() {
		var dc = $('select#delcat').val();
		if ( dc == '0' ) {
			alert('Please choose an option to delete');
			return false;
		}
	});

	$('input.addpayo').click(function() {

		var title = $('#title').val().length;
		var slug = $('#slug').val().length;

		if ( title < 2 || slug < 2 ) {
			alert('Please enter both the payment title and slug');
			
			return false;
		}

	});

	$('select.dropsearch').trigger("liszt:updated");
	$('select.pc').trigger("liszt:updated");

	$('#del-prod').click(function() {
		var sv = $('#dp').find(":selected").val();

		if ( sv == 'noval' ) {
			alert('Please choose a product to delete');
			return false;
		}

		if ( confirm( 'Are you sure you want to delete this product?' ) ) {

		} else {
			return false;
		}
	});

	$('table.vkorders').on('click', 'a.modal', function(e) {		
		e.preventDefault();

		// return false;

		var c = $(this).attr('id');
		c = c.slice(2);
		var c2 = 'fullinfo'+c;
		$('div.'+c2).fadeToggle();

	});

	$('table.vkorders').on('click', 'span.close', function() {
		if ( $(this).parent().is(':visible') ) {
			$(this).parent().fadeOut();
		}
	});

	$('table.vkorders').on('click', 'a.del', function(e) {
		e.preventDefault();

		if ( ! confirm('Are you sure you want to delete this order ?') ) return false;

		c = $(this).attr('id');
		c = c.slice(6);

		$.ajax({
		    type: "POST",
		    async: true,
		    url: vkrwps_admin.ajax_url,
		    data: {
		        action: 'DELETE_ORDER_ROW',
		        oid: c,
		        preload: vkrwps_admin.preloader
		    },
		    // dataType: "json",
		    cache: false,

		    beforeSend: function() {
		    	$('.pl').html(vkrwps_admin.preloader);
		    },

		    success: function(response){
		        $('tr.c'+c).html('');
		    },

		    complete: function() {
				
		    }

		}); // end ajax

	}); // end click

	$('table.vkorders').on('click', 'a.upd', function(e) {
		e.preventDefault();

		if ( ! confirm('Are you sure you want to update this order ?') ) return false;

		c = $(this).attr('id');
		c = c.slice(6);

		rn = 'status'+c;

		rv = $('input:radio[name='+rn+']:checked').val();

		$.ajax({
		    type: "POST",
		    async: true,
		    url: vkrwps_admin.ajax_url,
		    data: {
		        action: 'UPDATE_ORDER_STATUS',
		        oid: c,
		        rn: rn,
		        rv: rv,
		        preload: vkrwps_admin.preloader
		    },
		    // dataType: "json",
		    cache: false,

		    beforeSend: function() {
		    	$('.ai'+c).html(vkrwps_admin.preloader);
		    },

		    success: function(response){
		        $('.ai'+c).html(response);
		        setTimeout(function() {
		        	 $('.ai'+c).html('');
		        }, 3000)
		    },

		    complete: function() {
				
		    }

		}); // end ajax

	}); // end click

	var startp = 0;

	if ( $('div.paging' ).length ) {
		var pw = $('div.paging').outerWidth();
		pw = Math.ceil(pw);
		$('div.paging').css({
			'width': pw + 10,
			'margin': '20px auto 0',
			'float': 'none'
		});
		$('div.paging > a').eq(2).addClass('active');
		$('div.paging > a').eq(2).attr('id', 'first');
		$('div.paging > a').eq(-3).attr('id', 'last');
	}

	$('div.paging').on('click','a.page',function(e) {
		e.preventDefault();	

		if ( $(this).hasClass('active') ) {
			return false;
		}

		var ps = $(this).attr('class');
		ps = ps.slice(5);

		$('a.page').each(function() {
			$(this).removeClass('active');
		});
		$(this).addClass('active');

		$.ajax({
		    type: "POST",
		    async: true,
		    url: vkrwps_admin.ajax_url,
		    data: {
		        action: 'ORDERS_PAGING',
		        preload: vkrwps_admin.preloader,
		        start: ps
		    },
		    // dataType: "json",
		    cache: false,

		    beforeSend: function() {
		    	$('.ah').addClass('active');
		    },

		    success: function(response){
				$('table').html(response);	
		    },

		    complete: function() {

		    	$('.ah').removeClass('active');

				if ( $('div.paging a#last').hasClass('active') ) {
					$('div.paging a.next').addClass('disabled');
					$('div.paging a.last').addClass('disabled');
				}
				if ( ! $('div.paging a#last').hasClass('active') ) {
					if ( $('div.paging a.next').hasClass('disabled') ) {
						$('div.paging a.next').removeClass('disabled');
					}
					if ( $('div.paging a.last').hasClass('disabled') ) {
						$('div.paging a.last').removeClass('disabled');
					}
				}

				if ( $('div.paging a#first').hasClass('active') ) {
					$('div.paging a.prev').addClass('disabled');
					$('div.paging a.first').addClass('disabled');
				}
				if ( ! $('div.paging a#first').hasClass('active') ) {
					if ( $('div.paging a.prev').hasClass('disabled') ) {
						$('div.paging a.prev').removeClass('disabled');
					}
					if ( $('div.paging a.first').hasClass('disabled') ) {
						$('div.paging a.first').removeClass('disabled');
					}
				}

				$("html, body").animate({ scrollTop: 0 });

		    } // end complete

		}); // end ajax

	}); // end on click

	$('div.paging a.next').click(function(e) {
		e.preventDefault();

		if ( $('div.paging a#last').hasClass('active') ) {
			return false;
		}

		$('div.paging a.active').next().click();
	});

	$('div.paging a.last').click(function(e) {
		e.preventDefault();

		if ( $('div.paging a#last').hasClass('active') ) {
			return false;
		}

		$('div.paging a#last').click();
	});

	$('div.paging a.prev').click(function(e) {
		e.preventDefault();

		if ( $('div.paging a#first').hasClass('active') ) {
			return false;
		}

		$('div.paging a.active').prev().click();
	});

	$('div.paging a.first').click(function(e) {
		e.preventDefault();

		if ( $('div.paging a#first').hasClass('active') ) {
			return false;
		}

		$('div.paging a#first').click();
	});

	if ( $('div.paging').length ) {
		if ( $('div.paging a').length == 4 ) $('div.paging').hide();
		var pal = $('div.paging a.page').length;
		if ( pal == 1) {
			$('div.paging').hide();
		}
	}

	$('body').on('click', 'div.msg', function() {
		$(this).fadeOut('fast');
	});

}); // end ready