// variables;
var income = 30000;
var expenses = 12000;

var roi = 0.05;
var swr = 0.04;

var savings;
var savingrate;

var inputIncome;
var inputExpenses;
var inputSavings;
var inputSavingrate;
var inputNetworth;
var inputReturn;
var inputWithdrawal;

var step;
var oldColumnValue // temp storage var

var touched;

var autoNumericCurrencyOptions = {
    aSep: '.'
    , aDec: ','
    , aSign: ' €'
    , pSign: 's'
    , mDec: '0'
    , wEmpty: 'zero'
    , lZero: 'deny'
};

var autoNumericPercentageOptions = {
    aSep: '.'
    , aDec: ','
    , aSign: ' %'
    , pSign: 's'
    , mDec: '1'
    , wEmpty: 'zero'
    , lZero: 'deny'
    , aPad: false
    , vMax: '100'
};

jQuery(document).ready(function () {
    
    if(jQuery("#calculator_wrapper").length > 0){ 
	    initInputs();  
	    updateFromIncomeExpenses();
	    updateNumbers();
	    updateTable();
	    
	    initGraph();
	    initFaq();
	    
	    jQuery('input').on('focus', function (e) {
	    jQuery(this)
	        .one('mouseup', function () {
	            jQuery(this).select();
	            return false;
	        })
	        .select();
	    });
	    
	    jQuery("#optionen-toggle").click(function() {
	        jQuery("#optionen").slideToggle(150, function() {
	            if(jQuery(this).is(":visible")) {
	                jQuery("#optionen-toggle #chevron").text("▴");
	            } else {
	                jQuery("#optionen-toggle #chevron").text("▾");
	            }
	        });
	    })
	    
	    jQuery("#toggle_table").click(function() {
	       jQuery("#table").slideToggle(150); 
	        jQuery('html, body').animate({
	        scrollTop: jQuery("#toggle_table").offset().top
	    }, 350);
	    });
	    
	    jQuery(".annahmen_toggle").click(function() {
	        jQuery("#faq").slideToggle(150);
	    })
	    
	    inputIncome.blur(function() {
	        updateFromIncomeExpenses();
	        updateNumbers();
	        updateTable();
	    })
	    
	    inputIncome.keyup(function(event){
	        if(event.keyCode == 13){
	            updateFromIncomeExpenses();
	            updateNumbers();
	            updateTable();
	        }
	    });
	    
	    inputExpenses.blur(function() {
	        updateFromIncomeExpenses();
	        updateNumbers();
	        updateTable();
	    })
	     
	    inputExpenses.keyup(function(event){
	        if(event.keyCode == 13){
	            updateFromIncomeExpenses();
	            updateNumbers();
	            updateTable();
	        }
	    });
	    
	    inputSavings.blur(function() {
	        updateFromSavings();
	        updateNumbers();
	        updateTable();
	    })
	    
	    inputSavings.keyup(function(event){
	        if(event.keyCode == 13){
	            updateFromSavings();
	            updateNumbers();
	            updateTable();
	        }
	    });
	    
	    inputSavingrate.blur(function() {
	        updateFromSavingrate();
	        updateNumbers();
	        updateTable();
	    })   
	    
	    inputSavingrate.keyup(function(event){
	        if(event.keyCode == 13){
	            updateFromSavingrate();
	            updateNumbers();
	            updateTable();
	        }
	    });
	    
	    inputNetworth.blur(function() {
	        updateNumbers();
	        updateGraph();
	        updateTable();
	    })
	    
	    inputNetworth.keyup(function(event){
	        if(event.keyCode == 13){
	            updateNumbers();
	            updateGraph();
	            updateTable();
	        }
	    });
	    
	    inputReturn.blur(function() {
	        updateNumbers();
	        updateGraph();
	        updateTable();
	    })
	    
	    inputReturn.keyup(function(event){
	        if(event.keyCode == 13){
	            updateNumbers();
	            updateGraph();
	            updateTable();
	        }
	    });
	                     
	    inputWithdrawal.blur(function() {
	        updateNumbers();
	        updateGraph();
	        updateTable();
	    })
	    
	    inputWithdrawal.keyup(function(event){
	        if(event.keyCode == 13){
	            updateNumbers();
	            updateGraph();
	            updateTable();
	        }
	    });
	
	    initColumns();  
	}
    
});

jQuery(window).resize(function () {
   initGraph();
   initColumns();
});

