var doughnutData = [
    {
        value: 0,
        color: "#f1b956",
        label: "Web Experiences"
    },
    {
        value: 0,
        color: "#884c86",
        label: "Digital Marketing"
    },
    {
        value: 0,
        color: "#8dd7c9",
        label: "Branding & Identity"
    },
    {
        value: 0,
        color: "#000",
        label: "fourth list"
    },
    {
        value: 0,
        color: "#f00",
        label: "fifth list2"
    },
    {
        value: 1,
        color: "#dfdfdf",
        label: "NONE"
    },

];

window.onload = function () {
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {
        responsive: true,
        animationEasing: "easeOutQuart",
        segmentStrokeWidth: 5,
        segmentStrokeColor: "#f6f6f6",
        showTooltips: true,
        percentageInnerCutout: 85,
    });
};
var amount, dataFeature = '';
$.each(jQuery('.badget-list').find('li'), function (index, value) {
    dataFeature += $(this).data('feature');
    dataFeature += ',';
});
/*var res = dataFeature.split(',');
var totallendth, nul = 0,
    totallentdh = res.length - 1,
    brand = 0,
    brandsngl = 0;*/

$('.badget-list input').on('change', function () {
   
    var d = 0,
        m = 0;
    jQuery(".badget-list input:checked").each(function () {
        d += parseInt(jQuery(this).attr("data-min"), 10);
        m += parseInt(jQuery(this).attr("data-max"), 10);
    });
    /*jQuery("#amount").val(d + " - " + m);
    jQuery(".data-min").attr("data-minval", amount);
    jQuery(".data-max").attr("data-maxval", amount);*/


    /*for (var i = 0, limit = res.length; i < limit - 1; i++) {
        var sngdataFeature = '.' + res[i];

        brand += jQuery(sngdataFeature).find('input:checked').length;
        brandsngl = jQuery(sngdataFeature).find('input:checked').length;


        if (brand == 0) {
            nul = 1;
        }

        myDoughnut.segments[i].value = brandsngl;
        myDoughnut.segments[totallentdh].value = nul;
        myDoughnut.update();
    }*/
   
    
    
var brand = jQuery('.branding-list').find('input:checked').length;
var experienceslist = jQuery('.experiences-list').find('input:checked').length;
var marketinglist = jQuery('.marketing-list').find('input:checked').length;
var fourthlist = jQuery('.fourth-list').find('input:checked').length;
var fourthlist2 = jQuery('.fourth-list2').find('input:checked').length;
 var nul = 0;

    if (brand == 0 && experienceslist == 0 && marketinglist == 0 && fourthlist == 0 && fourthlist2 == 0) {
    	console.log('yes');
        brand = 0;
        experienceslist = 0;
        marketinglist = 0;
        fourthlist = 0;
        fourthlist2 = 0;
        nul = 1;
        //jQuery("input[name=check]").val("");
    } else {
    	console.log('no');
        //jQuery("input[name=check]").val("1");
    }
    myDoughnut.segments[0].value = brand;
    myDoughnut.segments[1].value = experienceslist;
    myDoughnut.segments[2].value = marketinglist;
    myDoughnut.segments[3].value = fourthlist;
    myDoughnut.segments[4].value = fourthlist2;
    myDoughnut.segments[5].value = nul;
    myDoughnut.update();

});