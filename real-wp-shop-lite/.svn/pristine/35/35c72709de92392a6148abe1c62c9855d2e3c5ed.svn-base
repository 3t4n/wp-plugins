jQuery(document).ready(function($) {    
    
    // console.log(ajax_object);
    if ( ! $('div.gai').length ) $('body').prepend('<div class=gai>'+ajax_object.preloader+'</div>');

    if (! localStorage.getItem("lastClicked") > 0) localStorage.setItem("lastClicked", 0);

    // $('span.sym').css('visibility', 'visible');

    $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'SHOW_CART',
                preload: ajax_object.preloader,
                symba: ajax_object.symba
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $(ajax_object.cartclass).html(ajax_object.preloader);
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {
                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }
            }
    }); // end ajax

    $(ajax_object.cartclass).on('click','a.add',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(6);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                add: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                // $(ajax_object.cartclass).html(ajax_object.preloader);
                $('.cartpn ' + '.cartmsg'+c).addClass('active');

                $('.apmsg').each(function() {
                    if ( $(this).hasClass('active') ) {
                        $(this).removeClass('active');
                    }
                });
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

                $('.cartpn ' + '.cartmsg'+c).removeClass('active');   

                $('.apmsg').each(function() {
                    if ( $(this).hasClass('active') ) {
                        $(this).removeClass('active');
                    }
                });          
            }
        }); // end ajax
    }); // end on click

    $(ajax_object.cartclass).on('click','a.remove',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(9);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                remove: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                // $(ajax_object.cartclass).html(ajax_object.preloader);
                $('.cartpn ' + '.cartmsg'+c).addClass('active');

                $('.apmsg').each(function() {
                    if ( $(this).hasClass('active') ) {
                        $(this).removeClass('active');
                    }
                });
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

                $('.cartpn ' + '.cartmsg'+c).removeClass('active'); 
            }
        }); 

    }); 


    $(ajax_object.cartclass).on('click','a.clear',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(8);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                clear: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                // $(ajax_object.cartclass).html(ajax_object.preloader);
                $('.cartpn ' + '.cartmsg'+c).addClass('active');

                $('.apmsg').each(function() {
                    if ( $(this).hasClass('active') ) {
                        $(this).removeClass('active');
                    }
                });
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {

            }
        }); // end ajax
        
    }); // end on click


    $(ajax_object.coclass).on('click','a.add',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(6);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                add: true,
                id:c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $('.rwpsprod .prel'+c).addClass('active');

                $('.apmsg').each(function() {
                    // if ( $(this).hasClass('active') ) {
                        // $(this).removeClass('active');
                        $(this).fadeOut('fast');
                    // }
                });
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

                // $('.rwpsprod .apmsg'+c).addClass('active');
                $('.rwpsprod .apmsg'+c).fadeIn('fast');

                $('.rwpsprod .prel'+c).removeClass('active');               
                setTimeout(function() {
                    // $('.rwpsprod .apmsg'+c).removeClass('active'); 
                    $('.rwpsprod .apmsg'+c).fadeOut('fast'); 

                }, 1000);

            }
        }); // end ajax
    }); // end on click

    $(ajax_object.cartclass).on('click','a.clearcart',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(8);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                clearcart: true,
                id:c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $('.simple_cart .ajaximgwrap').addClass('active');
                $('.vkrwps-cart .simple_cart').addClass('active');


                $('.apmsg').each(function() {
                    if ( $(this).hasClass('active') ) {
                        $(this).removeClass('active');
                    }
                });
            },

            success: function(response){
                $(ajax_object.cartclass).html(response);  
            },

            complete: function() {
                $('.simple_cart .ajaximgwrap').removeClass('active');
                $('.vkrwps-cart .simple_cartp').removeClass('active');

            }

        }); // end ajax
    }); // end on click
    
    $(ajax_object.coclass).on('click','a.addco',function(e) {

        e.preventDefault();

        // get id
        c = $(this).attr('class');
        c = c.slice(8);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD_CO',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                addco: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $('.copn ' + '.coprel'+c).addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass).html(response);                    
            },

            complete: function() {

                // clear ajax image div
                $('.copn ' + '.coprel'+c).removeClass('active');

                // do currency symbol
                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

            }

        }); // end ajax

    }); // end on click

    $(ajax_object.coclass).on('click','a.removeco',function(e) {

        e.preventDefault();

        // get id
        c = $(this).attr('class');
        c = c.slice(11);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD_CO',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                removeco: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $('.copn ' + '.coprel'+c).addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass).html(response);    
            },

            complete: function() {

                $('.copn ' + '.coprel'+c).removeClass('active');

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

            }
        }); // end ajax

    }); // end on click

    $(ajax_object.coclass).on('click','a.clearco',function(e) {

        e.preventDefault();

        c = $(this).attr('class');
        c = c.slice(10);

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_PROD_CO',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                clearco: true,
                id: c
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $('.copn ' + '.coprel'+c).addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass).html(response);    
            },

            complete: function() {

                $('.copn ' + '.coprel'+c).removeClass('active');

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }
                
            }

        }); // end ajax

    }); // end on click


    $(ajax_object.coclass).on('click','a.clearcartco',function(){


        var data = {
            action: 'ADD_PROD_CO',
            preload: ajax_object.preloader,
            clearcartco: true
            // id:c
        };

        $.post(ajax_object.ajax_url, data, function(response) {
            $(ajax_object.coclass).html(response);   
        });
        $(ajax_object.coclass + ' .ajaximgwrap').addClass('active');

        return false;
    }); // end on click

    var startp = 0;
    var inc = Math.abs(ajax_object.paging)

    if ( $('.rwps-paging' ).length ) {
        $('.rwps-paging > a').eq(2).addClass('active');
        $('.rwps-paging > a').eq(2).attr('id', 'first');
        $('.rwps-paging > a').eq(-3).attr('id', 'last');
    }

    if ( $('.rwps-c-inner .cat').length ) {
        var catname = $('.rwps-c-inner .cat').attr('class');
        catname = catname.slice(4);
    }
    
    $(ajax_object.coclass + ' .rwps-paging').on('click','a.page',function(e) {
        e.preventDefault(); 

        if ( $(this).hasClass('active') ) {
            return false;
        }

        // get offset 
        var offset = $(this).data('offset');
        // alert(offset);
        // set localStorage
        localStorage.setItem("lastClicked", offset);

        // get paging start
        var ps = $(this).attr('class');
        ps = ps.slice(5);

        $('a.page').each(function() {
            $(this).removeClass('active');
        });
        $(this).addClass('active');

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'PROD_PAGING',
                preload: ajax_object.preloader,
                symba: ajax_object.symba,
                start: ps,
                cat: catname
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {

                $('.rwps-container .abg').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $('.rwps-c-inner').html(response);  
            },

            complete: function() {

                $('.rwps-container .abg').removeClass('active');
                $('div.gai').removeClass('active');

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }

                $('.rwpsprod div.img').each(function() {
                    var imgv = $(this).find('> img');
                    var av = $(this).find('> a');
                    imgv.appendTo(av);
                });

                $('.rwpsprod p.prod-name').each(function() {
                    var sv = $(this).find('> span');
                    var av = $(this).find('> a');
                    sv.appendTo(av);
                });

                $('.rwpsprod div.atc').each(function() {
                    var spanv = $(this).find('p.details > span');
                    var av2 = $(this).find('p.details > a');
                    spanv.appendTo(av2);
                });

                if ( $('.rwps-paging a#last').hasClass('active') ) {
                    $('.rwps-paging a.next').addClass('disabled');
                    $('.rwps-paging a.last').addClass('disabled');
                }
                if ( ! $('.rwps-paging a#last').hasClass('active') ) {
                    if ( $('.rwps-paging a.next').hasClass('disabled') ) {
                        $('.rwps-paging a.next').removeClass('disabled');
                    }
                    if ( $('.rwps-paging a.last').hasClass('disabled') ) {
                        $('.rwps-paging a.last').removeClass('disabled');
                    }
                }

                if ( $('.rwps-paging a#first').hasClass('active') ) {
                    $('.rwps-paging a.prev').addClass('disabled');
                    $('.rwps-paging a.first').addClass('disabled');
                }
                if ( ! $('.rwps-paging a#first').hasClass('active') ) {
                    if ( $('.rwps-paging a.prev').hasClass('disabled') ) {
                        $('.rwps-paging a.prev').removeClass('disabled');
                    }
                    if ( $('.rwps-paging a.first').hasClass('disabled') ) {
                        $('.rwps-paging a.first').removeClass('disabled');
                    }
                }

                $("html, body").animate({ scrollTop: 0 });

            } // end complete

        }); // end ajax

    }); // end on click

    $('.rwps-paging a.next').click(function(e) {
        e.preventDefault();

        if ( $('.rwps-paging a#last').hasClass('active') ) {
            return false;
        }

        $('.rwps-paging a.active').next().click();
    });

    $('.rwps-paging a.last').click(function(e) {
        e.preventDefault();

        if ( $('.rwps-paging a#last').hasClass('active') ) {
            return false;
        }

        $('.rwps-paging a#last').click();
    });

    $('.rwps-paging a.prev').click(function(e) {
        e.preventDefault();

        if ( $('.rwps-paging a#first').hasClass('active') ) {
            return false;
        }

        $('.rwps-paging a.active').prev().click();
    });

    $('.rwps-paging a.first').click(function(e) {
        e.preventDefault();

        if ( $('.rwps-paging a#first').hasClass('active') ) {
            return false;
        }

        $('.rwps-paging a#first').click();
    });

    if ( ajax_object.symba == 'after' ) {
        $('span.sym.one').hide();
    } else if ( ajax_object.symba == 'before' ) {
        $('span.sym.two').hide();
    } else {
        $('span.sym.two').hide();
    }
    
    if ( $('.rwps-paging').length ) {
        var pal = $('.rwps-paging a.page').length;
        if ( pal < 1) {
            $('.rwps-paging').hide();
        } else {
            var wpw = Math.round($('.rwps-paging').outerWidth());
            $('.rwps-paging').css('width', wpw + 25);
            $('.rwps-paging').addClass('active');
        }
    }

    $(ajax_object.coclass).on('click','a.s1',function(e) {
        e.preventDefault();

        var n = $('input#n').val();

        var mn = $('input#mn').val();

        var ln = $('input#ln').val();

        var email = $('input#email').val();

        var a1 = $('input#a1').val();

        var a2 = $('input#a2').val();

        var city = $('input#city').val();

        var zip = $('input#zip').val();

        var country = $('select#country').val();
        countryval = country;
        country = $('select#country option[value='+country+']').text();

        var state = $('select#state').val();
        var stateval = state;
        state = $('select#state option[value='+state+']').text();

        $('div.state').html(stateval);

        var phone = $('input#phone').val();

        var mobile = $('input#mobile').val();

        var fax = $('input#fax').val();

        var rpt = $('input#ppflag').val();

        var notes = $('textarea#notes').val();

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'B2_CHECKOUT',
                n: n,
                mn: mn,
                ln: ln,
                email: email,
                a1: a1,
                a2: a2,
                city: city,
                zip: zip,
                countryval: countryval,
                country: country,
                state: state,
                phone: phone,
                mobile: mobile,
                fax: fax,
                rpt: rpt,
                notes: notes
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $(ajax_object.coclass + ' .ajaximgwrap').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass + ' .vkrwps-co').html(response);    
            },

            complete: function() {

                $(ajax_object.coclass + ' .ajaximgwrap').removeClass('active');
                $('div.gai').removeClass('active');

                if ( ajax_object.symba == 'after' ) {
                    $('span.sym.one').hide();
                } else if ( ajax_object.symba == 'before' ) {
                    $('span.sym.two').hide();
                } else {
                    $('span.sym.two').hide();
                }   

                $('ul#rwpsresults div.close').click(function() {
                    $('input#rwpssearch').val('');
                    $("ul#rwpsresults").fadeOut();
                    $('h4#results-text').fadeOut();
                });
                
            }

        }); // end ajax
    });

    $(ajax_object.coclass).on('click','a.s2',function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'STEP2'
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $(ajax_object.coclass + ' .ajaximgwrap').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass + ' .vkrwps-co').html(response);    
            },

            complete: function() {

                $(ajax_object.coclass + ' .ajaximgwrap').removeClass('active');
                $('div.gai').removeClass('active');

                var sfd = $('div.state').text();

                if ($('select#country').val() == 'USA') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AL>Alabama</option><option value=AK>Alaska</option><option value=AZ>Arizona</option><option value=AR>Arkansas</option><option value=CA>California</option><option value=CO>Colorado</option><option value=CT>Connecticut</option><option value=DE>Delaware</option><option value=DC>District Of Columbia</option><option value=FL>Florida</option><option value=GA>Georgia</option><option value=HI>Hawaii</option><option value=ID>Idaho</option><option value=IL>Illinois</option><option value=IN>Indiana</option><option value=IA>Iowa</option><option value=KS>Kansas</option><option value=KY>Kentucky</option><option value=LA>Louisiana</option><option value=ME>Maine</option><option value=MD>Maryland</option><option value=MA>Massachusetts</option><option value=MI>Michigan</option><option value=MN>Minnesota</option><option value=MS>Mississippi</option><option value=MO>Missouri</option><option value=MT>Montana</option><option value=NE>Nebraska</option><option value=NV>Nevada</option><option value=NH>New Hampshire</option><option value=NJ>New Jersey</option><option value=NM>New Mexico</option><option value=NY>New York</option><option value=NC>North Carolina</option><option value=ND>North Dakota</option><option value=OH>Ohio</option><option value=OK>Oklahoma</option><option value=OR>Oregon</option><option value=PA>Pennsylvania</option><option value=RI>Rhode Island</option><option value=SC>South Carolina</option><option value=SD>South Dakota</option><option value=TN>Tennessee</option><option value=TX>Texas</option><option value=UT>Utah</option><option value=VT>Vermont</option><option value=VA>Virginia</option><option value=WA>Washington</option><option value=WV>West Virginia</option><option value=WI>Wisconsin</option><option value=WY>Wyoming</option>');
                        if (sfd != '') $('#state').val(sfd);

                    } else if ($('select#country').val() == 'IND') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AI>Andaman &amp; Nicobar Islands</option><option value=AN>Andhra Pradesh</option><option value=AR>Arunachal Pradesh</option><option value=AS>Assam</option><option value=BI>Bihar</option><option value=CA>Chandigarh</option><option value=CH>Chhatisgarh</option><option value=DD>Dadra &amp; Nagar Haveli</option><option value=DA>Daman &amp; Diu</option><option value=DE>Delhi</option><option value=GO>Goa</option><option value=GU>Gujarat</option><option value=HA>Haryana</option><option value=HI>Himachal Pradesh</option><option value=JA>Jammu &amp; Kashmir</option><option value=JH>Jharkhand</option><option value=KA>Karnataka</option><option value=KE>Kerala</option><option value=LA>Lakshadweep</option><option value=MD>Madhya Pradesh</option><option value=MH>Maharashtra</option><option value=MN>Manipur</option><option value=ME>Meghalaya</option><option value=MI>Mizoram</option><option value=NA>Nagaland</option><option value=OR>Orissa</option><option value=PO>Pondicherry</option><option value=PU>Punjab</option><option value=RA>Rajasthan</option><option value=SI>Sikkim</option><option value=TA>Tamil Nadu</option><option value=TR>Tripura</option><option value=UT>Uttar Pradesh</option><option value=UA>Uttaranchal</option><option value=WE>West Bengal</option>');
                        if (sfd != '') $('#state').val(sfd);
                    } else if ($('select#country').val() == 'CHN') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="34">Anhui</option><option value="11">Beijing</option><option value="50">Chongqing</option><option value="35">Fujian</option><option value="62">Gansu</option><option value="44">Guangdong</option><option value="45">Guangxi Zhuang</option><option value="52">Guizhou</option><option value="46">Hainan</option><option value="13">Hebei</option><option value="23">Heilongjiang</option><option value="41">Henan</option><option value="42">Hubei</option><option value="43">Hunan</option><option value="32">Jiangsu</option><option value="36">Jiangxi</option><option value="22">Jilin</option><option value="21">Liaoning</option><option value="15">Nei Mongol</option><option value="64">Ningxia Hui</option><option value="63">Qinghai</option><option value="61">Shaanxi</option><option value="37">Shandong</option><option value="31">Shanghai</option><option value="51">Sichuan</option><option value="12">Tianjin</option><option value="65">Xinjiang Uygur</option><option value="54">Xizang</option><option value="53">Yunnan</option><option value="33">Zhejiang</option>');  
                        if (sfd != '') $('#state').val(sfd);

                    } else if ($('select#country').val() == 'AUS') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="AT">Australian Capital Territory</option><option value="NW">New South Wales</option><option value="NT">Northern Territory</option><option value="QL">Queensland</option><option value="SA">South Australia</option><option value="TA">Tasmania</option><option value="VI">Victoria</option><option value="WA">Western Australia</option>');
                        if (sfd != '') $('#state').val(sfd);

                    } else {
                        $('span.bool').removeClass('active');
                        $('select#state').html('<option value=none>none</option>');
                }

                $('div.step2').on('change','select#country',function(e) {

                    if ( $(this).val() != 'none' ) {
                        if ($(this).hasClass('invalid')) $(this).removeClass('invalid');
                        if ( $('span.countryerror').hasClass('active') ) $('span.countryerror').removeClass('active');
                    }

                    if ($(this).val() == 'USA') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AL>Alabama</option><option value=AK>Alaska</option><option value=AZ>Arizona</option><option value=AR>Arkansas</option><option value=CA>California</option><option value=CO>Colorado</option><option value=CT>Connecticut</option><option value=DE>Delaware</option><option value=DC>District Of Columbia</option><option value=FL>Florida</option><option value=GA>Georgia</option><option value=HI>Hawaii</option><option value=ID>Idaho</option><option value=IL>Illinois</option><option value=IN>Indiana</option><option value=IA>Iowa</option><option value=KS>Kansas</option><option value=KY>Kentucky</option><option value=LA>Louisiana</option><option value=ME>Maine</option><option value=MD>Maryland</option><option value=MA>Massachusetts</option><option value=MI>Michigan</option><option value=MN>Minnesota</option><option value=MS>Mississippi</option><option value=MO>Missouri</option><option value=MT>Montana</option><option value=NE>Nebraska</option><option value=NV>Nevada</option><option value=NH>New Hampshire</option><option value=NJ>New Jersey</option><option value=NM>New Mexico</option><option value=NY>New York</option><option value=NC>North Carolina</option><option value=ND>North Dakota</option><option value=OH>Ohio</option><option value=OK>Oklahoma</option><option value=OR>Oregon</option><option value=PA>Pennsylvania</option><option value=RI>Rhode Island</option><option value=SC>South Carolina</option><option value=SD>South Dakota</option><option value=TN>Tennessee</option><option value=TX>Texas</option><option value=UT>Utah</option><option value=VT>Vermont</option><option value=VA>Virginia</option><option value=WA>Washington</option><option value=WV>West Virginia</option><option value=WI>Wisconsin</option><option value=WY>Wyoming</option>');

                    } else if ($(this).val() == 'IND') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AI>Andaman &amp; Nicobar Islands</option><option value=AN>Andhra Pradesh</option><option value=AR>Arunachal Pradesh</option><option value=AS>Assam</option><option value=BI>Bihar</option><option value=CA>Chandigarh</option><option value=CH>Chhatisgarh</option><option value=DD>Dadra &amp; Nagar Haveli</option><option value=DA>Daman &amp; Diu</option><option value=DE>Delhi</option><option value=GO>Goa</option><option value=GU>Gujarat</option><option value=HA>Haryana</option><option value=HI>Himachal Pradesh</option><option value=JA>Jammu &amp; Kashmir</option><option value=JH>Jharkhand</option><option value=KA>Karnataka</option><option value=KE>Kerala</option><option value=LA>Lakshadweep</option><option value=MD>Madhya Pradesh</option><option value=MH>Maharashtra</option><option value=MN>Manipur</option><option value=ME>Meghalaya</option><option value=MI>Mizoram</option><option value=NA>Nagaland</option><option value=OR>Orissa</option><option value=PO>Pondicherry</option><option value=PU>Punjab</option><option value=RA>Rajasthan</option><option value=SI>Sikkim</option><option value=TA>Tamil Nadu</option><option value=TR>Tripura</option><option value=UT>Uttar Pradesh</option><option value=UA>Uttaranchal</option><option value=WE>West Bengal</option>');
                    } else if ($(this).val() == 'CHN') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="34">Anhui</option><option value="11">Beijing</option><option value="50">Chongqing</option><option value="35">Fujian</option><option value="62">Gansu</option><option value="44">Guangdong</option><option value="45">Guangxi Zhuang</option><option value="52">Guizhou</option><option value="46">Hainan</option><option value="13">Hebei</option><option value="23">Heilongjiang</option><option value="41">Henan</option><option value="42">Hubei</option><option value="43">Hunan</option><option value="32">Jiangsu</option><option value="36">Jiangxi</option><option value="22">Jilin</option><option value="21">Liaoning</option><option value="15">Nei Mongol</option><option value="64">Ningxia Hui</option><option value="63">Qinghai</option><option value="61">Shaanxi</option><option value="37">Shandong</option><option value="31">Shanghai</option><option value="51">Sichuan</option><option value="12">Tianjin</option><option value="65">Xinjiang Uygur</option><option value="54">Xizang</option><option value="53">Yunnan</option><option value="33">Zhejiang</option>');

                    } else if ($(this).val() == 'AUS') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="AT">Australian Capital Territory</option><option value="NW">New South Wales</option><option value="NT">Northern Territory</option><option value="QL">Queensland</option><option value="SA">South Australia</option><option value="TA">Tasmania</option><option value="VI">Victoria</option><option value="WA">Western Australia</option>');

                    } else {
                        $('span.bool').removeClass('active');
                        $('select#state').html('<option value=none>none</option>');
                        if ( $('span.stateerror').hasClass('active') ) {
                             $('select#state').removeClass('invalid');
                             $('span.stateerror').removeClass('active');
                        }
                    }
                }); // end on change

                $('div.step2').on('change','select#state',function(e) {
                    var ops = $('select#state').find('option').size();
                    if (ops > 1) {
                        if ( $(this).val() != 'none' ) {
                            if ( $('span.stateerror').hasClass('active') ) {
                                 $('select#state').removeClass('invalid');
                                 $('span.stateerror').removeClass('active');
                            }
                        }
                    }
                });

                $('body').on('blur','input#n',function() {
                    var nc = $(this).val();
                    if ( /^[a-z \.']{2,20}$/i.test(nc) ) {
                        $(this).removeClass('invalid');
                        $('span.nameerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#ln',function() {
                    var lnc = $(this).val();
                    if ( /^[a-z \.\-']{2,25}$/i.test(lnc) ) {
                        $(this).removeClass('invalid');
                        $('span.lastnameerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#email',function() {
                    var emailc = $(this).val();
                    if ( /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(emailc) ) {
                        $(this).removeClass('invalid');
                        $('span.emailerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#a1',function() {
                    var addc = $(this).val();
                    if ( /^[a-z 0-9 \.\-\/ ,']{5,50}$/i.test(addc) ) {
                        $(this).removeClass('invalid');
                        $('span.addresserror').removeClass('active');
                    }
                });

                $('body').on('blur','input#city',function() {
                    var cityc = $(this).val();
                    if ( /^[a-z 0-9 \. ,']{2,25}$/i.test(cityc) ) {
                        $(this).removeClass('invalid');
                        $('span.cityerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#zip',function() {
                    var zipc = $(this).val();
                    if ( /^[a-z 0-9 \.']{2,10}$/i.test(zipc) ) {
                        $(this).removeClass('invalid');
                        $('span.ziperror').removeClass('active');
                    }
                });

                
            } // end complete

        }); // end ajax
    });

    $(ajax_object.coclass).on('click','a.sb',function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'STEP2'
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $(ajax_object.coclass + ' .ajaximgwrap').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass + ' .vkrwps-co').html(response);    
            },

            complete: function() {

                $(ajax_object.coclass + ' .ajaximgwrap').removeClass('active');
                $('div.gai').removeClass('active');

                var sfd = $('div.state').text();

                if ($('select#country').val() == 'USA') {
                        $('span.bool').addClass('active');
                        
                        $('select#state').html('<option value=none>Select</option><option value=AL>Alabama</option><option value=AK>Alaska</option><option value=AZ>Arizona</option><option value=AR>Arkansas</option><option value=CA>California</option><option value=CO>Colorado</option><option value=CT>Connecticut</option><option value=DE>Delaware</option><option value=DC>District Of Columbia</option><option value=FL>Florida</option><option value=GA>Georgia</option><option value=HI>Hawaii</option><option value=ID>Idaho</option><option value=IL>Illinois</option><option value=IN>Indiana</option><option value=IA>Iowa</option><option value=KS>Kansas</option><option value=KY>Kentucky</option><option value=LA>Louisiana</option><option value=ME>Maine</option><option value=MD>Maryland</option><option value=MA>Massachusetts</option><option value=MI>Michigan</option><option value=MN>Minnesota</option><option value=MS>Mississippi</option><option value=MO>Missouri</option><option value=MT>Montana</option><option value=NE>Nebraska</option><option value=NV>Nevada</option><option value=NH>New Hampshire</option><option value=NJ>New Jersey</option><option value=NM>New Mexico</option><option value=NY>New York</option><option value=NC>North Carolina</option><option value=ND>North Dakota</option><option value=OH>Ohio</option><option value=OK>Oklahoma</option><option value=OR>Oregon</option><option value=PA>Pennsylvania</option><option value=RI>Rhode Island</option><option value=SC>South Carolina</option><option value=SD>South Dakota</option><option value=TN>Tennessee</option><option value=TX>Texas</option><option value=UT>Utah</option><option value=VT>Vermont</option><option value=VA>Virginia</option><option value=WA>Washington</option><option value=WV>West Virginia</option><option value=WI>Wisconsin</option><option value=WY>Wyoming</option>');
                        if (sfd != '') $('#state').val(sfd);

                    } else if ($('select#country').val() == 'IND') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AI>Andaman &amp; Nicobar Islands</option><option value=AN>Andhra Pradesh</option><option value=AR>Arunachal Pradesh</option><option value=AS>Assam</option><option value=BI>Bihar</option><option value=CA>Chandigarh</option><option value=CH>Chhatisgarh</option><option value=DD>Dadra &amp; Nagar Haveli</option><option value=DA>Daman &amp; Diu</option><option value=DE>Delhi</option><option value=GO>Goa</option><option value=GU>Gujarat</option><option value=HA>Haryana</option><option value=HI>Himachal Pradesh</option><option value=JA>Jammu &amp; Kashmir</option><option value=JH>Jharkhand</option><option value=KA>Karnataka</option><option value=KE>Kerala</option><option value=LA>Lakshadweep</option><option value=MD>Madhya Pradesh</option><option value=MH>Maharashtra</option><option value=MN>Manipur</option><option value=ME>Meghalaya</option><option value=MI>Mizoram</option><option value=NA>Nagaland</option><option value=OR>Orissa</option><option value=PO>Pondicherry</option><option value=PU>Punjab</option><option value=RA>Rajasthan</option><option value=SI>Sikkim</option><option value=TA>Tamil Nadu</option><option value=TR>Tripura</option><option value=UT>Uttar Pradesh</option><option value=UA>Uttaranchal</option><option value=WE>West Bengal</option>');
                        if (sfd != '') $('#state').val(sfd);
                    } else if ($('select#country').val() == 'CHN') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="34">Anhui</option><option value="11">Beijing</option><option value="50">Chongqing</option><option value="35">Fujian</option><option value="62">Gansu</option><option value="44">Guangdong</option><option value="45">Guangxi Zhuang</option><option value="52">Guizhou</option><option value="46">Hainan</option><option value="13">Hebei</option><option value="23">Heilongjiang</option><option value="41">Henan</option><option value="42">Hubei</option><option value="43">Hunan</option><option value="32">Jiangsu</option><option value="36">Jiangxi</option><option value="22">Jilin</option><option value="21">Liaoning</option><option value="15">Nei Mongol</option><option value="64">Ningxia Hui</option><option value="63">Qinghai</option><option value="61">Shaanxi</option><option value="37">Shandong</option><option value="31">Shanghai</option><option value="51">Sichuan</option><option value="12">Tianjin</option><option value="65">Xinjiang Uygur</option><option value="54">Xizang</option><option value="53">Yunnan</option><option value="33">Zhejiang</option>'); 
                        if (sfd != '') $('#state').val(sfd);

                    } else if ($('select#country').val() == 'AUS') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="AT">Australian Capital Territory</option><option value="NW">New South Wales</option><option value="NT">Northern Territory</option><option value="QL">Queensland</option><option value="SA">South Australia</option><option value="TA">Tasmania</option><option value="VI">Victoria</option><option value="WA">Western Australia</option>');
                        if (sfd != '') $('#state').val(sfd);
                    } else {
                        $('span.bool').removeClass('active');
                        $('select#state').html('<option value=none>none</option>');                     
                    }


                $('div.step2').on('change','select#country',function(e) {
                    if ($(this).val() == 'USA') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AL>Alabama</option><option value=AK>Alaska</option><option value=AZ>Arizona</option><option value=AR>Arkansas</option><option value=CA>California</option><option value=CO>Colorado</option><option value=CT>Connecticut</option><option value=DE>Delaware</option><option value=DC>District Of Columbia</option><option value=FL>Florida</option><option value=GA>Georgia</option><option value=HI>Hawaii</option><option value=ID>Idaho</option><option value=IL>Illinois</option><option value=IN>Indiana</option><option value=IA>Iowa</option><option value=KS>Kansas</option><option value=KY>Kentucky</option><option value=LA>Louisiana</option><option value=ME>Maine</option><option value=MD>Maryland</option><option value=MA>Massachusetts</option><option value=MI>Michigan</option><option value=MN>Minnesota</option><option value=MS>Mississippi</option><option value=MO>Missouri</option><option value=MT>Montana</option><option value=NE>Nebraska</option><option value=NV>Nevada</option><option value=NH>New Hampshire</option><option value=NJ>New Jersey</option><option value=NM>New Mexico</option><option value=NY>New York</option><option value=NC>North Carolina</option><option value=ND>North Dakota</option><option value=OH>Ohio</option><option value=OK>Oklahoma</option><option value=OR>Oregon</option><option value=PA>Pennsylvania</option><option value=RI>Rhode Island</option><option value=SC>South Carolina</option><option value=SD>South Dakota</option><option value=TN>Tennessee</option><option value=TX>Texas</option><option value=UT>Utah</option><option value=VT>Vermont</option><option value=VA>Virginia</option><option value=WA>Washington</option><option value=WV>West Virginia</option><option value=WI>Wisconsin</option><option value=WY>Wyoming</option>');

                    } else if ($(this).val() == 'IND') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value=AI>Andaman &amp; Nicobar Islands</option><option value=AN>Andhra Pradesh</option><option value=AR>Arunachal Pradesh</option><option value=AS>Assam</option><option value=BI>Bihar</option><option value=CA>Chandigarh</option><option value=CH>Chhatisgarh</option><option value=DD>Dadra &amp; Nagar Haveli</option><option value=DA>Daman &amp; Diu</option><option value=DE>Delhi</option><option value=GO>Goa</option><option value=GU>Gujarat</option><option value=HA>Haryana</option><option value=HI>Himachal Pradesh</option><option value=JA>Jammu &amp; Kashmir</option><option value=JH>Jharkhand</option><option value=KA>Karnataka</option><option value=KE>Kerala</option><option value=LA>Lakshadweep</option><option value=MD>Madhya Pradesh</option><option value=MH>Maharashtra</option><option value=MN>Manipur</option><option value=ME>Meghalaya</option><option value=MI>Mizoram</option><option value=NA>Nagaland</option><option value=OR>Orissa</option><option value=PO>Pondicherry</option><option value=PU>Punjab</option><option value=RA>Rajasthan</option><option value=SI>Sikkim</option><option value=TA>Tamil Nadu</option><option value=TR>Tripura</option><option value=UT>Uttar Pradesh</option><option value=UA>Uttaranchal</option><option value=WE>West Bengal</option>');

                    } else if ($(this).val() == 'CHN') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="34">Anhui</option><option value="11">Beijing</option><option value="50">Chongqing</option><option value="35">Fujian</option><option value="62">Gansu</option><option value="44">Guangdong</option><option value="45">Guangxi Zhuang</option><option value="52">Guizhou</option><option value="46">Hainan</option><option value="13">Hebei</option><option value="23">Heilongjiang</option><option value="41">Henan</option><option value="42">Hubei</option><option value="43">Hunan</option><option value="32">Jiangsu</option><option value="36">Jiangxi</option><option value="22">Jilin</option><option value="21">Liaoning</option><option value="15">Nei Mongol</option><option value="64">Ningxia Hui</option><option value="63">Qinghai</option><option value="61">Shaanxi</option><option value="37">Shandong</option><option value="31">Shanghai</option><option value="51">Sichuan</option><option value="12">Tianjin</option><option value="65">Xinjiang Uygur</option><option value="54">Xizang</option><option value="53">Yunnan</option><option value="33">Zhejiang</option>');  

                    } else if ($(this).val() == 'AUS') {
                        $('span.bool').addClass('active');
                        $('select#state').html('<option value=none>Select</option><option value="AT">Australian Capital Territory</option><option value="NW">New South Wales</option><option value="NT">Northern Territory</option><option value="QL">Queensland</option><option value="SA">South Australia</option><option value="TA">Tasmania</option><option value="VI">Victoria</option><option value="WA">Western Australia</option>');

                    } else {
                        $('span.bool').removeClass('active');
                        $('select#state').html('<option value=none>none</option>');
                        if ( $('span.stateerror').hasClass('active') ) {
                             $('select#state').removeClass('invalid');
                             $('span.stateerror').removeClass('active');
                        }
                    }
                }); 

                $('div.step2').on('change','select#state',function(e) {
                    var ops = $('select#state').find('option').size();
                    if (ops > 1) {
                        if ( $(this).val() != 'none' ) {
                            if ( $('span.stateerror').hasClass('active') ) {
                                 $('select#state').removeClass('invalid');
                                 $('span.stateerror').removeClass('active');
                            }
                        }
                    }
                });

                $('body').on('blur','input#n',function() {
                    var nc = $(this).val();
                    if ( /^[a-z \.']{2,20}$/i.test(nc) ) {
                        $(this).removeClass('invalid');
                        $('span.nameerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#ln',function() {
                    var lnc = $(this).val();
                    if ( /^[a-z \.\-']{2,25}$/i.test(lnc) ) {
                        $(this).removeClass('invalid');
                        $('span.lastnameerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#email',function() {
                    var emailc = $(this).val();
                    if ( /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(emailc) ) {
                        $(this).removeClass('invalid');
                        $('span.emailerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#a1',function() {
                    var addc = $(this).val();
                    if ( /^[a-z 0-9 \.\-\/ ,']{5,50}$/i.test(addc) ) {
                        $(this).removeClass('invalid');
                        $('span.addresserror').removeClass('active');
                    }
                });

                $('body').on('blur','input#city',function() {
                    var cityc = $(this).val();
                    if ( /^[a-z 0-9 \. ,']{2,25}$/i.test(cityc) ) {
                        $(this).removeClass('invalid');
                        $('span.cityerror').removeClass('active');
                    }
                });

                $('body').on('blur','input#zip',function() {
                    var zipc = $(this).val();
                    if ( /^[a-z 0-9 \.']{2,10}$/i.test(zipc) ) {
                        $(this).removeClass('invalid');
                        $('span.ziperror').removeClass('active');
                    }
                });

                
            } // end complete

        }); // end ajax
    });

    $(ajax_object.coclass).on('click','a.s3',function(e) {
        e.preventDefault();

        var errors = [];

        var nc = $('input#n').val();
        if ( ! /^[a-z \.']{2,20}$/i.test(nc) ) {
            errors.push('data');

            $('input#n').addClass('invalid');           
            $('span.nameerror').addClass('active');
        }

        var lnc = $('input#ln').val();
        if ( ! /^[a-z \.']{2,25}$/i.test(lnc) ) {
            errors.push('data');

            $('input#ln').addClass('invalid');          
            $('span.lastnameerror').addClass('active');
        }

        var emailc = $('input#email').val();
        if ( ! /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/.test(emailc) ) {
            errors.push('data');
            
            $('input#email').addClass('invalid');           
            $('span.emailerror').addClass('active');
        }

        var addc = $('input#a1').val();
        if ( ! /^[a-z 0-9 \.\-\/ ,']{5,50}$/i.test(addc) ) {
            errors.push('data');
            
            $('input#a1').addClass('invalid');          
            $('span.addresserror').addClass('active');
        }

        var cityc = $('input#city').val();
        if ( ! /^[a-z 0-9 \. ,']{2,25}$/i.test(cityc) ) {
            errors.push('data');
            
            $('input#city').addClass('invalid');            
            $('span.cityerror').addClass('active');
        }

        var zipc = $('input#zip').val();
        if ( ! /^[a-z 0-9 \.']{2,10}$/i.test(zipc) ) {
            errors.push('data');
            
            $('input#zip').addClass('invalid');         
            $('span.ziperror').addClass('active');
        }

        var countryc = $('select#country').val();
        if ( countryc == 'none' ) {
            errors.push('data');
            
            $('select#country').addClass('invalid');            
            $('span.countryerror').addClass('active');
        }

        var statec = $('select#state').val();
        var ops = $('select#state').find('option').size();
        if (ops > 1) {
            if ( statec == 'none' ) {
                errors.push('data');
                
                $('select#state').addClass('invalid');          
                $('span.stateerror').addClass('active');
            }
        }

        if ( errors.length > 0 ) {
            alert('Please complete all mandatory fields');
            return false    
        } 
        

        var n = $('input#n').val();

        var mn = $('input#mn').val();

        var ln = $('input#ln').val();

        var email = $('input#email').val();

        var a1 = $('input#a1').val();

        var a2 = $('input#a2').val();

        var city = $('input#city').val();

        var zip = $('input#zip').val();

        var country = $('select#country').val();
        var countryval = country;
        country = $('select#country option[value='+country+']').text();

        var state = $('select#state').val();
        stateval = state;
        state = $('select#state option[value='+state+']').text();

        $('div.state').html(stateval);

        var phone = $('input#phone').val();

        var mobile = $('input#mobile').val();

        var fax = $('input#fax').val();

        var rpt = $('input#ppflag').val();

        var notes = $('textarea#notes').val();

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'STEP3',
                n: n,
                mn: mn,
                ln: ln,
                email: email,
                a1: a1,
                a2: a2,
                city: city,
                zip: zip,
                countryval: countryval,
                country: country,
                state: state,
                phone: phone,
                mobile: mobile,
                fax: fax,
                rpt: rpt,
                notes: notes
            },
            // dataType: "json",
            cache: false,

            beforeSend: function() {
                $(ajax_object.coclass + ' .ajaximgwrap').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $(ajax_object.coclass + ' .vkrwps-co').html(response);    
            },

            complete: function() {

                $(ajax_object.coclass + ' .ajaximgwrap').removeClass('active');
                $('div.gai').removeClass('active');
                $('div.step3').append($('form#ppform'));
            }

        }); // end ajax
    });

    $(ajax_object.coclass).on('click','.finish-co',function(e) {

        e.preventDefault();

        var cpm = $('div.cpm').text();

        var pt = $("input:radio[name=poc]:checked").val();

        if($('input:radio[name=poc]').is(':checked')) { 
        } else {
            alert('Please choose a payment method');
            return false;
        }

        var dnow = moment().format('Do MMMM YYYY');

        $.ajax({
            type: "POST",
            async: true,
            url: ajax_object.ajax_url,
            data: {
                action: 'ADD_CUST_INFO',
                preload: ajax_object.preloader,
                cpm: cpm,
                dnow: dnow
            },

            cache: false,

            beforeSend: function() {
                $('.vkrwps-co .abg').addClass('active');
                $('div.gai').addClass('active');
            },

            success: function(response){
                $('div.toptext').hide();
                $('div.step3stop').hide();
                $('.step3inner').html('');
                if ( pt == 'paypal') {
                    $('p.ar').html(response);
                    $('input.pp').click();
                } else {
                    $('p.ar').html(ajax_object.ootext);
                }   
                $('a.sb').hide();
                $('a.finish-co').hide();    
            },

            complete: function() {
                $('.vkrwps-co .abg').removeClass('active');
                $('div.gai').removeClass('active');
            }

        }); // end ajax

    });

    
    $(ajax_object.coclass).on('change','input:radio[name=poc]',function(e) {

        var pm = $("input:radio[name=poc]:checked").val();

        $('div.cpm').html(pm);

    });

    function search() {
        var query_value = $('input#rwpssearch').val();
        $('b#search-string').html(query_value);
        if(query_value !== ''){
            $.ajax({
                url: ajax_object.ajax_url,
                type: "POST",               
                data: { 
                    action: 'DO_SEARCH',
                    query: query_value 
                },
                cache: false,
                success: function(html){
    
                    $("ul#rwpsresults").html(html);
                },
                complete: function() {
                    
                    if ( ajax_object.symba == 'after' ) {
                        $('span.sym.one').hide();
                    } else if ( ajax_object.symba == 'before' ) {
                        $('span.sym.two').hide();
                    } else {
                        $('span.sym.two').hide();
                    }   

                    $('ul#rwpsresults div.close').click(function() {
                        $('input#rwpssearch').val('');
                        $("ul#rwpsresults").fadeOut();
                        $('h4#results-text').fadeOut();
                    });
                }
            });
        }return false;    
    }

    $("input#rwpssearch").live("keyup", function(e) {

        if (e.keyCode == 40 || e.keyCode == 38) return false;

        clearTimeout($.data(this, 'timer'));

        var search_string = $(this).val();

        if (search_string == '') {
            $("ul#rwpsresults").fadeOut();
            $('h4#results-text').fadeOut();
        }else{
            $("ul#rwpsresults").fadeIn();
            $('h4#results-text').fadeIn();
            $(this).data('timer', setTimeout(search, 100));
        };
    });

    $('body').on("keydown", function(e) {

        if (e.keyCode == 40) 
        {
            if ($('ul#result').is(':visible')) {
                e.preventDefault();
            }
            
            if ( ! $('ul#rwpsresults').length ) return false;
                
            if ( $('ul#rwpsresults li').hasClass('active') )
            {   
                if ( $('ul#rwpsresults li:last').hasClass('active') )
                {
                    $('ul#rwpsresults li:first').addClass('ex');
                    $('ul#rwpsresults li.active').removeClass('active');                
                    $('ul#rwpsresults li.ex').addClass('active');
                    $('ul#rwpsresults li.active').removeClass('ex');
                }

                else
                {
                    $('ul#rwpsresults li.active').addClass('ex');
                    $('ul#rwpsresults li.active').next().addClass('active');
                    $('ul#rwpsresults li.ex').attr('class', '');
                }
                
            }

            else
            {
                $('ul#rwpsresults li:first').addClass('active');
            }
        }

    });

    $('body').on("keydown", function(e) {

        if (e.keyCode == 38) 
        {
            if ($('ul#result').is(':visible')) {
                e.preventDefault();
            }

            if ( $('ul#rwpsresults').length )
            {               
                if ( $('ul#rwpsresults li').hasClass('active') )
                {   
                    if ( $('ul#rwpsresults li:first').hasClass('active') )
                    {
                        $('ul#rwpsresults li:last').addClass('ex');
                        $('ul#rwpsresults li.active').removeClass('active');                
                        $('ul#rwpsresults li.ex').addClass('active');
                        $('ul#rwpsresults li.active').removeClass('ex');
                    }

                    else
                    {
                        $('ul#rwpsresults li.active').addClass('ex');
                        $('ul#rwpsresults li.active').prev().addClass('active');
                        $('ul#rwpsresults li.ex').attr('class', '');
                    }
                }

                else
                {
                    $('ul#rwpsresults li:last').addClass('active');
                }

            }
        }

    });

    $('body').on("keydown", function(e) {

        if (e.keyCode == 13) 
        {
            if ( $('ul#rwpsresults').length ) {
                $('ul#rwpsresults li.active a.livesearch')[0].click();
            }

            
        }
    });

    $('#rwpssearch').blur(function() {
        $("ul#rwpsresults").fadeOut();
        $('h4#results-text').fadeOut();
        $('#rwpssearch').val('');
        $('#rwpsresults li').removeClass('active');
    });

    // alert('code');

    var ppvk = localStorage.getItem("lastClicked");
    // alert(ppvk);
    if ( ppvk > 0)
    {
        if ($('div.rwps-paging').length)
        {
            $('a.page[data-offset='+ppvk+']')[0].click();
        }
    }

}); // end ready