function initInputs() {
    inputIncome = jQuery("#parameter-einkommen-input");
    inputExpenses = jQuery("#parameter-ausgaben-input");
    inputSavings = jQuery("#parameter-sparrate-input");
    inputSavingrate = jQuery("#parameter-sparquote-input");
    inputNetworth = jQuery("#parameter-vermoegen-input");
    inputReturn = jQuery("#parameter-rendite-input");
    inputWithdrawal = jQuery("#parameter-withdrawal-input");
    inputIncome.autoNumeric('init', autoNumericCurrencyOptions);
    inputExpenses.autoNumeric('init', autoNumericCurrencyOptions);
    inputSavings.autoNumeric('init', autoNumericCurrencyOptions);
    inputSavingrate.autoNumeric('init', autoNumericPercentageOptions);
    inputNetworth.autoNumeric('init', autoNumericCurrencyOptions);
    inputReturn.autoNumeric('init', autoNumericPercentageOptions);
    inputWithdrawal.autoNumeric('init', autoNumericPercentageOptions);
}

function initColumns() {
     jQuery(".column-container").click(function() {
        var value = jQuery(this).data("value");
        updateSavingrate(value);
        oldColumnValue = value;
        updateFromSavingrate();
        updateNumbers();
        updateTable();
    })
}

function updateFromIncomeExpenses() {
    var inc = inputIncome.autoNumeric('get');
    var exp = inputExpenses.autoNumeric('get');
        income = parseFloat(inc);
        expenses = parseFloat(exp);
        updateSavings(income - expenses);
        var savr = Math.round(income - expenses) * 100 / income;
        updateSavingrate(savr);
 
}

function updateFromSavings() {
    var sav = inputSavings.autoNumeric('get');
        savings = parseFloat(sav);
        updateExpenses(income - savings);
        updateSavingrate(Math.round(savings * 100) / income);
}

function updateFromSavingrate() {    
    var savr = inputSavingrate.autoNumeric('get');
    savingrate = savr;
    var sav = Math.round(income * (savingrate / 100));
    updateExpenses(income - sav);
    updateSavings(sav);
    updateGraph();
}

function updateNumbers() {
    var ytr = getYearsToRetirement(savingrate / 100);
    jQuery(".years-to-retirement").text(ytr.toLocaleString());
    jQuery(".savingsrate").text(savingrate.toLocaleString());
}

function updateExpenses(exp) {
    expenses = exp;
    inputExpenses.autoNumeric('set', expenses);
}

function updateSavings(sav) {
    savings = sav;
    inputSavings.autoNumeric('set', savings);
}

function updateSavingrate(savr) {
    savingrate = Math.round( savr * 10) / 10;
    inputSavingrate.autoNumeric('set', savingrate);
}

function initGraph() {

    var w = jQuery("#mq-test").width();
    if(w == 0) {
        step = 10;
       initColumnsContainers(9);        
    } else if(w == 1) {
        step = 5;
        initColumnsContainers(19);  
    } else if(w == 2) {
        step = 2;
        initColumnsContainers(49);  
    }    
    
    jQuery(".column-container").on({
        mouseenter: function(){
            if(touched) {
                touched = false;
                oldColumnValue = "";
                return;
            }
            jQuery(".column", this).addClass("mouseover");
            var value = jQuery(this).data("value");
            oldColumnValue = jQuery(".column-value", this).html();
            jQuery(".column-value", this).html(value);
            jQuery("#years-overlay").show();
            jQuery("#years-overlay").css("bottom", (jQuery(".column", this).outerHeight() +  36) + "px");
            jQuery("#years-overlay").html(getYearsToRetirement(value / 100).toLocaleString() + " Jahre");
        },
        mouseleave: function(){
            jQuery(".column", this).removeClass("mouseover");
            if(oldColumnValue != "") {
                jQuery(".column-value", this).html(oldColumnValue);  
            }            
            jQuery("#years-overlay").hide();
        }
    });

    jQuery(".column-container-inner, .column-value").on('touchstart',function(e, data){
        touched = true;
    });
    
    updateGraph();
}

function updateGraph() {

    var max = getYearsToRetirement((jQuery(".column").first().parent().parent().data("value") / 100));
    var oh = jQuery(".column-container").outerHeight();
        jQuery(".column").each(function(index, element) {
            var value = jQuery(this).parent().parent().data("value");
            var newHeight;
            if(Math.abs(savingrate - value ) <= step/2 && !jQuery(this).parent().parent().prev().hasClass("active")) {
               jQuery(this).parent().parent().addClass("active"); 
                if(!jQuery(this).parent().parent().is(":hover")) {
                    jQuery(".column-value", this).html(savingrate);
                }                
                newHeight = (getYearsToRetirement( savingrate / 100) / max) * oh;
            } else {
                jQuery(this).parent().parent().removeClass("active");
                jQuery(".column-value", this).html(value);
                newHeight = (getYearsToRetirement( value / 100) / max) * oh;
            }
            
            jQuery(this).outerHeight(newHeight);
        //    var valueOffset = newHeight > 40 ? 6 : newHeight + 6;
          //  jQuery(".column-value", this).css("bottom", valueOffset + "px");
        }) 
        
    jQuery("#graph-background").empty();    
    
    var interval = getGridLineInterval(max, oh);
    var count = Math.floor(max / interval);
    var height = interval * (oh / max);
    for(var i = 0; i <= count; i++) {
        jQuery("#graph-background").append("<div class='line' style='height:" + height + "px'><div class='line-number'>" + ((count - i) * interval) + "</div></div>");
    }    
}

