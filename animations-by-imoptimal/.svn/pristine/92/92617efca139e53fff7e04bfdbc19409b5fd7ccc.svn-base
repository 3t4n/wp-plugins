/* Admin side script */
jQuery(function($) {
    var pageId = document.getElementById('imo-options');
    var instructionsTitle = pageId.getElementsByClassName('imo-instructions');
    var instructionsList = pageId.getElementsByTagName('ol');
    var collapsibleTrigger = pageId.getElementsByClassName('imo-collapsible');
    var collapsibleElement = document.getElementById('imo-animations').getElementsByClassName('form-table');
    var info = pageId.getElementsByClassName('imo-info');
    var items = pageId.getElementsByClassName('imo-items');
    var animationPreview = pageId.getElementsByClassName('preview-button');
    var i;

    instructionsList[0].style.display = "none";

    instructionsTitle[0].addEventListener("click", function() {

        this.classList.toggle("active");

        if (instructionsList[0].style.display === "none") {
            $('.imo-instructions + ol').slideDown();
        } else {
            $('.imo-instructions + ol').slideUp();
        }
    });

    for (i = 0; i < collapsibleTrigger.length; i++) {

        collapsibleElement[i].style.display = "none";

        if (items[i].innerHTML == "") { // if empty
            info[i].innerHTML = imoanimPhp.empty;
        } else {
            info[i].innerHTML = imoanimPhp.selected + items[i].innerHTML;
        }

        collapsibleTrigger[i].addEventListener("click", function() {
            this.classList.toggle("active");
            // The same as collapsibleElement
            var content = this.parentNode.nextElementSibling;
            var jqContent = $(content);
            if (content.style.display === "none") {
                jqContent.slideDown();
            } else {
                jqContent.slideUp();
            }
        });

        animationPreview[i].addEventListener("click", function() {
            // tbody .imo-example-area .example-block
            var exampleBlock = this.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-example-area .example-block');
            // tbody .imo-animation-type
            var animationType = this.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-animation-type').value;
            // tbody .imo-animation-duration
            var animationDuration = this.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-animation-duration').value;
            // tbody .imo-animation-repetition
            var animationRepetition = this.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-animation-repetition').value;
            // tbody .imo-animation-timing
            var animationTiming = this.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-animation-timing').value;
            // tbody .imo-animation-delay
            var animationDelay = this.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector('.imo-animation-delay').value;
            // setting the animation properties
            exampleBlock.style.WebkitAnimationName = animationType;
            exampleBlock.style.animationName = animationType;
            exampleBlock.style.WebkitAnimationDuration = animationDuration;
            exampleBlock.style.animationDuration = animationDuration;
            exampleBlock.style.WebkitAnimationIterationCount = animationRepetition;
            exampleBlock.style.animationIterationCount = animationRepetition;
            exampleBlock.style.WebkitAnimationTimingFunction = animationTiming;
            exampleBlock.style.animationTimingFunction = animationTiming;
            exampleBlock.style.WebkitAnimationDelay = animationDelay;
            exampleBlock.style.animationDelay = animationDelay;
            // converting text into numbers with decimals
            var durationTimeout = parseFloat(animationDuration, 10);
            var delayTimeout = parseFloat(animationDelay, 10);
            // determine the timeout duration; convert to miliseconds
            if (animationRepetition !== 'infinite') { // fix the breaking on infinite
                var overallTimeout = (durationTimeout + delayTimeout) * 1000 * animationRepetition;
            }
            else {
                var overallTimeout = (durationTimeout + delayTimeout) * 1000 * 10;
            }
            // Enable re-triggering the same animation without type change
            setTimeout(function() {
                exampleBlock.style.animationName = '';
            }, overallTimeout);

        });

    }

});