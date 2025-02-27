jQuery(function($){
  $(document).ready(function(){

    const slideValue = document.getElementById("showmyrangeval");
    const inputSlider = document.getElementById("makemyrange");
    inputSlider.oninput = (()=>{
        let value = inputSlider.value;
        slideValue.textContent = value;
        slideValue.style.left = (value/5) + "%";
        slideValue.classList.add("show");
    });
    inputSlider.onblur = (()=>{
    slideValue.classList.remove("show");
    });

    const slideValue2 = document.getElementById("showmyrangeval2");
    const inputSlider2 = document.getElementById("makemyrange2");
    inputSlider2.oninput = (()=>{
        let value2 = inputSlider2.value;
        slideValue2.textContent = value2;
        slideValue2.style.left = (value2/3) + "%";
        slideValue2.classList.add("show");
    });
    inputSlider2.onblur = (()=>{
    slideValue2.classList.remove("show");
    });


    var changesvgd = ['M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z','M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z','M0,0V6c0,21.6,291,111.46,741,110.26,445.39,3.6,459-88.3,459-110.26V0Z','M1200 0L0 0 598.97 114.72 1200 0z','M1200 0L0 0 892.25 114.72 1200 0z','M1200 120L0 16.48 0 0 1200 0 1200 120z','M649.97 0L550.03 0 599.91 54.12 649.97 0z','M0,0V3.6H580.08c11,0,19.92,5.09,19.92,13.2,0-8.14,8.88-13.2,19.92-13.2H1200V0Z','M1200,0H0V120H281.94C572.9,116.24,602.45,3.86,602.45,3.86h0S632,116.24,923,120h277Z'];

    var defaultcolor = 'rgb(255, 255, 255)';
    var opacitydefault = 1;

    var changesvgdinvert = ['M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z','M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z','M741,116.23C291,117.43,0,27.57,0,6V120H1200V6C1200,27.93,1186.4,119.83,741,116.23Z','M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z','M892.25 114.72L0 0 0 120 1200 120 1200 0 892.25 114.72z','M649.97 0L599.91 54.12 550.03 0 0 0 0 120 1200 120 1200 0 649.97 0z','M600,16.8c0-8.11-8.88-13.2-19.92-13.2H0V120H1200V3.6H619.92C608.88,3.6,600,8.66,600,16.8Z','M602.45,3.86h0S572.9,116.24,281.94,120H923C632,116.24,602.45,3.86,602.45,3.86Z'];

    
    var svginvert = false;
    $(document).ready(function(){

        function svgcreate1(value,clrval){
            $('#mymainsvgelm').css('transform','');
            switch (value) {
                case 'Waves':
                    $('#mymainsvgelm').html('<path d="'+changesvgd[0]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Waves2':
                    $('#mymainsvgelm').html('<path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" style="fill: rgb(255, 255, 255);" opacity=".25"></path><path  d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" style="fill: rgb(255, 255, 255);"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Curve':
                $('#mymainsvgelm').html('<path d="'+changesvgd[1]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Curve2':
                $('#mymainsvgelm').html('<path d="'+changesvgd[2]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Triangle':
                $('#mymainsvgelm').html('<path d="'+changesvgd[3]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Triangle2':
                $('#mymainsvgelm').html('<path d="'+changesvgd[4]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Tilt':
                $('#mymainsvgelm').html('<path d="'+changesvgd[5]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Arrow':
                $('#mymainsvgelm').html('<path d="'+changesvgd[6]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Split':
                $('#mymainsvgelm').html('<path d="'+changesvgd[7]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Book':
                $('#mymainsvgelm').html('<path d="'+changesvgd[8]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
            
                default:
                    break;
            }            
        }

        function svgcreate2(value,clrval){
            switch (value) {
                case 'Waves':
                    $('#mymainsvgelm').html('<path d="'+changesvgdinvert[0]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                    $('#mymainsvgelm').css('transform','rotate(180deg)');
                    
                    break;
                    case 'Waves2':
                        $('#mymainsvgelm').html('<path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" style="fill: rgb(255, 255, 255);" opacity=".25"></path><path  d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" style="fill: rgb(255, 255, 255);"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" style="fill: rgb(255, 255, 255);"></path>');
                        $('#mymainsvgelm path').css('fill',clrval);
                        $('#mymainsvgelm').css('transform','');
                        break;
                case 'Curve':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[1]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Curve2':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[2]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Triangle':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[3]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Triangle2':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[4]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Tilt':
                $('#mymainsvgelm').html('<path d="'+changesvgd[5]+'" style="fill: rgb(255, 255, 255);"></path>');
                    $('#mymainsvgelm path').css('fill',clrval);
                    $('#mymainsvgelm').css('transform','');
                break;
                case 'Arrow':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[5]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm path').css('fill',clrval);
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                break;
                case 'Split':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[6]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
                case 'Book':
                $('#mymainsvgelm').html('<path d="'+changesvgdinvert[7]+'" style="fill: rgb(255, 255, 255);"></path>');
                $('#mymainsvgelm').css('transform','rotate(180deg)');
                    $('#mymainsvgelm path').css('fill',clrval);
                break;
            
                default:
                    break;
            }            
        }
        
        $('#myshapeselect').on('change',function(){
            var clrval =  $('#mymainsvgelm path').css('fill');
            if(svginvert==false){
                svgcreate1(this.value,clrval);
            }else{
                svgcreate2(this.value,clrval);
            }
        });

        function setColorOpacity(colorStr, opacity) {
            if(colorStr.indexOf("rgb(") == 0)
            {
                var rgbaCol = colorStr.replace("rgb(", "rgba(");
                rgbaCol = rgbaCol.replace(")", ", "+opacity+")");
                return rgbaCol;
            }

            if(colorStr.indexOf("rgba(") == 0)
            {
                var rgbaCol = colorStr.substr(0, colorStr.lastIndexOf(",")+1) + opacity + ")";
                return rgbaCol;
            }

            if(colorStr.length == 6)
                colorStr = "#" + colorStr;

            if(colorStr.indexOf("#") == 0)
            {
                var rgbaCol = 'rgba(' + parseInt(colorStr.slice(-6, -4), 16)
                    + ',' + parseInt(colorStr.slice(-4, -2), 16)
                    + ',' + parseInt(colorStr.slice(-2), 16)
                    + ','+opacity+')';
                return rgbaCol;
            }
            return colorStr;
        }
        function convertHex(hex,opacity){
            hex = hex.replace('#','');
            r = parseInt(hex.substring(0,2), 16);
            g = parseInt(hex.substring(2,4), 16);
            b = parseInt(hex.substring(4,6), 16);
            result = 'rgba('+r+','+g+','+b+','+opacity+')';
            return result;
        }

        
        $('#mycustomvalopacity').on('change',function(){
            var clrval =  $('#mymainsvgelm path').css('fill');
            $('#mymainsvgelm path').css('fill',setColorOpacity(clrval,this.value));
            defaultcolor = setColorOpacity(clrval,this.value);
            opacitydefault = this.value;
        });
        // $('#mycustomvalhax').on('change',function(){    
        //     console.log(convertHex(this.value,opacitydefault));
        //     $('#mymainsvgelm path').css('fill',convertHex(this.value,opacitydefault));
        //     defaultcolor = convertHex(this.value,opacitydefault);
        // });

        // Handle color picker change
$('#mycustomvalhax').on('input', function() {
    let hexColor = this.value;
    $('#hexInput').val(hexColor); // Update text input
    applyColor(hexColor);
});

// Handle manual hex input
$('#applyHex').on('click', function() {
    let hexColor = $('#hexInput').val().trim();
    
    if (!/^#([0-9A-F]{3}){1,2}$/i.test(hexColor)) {
        alert("Invalid hex code! Use #RRGGBB format.");
        return;
    }

    $('#mycustomvalhax').val(hexColor); // Update color picker
    applyColor(hexColor);
});

// Function to apply the color to SVG
function applyColor(hex) {
    let rgbaColor = hexToRGBA(hex, opacitydefault);
    $('#mymainsvgelm path').css('fill', rgbaColor);
}

// Convert HEX to RGBA
function hexToRGBA(hex, opacity) {
    hex = hex.replace(/^#/, ''); // Remove #
    if (hex.length === 3) {
        hex = hex.split('').map(char => char + char).join('');
    }
    let r = parseInt(hex.substring(0, 2), 16);
    let g = parseInt(hex.substring(2, 4), 16);
    let b = parseInt(hex.substring(4, 6), 16);
    
    return `rgba(${r}, ${g}, ${b}, ${opacity})`;
}


 
        $('#checkboxID').change(function(){
            if(this.checked){
                $('#mymainsvgelm').css('transform','rotateY(180deg)');
            }else{
                $('#mymainsvgelm').css('transform','');
            }
        });

        $('#checkboxID2').change(function(){
            var clrval =  $('#mymainsvgelm path').css('fill');
            if(this.checked){
                svginvert = true;
                svgcreate2($('#myshapeselect').val(),clrval);
            }else{
                svginvert = false;
                svgcreate1($('#myshapeselect').val(),clrval);
            }
        });

        $('#checkboxID3').change(function(){
            if(this.checked){
               $('.custom-shape-divider').css('top','');
               $('.custom-shape-divider').css('bottom','0px');
               $('.custom-shape-divider').css('transform','rotate(180deg)');
            }else{
                $('.custom-shape-divider').css('top','0px');
                $('.custom-shape-divider').css('bottom','');
                $('.custom-shape-divider').css('transform','');
            }
        });
        
        $('#makemyrange').change(function(){

            $('#mymainsvgelm').css('height',this.value+'px');
            
        });

        $('#makemyrange2').change(function(){

        $('#mymainsvgelm').css('width','calc('+this.value+'% + 1.3px)');

        });

        $('.download-button').click(function(){
            $('.download-popup-modal').show();
            var valuesvg = $('#mymainshapecont div').html();
            var getstle = $('.custom-shape-divider').attr('style');
            $('#svg-content').text('<div style="width:100%; max-width:100%; margin:0px; '+getstle+'">'+valuesvg.toString()+'</div>');
            
        });

            $('#copySVG').click(function(){
            var svgContent = $('#svg-content').text(); // Get the text inside #svg-content

            var tempTextArea = document.createElement("textarea");
            tempTextArea.value = svgContent;
            document.body.appendChild(tempTextArea);

            tempTextArea.select();
            document.execCommand("copy");
            document.body.removeChild(tempTextArea);

            alert("SVG HTML copied to clipboard!");
        });

        $('.crossmodal').click(function(){
            $('.download-popup-modal').hide();
        });

        $('.mycustombk1').click(function(){
          var ab = $('#changesvgbk').attr('src');
          var ab1 = ab.substring(0, ab.length - 5);
          $('#changesvgbk').attr('src',ab1+'2.jpg');
          $('.mycustombk1').addClass('active');
          $('.mycustombk2').removeClass('active');
          $('.mycustombk3').removeClass('active');
        });

        $('.mycustombk2').click(function(){
          var ab = $('#changesvgbk').attr('src');
          var ab1 = ab.substring(0, ab.length - 5);
          $('#changesvgbk').attr('src',ab1+'1.jpg');
          $('.mycustombk2').addClass('active');
          $('.mycustombk1').removeClass('active');
          $('.mycustombk3').removeClass('active');
        });

        $('.mycustombk3').click(function(){
          var ab = $('#changesvgbk').attr('src');
          var ab1 = ab.substring(0, ab.length - 5);
          $('#changesvgbk').attr('src',ab1+'3.jpg');
          $('.mycustombk3').addClass('active');
          $('.mycustombk2').removeClass('active');
          $('.mycustombk1').removeClass('active');
        });

        $('#checkboxpostpage').click(function(){
            var postdata = "action=customshapedividerssave&param=save_customshapedivider&"+$('#csdexitid').serialize();
            console.log(postdata);
            jQuery.post(ajax_object,postdata,function(response){
    
              var data = jQuery.parseJSON(response);
              if(data.status==1){
              // console.log(response);
    
              }else{
                alert('!Oops Something went Wrong.');
              }
            });
        });

       
        

    });


  //end
  });
});
