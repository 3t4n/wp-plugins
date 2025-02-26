/* eslint-disable semi */
/* eslint-disable no-undef */
/* eslint-disable no-extra-semi */
/* eslint-disable no-useless-escape */
/* eslint-disable no-unused-vars */
/* eslint-disable quotes */
/* eslint-disable indent */
import $ from 'jquery'
import {slick} from 'slick-carousel'

declare global {
	interface JQuery {
		slick(): JQuery;
	}
}

$(()=>{
	// IF IE, ADD CLASS
	let ie9 = /MSIE 9/i.test(navigator.userAgent)
	let ie10 = /MSIE 10/i.test(navigator.userAgent)
	let ie11 = /rv:11.0/i.test(navigator.userAgent)
	if(ie11||ie10||ie9) $(document.body).addClass("isIE")
	if($('.slick-block').length&&!$('.slick-block').hasClass('slick-initialized')) $('.slick-block').slick()
})

export {}