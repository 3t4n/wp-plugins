jQuery(function($){
    $(document).ready(function(){
     

        $('#toogleLeftPanel').click(function(){
            $('#leftPanel').css('left','44px');
        });

        $('#element-close-btn').click(function(){
            $('#leftPanel').css('left','-560px');
        });

        $('#settings-close-btn').click(function(){
          $('#rightPanel').css('right','-560px');
          $('.vform-group').each(function(){
            $(this).removeClass('vform-group-active');
            selectedformelm = '';
          });
        });


        $('#vformbuild').click(function(){
          updateurl(0);
          $('#settingleft').css('left','-560px');
          $('#vform-mainfields').show();
          $('#maincontsetting').hide();
          $('#tooglevformsetting').removeClass('isActive');
          $('#vformbuild').addClass('isActive');

          $('.btn-save').show();
          $('.vform-mainproperties').show();
         });

         
         var emstup = [];
          function tooglevformsetting(){

                // smart tags
                $('.makesmarttagpos').html('');

                $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{admin_email}">{admin_email}</li>');

                $(".vform-group").each(function(){
                  
                    var firstElementWithName = $(this).find('[name]').first();
                    // if (firstElementWithName.length > 0) {
                    //   console.log(firstElementWithName.attr('name'));
                    // }

                    var getprid = $(this).data('batchid');
                    var strfrm = $(this).data('type');
                    var labletext = $(this).children('label').text();
                    labletext = labletext.replace('*','');
                    if(strfrm!='' && strfrm!=undefined && strfrm!='submit'){
                      emstup.push('{'+strfrm+'_id="'+getprid+'"}');
                      $('.makesmarttagpos').append('<li class="clickmergevform" data-field={'+firstElementWithName.attr('name')+'}>'+strfrm+' ('+labletext+')'+'</li>');
                    }
                });

                $('.makesmarttagpos').append('<li class="clickmergevform" data-field="{all_fields}">{all_fields}</li>');

                // smart tags

         }

         function updateurl(value){
          let url = new URL(window.location);
          url.searchParams.set('setting', value);
          history.replaceState({}, '', url.toString());
         }


        var generateid = 0;
        function gen_vform_title(generateid,type){
    
            var a;
    
            switch (type) {
              case 'heading':
                a = '<div class="vform-group" data-type="heading" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text text-headingvf">Heading</span><span class="required">*</span></label><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-description"></div></div>';
    
                break;
              case 'title':
                a = '<div class="vform-group" data-type="title" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Your Title</span><span class="required">*</span></label><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-description"></div></div>';
    
                break;
                case 'singleline':
                  a = '<div class="vform-group" data-type="singleline" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Single Line Text</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-singleline-text"><input type="text" placeholder="" class="primary-input" disabled="" name="singleline[]"></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'paragraph':
                  a = '<div class="vform-group" data-type="paragraph" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Paragraph Text</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-paragraph"><textarea placeholder="" class="primary-input" disabled="" name="paragraph[]"></textarea></div></div><div class="vform-description"></div></div>';
    
                 break;
                 case 'dropdown':
                  a = '<div class="vform-group" data-type="dropdown" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Dropdown</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-dropdown"><select class="primary-input" disabled="" name="dropdown[]"><option value="First Choice">First Choice</option></select></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'multiplechoice':
                  a = '<div class="vform-group" data-type="multiplechoice" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Multiple Choice</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-multiplechoice"><ul class="primary-input"><li class=""><input type="radio" disabled="" value="First Choice" name="multiplechoice[]" >First Choice</li><li class=""><input type="radio" disabled="" value="Second Choice" name="multiplechoice[]">Second Choice</li><li class=""><input type="radio" disabled="" value="Third Choice" name="multiplechoice[]">Third Choice</li></ul></div></div><div class="vform-description"></div></div>';
    
                 break;
                case 'checkboxes':
                 a = '<div class="vform-group" data-type="Checkboxes" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Checkboxes</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-checkbox"><ul class="primary-input"><li class=""><input type="checkbox" disabled="" value="First Choice" name="checkbox[]">First Choice</li><li class=""><input type="checkbox" disabled="" value="Second Choice" name="checkbox[]">Second Choice</li><li class=""><input type="checkbox" disabled="" value="Third Choice" name="checkbox[]">Third Choice</li></ul></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'number':
                 a = '<div class="vform-group" data-type="number" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Numbers</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-number"><input type="number" name="number[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'name':
                 a = '<div class="vform-group" data-type="name" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Name</span><span class="required">*</span></label><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-format-selected"><div class="vform-first-name"><input type="text" placeholder="" class="primary-input" disabled="" name="name__firstname[]"><label class="vform-sub-label">First</label></div><div class="vform-middle-name"><input type="text" placeholder="" class="primary-input" disabled="" name="name__middlename[]"><label class="vform-sub-label">Middle</label></div><div class="vform-last-name"><input type="text" placeholder="" name="name__lastname[]" class="primary-input" disabled=""><label class="vform-sub-label">Last</label></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'email':
                 a = '<div class="vform-group" data-type="email" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Email</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-email"><input type="email" name="email__email[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'submit':
                 a = '<div class="vform-group" data-type="submit" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button></div><div class="vform-format-selected"><button type="submit" data-brand="new" class="vform-main-submit" value="Submit">Submit</button></div></div>';
    
                break;
                case 'websiteurl':
                 a = '<div class="vform-group" data-type="websiteurl" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Website / Url</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-websiteurl"><input type="url" name="websiteurl[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'address':
                  a = '<div class="vform-group" data-type="address" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Address</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-address"><input type="text" name="full_address[]" placeholder="Full Address..." class="primary-input" disabled=""><p></p><input type="text" name="city_name[]" placeholder="City Name..." class="primary-input" disabled=""><p></p><input type="text" name="state_name[]" placeholder="State / Province..." class="primary-input" disabled=""><p></p><input type="number" name="zip_code[]" placeholder="Zip Code..." class="primary-input" disabled=""><p></p><select name="shipping_country[]" class="primary-input" disabled=""><option value="">Select Country</option><option value="">------------------------------</option><option value="US">United States</option><option value="CA">Canada</option><option value="GB">United Kingdom</option><option value="IE">Ireland</option><option value="AU">Australia</option><option value="NZ">New Zealand</option><option value="">------------------------------</option><option value="AF">Afghanistan</option><option value="AX">Aland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba </option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curacao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="CD">Democratic Republic of the Congo</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="TL">East Timor</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="XK">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="KP">North Korea</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="CG">Republic of the Congo</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="BL">Saint Barthelemy</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SX">Sint Maarten</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="KR">South Korea</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syria</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="VI">U.S. Virgin Islands</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'phone':
                  a = '<div class="vform-group" data-type="phone" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Phone</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-phone"><input type="tel" name="phone[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'password':
                  a = '<div class="vform-group" data-type="password" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Password</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-password"><input type="password" name="password[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'datetime':
                  a = '<div class="vform-group" data-type="datetime" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Date & Time</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-datetime"><input type="text" name="datetime[]" class="primary-input datetime-input" data-type="datetime" data-format="mm/dd/yy" readonly placeholder="Click to select" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'hidden':
                  a = '<div class="vform-group" data-type="hidden" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Hidden</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-hidden"><input type="hidden" name="hidden[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
               break;
                case 'pagebreak':
                  a = '<div class="vform-group" data-type="pagebreak" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><br></div>';
    
                break;
                case 'divider':
                  a = '<div class="vform-group" data-type="divider" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><hr></div>';
    
                break;
                case 'termscondition':
                  a = '<div class="vform-group" data-type="termscondition" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-termscondition"><input type="checkbox" required name="termscondition[]" placeholder="" class="primary-input" disabled=""><span class="insidetermscondition">Yes i agree</span></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'link':
                  a = '<div class="vform-group" data-type="link" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-link"><a class="insideclick" href="" target="_self">Click here</a></div></div></div>';
    
                break;
                case 'image':
                  a = '<div class="vform-group" data-type="image" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-image"><img src="https://dummyimage.com/16:9x1080/" class="vfinsideimage"></div></div></div>';
    
                break;
                case 'date':
                  a = '<div class="vform-group" data-type="date" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Date</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-date"><input type="text" name="date[]" class="primary-input datetime-input" data-type="date" data-format="mm/dd/yy" readonly placeholder="Click to select" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'time':
                  a = '<div class="vform-group" data-type="time" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Time</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-time"><input type="text" name="time[]" class="primary-input datetime-input" data-type="time" readonly placeholder="Click to select" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'month':
                  a = '<div class="vform-group" data-type="month" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Months</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-month"><select name="month[]" class="primary-input" disabled=""><option value="none" selected>--Select Month--</option><option value="Janaury">Janaury</option><option value="February">February</option><option value="March">March</option><option value="April">April</option><option value="May">May</option><option value="June">June</option><option value="July">July</option><option value="August">August</option><option value="September">September</option><option value="October">October</option><option value="November">November</option><option value="December">December</option></select></div></div><div class="vform-description"></div></div>';
                  break;
    
                case 'week':
                  a = '<div class="vform-group" data-type="week" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Weeks</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-week"><select name="week[]" placeholder="" class="primary-input" disabled=""><option value="none" selected>--Select Week--</option><option value="Sunday">Sunday</option><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><select></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'color':
                  a = '<div class="vform-group" data-type="color" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><label class="vform-heading"><span class="text">Color</span><span class="required">*</span></label><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-color"><input type="color" name="color[]" placeholder="" class="primary-input" disabled=""></div></div><div class="vform-description"></div></div>';
    
                break;
                case 'button':
                  a = '<div class="vform-group" data-type="button" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-properties"><i class="fa fa-cog" aria-hidden="true"></i><span>Properties</span></button><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-cpy-del dupleftonly"><button type="button" class="sc-Duplicate"><i class="fa fa-clone" aria-hidden="true"></i><span>Duplicate</span></button></div><div class="vform-button"><a href="" class="vfinsidebtn" target="_self" style="background: #0a72bd; color: #fff;text-decoration: none;float: left;padding: 10px 20px;">Click Me</a></div></div></div>';
    
                break;
                case 'recapthca':
                  var getkey = $("#rec_site_key ").val();
                  a = '<div class="vform-group" data-type="recapthca" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-button"><div class="g-recaptcha" data-sitekey="'+getkey+'"></div><input type="hidden" name="recapthca" value="1"></div></div></div>';

                  alert('Save and refresh to view the reCapthca');
    
                break;
                case 'hcapthca':
                  var getkey = $("#hcap_site_key").val();
                  a = '<div class="vform-group" data-type="hcapthca" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-cpy-del"><button type="button" class="sc-Remove"><i class="fa fa-trash" aria-hidden="true"></i><span>Delete</span></button></div><div class="vform-button"><div class="h-captcha" data-sitekey="'+getkey+'" data-theme="light"></div></div></div></div>';

                  alert('Save and refresh to view the hCapthca');

                break;

                case 'fileupload':
                  a = '<div class="vform-group" data-type="fileupload" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-fileupload"><input type="file" name="custom_file'+generateid+'[]" class="primary-input" disabled=""><input type="hidden" name="custom_file_constraints[custom_file'+generateid+'][allowed_file_types]" value="jpg,jpeg,png"><input type="hidden" name="custom_file_constraints[custom_file'+generateid+'][max_file_size]" value="1MB"></div></div></div>';

                break;
    
              default:
    
            }
            return a;
    
        }
        var submitcount = 0;
        var datetimecount = 0;
                
        if($('[name="vformeditmode"]').val()!='' && $('[name="vformeditmode"]').val()!=undefined){
          generateid = $('[name="vformeditmode"]').val();
        }
        
        if($('.vform-main-submit').val()!=undefined){
          submitcount = 1;
          $('#field_item_control_button').addClass('vform-fielddisabled');
          $('.container_vf').removeClass('open');
        }else{

          submitcount = 1;
          $('#field_item_control_button').addClass('vform-fielddisabled');
          $('.container_vf').removeClass('open');
          $('.vform-mainfields-inside').append(gen_vform_title(generateid,'submit'));

          generateid++;

          // $('.container_vf').addClass('open');
        }
        // console.log(submitcount);

        if($('#timepicker-resources').html()!=undefined){
          datetimecount = 1;
        }

        $('#leftPanel .field-item').click(function(){
          // console.log(selectedformelm);
          
            var insidevalue = $(this).data('fieldtype');
            if(insidevalue=='submit' && submitcount==0){
              submitcount = 1;
              $(this).addClass('vform-fielddisabled');
              $('.container_vf').removeClass('open');
              $('.vform-mainfields-inside').append(gen_vform_title(generateid,insidevalue));
            }else if(insidevalue!='submit'){

              // console.log(selectedformelm);
              if(selectedformelm!=''){
                selectedformelm.after(gen_vform_title(generateid, insidevalue));
              }else{
                  $('.vform-mainfields-inside').append(gen_vform_title(generateid, insidevalue));
              }

            }

            let pluginUrl = pluginData.pluginUrl;
            const timepickerScriptsWrapper = `
              <div id="timepicker-resources">
                <link rel="stylesheet" href="`+pluginUrl+`assets/css/vform-datetimepicker.css">
                <script src="`+pluginUrl+`assets/js/vform-datetimepicker.js"></script>
              </div>
            `;
            if((insidevalue=='datetime' || insidevalue=='date') &&  datetimecount == 0){
              $('.vform-mainfields-inside').append(timepickerScriptsWrapper);
              datetimecount = 1;
            }
      
      
            generateid++;


            // saveme();

        });


        

        // clone
        $('#rightPanel .sc-Duplicate').click(function(){
          var mnid =  'vform-group'+$('.perticularvfmids').attr('data-id');
          // console.log(mnid);
          var insidevalue = $('#'+mnid).data('type');
          var insidedata = $('#'+mnid).html();

          if(insidevalue=='submit' && submitcount==0){
            $('#'+mnid).after(gen_vform_title(generateid,insidevalue));
          }else if(insidevalue=='fileupload'){

            var types = $('#'+mnid+' [type="hidden"]').eq(0).val();
            var sizes = $('#'+mnid+' [type="hidden"]').eq(1).val();

            var insidedata = '<div class="vform-group" data-type="fileupload" data-batchid="'+generateid+'" id="vform-group'+generateid+'"><div class="vform-format-selected"><div class="vform-fileupload"><input type="file" name="custom_file'+generateid+'[]" class="primary-input" disabled=""><input type="hidden" name="custom_file_constraints[custom_file'+generateid+'][allowed_file_types]" value="'+types+'"><input type="hidden" name="custom_file_constraints[custom_file'+generateid+'][max_file_size]" value="'+sizes+'"></div></div></div>';
            $('#'+mnid).after(insidedata);


          }else if(insidevalue!='submit'){
            // $('#'+mnid).after(gen_vform_title(generateid,insidevalue));
            $('#'+mnid).after('<div class="vform-group" data-batchid="'+generateid+'" data-type="'+insidevalue+'" id="vform-group'+generateid+'">'+insidedata+'</div>');
            if(insidevalue=='multiplechoice'){
                $('#vform-group'+generateid+' [type="radio"]').attr('name','multiplechoice[]');
            }
          }

          generateid++;
        });
        // clone
        
        var gropudel = true;
         // delete
        $('#rightPanel').delegate(".sc-Remove", "click", function(){
          var a = confirm('Are You Sure?');
          if(a){
            var mnid = 'vform-group'+$('.perticularvfmids').attr('data-id');
            $('#'+mnid).remove();

            var insidevalue = $('#'+mnid).data('type');

            if(insidevalue=='submit'){
              submitcount = 0;
              $('[data-fieldtype="submit"]').removeClass('vform-fielddisabled');
              $('.container_vf').addClass('open');
            }

            if(insidevalue=='datetime' || insidevalue=='date'){
              
              var hasDatetimeOrDate = false;

              // Check if any element in the DOM has a data-type of 'datetime' or 'date'
              $('.vform-group').each(function() {
                  var dataType = $(this).data('type');
                  if (dataType === 'datetime' || dataType === 'date') {
                      hasDatetimeOrDate = true;
                  }
              });
              
              // If no such data-type is found, remove the timepicker and reset the counter
              if (!hasDatetimeOrDate) {
                  $('#timepicker-resources').remove();
                  datetimecount = 0;
              }

             }

            $('#rightPanel').css('right','-560px');
            selectedformelm = '';
            gropudel = true;
          }

        });
        // delete

        // main properties
        $('.vform-mainproperties').click(function(){
          $('.advancedoptionfield').hide();
          $('.standardoptionfield').show();
          $('.vform-group').each(function(){
            $(this).removeClass('vform-group-active');
          });
          $('.showmyclickpropty').text('Box');

          $('.advancedoptionfield').hide();
          $('.vform-label-sf').hide();
          $('.vform-dropdown-sf').hide();
          $('.vform-multichoice-sf').hide();
          $('.vform-checkbox-sf').hide();
          $('.vform-format-sf').hide();
          $('.vform-standard-bottom').hide();
          $('.vform-divider-inf').hide();
          $('.vform-termscondition-sf').hide();
          $('.vform-image-sf').hide();
          $('.vform-link-sf').hide();
          $('.vform-button-sf').hide();

          $('.vform-dateformat-sf').hide();
          $('.vform-mainsetopt').show();
          $('.vform-bkclr').hide();

          $('[name="optionwidth"]').val($('.form-all').get(0).style.width);
          $('[name="optionshadow"]').val($('.form-all').css('box-shadow'));
          $('[name="optionback"]').val(rgbToHex($('.form-all').css('background-color')));

          $('[name="optionpadtop"]').val($('.form-all').css('padding-top'));
          $('[name="optionpadbottom"]').val($('.form-all').css('padding-bottom'));
          $('[name="optionpadleft"]').val($('.form-all').css('padding-left'));
          $('[name="optionpadht"]').val($('.form-all').css('padding-right'));

          $('#rightPanel').css('right','22px');

          $('.vform-submit-sf').hide();
          $('.perticularvfmids').text('#0');

          $('[name="fieldoptionid"]').attr('data-batchid','0');
          $('[name="fieldoptionid"]').val('');


          
          var permanentClasses = ['vform-group', 'ui-sortable-handle', 'vform-group-active', 'format-selected-first-last','format-selected-simple','format-selected-combo-middle-last','form-all','vform-mainfields-inside','ui-sortable','ui-droppable','size-small','size-medium','size-large'];

          var element = $('.form-all');


          var currentClasses = element.attr('class') || '';
          var currentClassList = currentClasses.split(/\s+/);

          $('[name="optionclasses"]').val('');

          var nonPermanentClasses = currentClassList.filter(function (cls) {
              return !permanentClasses.includes(cls);
          });

          $('[name="optionclasses"]').val(nonPermanentClasses.join(' '));



        });

        $('[name="optionwidth"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('width',thvl);
        });

        $('[name="optionshadow"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('box-shadow',thvl);
        });

        $('[name="optionback"]').on('input', function() {
          var thvl = $(this).val();
          $('.form-all').css('background-color',thvl);
        });

        $('[name="optionpadtop"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('padding-top',thvl);
        });
        $('[name="optionpadbottom"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('padding-bottom',thvl);
        });
        $('[name="optionpadleft"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('padding-left',thvl);
        });
        $('[name="optionpadht"]').keyup(function(){
          var thvl = $(this).val();
          $('.form-all').css('padding-right',thvl);
        });


        // main properties

        var selectedform;

        var selectedformelm ='';

        // click properties
        $('#vform-mainfields').delegate(".vform-group", "click", function(){
          selectedformelm = $(this);
          $('.vform-group').each(function(){
            $(this).removeClass('vform-group-active');
          });
          $(this).addClass('vform-group-active');
          $('.vform-mainsetopt').hide();
          console.log(gropudel);
          if(gropudel!=false){


            $('#rightPanel').css('right','22px');
            
            
            var thid = $(this).attr('id');
            var batchid = $(this).data('batchid');
      
             $('.showmyclickpropty').text($('#'+thid).data('type'));
           
             $('.perticularvfmids').show();
              $('.perticularvfmids').text('#'+batchid);
              $('.perticularvfmids').attr('data-id',batchid);
              $('.vform-bkclr').show();

              selectedform = batchid;
      
              $('.vform-standardfields').hide();
              $('.vform-fieldoptions').show();
              $('.vform-shift1').removeClass('vform-fieldactive');
              $('.vform-shift2').addClass('vform-fieldactive');
              $('.advancedoptionfield').show();
              $('.standardoptionfield').show();
      
              $('[name="fieldoptionid"]').val(thid);
              $('[name="fieldoptionid"]').attr('data-batchid',batchid);
      
      
              var thvl1 = $('#'+thid+' .vform-heading .text').text() || '';
                $('[name="optionname"]').val(thvl1);
              
              var thvl1 = $('#'+thid+' .vform-heading .text').css('font-size') || '';
                $('[name="labelfontsize"]').val(thvl1);

              var thvl1 = $('#'+thid+' .vform-termscondition').css('font-size') || '';
                $('[name="termsconditionsize"]').val(thvl1);

              var thvl1 = $('#'+thid+' .vform-heading .text').css('line-height') || '';
                $('[name="labellineheight"]').val(thvl1);

              var thvl1 = $('#'+thid+' .vform-description').css('line-height') || '';
              $('[name="descrlineheight"]').val(thvl1);

              var thvl1 = $('#'+thid+' .vform-termscondition').css('line-height') || '';
              $('[name="termsconditionlineheight"]').val(thvl1);

              var thvl1 = $('#'+thid+' .vform-description').css('font-size') || '';
                $('[name="descrfontsize"]').val(thvl1);

              var thvl2 = $('#'+thid+' .vform-description').text() || '';
                $('[name="optiondescription"]').val(thvl2);
      
              var thvl3 = $('#'+thid+' input').attr('placeholder') || '';
                $('[name="optionplaceholder"]').val(thvl3);

              var dttype = $('#' + thid).attr('data-type');
              var thvl3 = $('#'+thid+' .vform-main-submit').css('border-radius');
              if(thvl3){
                $('[name="bordrraidusinp"]').val(thvl3);
              }else{

                
                if(dttype=='dropdown'){
                  $('[name="bordrraidusinp"]').val($('#'+thid+' select').css('border-radius'));
                }else if(dttype=='paragraph'){
                  $('[name="bordrraidusinp"]').val($('#'+thid+' textarea').css('border-radius'));
                }else{
                  $('[name="bordrraidusinp"]').val($('#'+thid+' input').css('border-radius'));
                }
              }

              var thvl3 = $('#'+thid+' .vform-main-submit').css('border-width');
              if(thvl3){
                $('[name="bordrwdthinp"]').val(thvl3);
              }else{

                if(dttype=='dropdown'){
                  $('[name="bordrwdthinp"]').val($('#'+thid+' select').css('border-width'));
                }else if(dttype=='paragraph'){
                  $('[name="bordrwdthinp"]').val($('#'+thid+' textarea').css('border-width'));
                }else{
                  $('[name="bordrwdthinp"]').val($('#'+thid+' input').css('border-width'));
                }

              }

              $('[name="bordrwdthinp"]').val($('#' + thid + ' hr').css('border-width') || '');
              if($('#' + thid + ' hr').css('border-color')){
                $('[name="bordrcolor"]').val(rgbToHex($('#' + thid + ' hr').css('border-color')) || '');
              }
              $('[name="bordrstyle"]').val($('#' + thid + ' hr').css('border-style') || '');


              var thvl3 = $('#'+thid+' .vform-button a').css('border-radius');
              if(thvl3){
                $('[name="vfbtnradius"]').val(thvl3);
              }
      
              var thvl4 = $('#'+thid).hasClass('nolabel');
              if(thvl4){
                $('[name="optionhidelabel"]').prop('checked', true);
              }else{
                $('[name="optionhidelabel"]').prop('checked', false);
              }

              $('[name="userfulladdressvalhide"]').prop('checked', $(`#${thid} [name="full_address[]"]`).css('display') === 'none');
              $('[name="usercityvalhide"]').prop('checked', $(`#${thid} [name="city_name[]"]`).css('display') === 'none');
              $('[name="userstatevalhide"]').prop('checked', $(`#${thid} [name="state_name[]"]`).css('display') === 'none');
              $('[name="userzipvalhide"]').prop('checked', $(`#${thid} [name="zip_code[]"]`).css('display') === 'none');
              $('[name="usercountryhide"]').prop('checked', $(`#${thid} [name="shipping_country[]"]`).css('display') === 'none');


      
              var thvl5 = $('#'+thid).hasClass('vform-required');
              if(thvl5){
                $('[name="optionrequired"]').prop('checked', true);
              }else{
                $('[name="optionrequired"]').prop('checked', false);
              }
      
              var thvl6 = $('#'+thid).get(0).style.width;
              // var thvl7 = $('#'+thid).hasClass('size-medium');
              // var thvl8 = $('#'+thid).hasClass('size-large');
              $('[name="adfieldsize"]').val(thvl6);
      
              // if(thvl6){
              // }else if(thvl7){
              //   $('[name="adfieldsize"]').val("medium");
              // }else if(thvl8){
              //   $('[name="adfieldsize"]').val("large");
              // }else{
              //   $('[name="adfieldsize"]').val("large");
              // }

              var firstNameLabel = $('#' + thid + ' .vform-first-name');

              if (firstNameLabel.length) {
                  var inputField = firstNameLabel.find('input');
                  $('[name="userfrstnamedfvallabel"]').val(firstNameLabel.find('label').html());
                  $('[name="userfrstname"]').val(inputField.attr('placeholder'));
                  $('[name="userfrstnamedfval"]').val(inputField.val());
              }

              var middleNameLabel = $('#' + thid + ' .vform-middle-name');

              if (middleNameLabel.length) {
                  var inputField = middleNameLabel.find('input');
                  $('[name="usermidddlenamedfvallabel"]').val(middleNameLabel.find('label').html());
                  $('[name="usermiddlename"]').val(inputField.attr('placeholder'));
                  $('[name="usermiddlenamedfval"]').val(inputField.val());
              }

              var lastNameLabel = $('#' + thid + ' .vform-last-name');

              if (lastNameLabel.length) {
                  var inputField = lastNameLabel.find('input');
                  $('[name="userlastnamedfvallabel"]').val(lastNameLabel.find('label').html());
                  $('[name="userlastnam"]').val(inputField.attr('placeholder'));
                  $('[name="userlastnamdfval"]').val(inputField.val());
              }


              var lblmar = $('#' + thid + ' .vform-heading');
              if (lblmar.length) {
                $('[name="labelmartop"]').val(lblmar.css('margin-top'));
                $('[name="labelmarbottom"]').val(lblmar.css('margin-bottom'));
                $('[name="labelmarleft"]').val(lblmar.css('margin-left'));
                $('[name="labelmarrht"]').val(lblmar.css('margin-right'));
                
                $('[name="labelalignment"]').val(lblmar.css('text-align'));
              }

              var lblmar = $('#' + thid + ' .vform-description');
              if (lblmar.length) {
                $('[name="descrmartop"]').val(lblmar.css('margin-top'));
                $('[name="descrmarbottom"]').val(lblmar.css('margin-bottom'));
                $('[name="descrmarleft"]').val(lblmar.css('margin-left'));
                $('[name="descrmarrht"]').val(lblmar.css('margin-right'));
                
                $('[name="descralignment"]').val(lblmar.css('text-align'));
              }

              var lblmar = $('#' + thid + ' .vform-image');
              if (lblmar.length) {
                $('[name="imagealignment"]').val(lblmar.css('text-align'));
              }

              var lblmar = $('#' + thid + ' .vform-termscondition');
              if (lblmar.length) {
                $('[name="termsconditiontransform"]').val(lblmar.css('text-transform'));
              }

              var lblmar = $('.form-all');
              if (lblmar.css('font-family')) {
                $('[name="fontfamilmain"]').val(lblmar.css('font-family'));
              }


              if( $('#' + thid).attr('data-type')=='submit'){
                var lblmar = $('#' + thid + ' .vform-format-selected');
                if (lblmar.length) {
                  $('[name="submitbtnalignment"]').val(lblmar.css('text-align'));
                }
              }

              var lblmar = $('#' + thid + ' .vform-main-submit');
              if (lblmar.length) {
                $('[name="bordrstyle"]').val(lblmar.css('border-style'));
              }else{
                if($('#' + thid + ' input').css('border-style')){

                  if(dttype=='dropdown'){
                    $('[name="bordrstyle"]').val($('#'+thid+' select').css('border-style'));
                  }else if(dttype=='paragraph'){
                    $('[name="bordrstyle"]').val($('#'+thid+' textarea').css('border-style'));
                  }else{
                    $('[name="bordrstyle"]').val($('#' + thid + ' input').css('border-style'));
                  }
                }
              }

              var lblmar = $('#' + thid + ' .vform-termscondition');
              if (lblmar.length) {
                $('[name="termsconditionalignment"]').val(lblmar.css('text-align'));
              }

              var lblmar = $('#' + thid + ' .vform-button');
              if (lblmar.length) {
                $('[name="buttonalignment"]').val(lblmar.css('justify-content'));
              }

              if($('#' + thid).hasClass('format-selected-first-last')){
                $('[name="adfieldformat"]').val('firstlast');
              }
              if($('#' + thid).hasClass('format-selected-combo-middle-last')){
                $('[name="adfieldformat"]').val('combomiddlelast');
              }
              if($('#' + thid).hasClass('format-selected-simple')){
                $('[name="adfieldformat"]').val('simple');
              }

              if(!$('#' + thid).hasClass('format-selected-first-last') && !$('#' + thid).hasClass('format-selected-combo-middle-last') && !$('#' + thid).hasClass('format-selected-simple')){
                $('[name="adfieldformat"]').val('firstmiddlelast');
              }

              $('.select-box').removeClass('active');

              var ondatatype = $('#' + thid).attr('data-type');
              if(ondatatype=='submit' && $('.vform-main-submit[data-brand="new"]').length!=0){
                $('.vform-icons-ao').show();
              }else if(ondatatype=='submit' && $('.vform-main-submit[data-brand="new"]').length==0){
                $('.vform-icons-ao').hide();
              }else if(ondatatype=='heading' || ondatatype=='address' || ondatatype =='datetime' || ondatatype =='paragraph' || ondatatype =='title' || ondatatype =='dropdown' || ondatatype =='Checkboxes' || ondatatype =='multiplechoice' || ondatatype =='image' || ondatatype =='date' || ondatatype =='time' || ondatatype =='divider' || ondatatype =='pagebreak' || ondatatype =='recapthca' || ondatatype =='hcapthca' || ondatatype =='termscondition' || ondatatype =='hidden' || ondatatype =='month' || ondatatype =='week' || ondatatype =='color'){
                $('.vform-icons-ao').hide();
              }else{
                $('.vform-icons-ao').show();
              }

              var link5 = $('#'+thid+' .vform-main-submit').css("border-color");
              if(link5){
                $('[name="bordrcolor"]').val(rgbToHex(link5));
              }else{
                var chk = $('#'+thid+' input').css("border-color");
                if(chk){
                  $('[name="bordrcolor"]').val(rgbToHex(chk));
                }

                if(dttype=='dropdown'){
                  
                  var chk = $('#'+thid+' select').css("border-color");
                  $('[name="bordrcolor"]').val(rgbToHex(chk));
                }else if(dttype=='paragraph'){
                  
                  var chk = $('#'+thid+' textarea').css("border-color");
                  $('[name="bordrcolor"]').val(rgbToHex(chk));
                }


              }


              var dttype = $('#' + thid).attr('data-type');
              if(dttype=='button'){

                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-button i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-button i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-button i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-button i').css("padding-right"));
              
                $('#' + thid + ' .vform-button a').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-button a i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='name'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-format-selected i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-format-selected i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-format-selected i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-format-selected i').css("padding-right"));
              
                $('#' + thid + ' .vform-first-name').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-first-name i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='submit'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-format-selected i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-format-selected i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-format-selected i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-format-selected i').css("padding-right"));
              
                $('#' + thid + ' .vform-format-selected').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-format-selected i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='email'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-email i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-email i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-email i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-email i').css("padding-right"));
              
                $('#' + thid + ' .vform-email').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-email i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='phone'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-phone i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-phone i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-phone i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-phone i').css("padding-right"));
              
                $('#' + thid + ' .vform-phone').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-phone i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='singleline'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-singleline-text i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-singleline-text i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-singleline-text i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-singleline-text i').css("padding-right"));
              
                $('#' + thid + ' .vform-singleline-text').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-singleline-text i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='number'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-number i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-number i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-number i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-number i').css("padding-right"));
              
                $('#' + thid + ' .vform-number').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-number i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='websiteurl'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-websiteurl i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-websiteurl i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-websiteurl i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-websiteurl i').css("padding-right"));
              
                $('#' + thid + ' .vform-websiteurl').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-websiteurl i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='password'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-password i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-password i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-password i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-password i').css("padding-right"));
              
                $('#' + thid + ' .vform-password').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-password i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }else if(dttype=='link'){
                
                $('[name="vficonpaddingtop"]').val($('#'+thid+' .vform-link i').css("padding-top"));
                $('[name="vficonpaddingbottom"]').val($('#'+thid+' .vform-link i').css("padding-bottom"));
                $('[name="vficonpaddingleft"]').val($('#'+thid+' .vform-link i').css("padding-left"));
                $('[name="vficonpaddingright"]').val($('#'+thid+' .vform-link i').css("padding-right"));
              
                $('#' + thid + ' .vform-link a').each(function () {
                    var align = $(this).contents().index($(this).children('i')) === 0 ? 'left' : 'right';
                    $('[name="vficonalign"]').val(align);
                });
              
                var getcls = $('#' + thid+' .vform-link i').attr('class');
                if(getcls){
                  var getsplt = getcls.split('fa ');
                  if (getsplt[1]) {
                      var iconName = getsplt[1].trim(); // Ensure to trim any whitespace
                      $('.select-box[data-icon="' + iconName + '"]').addClass('active');
                  }
                }
              
              }


              
              $('[name="vfinputpaddingtop"]').val($('#'+thid+' input').css("padding-top"));
              $('[name="vfinputbottom"]').val($('#'+thid+' input').css("padding-bottom"));
              $('[name="vfinputleft"]').val($('#'+thid+' input').css("padding-left"));
              $('[name="vfinputpaddinght"]').val($('#'+thid+' input').css("padding-right"));

      
              var thvl9 = $('#'+thid+' .vform-main-submit').val();

             var nwvl = $('#'+thid+' .vform-main-submit').text();
             if(nwvl){
              thvl9 = nwvl;
             }

              $('[name="optiondefaultvalue"]').val(thvl9);

              $('[name="optionrequired"]').show();

              var datatype = $(this).data('type');

              var classval = '';
               classval = $('#'+thid+' input').attr('class');
              if(classval==undefined){

                if(datatype=='dropdown' || datatype=='month' || datatype=='week'){
                  classval = $('#'+thid+' select').attr('class');
                }else if(datatype=='paragraph'){
                  classval = $('#'+thid+' textarea').attr('class');
                }else if(datatype=='multiplechoice'){
                  classval = $('#'+thid+' ul').attr('class');
                }

              }
              
              if(classval!=undefined){
                var splclass = classval.split('primary-input');
                $('.addclassvalue').text(splclass[1]);
              }

              if(datatype=='datetime' || datatype=='date'){
                var getformt = $('#'+thid+' .primary-input').attr('data-format');
                $('[name="vformdateformat"]').val(getformt);
              }

              
              var link5 = $('#'+thid+' .vform-heading').css("color");
              if(link5){
                $('[name="vflabelcolor"]').val(rgbToHex(link5));
              }
              var link5 = $('#'+thid+' .vform-termscondition').css("color");
              if(link5){
                $('[name="termsconditioncolor"]').val(rgbToHex(link5));
              }

              var link5 = $('#'+thid+' .vform-description').css("color");
              if(link5){
                $('[name="vfdescrcolor"]').val(rgbToHex(link5));
              }

              var link5 = $('#'+thid).css("background-color");
              if(link5){
                $('[name="divbkclr"]').val(rgbToHex(link5));
              }

              if(datatype=='fileupload'){

                let fileTypeData = $('#'+thid+' [type="hidden"]').eq(0).val() || '';
                let selectedFileTypes = fileTypeData.split(',');
                $('#filetypes').val(selectedFileTypes).trigger('change');
                
                $('[name="filszeupload"]').val($('#'+thid+' [type="hidden"]').eq(1).val() || '');
                
                var isMultiple = $('#'+thid+' [type="file"]').is('[multiple]');
                $('[name="fileselection"]').val(isMultiple ? 'multiple' : '');

              }

              if(datatype=='submit'){
                $('.css-btnduprem').hide();
              }else{
                $('.css-btnduprem').show();
              }


              if(datatype=='image' || datatype=='divider' || datatype=='termscondition'|| datatype=='link'|| datatype=='button'){
                $('.vform-standard-required').hide();
              }else{
                $('.vform-standard-required').show();
              }

              if(datatype=='divider'){
                $('.vform-bordrraidusinponlyforhr-ao').show();
              }else{
                $('.vform-bordrraidusinponlyforhr-ao').hide();
              }

              

              
      

              // classes

               var permanentClasses = ['vform-group', 'ui-sortable-handle', 'vform-group-active', 'format-selected-first-last','format-selected-simple','format-selected-combo-middle-last','form-all','vform-mainfields-inside','ui-sortable','ui-droppable','size-small','size-medium','size-large'];

              var element = $('#' + thid);


              var currentClasses = element.attr('class') || '';
              var currentClassList = currentClasses.split(/\s+/);

              $('[name="optionclasses"]').val('');

              var nonPermanentClasses = currentClassList.filter(function (cls) {
                  return !permanentClasses.includes(cls);
              });

              $('[name="optionclasses"]').val(nonPermanentClasses.join(' '));
              // classes


              $('.vform-fileupload-sf').hide();

              // console.log(datatype);
              if(datatype=='name'){

                $('.vform-format-sf, .vform-allname-ao, .standardoptionfield, [name="optionhidelabel"], .advancedoptionfield .inline, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
                
                $('.vform-placeholder-ao, .vform-dropdown-sf, .vform-defaultvalue-ao, .vform-multichoice-sf, .vform-checkbox-sf, .vform-address-ao, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();

                $('.standardoptionfield .inline').text('Required');
      
              }else if(datatype=='dropdown'){
                var thsid =  $(this).attr('id');
                $('.vform-dropdown-value').html('');
                $('#'+thsid+' select option').each(function(){
                  vl = $(this).text();
                  $('.vform-dropdown-value').append('<div>'+vl+'<i class="fa fa-times thisparemove" aria-hidden="true"></i></div>');
                });
                $('.standardoptionfield .inline').text('Required');

                $('.vform-dropdown-sf, .standardoptionfield, [name="optionhidelabel"], .advancedoptionfield .inline, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
                
                $('.vform-format-sf, .vform-checkbox-sf, .vform-multichoice-sf, .vform-allname-ao, .vform-address-ao, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-defaultvalue-ao, .vform-placeholder-ao, .vform-submit-sf, .vform-dateformat-sf').hide();

      
              }else if(datatype=='multiplechoice'){
                var thsid =  $(this).attr('id');
                $('.vform-multichoice-value').html('');
                $('#'+thsid+' .vform-multiplechoice ul li input').each(function(){
                  vl = $(this).attr('value');
                  $('.vform-multichoice-value').append('<div>'+vl+'<i class="fa fa-times thismultimove" aria-hidden="true"></i></div>');
                });
                $('.standardoptionfield .inline').text('Required');

                $('.vform-multichoice-sf, .standardoptionfield, [name="optionhidelabel"], .advancedoptionfield .inline, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
              
                $('.vform-checkbox-sf, .vform-dropdown-sf, .vform-allname-ao, .vform-address-ao, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-placeholder-ao, .vform-submit-sf, .vform-dateformat-sf, .vform-format-sf').hide();


      
              }else if(datatype=='Checkboxes'){
                var thsid =  $(this).attr('id');
                $('.vform-multicheckbox-value').html('');
                $('#'+thsid+' .vform-checkbox ul li input').each(function(){
                  vl = $(this).attr('value');
                  // console.log(vl);
                  $('.vform-multicheckbox-value').append('<div>'+vl+'<i class="fa fa-times thischeckbox" aria-hidden="true"></i></div>');
                });
                $('.standardoptionfield .inline').html('Required <span style="color: red;margin-left: 5px;">!Only First Option Are Required.</span>');

              $('.vform-checkbox-sf, .standardoptionfield, [name="optionhidelabel"], .advancedoptionfield .inline, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
              
              $('.vform-dropdown-sf, .vform-multichoice-sf, .vform-allname-ao, .vform-address-ao, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-placeholder-ao, .vform-submit-sf, .vform-dateformat-sf,.vform-format-sf').hide();

      
              }else if(datatype=='submit'){
                
                $('.vform-defaultvalue-ao, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom, .vform-submit-sf, .standardoptionfield').show();
                
                $('.vform-placeholder-ao, [name="optionhidelabel"], .advancedoptionfield .inline, .vform-address-ao, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-label-sf, .vform-standard-bottom, .vform-dateformat-sf, .vform-format-sf,.vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-allname-ao').hide();


                var link3 = $('#'+thid+' .vform-main-submit').css("text-transform");
                $('select[name="vfsubmitbtnlinktransform"] option').each(function(){
                  $(this).removeAttr('selected');
                });
      
                $('select[name="vfsubmitbtnlinktransform"]').val(link3);

                var link3 = $('#'+thid+' .vform-main-submit').css("font-size");
                $('[name="vfsubmitbtnfontsize"]').val(link3);
       
                var link4 = $('#'+thid+' .vform-main-submit').css("background-color");

                $('[name="vfsubmitbtnbkcolor"]').val(rgbToHex(link4));
       
                var link5 = $('#'+thid+' .vform-main-submit').css("color");
                $('[name="vfsubmitbtnlinkcolor"]').val(rgbToHex(link5));

             
       
                $('[name="vfsubmitbtnlinkheight"]').val($('#'+thid+' .vform-main-submit').css("height"));

                var wdth = $('#'+thid+' .vform-main-submit').get(0).style.width;
                $('[name="vfsubmitbtnlinkwidth"]').val(wdth);
       
                $('[name="vfsubmitbtnpaddingtop"]').val($('#'+thid+' .vform-main-submit').css("padding-top"));
                $('[name="vfsubmitbtnpaddingbottom"]').val($('#'+thid+' .vform-main-submit').css("padding-bottom"));
                $('[name="vfsubmitbtnpaddingleft"]').val($('#'+thid+' .vform-main-submit').css("padding-left"));
                $('[name="vfsubmitbtnpaddinght"]').val($('#'+thid+' .vform-main-submit').css("padding-right"));

                $('[name="vfsubmitbtnmargintop"]').val($('#'+thid+' .vform-main-submit').css("margin-top"));
                $('[name="vfsubmitbtnmarginbottom"]').val($('#'+thid+' .vform-main-submit').css("margin-bottom"));
                $('[name="vfsubmitbtnmarginleft"]').val($('#'+thid+' .vform-main-submit').css("margin-left"));
                $('[name="vfsubmitbtnmarginht"]').val($('#'+thid+' .vform-main-submit').css("margin-right"));

      
              }else if(datatype=='address'){

                $('.vform-address-ao, .advancedoptionfield, .standardoptionfield, .vform-label-sf, .vform-standard-bottom').show();
                
                $('.vform-defaultvalue-ao, .vform-placeholder-ao, .vform-dropdown-sf, .vform-multichoice-sf, .vform-format-sf, .vform-allname-ao, .vform-checkbox-sf, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();

                var plc1 = $('#'+thid+' [name="full_address[]"]').attr('placeholder');
                $('[name="userfulladdress"]').val(plc1);
                var vl1 = $('#'+thid+' [name="full_address[]"]').val();
                $('[name="userfulladdressval"]').val(vl1);
                
                var plc2 = $('#'+thid+' [name="city_name[]"]').attr('placeholder');
                $('[name="usercity"]').val(plc2);
                var vl2 = $('#'+thid+' [name="city_name[]"]').val();
                $('[name="usercityval"]').val(vl2);
                
                var plc3 = $('#'+thid+' [name="state_name[]"]').attr('placeholder');
                $('[name="userstate"]').val(plc3);
                var vl3 = $('#'+thid+' [name="state_name[]"]').val();
                $('[name="userstateval"]').val(vl3);
      
                var plc4 = $('#'+thid+' [name="zip_code[]"]').attr('placeholder');
                $('[name="userzip"]').val(plc4);
                var vl4 = $('#'+thid+' [name="zip_code[]"]').val();
                $('[name="userzipval"]').val(vl4);
               
      
              }else if(datatype=='pagebreak' || datatype=='recapthca' || datatype=='hcapthca'){
                $('.standardoptionfield, .advancedoptionfield, .vform-submit-sf, .vform-dateformat-sf,.vform-format-sf').hide();
                console.log('insie');
              }else if(datatype=='divider'){
               
      
                var divr1 = $('#'+thid+' hr').get(0).style.width;

                $('[name="dividerwidth"]').val(divr1);
      
                var divr2 = $('#'+thid+' hr').css('background');
                $('[name="dividercolor"]').val(rgbToHex(divr2));
      
                var divr3 = $('#'+thid+' hr').css('height');
                $('[name="dividerheight"]').val(divr3);
      
                var divr4 = $('#'+thid+' hr').css('radius');
                $('[name="dividerradius"]').val(divr4);

                $('.vform-divider-inf').show();

                $('.advancedoptionfield, .vform-label-sf, .vform-standard-bottom, .vform-termscondition-sf, .vform-link-sf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf,.vform-format-sf,.vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf').hide();
                
      
              }else if(datatype=='termscondition'){
                 
      
                var terms1 = $('#'+thid+' .insidetermscondition').text();
                $('[name="termsconditiontext"]').val(terms1);

                var terms1 = $('#'+thid+' .insidetermscondition a').text();
                $('[name="termsconditionanchor"]').val(terms1);

                var terms1 = $('#'+thid+' .insidetermscondition a').attr('href');
                $('[name="termsconditionanchorurl"]').val(terms1);


      
                var terms2 = $('#'+thid+' [name="termscondition[]"]').is(":checked");
                $('input[name="termsconditionalreadycheck"]').prop('checked',terms2);
      
                $('.vform-termscondition-sf').show();

                $('.advancedoptionfield, .vform-label-sf, .vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-format-sf, .vform-standard-bottom, .vform-divider-inf, .vform-image-sf, .vform-link-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();
                
                
                $('[name="termsconditionpaddingtop"]').val($('#'+thid+' .vform-termscondition').css("padding-top"));
                $('[name="termsconditionpaddingbottom"]').val($('#'+thid+' .vform-termscondition').css("padding-bottom"));
                $('[name="termsconditionpaddingleft"]').val($('#'+thid+' .vform-termscondition').css("padding-left"));
                $('[name="termsconditionpaddinght"]').val($('#'+thid+' .vform-termscondition').css("padding-right"));

                
                $('[name="termsconditionmartop"]').val($('#'+thid+' .vform-termscondition').css("margin-top"));
                $('[name="termsconditionmarbottom"]').val($('#'+thid+' .vform-termscondition').css("margin-bottom"));
                $('[name="termsconditionmarleft"]').val($('#'+thid+' .vform-termscondition').css("margin-left"));
                $('[name="termsconditionmarrht"]').val($('#'+thid+' .vform-termscondition').css("margin-right"));

      
              }else if(datatype=='link'){
                $('.vform-link-sf').show();

                $('.advancedoptionfield, .vform-label-sf, .vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-format-sf, .vform-standard-bottom, .vform-divider-inf, .vform-termscondition-sf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();
                
      
                var link1 = $('#'+thid+' .insideclick').attr("target");
                if(link1=='_blank'){
                  $('[name="linktarget"]').prop('checked',true);
                  }else{
                  $('[name="linktarget"]').prop('checked',false);
                }
      
                var link2 = $('#'+thid+' .insideclick').css("text-decoration");
                //  console.log(link2);
                if(link2.split(' ')[0]=='none'){
                  $('[name="linkunderline"]').prop('checked',true);
                  }else{
                    $('[name="linkunderline"]').prop('checked',false);
                  }
                
                var link3 = $('#'+thid+' .insideclick').css("text-transform");
                $('select[name="linktransform"] option').each(function(){
                  $(this).removeAttr('selected');
                });
      
                $('select[name="linktransform"]').val(link3);
      
                var link4 = $('#'+thid+' .insideclick').css("font-size");
                $('[name="linksize"]').val(link4);
      
                var link5 = $('#'+thid+' .insideclick').css("color");
                $('[name="linkcolor"]').val(rgbToHex(link5));
      
                var link6 = $('#'+thid+' .insideclick').attr("href");
                $('[name="linklink"]').val(link6);
             

                var txtvl = $('#'+thid+' a').html();
                $('[name="vfanchortext"]').val(txtvl);
      
      
              }else if(datatype=='image'){
                
                $('.vform-image-sf').show();
                
                $('.advancedoptionfield, .vform-label-sf, .vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-format-sf, .vform-standard-bottom, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();

      
                var im1 = $('#'+thid+' .vfinsideimage').attr("src");
                $('[name="vfinsideimage"]').val(im1);
      
                var im2 = $('#'+thid+' .vfinsideimage').get(0).style.width;
                $('[name="vfinsidewidth"]').val(im2);
      
              }else if(datatype=='fileupload'){
                
                $('.vform-standard-required,.vform-fileupload-sf').show();
                
                $('.advancedoptionfield, .vform-label-sf, .vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-format-sf, .vform-standard-bottom, .vform-divider-inf, .vform-termscondition-sf, .vform-link-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf,.vform-image-sf, .vform-icons-ao').hide();
      
              }else if(datatype=='month'){
      
                $('.standardoptionfield, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
              
                $('.vform-dropdown-sf, .vform-multichoice-sf, .vform-format-sf, .vform-allname-ao, .vform-checkbox-sf, .vform-placeholder-ao, .vform-defaultvalue-ao, .vform-address-ao, .vform-termscondition-sf, .vform-link-sf, .vform-divider-inf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();
                
      
              }else if(datatype=='week'){
      
                $('.standardoptionfield, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();
              
                $('.vform-dropdown-sf, .vform-multichoice-sf, .vform-format-sf, .vform-allname-ao, .vform-checkbox-sf, .vform-placeholder-ao, .vform-defaultvalue-ao, .vform-address-ao, .vform-termscondition-sf, .vform-link-sf, .vform-divider-inf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();
                
      
      
              }else if(datatype=='button'){
                $('.vform-button-sf').show();

                $('.advancedoptionfield, .vform-image-sf, .vform-link-sf, .vform-termscondition-sf, .vform-divider-inf, .vform-label-sf, .vform-dropdown-sf, .vform-multichoice-sf, .vform-checkbox-sf, .vform-format-sf, .vform-standard-bottom, .vform-submit-sf, .vform-dateformat-sf').hide();
                
      
               var link1 = $('#'+thid+' .vfinsidebtn').attr("target");


               if(link1=='_blank'){
                 $('[name="vfbtnlinktarget"]').prop('checked',true);
                 }else{
                 $('[name="vfbtnlinktarget"]').prop('checked',false);
               }
      
                 var link2 = $('#'+thid+' .vfinsidebtn').css("text-transform");
                $('select[name="vfbtnlinktransform"] option').each(function(){
                  $(this).removeAttr('selected');
                });
      
                $('select[name="vfbtnlinktransform"]').val(link2);
      
      
               var link3 = $('#'+thid+' .vfinsidebtn').css("font-size");
               $('[name="vfbtnfontsize"]').val(link3);
      
               var link4 = $('#'+thid+' .vfinsidebtn').css("background-color");
               $('[name="vfbtnbkcolor"]').val(rgbToHex(link4));
      
               var link5 = $('#'+thid+' .vfinsidebtn').css("color");
               $('[name="vfbtnlinkcolor"]').val(rgbToHex(link5));
      
               var link6 = $('#'+thid+' .vfinsidebtn').attr("href");
               $('[name="vfbtnlinklink"]').val(link6);
      
               $('[name="vfbtnpaddingtop"]').val($('#'+thid+' .vfinsidebtn').css("padding-top"));
               $('[name="vfbtnpaddingbottom"]').val($('#'+thid+' .vfinsidebtn').css("padding-bottom"));
               $('[name="vfbtnpaddingleft"]').val($('#'+thid+' .vfinsidebtn').css("padding-left"));
               $('[name="vfbtnpaddinght"]').val($('#'+thid+' .vfinsidebtn').css("padding-right"));
      
               var txtvl = $('#' + thid + ' a').contents().filter(function () {
                 return this.nodeType === Node.TEXT_NODE; // Filter for text nodes only
                }).text().trim(); // Extract and trim the text
                
                $('[name="vfbtntext"]').val(txtvl);
            
      
      
              }else{
                $('.vform-placeholder-ao, .vform-defaultvalue-ao, .standardoptionfield, .advancedoptionfield, .vform-label-sf, .vform-standard-bottom').show();

                $('.vform-dropdown-sf, .vform-multichoice-sf, .vform-format-sf, .vform-allname-ao, .vform-checkbox-sf, .vform-address-ao, .vform-termscondition-sf, .vform-link-sf, .vform-divider-inf, .vform-image-sf, .vform-button-sf, .vform-submit-sf, .vform-dateformat-sf').hide();

                $('.standardoptionfield .inline').text('Required');


                if(datatype=='heading' || datatype=='title'){
                  $('.advancedoptionfield').hide();
                  $('.standardoptionfield .inline').text('');
                  $('[name="optionrequired"]').hide();
                }else{
                  $('.advancedoptionfield').show();
                  $('[name="optionrequired"]').show();
                }

                if(datatype=='date' || datatype=='time' || datatype=='color'){
                  $('.vform-placeholder-ao').hide();
                }

                if(datatype=='datetime' || datatype=='date'){
                  $('.vform-dateformat-sf').show();
                }
                
              }
      
      
      
          }else{
            // $('.vform-shift2').removeClass('vform-fieldactive');
            // $('.vform-shift1').addClass('vform-fieldactive');
            // $('.vform-standardfields').show();
            $('.vform-fieldoptions').hide();
            gropudel = true;
          }
      
      
        });
        // click properties

        function rgbToHex(rgb) {
          const [r, g, b] = rgb.match(/\d+/g).map(Number);
          return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase();
        }

        $('[name="optionname"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading .text').text(thvl);

          var targetElement = $('#' + mainid + ' .vform-heading .text').text();

          var type = $('#' + mainid).attr('data-type');
          var newName = targetElement.replace(/ /g, '~');
          $('#' + mainid).find('[name]').each(function() {
              $(this).attr('name',type+'__'+newName+'[]');
          });
          
        });

        $('[name="labelfontsize"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading .text').css('font-size',thvl);
        });

        $('[name="termsconditionsize"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-termscondition').css('font-size',thvl);
        });

        $('[name="labellineheight"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading .text').css('line-height',thvl);
        });

        $('[name="descrlineheight"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('line-height',thvl);
        });

        $('[name="termsconditionlineheight"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-termscondition').css('line-height',thvl);
        });

        $('[name="descrfontsize"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('font-size',thvl);
        });

        $('[name="labelmartop"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading').css('margin-top',thvl);
        });
        $('[name="labelmarbottom"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading').css('margin-bottom',thvl);
        });
        $('[name="labelmarleft"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading').css('margin-left',thvl);
        });
        $('[name="labelmarrht"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading').css('margin-right',thvl);
        });
        $('[name="labelalignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-heading').css('text-align',thvl);
        });

        $('[name="buttonalignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-button').css('display','flex');
          $('#'+mainid+' .vform-button').css('justify-content',thvl);
        });

        $('[name="submitbtnalignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-format-selected').css('text-align',thvl);
        });
        
        $('[name="bordrstyle"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          if($('#'+mainid).attr('data-type')=='dropdown'){
            $('#'+mainid+' select').css('border-style',thvl);
          }else if($('#'+mainid).attr('data-type')=='divider'){
            $('#'+mainid+' hr').css('border-style',thvl);
          }else if($('#'+mainid).attr('data-type')=='paragraph'){
            $('#'+mainid+' textarea').css('border-style',thvl);
          }else{
            $('#'+mainid+' .vform-main-submit').css('border-style',thvl);
            $('#'+mainid+' input').css('border-style',thvl);
          }
        });

        $('#filetypes').on('change', function () {
          var selectedValues = $(this).val(); // Get selected options as an array
          var fileTypes = selectedValues ? selectedValues.join(',') : '';
          var mainid = $('[name="fieldoptionid"]').val();
           $('#'+mainid+' [type="hidden"]').eq(0).val(fileTypes);
        });

        $('[name="fileselection"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val(); 
          var thvl = $(this).val(); // Get the selected value
          var fileInput = $('#' + mainid + ' [type="file"]'); 
      
          if (thvl === 'multiple') {
              fileInput.attr('multiple', 'multiple'); // Add multiple attribute
          } else {
              fileInput.removeAttr('multiple'); // Remove multiple attribute
          }
        });

        $('[name="filszeupload"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' [type="hidden"]').eq(1).val(thvl);
        });

        $('[name="termsconditionalignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-termscondition').css('text-align',thvl);
        });

        $('[name="descrmartop"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('margin-top',thvl);
        });
        $('[name="descrmarbottom"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('margin-bottom',thvl);
        });
        $('[name="descrmarleft"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('margin-left',thvl);
        });
        $('[name="descrmarrht"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('margin-right',thvl);
        });
        $('[name="descralignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').css('text-align',thvl);
        });

        $('[name="vficonalign"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
      
          if ($('#' + mainid).attr('data-type') == 'button') {
              var geticon = $('#' + mainid + ' .vform-button a i').detach();
              if (thvl === 'left') {
                geticon.css({ paddingLeft: '0px',paddingRight: '5px' });
                $('[name="vficonpaddingleft"]').val('0px');
                $('[name="vficonpaddingright"]').val('5px');
                  $('#' + mainid + ' .vform-button a').prepend(geticon);
              } else {
                geticon.css({ paddingRight: '0px',paddingLeft: '5px'});
                $('[name="vficonpaddingleft"]').val('5px');
                $('[name="vficonpaddingright"]').val('0px');
                  $('#' + mainid + ' .vform-button a').append(geticon);
              }
          }else if ($('#' + mainid).attr('data-type') == 'name') {
            var geticon = $('#' + mainid + ' .vform-first-name i').detach();
            var geticon2 = $('#' + mainid + ' .vform-middle-name i').detach();
            var geticon3 = $('#' + mainid + ' .vform-last-name i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                geticon2.css({ left: '7px', right:'auto' });
                geticon3.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-first-name').prepend(geticon);
                $('#' + mainid + ' .vform-middle-name').prepend(geticon2);
                $('#' + mainid + ' .vform-last-name').prepend(geticon3);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                geticon2.css({ left:'auto', right: '10px',});
                geticon3.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-first-name').append(geticon);
                $('#' + mainid + ' .vform-middle-name').append(geticon2);
                $('#' + mainid + ' .vform-last-name').append(geticon3);
            }
          }else if ($('#' + mainid).attr('data-type') == 'submit') {
            var geticon = $('#' + mainid + ' .vform-main-submit i').detach();
            if (thvl === 'left') {
              geticon.css({ paddingLeft: '0px',paddingRight: '5px' });
              $('[name="vficonpaddingleft"]').val('0px');
              $('[name="vficonpaddingright"]').val('5px');
                $('#' + mainid + ' .vform-main-submit').prepend(geticon);
            } else {
              geticon.css({ paddingRight: '0px',paddingLeft: '5px'});
              $('[name="vficonpaddingleft"]').val('5px');
              $('[name="vficonpaddingright"]').val('0px');
                $('#' + mainid + ' .vform-main-submit').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'email') {
            var geticon = $('#' + mainid + ' .vform-email i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-email').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-email').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'phone') {
            var geticon = $('#' + mainid + ' .vform-phone i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-phone').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-phone').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'singleline') {
            var geticon = $('#' + mainid + ' .vform-singleline-text i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-singleline-text').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-singleline-text').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'number') {
            var geticon = $('#' + mainid + ' .vform-number i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-number').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-number').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'websiteurl') {
            var geticon = $('#' + mainid + ' .vform-websiteurl i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-websiteurl').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-websiteurl').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'password') {
            var geticon = $('#' + mainid + ' .vform-password i').detach();
            
            if (thvl === 'left') {
                geticon.css({ left: '7px', right:'auto' });
                $('#' + mainid + ' .vform-password').prepend(geticon);
            } else {
                geticon.css({ left:'auto', right: '10px',});
                $('#' + mainid + ' .vform-password').append(geticon);
            }
          }else if ($('#' + mainid).attr('data-type') == 'link') {
            var geticon = $('#' + mainid + ' .vform-link i').detach();
            
            if (thvl === 'left') {
              geticon.css({ paddingLeft: '0px',paddingRight: '5px' });
              $('[name="vficonpaddingleft"]').val('0px');
              $('[name="vficonpaddingright"]').val('5px');
                $('#' + mainid + ' .vform-link a').prepend(geticon);
            } else {
              geticon.css({ paddingRight: '0px',paddingLeft: '5px'});
                $('[name="vficonpaddingleft"]').val('5px');
                $('[name="vficonpaddingright"]').val('0px');
                $('#' + mainid + ' .vform-link a').append(geticon);
            }
          }
        
      });
      

        $('[name="vformdateformat"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .primary-input').attr('data-format',thvl);
        });
        $('[name="imagealignment"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-image').css('text-align',thvl);
        });

        $('[name="fontfamilmain"]').change(function() {
          var thvl = $(this).val();
          $('.form-all').css('font-family',thvl);
        });


        $('[name="optiondescription"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-description').text(thvl);
        });

        $('[name="optionplaceholder"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' input').attr('placeholder',thvl);
        });

        $('[name="bordrraidusinp"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          // console.log(thvl);
          if($('#' + mainid).attr('data-type')=='dropdown'){
            $('#'+mainid+' select').css('border-radius',thvl);
          }else if($('#' + mainid).attr('data-type')=='paragraph'){
            $('#'+mainid+' textarea').css('border-radius',thvl);
          }else{
            $('#'+mainid+' .vform-main-submit').css('border-radius',thvl);
            $('#'+mainid+' input').css('border-radius',thvl);
          }
        });

        $('[name="bordrwdthinp"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          if($('#' + mainid).attr('data-type')=='dropdown'){
            $('#'+mainid+' select').css('border-width',thvl);
          }else if($('#' + mainid).attr('data-type')=='divider'){
            $('#'+mainid+' hr').css('border-width',thvl);
          }else if($('#' + mainid).attr('data-type')=='paragraph'){
            $('#'+mainid+' textarea').css('border-width',thvl);
          }else{
          $('#'+mainid+' .vform-main-submit').css('border-width',thvl);
          $('#'+mainid+' input').css('border-width',thvl);
          }
        });
        

        $('[name="vfbtnradius"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-button a').css('border-radius',thvl);
        });

        $('[name="optionhidelabel"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          var chk = $(this).is(":checked");
          if(chk){
            $('#'+mainid).addClass('nolabel');
          }else{
            $('#'+mainid).removeClass('nolabel');
          }
        });

        $('[name="userfulladdressvalhide"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var value = $(`#${mainid} [name="full_address[]"]`);
          $(this).is(":checked") ? value.hide() : value.show();
        });
        $('[name="usercityvalhide"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var value = $(`#${mainid} [name="city_name[]"]`);
          $(this).is(":checked") ? value.hide() : value.show();
        });
        $('[name="userstatevalhide"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var value = $(`#${mainid} [name="state_name[]"]`);
          $(this).is(":checked") ? value.hide() : value.show();
        });
        $('[name="userzipvalhide"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var value = $(`#${mainid} [name="zip_code[]"]`);
          $(this).is(":checked") ? value.hide() : value.show();
        });
        $('[name="usercountryhide"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var value = $(`#${mainid} [name="shipping_country[]"]`);
          $(this).is(":checked") ? value.hide() : value.show();
        });




        $('[name="optionrequired"]').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          var chk = $(this).is(":checked");
          var dttype = $('#'+mainid).data('type');
          if(chk){
            $('#'+mainid).addClass('vform-required');
            if(dttype!='multiplechoice' && dttype!='Checkboxes' && dttype!='name' && dttype!='address'){
              $('#'+mainid+' input').attr('required','true');
              $('#'+mainid+' textarea').attr('required','true');
              $('#'+mainid+' select').attr('required','true');
            }else if(dttype=='multiplechoice'){
              $('#'+mainid+' input').eq('0').attr('required','true');
            }else if(dttype=='Checkboxes'){
              $('#'+mainid+' input').eq('0').attr('required','true');
            }else if(dttype=='name'){
              $('#'+mainid+' input').eq('0').attr('required','true');
            }else if(dttype=='address'){

              $('[name="full_address[]"]').prop('required', $(`#${mainid} [name="full_address[]"]`).css('display') != 'none');
              $('[name="city_name[]"]').prop('required', $(`#${mainid} [name="city_name[]"]`).css('display') != 'none');
              $('[name="state_name[]"]').prop('required', $(`#${mainid} [name="state_name[]"]`).css('display') != 'none');
              $('[name="zip_code[]"]').prop('required', $(`#${mainid} [name="zip_code[]"]`).css('display') != 'none');
              $('[name="shipping_country[]"]').prop('required', $(`#${mainid} [name="shipping_country[]"]`).css('display') != 'none');

            }

          }else{
            $('#'+mainid).removeClass('vform-required');
            $('#'+mainid+' input').removeAttr('required');
            $('#'+mainid+' textarea').removeAttr('required');
            $('#'+mainid+' select').removeAttr('required');
          }
        });

        // $('[name="adfieldsize"]').change(function() {
        //   var mainid = $('[name="fieldoptionid"]').val();
        //   var thvl = $(this).val();
        //   if(thvl == 'small'){
        //     $('#'+mainid).addClass('size-small');
        //     $('#'+mainid).removeClass('size-medium');
        //     $('#'+mainid).removeClass('size-large');
        //   }else if(thvl == 'medium'){
        //     $('#'+mainid).addClass('size-medium');
        //     $('#'+mainid).removeClass('size-smail');
        //     $('#'+mainid).removeClass('size-large');
        //   }else if(thvl == 'large'){
        //     $('#'+mainid).addClass('size-large');
        //     $('#'+mainid).removeClass('size-medium');
        //     $('#'+mainid).removeClass('size-small');
        //   }

        // });

        $('[name="adfieldsize"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid).css('width',thvl);
        });

        $('[name="optiondefaultvalue"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' input').attr('value',thvl);
          
          if($('#'+mainid+' .vform-main-submit[data-brand="new"]').length!=0){
            
            var linkElement = $('#' + mainid + ' .vform-main-submit');
            linkElement.contents().filter(function () {
                return this.nodeType === Node.TEXT_NODE; 
            }).first().replaceWith(thvl); 
          }
          
        });

        $('[name="vfbtntext"]').keyup(function () {
            var mainid = $('[name="fieldoptionid"]').val();
            var thvl = $(this).val();
        
            var linkElement = $('#' + mainid + ' a');
            linkElement.contents().filter(function () {
                return this.nodeType === Node.TEXT_NODE; 
            }).first().replaceWith(thvl); 
        });
      

        $('[name="vfanchortext"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' a').html(thvl);
        });

        

        $('[name="adfieldformat"]').change(function() {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          if(thvl == 'simple'){
            $('#'+mainid).addClass('format-selected-simple');
            $('#'+mainid).removeClass('format-selected-first-last');
            $('#'+mainid).removeClass('format-selected-combo-middle-last');

            $('.vform-ao-first').show();
            $('.vform-ao-middle').hide();
            $('.vform-ao-last').hide();

          }else if(thvl == 'firstlast'){
            $('#'+mainid).addClass('format-selected-first-last');
            $('#'+mainid).removeClass('format-selected-simple');
            $('#'+mainid).removeClass('format-selected-combo-middle-last');

            $('.vform-ao-first').show();
            $('.vform-ao-middle').hide();
            $('.vform-ao-last').show();

          }else if(thvl == 'firstmiddlelast'){
            $('#'+mainid).removeClass('format-selected-simple');
            $('#'+mainid).removeClass('format-selected-first-last');
            $('#'+mainid).removeClass('format-selected-combo-middle-last');

            $('.vform-ao-first').show();
            $('.vform-ao-middle').show();
            $('.vform-ao-last').show();

          }else if(thvl == 'combomiddlelast'){
            $('#'+mainid).addClass('format-selected-combo-middle-last');
            $('#'+mainid).removeClass('format-selected-simple');
            $('#'+mainid).removeClass('format-selected-first-last');

            $('.vform-ao-first').show();
            $('.vform-ao-middle').show();
            $('.vform-ao-last').show();

          }

        });
        
        // For adding classes
          
        $('[name="optionclasses"]').keyup(function () {
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $('[name="optionclasses"]').val().trim();
      
          // Split the input into an array of classes
          var classList = thvl.split(/\s+/);
          var element =  $('#' + mainid);
          
          if($('[name="fieldoptionid"]').attr('data-batchid')=='0'){
            element = $('.form-all');
          }

          var permanentClasses = ['vform-group', 'ui-sortable-handle', 'vform-group-active', 'format-selected-first-last','format-selected-simple','format-selected-combo-middle-last','form-all','vform-mainfields-inside','ui-sortable','ui-droppable','size-small','size-medium','size-large'];


          if (element) {
              // Get all current classes of the element
              var currentClasses = element.attr('class') || '';
              var currentClassList = currentClasses.split(/\s+/);
      
              // Remove only the classes not in the input or permanentClasses
              currentClassList.forEach(function (cls) {
                  if (!classList.includes(cls) && !permanentClasses.includes(cls)) {
                      element.removeClass(cls);
                  }
              });
      
              // Add only the classes from the input
              classList.forEach(function (cls) {
                  if (cls && !permanentClasses.includes(cls)) {
                      element.addClass(cls);
                  }
              });
          }
        });

        // firstname
        $('[name="userfrstname"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-first-name input').attr('placeholder',thvl);
        });
        
        $('[name="userfrstnamedfvallabel"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-first-name label').html(thvl);
        });

        $('[name="userfrstnamedfval"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-first-name input').attr('value',thvl);
        });

        // usermiddlename
        $('[name="usermiddlename"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-middle-name input').attr('placeholder',thvl);
        });


        $('[name="usermidddlenamedfvallabel"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-middle-name label').html(thvl);
        });

        $('[name="usermiddlenamedfval"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-middle-name input').attr('value',thvl);
        });

        // userlastname

        $('[name="userlastnam"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-last-name input').attr('placeholder',thvl);
        });

        $('[name="userlastnamedfvallabel"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-last-name label').html(thvl);
        });

        $('[name="userlastnamdfval"]').keyup(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          $('#'+mainid+' .vform-last-name input').attr('value',thvl);
        });

        // Dropdown
        $('.dropidown').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          var vl = $('.vform-choice-dropdown input').val();
          if(vl!=''){
            $('#'+mainid+' .vform-dropdown select').append('<option value="'+vl+'">'+vl+'</option>');
            $('.vform-dropdown-value').append('<div>'+vl+'<i class="fa fa-times thisparemove" aria-hidden="true"></i></div>');
            $('.vform-choice-dropdown input').val('');
          }else{
            alert('Value Must be Filled!');
          }

        });

        $('#rightPanel').delegate(".thisparemove", "click", function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).parent().text();
          $('#'+mainid+' .vform-dropdown option[value="'+thvl+'"]').remove();
          $('[name="optionrequired"]').prop('checked',false);
          $('#'+mainid).removeClass('vform-required');
          $(this).parent().remove();

        });

        // updown
        $('.vform-sidebar2').delegate(".upsidedown1", "click", function(){
          var mnid = $(this).parents(".vform-group").attr('id');
        var e = $('#'+mnid);
        e.prev().insertAfter(e);
        });

        $('.vform-sidebar2').delegate(".upsidedown2", "click", function(){
          var mnid = $(this).parents(".vform-group").attr('id');
        var e = $('#'+mnid);
        e.next().insertBefore(e);
        });

        // Multiple choice
        $('.multiichoice').click(function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var batchid = $('[name="fieldoptionid"]').data('batchid');
          var thvl = $(this).val();
          var vl = $('.vform-choice-multi input').val();
          if(vl!=''){
            $('#'+mainid+' .vform-multiplechoice ul').append('<li><input type="radio" disabled="" name="multiplechoice[]" value="'+vl+'">'+vl+'</li>');
            $('.vform-multichoice-value').append('<div>'+vl+'<i class="fa fa-times thismultimove" aria-hidden="true"></i></div>');
            $('.vform-choice-multi input').val('');
          }else{
            alert('Value Must be Filled!');
          }
        });

        $('#rightPanel').delegate(".thismultimove", "click", function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).parent().text();
          $('#'+mainid+' .vform-multiplechoice input[value="'+thvl+'"]').parent().remove();
          $('[name="optionrequired"]').prop('checked',false);
          $('#'+mainid).removeClass('vform-required');
          $(this).parent().remove();

        });

        // Checkboxe choice
        $('.multicheckbox').click(function(){
          
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).val();
          var vl = $('.vform-checkbox-multi input').val();
          if(vl!=''){
            $('#'+mainid+' .vform-checkbox ul').append('<li><input type="checkbox" name="checkbox[]" disabled="" value="'+vl+'">'+vl+'</li>');
            $('.vform-multicheckbox-value').append('<div>'+vl+'<i class="fa fa-times thischeckbox" aria-hidden="true"></i></div>');
            $('.vform-checkbox-multi input').val('');
          }else{
            alert('Value Must be Filled!');
          }

        });

        $('#rightPanel').delegate(".thischeckbox", "click", function(){
          var mainid = $('[name="fieldoptionid"]').val();
          var thvl = $(this).parent().text();
          $('#'+mainid+' .vform-checkbox input[value="'+thvl+'"]').parent().remove();
          $('[name="optionrequired"]').prop('checked',false);
          $('#'+mainid).removeClass('vform-required');
          $(this).parent().remove();

        });

        // Fulladdress
        $('input[name="userfulladdress"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="full_address[]"]').attr('placeholder',vl);
        });

        $('input[name="userfulladdressval"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="full_address[]"]').val(vl);
        });
        // Fulladdress

        // city
        $('input[name="usercity"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="city_name[]"]').attr('placeholder',vl);
        });

        $('input[name="usercityval"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="city_name[]"]').val(vl);
        });
        // city

        // state
        $('input[name="userstate"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="state_name[]"]').attr('placeholder',vl);
        });

        $('input[name="userstateval"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="state_name[]"]').val(vl);
        });
        // state

        // zip
        $('input[name="userzip"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="zip_code[]"]').attr('placeholder',vl);
        });

        $('input[name="userzipval"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' [name="zip_code[]"]').val(vl);
        });
        // zip

        $('input[name="dividerwidth"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' hr').css('width',vl);
        });

        $('[name="dividercolor"]').on('input', function() {
        // $('input[name="dividercolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' hr').css('background',vl);
        });

        $('input[name="dividerheight"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' hr').css('height',vl);
        });

        $('input[name="dividerradius"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' hr').css('border-radius',vl);
        });

        $('input[name="termsconditiontext"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .insidetermscondition').text(vl);

          $('[name="termsconditionanchor"]').val('');

        });

        $('input[name="termsconditionanchor"]').on('keyup', function () {
          var keyword = $('input[name="termsconditionanchor"]').val().trim();
          var url = $('input[name="termsconditionanchorurl"]').val().trim();
          var tid = $('input[name="fieldoptionid"]').val();
          var $target = $('#' + tid + ' .insidetermscondition');
          
          // Get original text without anchors
          var originalText = $target.text();

          if (keyword.length > 0) {
              var regex = new RegExp('\\b' + keyword + '\\b', 'gi');

              if (regex.test(originalText)) {
                  var updatedText = originalText.replace(regex, `<a href="${url || '#'}" class="temp-anchor">${keyword}</a>`);
                  $target.html(updatedText);
              }
          } else {
              $target.html(originalText); // Remove anchor if input is cleared
          }
      });
      $('input[name="termsconditionanchorurl"]').on('keyup', function () {
          var url = $(this).val().trim();
          var tid = $('input[name="fieldoptionid"]').val();
          var $targetAnchor = $('#' + tid + ' .insidetermscondition a.temp-anchor');
  
          if ($targetAnchor.length) {
              $targetAnchor.attr('href', url);
          }
      });


        $('input[name="termsconditionalreadycheck"]').on('click',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).is(":checked");
          $('#'+tid+' [name="termscondition[]"]').prop('checked',vl);
        });

        $('input[name="linktarget"]').on('click',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).is(":checked");
          if(vl==true){
            $('#'+tid+' .insideclick').attr('target',"_blank");
          }else{
            $('#'+tid+' .insideclick').attr('target',"_self");
          }
        });

        $('input[name="linkunderline"]').on('click',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).is(":checked");
          if(vl==true){
            $('#'+tid+' .insideclick').css('text-decoration',"none");
          }else{
            $('#'+tid+' .insideclick').css('text-decoration',"underline");
          }
        });

        $('select[name="linktransform"]').change(function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .insideclick').css('text-transform',frmname);
        });

        $('[name="linkcolor"]').on('input', function() {
        // $('input[name="linkcolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .insideclick').css('color',vl);
        });

        $('input[name="linklink"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .insideclick').attr('href',vl);
        });

        $('input[name="linksize"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .insideclick').css('font-size',vl);
        });

        $('input[name="vfinsideimage"]').on('keyup',function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .vfinsideimage').attr('src',frmname);
        });

        $('#vf-select-image').on('click', function (e) {
          e.preventDefault();

          // Create the media frame.
          var mediaFrame = wp.media({
              title: 'Select an Image',
              button: { text: 'Use this image' },
              library: { type: 'image' },
              multiple: false
          });

          // When an image is selected, run a callback.
          mediaFrame.on('select', function () {
              var attachment = mediaFrame.state().get('selection').first().toJSON();
              $('#vfinsideimage').val(attachment.url); // Fill the input with the image URL

              console.log(attachment.url);
              var tid = $('input[name="fieldoptionid"]').val();
              $('#'+tid+' .vfinsideimage').attr('src',attachment.url);
              
          });

          // Open the media frame.
          mediaFrame.open();
      });

        $('input[name="vfinsidewidth"]').on('keyup',function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .vfinsideimage').css('width',frmname);
        });

        $('input[name="vfbtnlinktarget"]').on('click',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).is(":checked");
          if(vl==true){
            $('#'+tid+' .vfinsidebtn').attr('target',"_blank");
          }else{
            $('#'+tid+' .vfinsidebtn').attr('target',"_self");
          }
        });

        $('select[name="vfbtnlinktransform"]').change(function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .vfinsidebtn').css('text-transform',frmname);
        });

        $('input[name="vfbtnfontsize"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('font-size',vl);
        });

        $('[name="vfbtnbkcolor"]').on('input', function() {
        // $('input[name="vfbtnbkcolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('background-color',vl);
        });

        $('[name="vfbtnlinkcolor"]').on('input', function() {
        // $('input[name="vfbtnlinkcolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('color',vl);
        });

        $('input[name="vfbtnlinklink"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').attr('href',vl);
        });

        $('.select-box').on('click', function() {
          var tid = $('input[name="fieldoptionid"]').val();
          $('.select-box').removeClass('active');
          $(this).addClass('active');

          if ($('#' + tid).attr('data-type') == 'button') {
              $('#' + tid + ' .vform-button a i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-button a').append('<i style="padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-button a').prepend('<i style="padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'name'){

            $('#' + tid + ' .vform-format-selected i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-first-name').append('<i style="position: absolute;right: 10px;top: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
                $('#' + tid + ' .vform-middle-name').append('<i style="position: absolute;right: 10px;top: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
                $('#' + tid + ' .vform-last-name').append('<i style="position: absolute;right: 10px;top: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-first-name').prepend('<i style="position: absolute;left: 7px;top: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
                $('#' + tid + ' .vform-middle-name').prepend('<i style="position: absolute;left: 7px;top: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
                $('#' + tid + ' .vform-last-name').prepend('<i style="position: absolute;left: 7px;top: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'submit'){

            $('#' + tid + ' .vform-main-submit i').remove();

            if($('[name="vficonalign"]').val()=='right'){
              $('#' + tid + ' .vform-main-submit').append('<i style="padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
            }else{
              $('#' + tid + ' .vform-main-submit').prepend('<i style="padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
            }

          }else if ($('#' + tid).attr('data-type') == 'email'){

            $('#' + tid + ' .vform-email i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-email').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-email').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'phone'){

            $('#' + tid + ' .vform-phone i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-phone').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-phone').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'singleline'){

            $('#' + tid + ' .vform-singleline-text i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-singleline-text').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-singleline-text').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'number'){

            $('#' + tid + ' .vform-number i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-number').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-number').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'websiteurl'){

            $('#' + tid + ' .vform-websiteurl i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-websiteurl').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-websiteurl').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'password'){

            $('#' + tid + ' .vform-password i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-password').append('<i style="position: absolute;right: 10px;bottom: 13px;padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-password').prepend('<i style="position: absolute;left: 7px;bottom: 13px;padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }else if ($('#' + tid).attr('data-type') == 'link'){

            $('#' + tid + ' .vform-link i').remove();

              if($('[name="vficonalign"]').val()=='right'){
                $('#' + tid + ' .vform-link a').append('<i style="padding-left: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }else{
                $('#' + tid + ' .vform-link a').prepend('<i style="padding-right: 5px;" class="fa ' + $(this).attr("data-icon") + '" aria-hidden="true"></i>');
              }

          }

      });
      


        $('input[name="vfbtnpaddingtop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('padding-top',vl);
        });
        $('input[name="vfbtnpaddingbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('padding-bottom',vl);
        });
        $('input[name="vfbtnpaddingleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('padding-left',vl);
        });
        $('input[name="vfbtnpaddinght"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vfinsidebtn').css('padding-right',vl);
        });

        // submit btn

        $('select[name="vfsubmitbtnlinktransform"]').change(function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .vform-main-submit').css('text-transform',frmname);
        });

        $('select[name="termsconditiontransform"]').change(function(){
          var frmname = $(this).val();
          var tid = $('input[name="fieldoptionid"]').val();
          $('#'+tid+' .vform-termscondition').css('text-transform',frmname);
        });

        $('input[name="vfsubmitbtnfontsize"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('font-size',vl);
        });

        $('[name="vfsubmitbtnbkcolor"]').on('input', function() {
        // $('input[name="vfsubmitbtnbkcolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('background-color',vl);
        });

        $('[name="vfsubmitbtnlinkcolor"]').on('input', function() {

        // $('input[name="vfsubmitbtnlinkcolor"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('color',vl);
        });

        
        $('[name="bordrcolor"]').on('input', function() {
            var tid = $('input[name="fieldoptionid"]').val();
            var vl = $(this).val();
            if($('#'+tid).attr('data-type')=='dropdown'){
              $('#'+tid+' select').css('border-color',vl);
            }else if($('#'+tid).attr('data-type')=='divider'){
              $('#'+tid+' hr').css('border-color',vl);
            }else if($('#'+tid).attr('data-type')=='paragraph'){
              $('#'+tid+' textarea').css('border-color',vl);
            }else{
            $('#'+tid+' .vform-main-submit').css('border-color',vl);
            $('#'+tid+' input').css('border-color',vl);
            }
          });


        $('[name="divbkclr"]').on('input', function() {
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid).css('background',vl);
        });

        $('[name="vflabelcolor"]').on('input', function() {
            var tid = $('input[name="fieldoptionid"]').val();
            var vl = $(this).val();
            $('#'+tid+' .vform-heading').css('color',vl);
          });

          $('[name="termsconditioncolor"]').on('input', function() {
            var tid = $('input[name="fieldoptionid"]').val();
            var vl = $(this).val();
            $('#'+tid+' .vform-termscondition').css('color',vl);
          });

          $('[name="vfdescrcolor"]').on('input', function() {
            var tid = $('input[name="fieldoptionid"]').val();
            var vl = $(this).val();
            $('#'+tid+' .vform-description').css('color',vl);
          });

        $('input[name="vfsubmitbtnpaddingtop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('padding-top',vl);
        });
        $('input[name="vfsubmitbtnpaddingbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('padding-bottom',vl);
        });
        $('input[name="vfsubmitbtnpaddingleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('padding-left',vl);
        });
        $('input[name="vfsubmitbtnpaddinght"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('padding-right',vl);
        });

        $('input[name="vfinputpaddingtop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' input').css('padding-top',vl);
        });
        $('input[name="vfinputbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' input').css('padding-bottom',vl);
        });
        $('input[name="vfinputleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' input').css('padding-left',vl);
        });
        $('input[name="vfinputpaddinght"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' input').css('padding-right',vl);
        });


        $('input[name="vficonpaddingtop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          if($('#'+tid).attr('data-type')=='button'){
            $('#'+tid+' .vform-button i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='name'){
            $('#'+tid+' .vform-format-selected i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='submit'){
            $('#'+tid+' .vform-main-submit i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='email'){
            $('#'+tid+' .vform-email i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='phone'){
            $('#'+tid+' .vform-phone i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='singleline'){
            $('#'+tid+' .vform-singleline-text i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='number'){
            $('#'+tid+' .vform-number i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='websiteurl'){
            $('#'+tid+' .vform-websiteurl i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='password'){
            $('#'+tid+' .vform-password i').css('padding-top',vl);
          }else if($('#'+tid).attr('data-type')=='link'){
            $('#'+tid+' .vform-link i').css('padding-top',vl);
          }
          
        });
        $('input[name="vficonpaddingbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          if($('#'+tid).attr('data-type')=='button'){
            $('#'+tid+' .vform-button i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='name'){
            $('#'+tid+' .vform-format-selected i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='submit'){
            $('#'+tid+' .vform-main-submit i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='email'){
            $('#'+tid+' .vform-email i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='phone'){
            $('#'+tid+' .vform-phone i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='singleline'){
            $('#'+tid+' .vform-singleline-text i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='number'){
            $('#'+tid+' .vform-number i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='websiteurl'){
            $('#'+tid+' .vform-websiteurl i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='password'){
            $('#'+tid+' .vform-password i').css('padding-bottom',vl);
          }else if($('#'+tid).attr('data-type')=='link'){
            $('#'+tid+' .vform-link i').css('padding-bottom',vl);
          }
        });
        $('input[name="vficonpaddingleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          if($('#'+tid).attr('data-type')=='button'){
            $('#'+tid+' .vform-button i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='name'){
            $('#'+tid+' .vform-format-selected i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='submit'){
            $('#'+tid+' .vform-main-submit i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='email'){
            $('#'+tid+' .vform-email i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='phone'){
            $('#'+tid+' .vform-phone i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='singleline'){
            $('#'+tid+' .vform-singleline-text i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='number'){
            $('#'+tid+' .vform-number i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='websiteurl'){
            $('#'+tid+' .vform-websiteurl i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='password'){
            $('#'+tid+' .vform-password i').css('padding-left',vl);
          }else if($('#'+tid).attr('data-type')=='link'){
            $('#'+tid+' .vform-link i').css('padding-left',vl);
          }
        });
        $('input[name="vficonpaddingright"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          if($('#'+tid).attr('data-type')=='button'){
            $('#'+tid+' .vform-button i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='name'){
            $('#'+tid+' .vform-format-selected i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='submit'){
            $('#'+tid+' .vform-main-submit i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='email'){
            $('#'+tid+' .vform-email i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='phone'){
            $('#'+tid+' .vform-phone i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='singleline'){
            $('#'+tid+' .vform-singleline-text i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='number'){
            $('#'+tid+' .vform-number i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='websiteurl'){
            $('#'+tid+' .vform-websiteurl i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='password'){
            $('#'+tid+' .vform-password i').css('padding-right',vl);
          }else if($('#'+tid).attr('data-type')=='link'){
            $('#'+tid+' .vform-link i').css('padding-right',vl);
          }
        });


        $('input[name="termsconditionpaddingtop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('padding-top',vl);
        });
        $('input[name="termsconditionpaddingbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('padding-bottom',vl);
        });
        $('input[name="termsconditionpaddingleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('padding-left',vl);
        });
        $('input[name="termsconditionpaddinght"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('padding-right',vl);
        });

        $('input[name="vfsubmitbtnmargintop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('margin-top',vl);
        });
        $('input[name="vfsubmitbtnmarginbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('margin-bottom',vl);
        });
        $('input[name="vfsubmitbtnmarginleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('margin-left',vl);
        });
        $('input[name="vfsubmitbtnmarginht"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('margin-right',vl);
        });

        $('input[name="termsconditionmartop"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('margin-top',vl);
        });
        $('input[name="termsconditionmarbottom"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('margin-bottom',vl);
        });
        $('input[name="termsconditionmarleft"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('margin-left',vl);
        });
        $('input[name="termsconditionmarrht"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-termscondition').css('margin-right',vl);
        });

        $('input[name="vfsubmitbtnlinkheight"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('height',vl);
        });

        $('input[name="vfsubmitbtnlinkwidth"]').on('keyup',function(){
          var tid = $('input[name="fieldoptionid"]').val();
          var vl = $(this).val();
          $('#'+tid+' .vform-main-submit').css('width',vl);
        });



        // submit btn



        $('.toggle-smart-tag-display').click(function(){
          var th = $(this).data('fields');
            $('.smart-tags-list-display').each(function(){
              var th2 = $(this).data('fields');
              if(th==th2){
                $(this).toggle();
              }
            });
        });

        $('.vform-notifications-general').delegate(".clickmergevform", "click", function(){
            var thfield = $(this).data('field');
            var prid = $(this).parent().parent().css('top');


            switch (prid) {
                case '158px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="email_to"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="email_to"]').val(thfield);
                break;
                case '230px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="from_name"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="from_name"]').val(thfield);
                break;
                case '304px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="from_email"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="from_email"]').val(thfield);
                break;
                case '378px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="replyto"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="replyto"]').val(thfield);
                break;
                case '430px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="email_subject"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="email_subject"]').val(thfield);
                break;
                case '550px':
                  var vl =  $(this).closest('.vf_notiform').find('[name="email_message"]').val();
                  if(vl!=''){
                    thfield = vl+' '+thfield;
                  }
                  $(this).closest('.vf_notiform').find('[name="email_message"]').val(thfield);
                break;
            }

        });
        
        $('#vform-panel-field-confirmations-1-type').change(function(){
          var vl = $(this).val();
          // console.log(vl);
          switch (vl) { 
            case 'message':
                $('#vform-panel-field1').show();
                $('#vform-panel-field2').hide();
                $('#vform-panel-field3').hide();
              break;
            case 'page':
                $('#vform-panel-field1').hide();
                $('#vform-panel-field2').show();
                $('#vform-panel-field3').hide();
              break;
            case 'redirect':
                $('#vform-panel-field1').hide();
                $('#vform-panel-field2').hide();
                $('#vform-panel-field3').show();
              break;
              case 'redirect_2':
                $('#vform-panel-field1').hide();
                $('#vform-panel-field2').hide();
                $('#vform-panel-field3').show();
              break;
            default:
  
          }
      });

      $('.vfsettingslink').click(function(){

        
        var dtid = $(this).data('id');
        $('.vfsettingslink').removeClass('active');
        $(this).addClass('active');
        
        if(dtid=='0'){
          $('#leftPanel').show();
          $('.css-2th6v9').show();
          $('.modules-V4').hide();
        }else{
          saveme();
          
          if(dtid=='2'){
            tooglevformsetting();
          }
          
          $('.modules-contentvf').hide();
          $('.modules-contentvf[data-id="'+dtid+'"]').show();
          $('#leftPanel, .css-2th6v9').hide();
          $('.modules-V4').show();

        }

          if(dtid=='2' || dtid=='6'|| dtid=='9'){
            $('.btn-save').hide();
          }else{
            $('.btn-save').show();
          }


        updateurl_step(dtid);


      });

      function updateurl_step(value){
        let url = new URL(window.location);
        url.searchParams.set('step', value);
        history.replaceState({}, '', url.toString());
       }

       //form title
        $('.vform-input-title').on('keyup',function(){
          var frmname = $(this).val();
            $('#vform-userform [name="formname"]').val(frmname);
        });

        // form title

        // form description
        $('[name="formdescription"]').on('keyup',function(){
          var frmdescr = $(this).val();
          $('#vform-userform [name="formdescription"]').val(frmdescr);
        });
        // form description

        // notification

        $("#vform-notification_enable").change(function(){
          var selectedinfo1 = $(this).children("option:selected").val();
            $('[name="notification_mode"]').val(selectedinfo1);

            selectedinfo1 == 0 ? $('#notificationstatus').hide() : $('#notificationstatus').show() ;
        });


        // $("#formSettingsFormStatus").change(function(){
        //   var selectedinfo1 = $(this).children("option:selected").val();
        //     $('[name="formstatus"]').val(selectedinfo1);
        // });

        
        $(".mkstatusupdate input[type='checkbox']").change(function () {
          if (this.checked) {
              $('[name="formstatus"]').val(true);
              $('.css-foctn1').text('Active');
            } else {
              $('[name="formstatus"]').val(false);
              $('.css-foctn1').text('InActive');
          }
          saveme();
          Toast("Status Updated", "toast-success");
      });

      $(".mkstatusduplicate input[type='checkbox']").change(function () {
        if (this.checked) {
            $('[name="mknoduplicate"]').val(true);
          } else {
            $('[name="mknoduplicate"]').val(false);
        }
        saveme();
        Toast("Status Updated", "toast-success");
    });
        
        $('#vform-panel-field-notifications-1-email').on('keyup',function(){
          var vl = $(this).val();
          $('[name="send_to"]').val(vl);
        });

        $('#vform-panel-field-notifications-1-subject').on('keyup',function(){
          var vl = $(this).val();
          $('[name="email_subject"]').val(vl);
        });

        $('#vform-panel-field-notifications-1-sender_name').on('keyup',function(){
          var vl = $(this).val();
          $('[name="from_name"]').val(vl);
        });

        $('#vform-panel-field-notifications-1-sender_address').on('keyup',function(){
          var vl = $(this).val();
          $('[name="from_email"]').val(vl);
        });

        $('#vform-panel-field-notifications-1-replyto').on('keyup',function(){
          var vl = $(this).val();
          $('[name="reply_to"]').val(vl);
        });

        $('#vform-panel-field-notifications-1-message').on('keyup',function(){
          var vl = $(this).val();
          $('[name="message"]').val(vl);
        });


      // save work
      $('#savevfwork').click(function(){

        // var chek1 = $('.vform-input-title').val();
        // if(submitcount!=0){
             
          // if(chek1!=''){

          $('#rightPanel').css('right','-560px');
          $('.vform-group').each(function(){
            $(this).removeClass('vform-group-active');
          });
         
            var frmdata = $('#vform-mainfields').html();
            $('#vform-userform [name="formbody"]').val(frmdata);
            var selectedinfo = $("#vform-panel-field-confirmations-1-type").children("option:selected").val();
            var redirectcheck = $("#vform-panel-field-confirmations-1-page").children("option:selected").val();


            var wherego;
            switch (selectedinfo) {
              case 'message':
      
                try {
                wherego = tinyMCE.activeEditor.getContent();
                }
                catch(err) {
                wherego = jQuery('#vformtextarea').val();
                }
      
                break;
              case 'page':
                  wherego = redirectcheck;
                break;
              case 'redirect':
                  wherego = $("#vform-panel-field-confirmations-1-redirect").val();
                break;
                case 'redirect_2':
                  wherego = $("#vform-panel-field-confirmations-1-redirect").val();
                break;
              default:

              try {
              wherego = tinyMCE.activeEditor.getContent();
              }
              catch(err) {
              wherego = jQuery('#vformtextarea').val();
              }
              selectedinfo = 'message';
      
              break;
            }
            
            var frmstatus = $('#vform-userform [name="formstatus"]').val();
            var postdata = "action=myvformsave&param=save_vform&selectedinfo="+selectedinfo+"&wherego="+wherego+"&formstatus="+frmstatus+"&"+jQuery("#vform-userform").serialize();
          
            $(this).addClass('loading-animation');
            jQuery.post(ajax_object,postdata,function(response){
              var data = jQuery.parseJSON(response);
              if(data.status==1){
                // alert('Success');
                $('.btn-save').removeClass('loading-animation');
                $('.btn-save').addClass('loading-done');
                setTimeout(function() {
                  $('.btn-save').removeClass('loading-done');
                }, 1000);

              }else{
                alert('Oops! Something Went Wrong');
              }
            });


          // }else{
          //   alert('Form Name Mandatory!');
          // }

        // }else{
        //   alert("Form cant't submit without a submit button");
        // }

       

      });
      // save work


      // create form

      $('.createmyvform').click(function(){
        $('.outerpopupvf_createform').css('display','flex');
        $('.showcreate').show();
        $('.showrename').hide();
      });

      $('.createvfromfirst').click(function(){

        var nonce =  $('#myvformdata2form').serialize();
        var title = $('.vftitletxt').val();
        var postdata = "action=myvformcreate&param=create_vform&"+nonce+"&title="+title;
          
        // $(this).text('Creating...');

        if(title!=''){

          jQuery.post(ajax_object,postdata,function(response){
            var data = jQuery.parseJSON(response);
            if(data.status==1){
              // $(this).text('Create Form');
              var frmid = data.id;
              window.location.href="admin.php?page=vform&id="+frmid;
            }else{
              alert('Oops! Something Went Wrong');
            }
          });

        }else{
          alert('Title is required');

        }


      });



      $('.outerpopupvf_createform .crs, .cancelfrm').click(function(){
        $('.outerpopupvf_createform').hide();
      });
      
      
      $('.Table_tableContainer__1Qt4Y').delegate(".delvform", "click", function(){
      // $('.delvform').click(function(){
        var goid = $(this).data('id');
        var nonce = $('#myvformdata3form').serialize();
        if(confirm('Are you Sure?')){
            var postdata = "action=myvformdelete&param=save_vform&id="+goid+"&"+nonce;
            jQuery.post(ajax_object,postdata,function(response){

              var data = jQuery.parseJSON(response);
              if(data.status==1){
                window.location.href="admin.php?page=vform";

              }else{
                alert('Oops! Something Went Wrong');
              }
            });
          }
      });

    $('.Table_tableContainer__1Qt4Y').delegate(".clonevform", "click", function(){

      // $('.clonevform').click(function(){
        var goid = $(this).data('id');
        var nonce = $('#myvformdata4form').serialize();

        if(confirm('Are you want to clone?')){
            var postdata = "action=myvformclone&param=clone_vform&id="+goid+"&"+nonce;
            jQuery.post(ajax_object,postdata,function(response){

              var data = jQuery.parseJSON(response);
              if(data.status==1){
                window.location.href="admin.php?page=vform";
              }else{
                alert('Oops! Something Went Wrong');
              }
            });
          }
      });

    //   $('#sendmyvfrm-eml').click(function(){
    //     var nonce = $('#myvformdata5form').serialize();

    //     var postdata = "action=myvformsend&param=save_vform&"+nonce;
    //     jQuery.post(ajax_object,postdata,function(response){
    //         window.location.reload();
    //     });
    
    // });


        if (typeof $.fn.sortable === 'function') {
          $(".vform-mainfields-inside").sortable({
              stop: function(event, ui) {
                // saveme();
              }
          });
        }


        $('.makemyentrydel').click(function () {
          // Collect all selected checkbox values
          var ids = [];
          $('input[type="checkbox"][data-zds="true"]:checked').each(function () {
              ids.push($(this).val());
          });
      
          if (ids.length === 0) {
              alert('No entries selected.');
              return;
          }
      
          var nonce = $('#myvformdata8form').serialize(); // Serialize the form for nonce
          if (confirm('Are you sure you want to delete selected entries?')) {
              var postdata = "action=myvformentriedel&param=del_entries&ids=" + JSON.stringify(ids) + "&" + nonce;
      
              jQuery.post(ajax_object, postdata, function (response) {
                  if (response.data.status == 1) {
                      window.location.reload();
                  } else {
                      alert('Failed to delete entries.');
                  }
              });
          }
      });
      $('input[type="checkbox"][data-zds="true"]').change(function () {
        // Count the number of selected checkboxes
        var selectedCount = $('input[type="checkbox"][data-zds="true"]:checked').length;

        // Toggle the visibility of the element with the .showwhenselect class
        if (selectedCount >= 1) {
            $('.showwhenselect').show(); // Show when more than one checkbox is selected
        } else {
            $('.showwhenselect').hide(); // Hide otherwise
        }
    });
      


    $('.vform-donate').click(function(){
    var nonce = $('#myvformdata6form').serialize();

      var postdata = "action=myvformdonate&param=save_vform&type=donate&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){});
    });

    $('.button_vf').click(function(){
      $('.outerpopupvf').css('display','flex');
      var postdata = "action=myvformdonate&param=save_vform&type=freegift";
        jQuery.post(ajax_object,postdata,function(response){});
    });

    function validateEmail(email) {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailPattern.test(email);
    }

  
    $('.emailwaitlist').click(function(){
      var getemail = $('.vfembtn').val();

      if (validateEmail(getemail)) {
        var postdata = "action=myvformdonate&param=save_vform&type=freegift&email="+getemail;
        jQuery.post(ajax_object,postdata,function(response){
          $('.outerpopupvf').hide();
        });
      } else {
         alert('Invalid Email Please try again.')
      }
    });

    $('.outerpopupvf .crs').click(function(){
      $('.outerpopupvf').hide();
    });
    

    $('#iwantintegration').click(function(){
      
      var nonce = $('#myvformdata9form').serialize();
      var data = $('#integrationrequest').val();
      if(data!=''){
        var postdata = "action=myvformneedinte&param=integrate_vform&data="+data+"&"+nonce;
        jQuery.post(ajax_object,postdata,function(response){
          $('.thankssubm').show();
        });
      }else{
        alert('Name Cannot be blank');
      }

    });

    $('.frm-show-box').click(function(){
      var data = $(this).attr('data-toppos');
      var vfoptnfield = $('.vfoptnfield');
      
      if (vfoptnfield.is(':visible')) {
          vfoptnfield.hide();
      } else {
          vfoptnfield.css('top', data + 'px');
          vfoptnfield.show();
      }
    });

    $(document).click(function(event) {
      if (!$(event.target).closest('.vfoptnfield').length && !$(event.target).closest('.frm-show-box').length) {
          $('.vfoptnfield').hide();
      }
  });

    
  $('.makenotitoggle, .widget-title').on('click', function() {
      $(this).closest('.makenotitogglehome').find('.frminsidetiggle').toggle();
      $(this).closest('.makenotitogglehome').toggleClass('open');

      if($(this).closest('.makenotitogglehome').hasClass('open')){
        $(this).closest('.vf_notiform').find('.vf_dropdown').val(1);
      }else{
        $(this).closest('.vf_notiform').find('.vf_dropdown').val(0);
      }

      $(this).closest('.makenotitogglehome').find('.frm_save_form').click();
  });


  $('.frm_save_form').on('click', function() {
    
    var nonce = $('#myvformdata12form').serialize();
    // console.log($(this).closest('.vf_notiform').serialize());
      var postdata = "action=savemynotifi&param=notifi_vform&"+$(this).closest('.vf_notiform').serialize()+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);

        if (animating) {
          return;
        }
        animating = true;
        Toast("Notification Setting Saved!", "toast-success");

      });

  });

  $('[name="vf_mode"]').on('click', function() {

    var statusElement = $(this).siblings('.myemailstatus');
    if ($(this).is(':checked')) {
        statusElement.text('Active');
    } else {
        statusElement.text('Inactive');
    }

    var nonce = $('#myvformdata12form').serialize();
    // console.log($(this).closest('.vf_notiform').serialize());
      var postdata = "action=savemynotifi&param=notifi_vform&"+$(this).closest('.vf_notiform').serialize()+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);

        if (animating) {
          return;
        }
        animating = true;
        Toast("Notification Setting Saved!", "toast-success");

      });

  });

  $('.tab_vf').click(function(){
    if (animating) {
      return;
    }
    animating = true;
    Toast("Add a submit button to your form.", "toast-success");
  });

  $('.vf_actionname').keyup(function() {
     var name = $(this).val();
     if(name!=''){
       $('.sndeml').html(name);
      }else{
        $('.sndeml').html('Send Email');
      }
  });

  $('.createnotifibtn').click(function(){

    saveme();

    // if(confirm('Have you saved your work?')){
      var nonce = $('#myvformdata10form').serialize();

      $('.createnotifibtn').html('Creating...');
      var formid = $('#vfromid').val();
      var postdata = "action=createmynotifi&param=notifi_vform&formid="+formid+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);
        
        setTimeout(() => {
          window.location.reload();
        }, 1000);

      });
    // }

  });

  $('.frm_remove_form').on('click', function() {
  var nonce = $('#myvformdata11form').serialize();
    
    var dtid = $(this).closest('.vf_notiform').attr('data-id');
    if(confirm('Are you sure?')){
      
      var postdata = "action=deletemynotifi&param=notifi_vform&id="+dtid+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);
        window.location.reload();
      });

    }

  });
  


  let animating = false;

  function Toast(message, messagetype) {
    var cont = document.getElementById("toast-container");
    cont.classList.add("show"); // correct manipulation
    var type = document.getElementById("toast-type");
    type.className += " " + messagetype;
    var x = document.getElementById("snackbar");
    x.innerHTML = message;
    setTimeout(function() {
      cont.classList.remove("show"); // access it again here
      animating = false;
    }, 3000);
  }


  $('#userpagehint').click(function(){
    Toast("In Thank you page select the confirmation type: (User Detail On Page)", "toast-success");
  });

  $('.helpmeto').click(function(){
    Toast("Send An Email to vforminfo@gmail.com", "toast-success");
    var url = 'https://docs.google.com/forms/d/e/1FAIpQLSc4m1j-tABpqNEvAgAqQBIa2v7C8glvPve7YEIIbiGWtkQ7Sw/viewform?usp=header';
      window.open(url, '_blank');
  });

  $('.css-g3razn:not(.active), .upgradenotice').click(function(){
    Toast("Want the pro version? Send An Email to vforminfo@gmail.com", "toast-success");
    var url = 'https://docs.google.com/forms/d/e/1FAIpQLSd8PHmbrNkcUw39TgpcKUsop333_-nT3QslwF0BRtjV7F00bw/viewform?usp=header';
      window.open(url, '_blank');
  });

  $('#copyembed, #copyembed2').click(function(){
    Toast("Shortcode Copied", "toast-success");
  });
  

  $('#searchformelm').keyup(function(){
    var searchValue = $(this).val().toLowerCase();
    $('.field-item').each(function() {
        var fieldName = $(this).data('fieldname').toLowerCase();
        if (fieldName.includes(searchValue)) {
            $(this).show();
        } else {
            $(this).hide();
        }
        if(searchValue!=''){
          $('.css-y83nl9').hide();
        }else{
          $('.css-y83nl9').show();
        }
    });
    
  });


  $('.secure-ul li').click(function(){

    var thid = $(this).attr('data-id');
    if(thid=='1'){
      $('.grec-description').show();
      $('.hrec-description').hide();
      $('.secure-ul li.fr').addClass('active');
      $('.secure-ul li.sec').removeClass('active');
      $('[name="whichsecurity"]').val('1');
    }else if(thid=='2'){
      $('.grec-description').hide();
      $('.hrec-description').show();
      $('.secure-ul li.fr').removeClass('active');
      $('.secure-ul li.sec').addClass('active');
      $('[name="whichsecurity"]').val('2');
    }

  });

  $('.g-saveform').click(function(){

    // if(confirm('Have you saved your work? It will refresh the page.')){

    var id = $('#vfromid').val();
    var keyid = $('[name="whichsecurity"]').val();
    var key1 = $('#rec_site_key').val();
    var key2 = $('#rec_secret_key').val();
    var key11 = $('#hcap_site_key').val();
    var key22 = $('#hcap_secret_key').val();
    var nonce = $('#myvformdata13form').serialize();

    var postdata = "action=savesecurity&param=secure_vform&id="+id+"&which="+keyid+"&key1="+key1+"&key2="+key2+"&key11="+key11+"&key22="+key22+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);
        window.location.reload();
      });

    // }


  });

  $('.gapps-saveform').click(function(){


    var id = $('#vfromid').val();
    var key = $('#google_apps_script').val();
    var nonce = $('#myvformdata133form').serialize();

    var postdata = "action=savegooglesheet&param=secure_vform&id="+id+"&key="+key+"&"+nonce;
      jQuery.post(ajax_object,postdata,function(response){
        // console.log(response);
        window.location.reload();
      });



  });



  $('#fieldsearchshow').click(function(){
    $(this).hide();
    $('.searchinp').show();
  });
  $('#hidsear').click(function(){
    $('.searchinp').hide();
    $('#searchformelm').val('');

    $('#fieldsearchshow').show();

  });

  $('.vwcode').click(function(){
    var id = $(this).data('id');
    $('.mainpopup').show();
    $('.popcode').hide();
    $('.popcode[data-id="'+id+'"]').show();
  });

  $('.mainpopup').click(function(e){
    if (!$(e.target).closest('.popcode').length) {
      $('.mainpopup').hide();
      $('.popcode').hide();
    };
  });

  $('.crosspop').click(function(e){
      $('.mainpopup').hide();
      $('.popcode').hide();
  });








        // if($.fn.draggable){
          if (typeof $.fn.sortable === 'function') {
            $(".field-item").draggable({
              helper: "clone",
              appendTo: ".css-ohesyo", // Appends the helper outside the scrolling container
              // scroll: false,
              zIndex: 10000,
              cursorAt: { top: 10, left: 10 },
              start: function (event, ui) {
                $(this).addClass("dragging"); // Add a class when dragging starts
                // console.log("Dragging started!");
            },
            drag: function (event, ui) {
                // Optional: Do something while dragging
                // console.log("Dragging in progress...");
            },
            stop: function (event, ui) {
                $(this).removeClass("dragging"); // Remove the class when dragging stops
                // console.log("Dragging stopped!");
                // saveme();

            }
            });
            // Make the droppable area accept multiple drops
            $(".vform-mainfields-inside").droppable({
              classes: {
                "ui-droppable-active": "ui-state-active",
                "ui-droppable-hover": "ui-state-hover"
              },
              drop: function (event, ui) {


                var mouseX = event.pageX;
                var mouseY = event.pageY;
        
                // Find the specific .vform-group under the mouse cursor
                var vformGroupParent = $(document.elementFromPoint(mouseX - $(window).scrollLeft(), mouseY - $(window).scrollTop())).closest(".vform-group");
        


                var insidevalue =ui.helper.data('fieldtype');

                if(insidevalue=='submit' && submitcount==0){
                  submitcount = 1;
                ui.draggable.addClass('vform-fielddisabled');
                  $('.container_vf').removeClass('open');
                  $('.vform-mainfields-inside').append(gen_vform_title(generateid,insidevalue));
                }else if(insidevalue!='submit'){

                  if(vformGroupParent!=''){
                    vformGroupParent.after(gen_vform_title(generateid, insidevalue));
                  }else{
                      $('.vform-mainfields-inside').append(gen_vform_title(generateid, insidevalue));
                  }

                }

                let pluginUrl = pluginData.pluginUrl;
                const timepickerScriptsWrapper = `
                  <div id="timepicker-resources">
                    <link rel="stylesheet" href="`+pluginUrl+`assets/css/vform-datetimepicker.css">
                    <script src="`+pluginUrl+`assets/js/vform-datetimepicker.js"></script>
                  </div>
                `;
                if((insidevalue=='datetime' || insidevalue=='date') &&  datetimecount == 0){
                  $('.vform-mainfields-inside').append(timepickerScriptsWrapper);
                  datetimecount = 1;
                }
                generateid++;



              }
            });
          }



          
          $('.Table_tableContainer__1Qt4Y').delegate(".quick_edit", "click", function(){
        // $('.quick_edit').click(function(e){
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           $('.outerpopupvf_createform').css('display','flex');
           $('.showrename').show();
           $('.showcreate').hide();
           $('.vftitletxtname').val(name);
           $('.quickeditsave').attr('data-id',id);
        });

        $('.quickeditcancel').click(function(e){
          var id = $(this).attr('data-id');
          $('.showquickedit[data-id="'+id+'"]').hide();
       });

       $('.quickeditsave').click(function(e){
        var id = $(this).attr('data-id');
        var title =  $('.vftitletxtname').val();
        var nonce = $('#myvformdata22form').serialize();

        var postdata = "action=quickeditsave&param=quickedit_vform&id="+id+"&"+nonce+"&title="+title;
        jQuery.post(ajax_object,postdata,function(response){
              // console.log(response);
              var data = jQuery.parseJSON(response);
              if(data.status==1){
                window.location.reload();
              }
        });

      });

      $('.quickeditsaveinside').click(function(e){
        var id = $(this).attr('data-id');
        var title =  $('.form-title-input[data-id="'+id+'"]').val();
        var nonce = $('#myvformdata22form').serialize();

        var postdata = "action=quickeditsave&param=quickedit_vform&id="+id+"&"+nonce+"&title="+title;
        jQuery.post(ajax_object,postdata,function(response){
              // console.log(response);
              var data = jQuery.parseJSON(response);
              if(data.status==1){
                // window.location.reload();
                $('.showedt').hide();
                 $('.mequickedit').show();
                 $('.changenameedit').text(title);
                 Toast("Form Name Changed", "toast-success");
              }
        });

      });

      $('.mequickedit').click(function(){
        var getdetail = $('.changenameedit').text();
        $('.form-title-input').val(getdetail);  
        $(this).hide();
        $('.showedt').show();
      });


      function saveme(){
        // setTimeout(() => {
          $('#savevfwork').click();
        // }, 1000);
      }

      $(document).keydown(function(e) {
          // Check for Ctrl+S (Windows) or Command+S (Mac)
          if ((e.ctrlKey || e.metaKey) && e.key === 's') {
              e.preventDefault(); // Prevent the default save dialog
              saveme();
          }
      });
        
      
      $('.Table_tableContainer__1Qt4Y').delegate(".dropbtnbox", "click", function(){
      // $('.dropbtnbox').click(function(){
        var gtid = $(this).data('testid');
        $('.floating-box[data-testid="'+gtid+'"]').show();
      });

      $(document).on('click', function (e) {
        if (!$(e.target).closest('.dropbtnbox').length && !$(e.target).closest('.floating-box').length) {
            $('.floating-box').hide();
        }
    });

    $('.Table_tableContainer__1Qt4Y').delegate(".makevformedit", "click", function(){

    // $('.makevformedit').click(function(){
      var gtid = $(this).data('id');
      var url = 'admin.php?page=vform&id='+gtid;
      window.open(url, '_self');
    });
    
    $('.Table_tableContainer__1Qt4Y').delegate(".makevformentries", "click", function(){
    // $('.makevformentries').click(function(){
      var gtid = $(this).data('id');
      var url = 'admin.php?page=vform_entries&select='+gtid;
      window.open(url, '_self');
    });

    $('#formselection').on('change', function () {
      var gtid = $(this).val(); // Get the selected value
      console.log(gtid);
      if(gtid=='start'){
        var url = 'admin.php?page=vform_entries';
      }else if (gtid) {
        var url = 'admin.php?page=vform_entries&select=' + gtid;
      }
      window.open(url, '_self'); // Redirect to the constructed URL
    });
    
    $('.Table_tableContainer__1Qt4Y').delegate(".makevformpreview", "click", function(){
    // $('.makevformpreview').click(function(){
      var url = $(this).data('id');
      window.open(url, '_blank');
    });

    
    

    $('.toggleperpage').click(function(){
      $('._popover_c1fz5_59').toggle();
    });





    //end
    });
});