function initFaq() {
    jQuery('.faq-element > a').click(function() {
        var elem = jQuery(this).siblings('.faq-content');
        elem.slideToggle(250);
        jQuery('.faq-content').not(elem).slideUp(250);
    });
}

function updateTable() {
    var tbody = jQuery("#table tbody");
    tbody.empty();
    var ytr = getYearsToRetirement(savingrate / 100);
    var initialBalance = inputNetworth.autoNumeric('get');
    var networth = parseFloat(initialBalance);
    var swr = inputWithdrawal.autoNumeric('get') / 100;
    var roi = inputReturn.autoNumeric('get') / 100;
    for(var i = 0; i < Math.ceil(ytr); i++) {        
        var roireturn = ((networth * roi) + (savings * roi/2));        
        var newNetworth = networth += Math.floor(roireturn + savings);
        var swrreturn = ((newNetworth * swr));
        tbody.append("<tr>"
                 + "<td><span>" + (i+1) + "</span></td>"
                 + "<td><span style='white-space: nowrap;'>" + numberWithDots(expenses) + " €</span></td>"
                 + "<td><span style='white-space: nowrap;'>" + numberWithDots(savings) + " €</span></td>"
                 + "<td><span style='white-space: nowrap;'>" + numberWithDots(Math.round(roireturn)) + " €</td>"
                 + "<td><div class='progress'><div class='progress-inner'></div><span style='white-space: nowrap;'>" + (Math.round(swrreturn / expenses * 1000)/10).toLocaleString() + " %</span></div></td>"
                 + "<td><span style='white-space: nowrap;'>" + numberWithDots(Math.round(savings + roireturn)) + " €</span></td>"
                 + "<td><span style='white-space: nowrap;'>" + numberWithDots(Math.round(newNetworth)) + " €</span></td>"
                 + "</tr>");
        networth = newNetworth;
        
        var width = Math.min(1, (swrreturn / expenses));
        jQuery(".progress-inner").last().css("width", (width * 100) + "%");
    }
    var returnPercent = roi * 100;
    jQuery("#returnHead").text(returnPercent.toLocaleString('de-DE'));
    
}

function initColumnsContainers(count) {
    var canvas = jQuery("#graph-canvas");
    var columnWidth = canvas[0].getBoundingClientRect().width / count;    
    canvas.empty();    
    for(var i = 0; i < count; i++) {
        var value = getColumnValue(i + 1);

        var cc = "<div class='column-container' data-value='" + value + "'><div class='column-container-inner'>";
        cc += "<div class='column column-" + i + "' style='height:" + getColumnHeight(count - i) + "%'>";
        cc += "<div class='column-value'>" + value + "<span class='column-value-suffix'>%</span></div>";
        cc += "</div>";
        cc += "</div>";
        cc += "</div>";
        canvas.append(cc);
    }
    jQuery(".column-container").outerWidth(columnWidth);
}

function getColumnHeight(index) {
    
    return index * step;
}

function getColumnValue(index) {
    return index * step;
}

// CALCULATIONS:

function getSavingrate() {
    return getSavings(income, expenses) * 100 / income;
}

function getSavingrateDecimal() {
    return getSavings(income, expenses) / income;
}

function getYearsToRetirement(savingsRate) {
        var initialBalance = inputNetworth.autoNumeric('get');
        var roi = inputReturn.autoNumeric('get') / 100;
        var withdrawalRate = inputWithdrawal.autoNumeric('get') / 100;
        if(withdrawalRate == 0 || savingsRate == 0) return "---";
        var numerator = Math.log((((roi * (1 - savingsRate) * income) / withdrawalRate) + (savingsRate * income)) / ((roi * initialBalance) + (savingsRate * income)));
        var denominator = Math.log(1 + roi);
        var years = numerator / denominator;
        return Math.round(years * 10) / 10;    
}

function getFinalNetworth(expenses) {
    return Math.round(expenses * (1/0.04));
}

function getGridLineInterval(maxYears, height) {
   
    var multipliers = [1, 5,10,20,50,100]; 
    
    var singleYearHeight = height / maxYears;
    var height = singleYearHeight;
    for(var i = 0; i < multipliers.length; i++) {
        var m = multipliers[i];
        height = singleYearHeight * m;
        if(height > 25) {
            return m;
        }        
    }

    return 200;    
}

function numberWithDots(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}