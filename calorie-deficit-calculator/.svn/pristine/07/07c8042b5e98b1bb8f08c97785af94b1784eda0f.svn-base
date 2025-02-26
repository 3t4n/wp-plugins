jQuery(document).ready(function($){
    $('#cl_online_calorie_deficit').find('.imperial').click(function(){
        $('#cl_online_calorie_deficit').find('.imperial').addClass('col_f');
        $('#cl_online_calorie_deficit').find('.metric').removeClass('col_f');
        $('#cl_online_calorie_deficit').find('.ft_cm').css('display','none');
        $('#cl_online_calorie_deficit').find('.ht_text').text('Height');
        $('#cl_online_calorie_deficit').find('.cw_text').text('Current Weight (lbs)');
        $('#cl_online_calorie_deficit').find('.trw_text').text('Target Weight (lbs)');
        $('#cl_online_calorie_deficit').find('.chng').css('display','block').attr('class','col_12 ft_in');
        $('#cl_online_calorie_deficit').find('.kg_weight').attr({'class':'lbs_weight', 'placeholder':'lbs'});
        $('#cl_online_calorie_deficit').find('.tr_weight').attr('placeholder', 'lbs');
    });
    $('#cl_online_calorie_deficit').find('.metric').click(function(){
        $('#cl_online_calorie_deficit').find('.ft_cm').css('display','block');
        $('#cl_online_calorie_deficit').find('.ft_in').css('display','none').attr('class','col_12 chng');
        $('#cl_online_calorie_deficit').find('.ht_text').text('Height (cm)');
        $('#cl_online_calorie_deficit').find('.cw_text').text('Current Weight (kg)');
        $('#cl_online_calorie_deficit').find('.trw_text').text('Target Weight (kg)');
        $('#cl_online_calorie_deficit').find('.metric').addClass('col_f');
        $('#cl_online_calorie_deficit').find('.imperial').removeClass('col_f');
        $('#cl_online_calorie_deficit').find('.lbs_weight').attr({'class':'kg_weight', 'placeholder':'kg'});
        $('#cl_online_calorie_deficit').find('.tr_weight').attr('placeholder', 'kg');
    });
});
var $ = jQuery.noConflict();

function calculateSum() {
    var ht_in = $('#cl_online_calorie_deficit').find('.ft_in').val();
    var ht_cm = $('#cl_online_calorie_deficit').find('.ft_cm').val();
    var age = $('#cl_online_calorie_deficit').find('.age').val();
    var activity = $('#cl_online_calorie_deficit').find('.activity').val();
    var lbsWeight = $('#cl_online_calorie_deficit').find('.lbs_weight').val();
    var kgWeight = $('#cl_online_calorie_deficit').find('.kg_weight').val();
    var gender = $('#cl_online_calorie_deficit').find('.gender').val();
    var tr_weight = $('#cl_online_calorie_deficit').find('.tr_weight').val();

    if (ht_in) {
        var height = ht_in * 2.54;
    } else {
        var height = ht_cm;
    }
    
    if (($('#cl_online_calorie_deficit').find('.lbs_weight').val() !== '') && ($('#cl_online_calorie_deficit').find('.age').val() !== '')) {
        if (lbsWeight) {
            var weight_kg = lbsWeight / 2.205;
        } else {
            var weight_kg = kgWeight;
        }
        if((tr_weight == '' || tr_weight) > (kgWeight || lbsWeight)){
            $('#cl_online_calorie_deficit').find('.error').css('display','block');
            $('#cl_online_calorie_deficit').find('.error').html('Enter target Weight:');
            setTimeout(function() {
                let msg = $('#cl_online_calorie_deficit').find('.error');
                msg.css('display','none');
            }, 3000);
        }else{
            if (gender == 'male') {
                var BMR = (height * 6.25) + (weight_kg * 10) - (age * 5) + 5;
                var tdee = BMR * activity;
                var weight_loss_cal = 0.8 * tdee;
                var calorie_def_cal = tdee - weight_loss_cal;     
                $('#cl_online_calorie_deficit').find('.result').html(
                    "<table>"+
                        "<tr>"+
                            "<td>Weight Maintenance Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(tdee)+ "</span>  Kcal/day</td>"+
                        "</tr>"+
                        "<tr>"+
                            "<td>Weight Loss Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(weight_loss_cal)+ "</span> Kcal/day</td>"+
                        "</tr>"+
                        "<tr>"+
                            "<td>Deficit Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(calorie_def_cal)+ "</span> Kcal/day</td>"+
                        "</tr>"+
                    "</table>"
                    )
            } else {
                var BMR = (height * 6.25) + (weight_kg * 10) - (age * 5) - 161;
                var tdee = BMR * activity;
                var weight_loss_cal = 0.8 * tdee;
                var calorie_def_cal = tdee - weight_loss_cal; 
                $('#cl_online_calorie_deficit').find('.result').html(
                    "<table>"+
                        "<tr>"+
                            "<td>Weight Maintenance Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(tdee)+ "</span> Kcal/day</td>"+
                        "</tr>"+
                        "<tr>"+
                            "<td>Weight Loss Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(weight_loss_cal)+ "</span> Kcal/day</td>"+
                        "</tr>"+
                        "<tr>"+
                            "<td>Deficit Calories</td>"+
                            "<td> <span class='orgn'>"+Math.round(calorie_def_cal)+ "</span> Kcal/day</td>"+
                        "</tr>"+
                    "</table>"
                    )
            }
            return;
        }
    }else{
        $('#cl_online_calorie_deficit').find('.error').css('display','block');
        $('#cl_online_calorie_deficit').find('.error').html('Please enter Input value:');
        setTimeout(function() {
            let msg = $('#cl_online_calorie_deficit').find('.error');
            msg.css('display','none');
        }, 3000);
    }
}

var inputs = $('#cl_online_calorie_deficit').find('input');
inputs.keyup(function () {
    var anyEmpty = false;
    inputs.each(function () {
        if ($(this).val().trim() === "") {
            anyEmpty = true;
            return false; 
        }
    });
    if (anyEmpty) {
        $('.result').html('');
    }
});


