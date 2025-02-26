/**
 * A function implementing the revealing module pattern to house all ajax request. It implements the ajax promise methodology
 * @return {Ajax Promise} promise it returns a promise, I promise that #lamejoke
 *
 * Info:
 * ajaxurl points to admin ajax url for ajax call purposes. Added by wp when script is wp enqueued
 */
var errBackEndAjaxServices = function(){

    var errAddEmailToBlacklist = function( email, reason ){

            return jQuery.ajax({
                url         :   ajaxurl,
                type        :   "POST",
                data        :   { action : "errAddEmailToBlacklist" , email : email, reason : reason },
                dataType    :   "json"
            });

        },
        errDeleteEmailFromBlacklist = function( email ){

            return jQuery.ajax({
                url         :   ajaxurl,
                type        :   "POST",
                data        :   { action : "errDeleteEmailFromBlacklist" , email : email },
                dataType    :   "json"
            });

        },
        errViewEmailSchedule = function( key ){

            return jQuery.ajax({
                url         :   ajaxurl,
                type        :   "POST",
                data        :   { action : "errViewEmailSchedule" , key : key },
                dataType    :   "json"
            });

        },
        errUpdateEmailSchedule = function( key, email_fields ){

            return jQuery.ajax({
                url         :   ajaxurl,
                type        :   "POST",
                data        :   { action : "errUpdateEmailSchedule" , key : key, email_fields : email_fields },
                dataType    :   "json"
            });

        };

    return {
        errAddEmailToBlacklist          :   errAddEmailToBlacklist,
        errDeleteEmailFromBlacklist     :   errDeleteEmailFromBlacklist,
        errViewEmailSchedule            :   errViewEmailSchedule,
        errUpdateEmailSchedule          :   errUpdateEmailSchedule
    }

}();