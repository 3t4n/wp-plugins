<?php 
$id  = '';

if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
  
    if ( strpos($id, '<script>') !== false || strpos($id, '</script>') !== false ) {
        wp_die('Invalid input detected.');
    }
  
    $id = sanitize_text_field( $id );
    $id = esc_html( $id );
  }
  ?>


<div class="css-1xp8gxo" id="leftPanel">
    <div class="css-ohesyo" id="left-sidebar-content"
        style="position: relative; user-select: auto; width: 375px; height: auto; max-width: 600px; min-width: 375px; box-sizing: border-box; flex-shrink: 0;">
        <div class="css-bo9gm7">
            <div class="css-bavkx2">
                <div class="css-1atbglr">

                    <div class="css-1xtof31">
                        <div aria-label="Advanced settings" class="css-1vpeo4x"><span class="css-1b3kaao-Text"
                                data-zds="true">Form Elements</span>
                        </div>

                        <div class="css-rghtflx">
                            <div data-testid="updated-open-sub-step-buttons" class="css-1sne59z">
                                <button id="fieldsearchshow" data-variant="ghost"
                                    data-size="small" data-zds="true" type="button" aria-label="Field search"
                                    class="css-11wwuzz" data-rac=""><span aria-hidden="true" data-testid="iconContainer"
                                        data-zds="true" class="css-dyvc8d-Icon--navSearch--animate--24x24"><svg
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="24"
                                            width="24" size="24" name="navSearch">
                                            <path fill="#2D2E2E"
                                                d="m5.134 17.452-2.843 2.842 1.415 1.415 2.842-2.843-1.414-1.414ZM13 3c-4.41 0-8 3.59-8 8 0 3.75 2.98 8 8 8 4.41 0 8-3.59 8-8s-3.59-8-8-8Zm0 14c-3.8 0-6-3.21-6-6 0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6Z">
                                            </path>
                                        </svg></span>
                                </button>
                            </div>  
                                    
                            <button type="button" id="element-close-btn"
                            aria-label="Close panel" class="css-1sbwwjc" fdprocessedid="v9w6ji"><span aria-hidden="true"
                                data-testid="iconContainer" data-zds="true"
                                class="css-1bdcql8-Icon--formX--animate--24x24"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" height="24" width="24" size="24" name="formX">
                                    <path fill="#2D2E2E"
                                        d="M16.29 6.29 12 10.59l-4.29-4.3-1.42 1.42 4.3 4.29-4.3 4.29 1.42 1.42 4.29-4.3 4.29 4.3 1.42-1.42-4.3-4.29 4.3-4.29-1.42-1.42Z">
                                    </path>
                                </svg></span>
                            </button>
                        </div>

                    </div>

                    
                    <div class="searchinp">
                            <input type="text" autocomplete="off" name="serachformat" placeholder="Type To Search Element" id="searchformelm">
                            <span id="hidsear"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="fieldsPanel-closeIcon">
                                <path fill-rule="evenodd" d="M17.707 7.707a1 1 0 0 0-1.414-1.414L12 10.586 7.707 6.293a1 1 0 0 0-1.414 1.414L10.586 12l-4.293 4.293a1 1 0 1 0 1.414 1.414L12 13.414l4.293 4.293a1 1 0 0 0 1.414-1.414L13.414 12l4.293-4.293Z" clip-rule="evenodd"></path>
                            </svg></span>
                        </div>

                </div>
            </div>
            <div data-sidebar-panel-scrolling="unique-id--12" class="css-4fupsn fieldSection">

                                    
                                    

                <!-- inside elements -->
                
                <div class="css-1j3135w">

                    <div class="css-13afdnn field-item" data-fieldtype="heading" data-fieldname="Heading">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm3 4a1 1 0 0 1 1 1v4h6V7a1 1 0 1 1 2 0v10a1 1 0 1 1-2 0v-4H9v4a1 1 0 1 1-2 0V7a1 1 0 0 1 1-1Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Heading
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="name" data-fieldname="Full Name">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M5 1a4 4 0 0 0-4 4v14a4 4 0 0 0 4 4h14a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5Zm-.02 20h14.04c-.547-2.961-3.482-5.222-7.02-5.222-3.538 0-6.473 2.26-7.02 5.222ZM12 13.11A3.556 3.556 0 1 0 12 6a3.556 3.556 0 0 0 0 7.111Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Name
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="email" data-fieldname="Email">
                        <div>
                        <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                            
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M1 7.52V18a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3V7.52l-9.28 6.496a3 3 0 0 1-3.44 0L1 7.521Zm21.881-2.358A3.001 3.001 0 0 0 20 3H4a3.001 3.001 0 0 0-2.881 2.162l10.308 7.216a1 1 0 0 0 1.146 0l10.308-7.216Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Email
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="address" data-fieldname="Address">
                        <div>
                        <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                            
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                            class="field-iconSvg">
                            <path fill-rule="evenodd"
                            d="M12 1a9 9 0 0 0-9 9c0 2.324.971 4.384 2.34 6.274 1.35 1.867 3.159 3.66 4.96 5.446l.037.036c.318.316.637.632.956.951a1 1 0 0 0 1.414 0c.319-.319.638-.635.956-.95l.037-.037c1.801-1.786 3.61-3.58 4.96-5.446C20.03 14.384 21 12.324 21 10a9 9 0 0 0-9-9ZM8 9a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z"
                            clip-rule="evenodd"></path>
                        </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Address
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="phone" data-fieldname="Phone">
                        <div>
                        <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                            
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="m10.17 8.38-.412.41c.095.228.221.51.377.82.41.819 1 1.792 1.753 2.544.752.753 1.726 1.344 2.544 1.753.311.156.592.282.82.377l.41-.411a2.21 2.21 0 0 1 3.125 0l2.607 2.607a2.21 2.21 0 0 1 0 3.124l-1.408 1.41c-1.008 1.006-2.557 1.299-3.862.631-2.077-1.062-5.956-3.2-8.24-5.486-2.286-2.285-4.424-6.163-5.487-8.241-.668-1.305-.375-2.854.632-3.861l1.409-1.41a2.21 2.21 0 0 1 3.124 0l2.607 2.608a2.209 2.209 0 0 1 0 3.124Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Phone
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="datetime" data-fieldname="Date Picker">
                        <div>
                        <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                            
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M8 1a1 1 0 0 1 1 1v1h6V2a1 1 0 1 1 2 0v1h2a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h2V2a1 1 0 0 1 1-1Zm12 5v3H4V6a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V5h6v1a1 1 0 1 0 2 0V5h2a1 1 0 0 1 1 1Zm-4.625 7.963c-.2-.391-.512-.587-.939-.587-.427 0-.743.196-.95.587-.198.39-.298 1.07-.298 2.037 0 .967.1 1.646.299 2.037.206.391.522.587.95.587.426 0 .739-.196.938-.587.206-.39.31-1.07.31-2.037 0-.967-.104-1.646-.31-2.037Zm1.387 5.098c-.505.626-1.28.939-2.326.939-1.045 0-1.824-.313-2.336-.939-.505-.625-.757-1.646-.757-3.061s.252-2.436.757-3.061c.512-.626 1.29-.939 2.336-.939 1.046 0 1.82.313 2.326.939.511.625.767 1.646.767 3.061s-.256 2.436-.767 3.061Zm-10.08-3.818-.15-.406a.875.875 0 0 1-.032-.522.886.886 0 0 1 .256-.448l1.43-1.344a1.512 1.512 0 0 1 1.045-.416h.683c.17 0 .312.06.426.181a.6.6 0 0 1 .17.427v6.57a.602.602 0 0 1-.17.427.562.562 0 0 1-.426.181H9.23a.602.602 0 0 1-.597-.608v-5.077h-.02l-1.28 1.184a.38.38 0 0 1-.363.107.39.39 0 0 1-.288-.256Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Date Time Picker
                            </span>
                        </div>
                    </div>

                </div>

                <div class="css-y83nl9"><span class="css-bnio2e-Text" data-zds="true">Basic Elements</span></div>

                <div class="css-1j3135w">

                    <div class="css-13afdnn field-item" data-fieldtype="singleline" data-fieldname="Short Text">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M14 2a1 1 0 1 0 0 2 2 2 0 0 1 2 2v12a2 2 0 0 1-2 2 1 1 0 1 0 0 2 4 4 0 0 0 3-1.354A3.998 3.998 0 0 0 20 22a1 1 0 1 0 0-2 2 2 0 0 1-2-2V6a2 2 0 0 1 2-2 1 1 0 1 0 0-2 4 4 0 0 0-3 1.354 3.979 3.979 0 0 0-1.47-1.05A4 4 0 0 0 14 2Zm1 4H3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12v-2H3V8h12V6Zm4 12v-2h2V8h-2V6h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2ZM7.61 10.216l-.64 2.36c0 .016.005.032.016.049.01.01.024.016.04.016H8.21c.017 0 .03-.005.041-.016.017-.017.022-.033.017-.05l-.641-2.359c0-.005-.003-.008-.009-.008-.005 0-.008.003-.008.008ZM5.334 15a.314.314 0 0 1-.272-.14.318.318 0 0 1-.04-.304l1.725-5.112a.698.698 0 0 1 .239-.32A.637.637 0 0 1 7.364 9h.542c.143 0 .269.041.378.123a.63.63 0 0 1 .239.32l1.734 5.113a.305.305 0 0 1-.05.304.314.314 0 0 1-.27.14h-.551a.624.624 0 0 1-.37-.123.643.643 0 0 1-.222-.33l-.206-.78c-.005-.044-.035-.066-.09-.066H6.739c-.05 0-.08.022-.09.066l-.206.78a.583.583 0 0 1-.222.33.601.601 0 0 1-.37.123h-.517Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Short Text
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="paragraph" data-fieldname="Long Text">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M1 4a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v16a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V4Zm3-1a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4Zm7.285 7.44v1.408c0 .048.024.077.072.088.112.021.248.032.408.032.378 0 .656-.07.832-.208.176-.144.264-.363.264-.656 0-.49-.4-.736-1.2-.736h-.312c-.043 0-.064.024-.064.072Zm0-2.288v1.176c0 .043.021.064.064.064h.2c.778 0 1.168-.232 1.168-.696 0-.443-.326-.664-.976-.664-.155 0-.286.01-.392.032-.043.01-.064.04-.064.088Zm-.888 4.784a.454.454 0 0 1-.32-.168.52.52 0 0 1-.128-.344V7.576a.5.5 0 0 1 .128-.344c.09-.101.2-.157.328-.168A11.9 11.9 0 0 1 11.629 7c1.546 0 2.32.499 2.32 1.496 0 .336-.11.621-.328.856-.214.235-.502.384-.864.448-.006 0-.008.005-.008.016 0 .005.005.008.016.008.421.059.754.219 1 .48.25.261.376.573.376.936 0 .592-.198 1.035-.592 1.328-.39.288-1.003.432-1.84.432-.422 0-.859-.021-1.312-.064ZM6.54 8.264l-.624 2.296c0 .016.005.032.016.048.01.01.024.016.04.016h1.152a.054.054 0 0 0 .04-.016c.016-.016.021-.032.016-.048l-.624-2.296c0-.005-.003-.008-.008-.008-.006 0-.008.003-.008.008ZM4.325 12.92a.306.306 0 0 1-.264-.136.31.31 0 0 1-.04-.296L5.7 7.512a.68.68 0 0 1 .232-.312.62.62 0 0 1 .368-.12h.528c.138 0 .261.04.368.12.112.08.189.184.232.312l1.688 4.976a.298.298 0 0 1-.048.296.306.306 0 0 1-.264.136h-.536a.608.608 0 0 1-.36-.12.626.626 0 0 1-.216-.32l-.2-.76c-.006-.043-.035-.064-.088-.064H5.693c-.048 0-.078.021-.088.064l-.2.76a.568.568 0 0 1-.216.32.585.585 0 0 1-.36.12h-.504ZM14 4.5a.5.5 0 0 0 0 1A1.5 1.5 0 0 1 15.5 7v6a1.5 1.5 0 0 1-1.5 1.5.5.5 0 0 0 0 1 2.5 2.5 0 0 0 2-1 2.51 2.51 0 0 0 1.043.81 2.5 2.5 0 0 0 .957.19.5.5 0 0 0 0-1 1.5 1.5 0 0 1-1.5-1.5V7A1.502 1.502 0 0 1 18 5.5a.5.5 0 0 0 0-1 2.5 2.5 0 0 0-2 1 2.502 2.502 0 0 0-2-1Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Long Text
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="title" data-fieldname="Paragraph">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path
                                    d="m7.31 8.475-1.304 4.799a.18.18 0 0 0 .033.1c.023.022.05.033.084.033h2.408a.113.113 0 0 0 .083-.033c.034-.034.045-.067.034-.1l-1.304-4.8c0-.01-.006-.016-.017-.016-.011 0-.017.006-.017.017Zm-4.63 9.731a.64.64 0 0 1-.552-.284.646.646 0 0 1-.084-.619l3.512-10.4c.1-.268.261-.485.484-.652.235-.167.49-.251.77-.251h1.103c.29 0 .546.084.77.25.233.168.395.385.484.653l3.528 10.4a.623.623 0 0 1-.1.619.64.64 0 0 1-.552.284h-1.12a1.27 1.27 0 0 1-.753-.25 1.308 1.308 0 0 1-.451-.67L9.3 15.699c-.011-.09-.072-.134-.184-.134H5.538c-.1 0-.162.045-.184.134l-.418 1.589c-.067.267-.218.49-.452.668a1.216 1.216 0 0 1-.752.251H2.679Zm15.933-3.996c-.758 0-1.337.117-1.738.351-.39.234-.586.546-.586.937 0 .3.09.534.268.702.19.167.44.25.752.25.558 0 1.015-.172 1.371-.518.368-.345.552-.786.552-1.32v-.268c0-.09-.05-.134-.15-.134h-.469Zm-2.006 4.163c-.836 0-1.505-.234-2.006-.702-.502-.468-.753-1.109-.753-1.923 0-.958.407-1.727 1.22-2.307.826-.58 2.007-.87 3.545-.87h.469c.1 0 .15-.05.15-.15-.01-.446-.117-.753-.317-.92-.19-.178-.524-.267-1.004-.267-.769 0-1.566.133-2.39.4a.822.822 0 0 1-.67-.05.717.717 0 0 1-.368-.518l-.016-.033a1.13 1.13 0 0 1 .117-.786.97.97 0 0 1 .602-.485 9.804 9.804 0 0 1 2.842-.418c1.394 0 2.386.268 2.977.803.602.524.902 1.388.902 2.591v3.127c0 .546.028 1.015.084 1.405a.811.811 0 0 1-.184.652.744.744 0 0 1-.602.284h-.635a1.11 1.11 0 0 1-.736-.267 1.04 1.04 0 0 1-.351-.67 1.159 1.159 0 0 1-.033-.133v-.134c0-.01-.006-.016-.017-.016-.022 0-.034.005-.034.016a3.132 3.132 0 0 1-1.204 1.004 3.571 3.571 0 0 1-1.588.367Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Paragraph
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="dropdown" data-fieldname="Dropdown">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M5 2a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm8.293 4.293a1 1 0 0 1 1.414 0L16 7.586l1.293-1.293a1 1 0 1 1 1.414 1.414l-2 2a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 0-1.414ZM2 17a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h15a1 1 0 1 0 0-2H3Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Dropdown
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="multiplechoice" data-fieldname="Single Choice">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18ZM1 12C1 5.925 5.925 1 12 1s11 4.925 11 11-4.925 11-11 11S1 18.075 1 12Zm11-7a7 7 0 1 0 0 14 7 7 0 0 0 0-14Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Single Choice
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="checkboxes" data-fieldname="Multiple Choice">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm12.707 7.707a1 1 0 0 0-1.414-1.414L11 13.586l-2.293-2.293a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l6-6Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Multiple Choice
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="number" data-fieldname="Number">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M5 2a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a3 3 0 0 0-3-3H5Zm2.732 6.137c.202.202.44.303.713.303h5.218c.023 0 .035.012.035.035 0 .024-.012.048-.035.072-1.829 2.896-3.402 6.06-4.72 9.491a.655.655 0 0 0 .072.66.68.68 0 0 0 .587.302h1.211c.297 0 .57-.089.82-.267.249-.178.42-.41.516-.695 1.092-3.205 2.398-6.12 3.918-8.743a3.773 3.773 0 0 0 .498-1.87v-.41c0-.273-.1-.51-.302-.712A.918.918 0 0 0 15.568 6H8.445c-.273 0-.51.1-.713.303a.975.975 0 0 0-.302.712v.41c0 .273.1.51.302.712Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Number
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="image" data-fieldname="Image">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="field-iconSvg">
                                    <path fill-rule="evenodd"
                                    d="M1 6a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V6Zm9 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm5.248 2.312 5.59 7.416A.794.794 0 0 1 20.204 19H3.796a.794.794 0 0 1-.643-1.26l3.63-5.002a.794.794 0 0 1 1.285 0l2.003 2.76 3.909-5.186a.794.794 0 0 1 1.268 0Z"
                                    clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Image
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="date" data-fieldname="Date Picker">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M8 1a1 1 0 0 1 1 1v1h6V2a1 1 0 1 1 2 0v1h2a3 3 0 0 1 3 3v14a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3h2V2a1 1 0 0 1 1-1Zm12 5v3H4V6a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V5h6v1a1 1 0 1 0 2 0V5h2a1 1 0 0 1 1 1Zm-4.625 7.963c-.2-.391-.512-.587-.939-.587-.427 0-.743.196-.95.587-.198.39-.298 1.07-.298 2.037 0 .967.1 1.646.299 2.037.206.391.522.587.95.587.426 0 .739-.196.938-.587.206-.39.31-1.07.31-2.037 0-.967-.104-1.646-.31-2.037Zm1.387 5.098c-.505.626-1.28.939-2.326.939-1.045 0-1.824-.313-2.336-.939-.505-.625-.757-1.646-.757-3.061s.252-2.436.757-3.061c.512-.626 1.29-.939 2.336-.939 1.046 0 1.82.313 2.326.939.511.625.767 1.646.767 3.061s-.256 2.436-.767 3.061Zm-10.08-3.818-.15-.406a.875.875 0 0 1-.032-.522.886.886 0 0 1 .256-.448l1.43-1.344a1.512 1.512 0 0 1 1.045-.416h.683c.17 0 .312.06.426.181a.6.6 0 0 1 .17.427v6.57a.602.602 0 0 1-.17.427.562.562 0 0 1-.426.181H9.23a.602.602 0 0 1-.597-.608v-5.077h-.02l-1.28 1.184a.38.38 0 0 1-.363.107.39.39 0 0 1-.288-.256Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Date
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="time" data-fieldname="Time">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1Zm0 5a1 1 0 0 1 1 1v5h3a1 1 0 1 1 0 2h-4a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                                Time
                            </span>
                        </div>
                    </div>


                </div>

                <div class="css-y83nl9"><span class="css-bnio2e-Text" data-zds="true">Page Elements</span></div>

                <div class="css-1j3135w">

                    <div class="css-13afdnn field-item" data-fieldtype="divider" data-fieldname="Divider">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd" d="M4 12a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Divider
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="pagebreak" data-fieldname="Page Break">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="field-iconSvg">
                                <path fill-rule="evenodd"
                                d="M2 4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Zm19 8a1 1 0 0 1-1 1h-2a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1Zm-6 0a1 1 0 0 1-1 1h-4a1 1 0 1 1 0-2h4a1 1 0 0 1 1 1Zm-8 0a1 1 0 0 1-1 1H4a1 1 0 1 1 0-2h2a1 1 0 0 1 1 1Zm-3 3a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1v-3a2 2 0 0 0-2-2H4Z"
                                clip-rule="evenodd"></path>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Page Break
                            </span>
                        </div>
                    </div>

                </div>

                <div class="css-y83nl9"><span class="css-bnio2e-Text" data-zds="true">Advance Elements</span></div>

                <?php

                    $id = intval($id); // Assuming id is an integer
                    $query = "SELECT * FROM {$wpdb->prefix}vform WHERE id = %d";
                    $vfsec = $wpdb->get_results($wpdb->prepare($query, $id), OBJECT);

                    // $vfsec = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}vform WHERE id = '{$id}'", OBJECT );
                    foreach ( $vfsec as $key1=>$val1 ) {
                        $sectype = $val1->security_type==null ? '1': $val1->security_type;
                        $key1 = $val1->rec_site_key==null ? '': $val1->rec_site_key;
                        $key2 = $val1->rec_secret_key==null ? '': $val1->rec_secret_key;
                        $key11 = $val1->hcap_site_key==null ? '': $val1->hcap_site_key;
                        $key22 = $val1->hcap_secret_key==null ? '': $val1->hcap_secret_key;

                        if($key11!='' && $key11!=null && $sectype=='2'){
                            echo '<script src="https://js.hcaptcha.com/1/api.js?hl=en" async defer></script>
                            <script type="text/javascript">
                            var yourFunction = function () {
                                var widgetID = hcaptcha.render("captcha-1", { sitekey: "'.$key11.'" });
                            };
                            </script>';
                        }

                        if($key1!='' && $key1!=null && $sectype=='1'){
                            echo '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
                        }
                    }
                ?>

                <div class="css-1j3135w">

                     <div class="css-13afdnn field-item" data-fieldtype="fileupload" data-fieldname="File Upload">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.293 3.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1-1.414 1.414L13 6.414V16a1 1 0 1 1-2 0V6.414L8.707 8.707a1 1 0 0 1-1.414-1.414l4-4Z" fill="#ffffff"/><path d="M6 17a1 1 0 1 0-2 0v.6C4 19.482 5.518 21 7.4 21h9.2c1.882 0 3.4-1.518 3.4-3.4V17a1 1 0 1 0-2 0v.6c0 .778-.622 1.4-1.4 1.4H7.4c-.778 0-1.4-.622-1.4-1.4V17Z" fill="#ffffff"/></svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            File Upload
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" id="field_recaptcha" style="<?php echo $key1 != '' ? '': 'display:none;'; ?>" data-fieldtype="recapthca" data-fieldname="Recaptcha">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/g-cap.png" style="width: 100%;">
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            reCAPTCHA
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" id="field_hcaptcha" style="<?php echo $key11 != '' ? '': 'display:none;'; ?>" data-fieldtype="hcapthca" data-fieldname="Hcaptcha">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                                <img src="<?php echo VFORM_PLUGIN_URL; ?>/assets/images/h-cap.png" style="width: 100%;">
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            hcapthca
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="websiteurl" data-fieldname="websiteurl">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 24 24" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-339.000000, -600.000000)" fill="#ffffff">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M286.388001,443.226668 C288.054626,441.639407 290.765027,441.639407 292.431651,443.226668 L293.942296,444.665378 L295.452942,443.226668 L293.942296,441.787958 C291.439155,439.404014 287.380498,439.404014 284.877356,441.787958 C282.374215,444.171902 282.374215,448.03729 284.877356,450.421235 L286.388001,451.859945 L287.898647,450.421235 L286.388001,448.982525 C284.721377,447.395264 284.721377,444.813929 286.388001,443.226668 L286.388001,443.226668 Z M302.122644,449.578765 L300.611999,448.139038 L299.101353,449.578765 L300.611999,451.017475 C302.277554,452.603719 302.277554,455.186071 300.611999,456.773332 C298.945374,458.359576 296.233905,458.359576 294.568349,456.773332 L293.057704,455.333605 L291.54599,456.773332 L293.057704,458.212042 C295.560845,460.595986 299.619502,460.595986 302.122644,458.212042 C304.625785,455.828098 304.625785,451.96271 302.122644,449.578765 L302.122644,449.578765 Z M288.653969,443.946023 L299.856676,454.61425 L298.344962,456.053977 L287.143324,445.384733 L288.653969,443.946023 Z"
                                        id="url-[#1423]">
                                    </path>
                                    </g>
                                </g>
                                </g>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Website Url
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="password" data-fieldname="Password">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                d="M21 8.5V6C21 4.89543 20.1046 4 19 4H5C3.89543 4 3 4.89543 3 6V11C3 12.1046 3.89543 13 5 13H10.875M19 14V12C19 10.8954 18.1046 10 17 10C15.8954 10 15 10.8954 15 12V14M14 20H20C20.5523 20 21 19.5523 21 19V15C21 14.4477 20.5523 14 20 14H14C13.4477 14 13 14.4477 13 15V19C13 19.5523 13.4477 20 14 20Z"
                                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="7.5" cy="8.5" r="1.5" fill="#ffffff" />
                                <circle cx="12" cy="8.5" r="1.5" fill="#ffffff" />
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Password
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="hidden" data-fieldname="Hidden">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0" fill="none" width="20" height="20" />
                                <g fill="#ffffff">
                                <path
                                    d="M17.3 3.3c-.4-.4-1.1-.4-1.6 0l-2.4 2.4c-1.1-.4-2.2-.6-3.3-.6-3.8.1-7.2 2.1-9 5.4.2.4.5.8.8 1.2.8 1.1 1.8 2 2.9 2.7L3 16.1c-.4.4-.5 1.1 0 1.6.4.4 1.1.5 1.6 0L17.3 4.9c.4-.5.4-1.2 0-1.6zm-10.6 9l-1.3 1.3c-1.2-.7-2.3-1.7-3.1-2.9C3.5 9 5.1 7.8 7 7.2c-1.3 1.4-1.4 3.6-.3 5.1zM10.1 9c-.5-.5-.4-1.3.1-1.8.5-.4 1.2-.4 1.7 0L10.1 9zm8.2.5c-.5-.7-1.1-1.4-1.8-1.9l-1 1c.8.6 1.5 1.3 2.1 2.2C15.9 13.4 13 15 9.9 15h-.8l-1 1c.7-.1 1.3 0 1.9 0 3.3 0 6.4-1.6 8.3-4.3.3-.4.5-.8.8-1.2-.3-.3-.5-.7-.8-1zM14 10l-4 4c2.2 0 4-1.8 4-4z" />
                                </g>
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Hidden
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="termscondition" data-fieldname="Terms Condition">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M182.52 146.2h585.14v402.28h73.15V73.06H109.38v877.71h402.28v-73.14H182.52z"
                            fill="#ffffff" />
                            <path
                            d="M255.67 219.34h438.86v73.14H255.67zM255.67 365.63h365.71v73.14H255.67zM255.67 511.91H475.1v73.14H255.67zM731.02 585.06c-100.99 0-182.86 81.87-182.86 182.86s81.87 182.86 182.86 182.86 182.86-81.87 182.86-182.86-81.87-182.86-182.86-182.86z m0 292.57c-60.5 0-109.71-49.22-109.71-109.71 0-60.5 49.22-109.71 109.71-109.71 60.5 0 109.71 49.22 109.71 109.71 0 60.49-49.22 109.71-109.71 109.71z"
                            fill="#ffffff" />
                            <path d="M717.88 777.65l-42.55-38.13-36.61 40.86 84.02 75.27 102.98-118.47-41.39-36z"
                            fill="#ffffff" /></svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Terms & Conditions
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="link" data-fieldname="Link">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"
                                mirror-in-rtl="true">
                                <path fill="#ffffff"
                                d="M12.1.6a.944.944 0 0 0 .2 1.04l1.352 1.353L10.28 6.37a.956.956 0 0 0 1.35 1.35l3.382-3.38 1.352 1.352a.944.944 0 0 0 1.04.2.958.958 0 0 0 .596-.875V.96a.964.964 0 0 0-.96-.96h-4.057a.958.958 0 0 0-.883.6z" />
                                <path fill="#ffffff"
                                d="M14 11v5a2.006 2.006 0 0 1-2 2H2a2.006 2.006 0 0 1-2-2V6a2.006 2.006 0 0 1 2-2h5a1 1 0 0 1 0 2H2v10h10v-5a1 1 0 0 1 2 0z" />
                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Link
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="month" data-fieldname="Month">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg fill="#ffffff" class="field-iconSvg" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 442 442"
                            xml:space="preserve">
                            <g>
                            <path d="M432,70.438h-43.642v-4.774c0-16.114-13.11-29.224-29.224-29.224s-29.224,13.11-29.224,29.224v4.774h-33.641v-4.774
                            c0-16.114-13.11-29.224-29.224-29.224s-29.224,13.11-29.224,29.224v4.774h-33.642v-4.774c0-16.114-13.11-29.224-29.224-29.224
                            s-29.224,13.11-29.224,29.224v4.774h-33.642v-4.774c0-16.114-13.11-29.224-29.224-29.224c-16.114,0-29.224,13.11-29.224,29.224
                            v4.774H10c-5.523,0-10,4.477-10,10v315.124c0,5.523,4.477,10,10,10h422c5.523,0,10-4.477,10-10V80.438
                            C442,74.915,437.523,70.438,432,70.438z M359.134,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548c0,5.086-4.138,9.224-9.224,9.224
                            s-9.224-4.138-9.224-9.224V80.447c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663C349.91,60.577,354.048,56.439,359.134,56.439z
                            M267.045,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548c0,5.086-4.138,9.224-9.224,9.224s-9.224-4.138-9.224-9.224V80.447
                            c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663C257.821,60.577,261.958,56.439,267.045,56.439z M165.731,65.663
                            c0-5.086,4.138-9.224,9.224-9.224s9.224,4.138,9.224,9.224v14.765c0,0.003,0,0.006,0,0.01s0,0.006,0,0.01v14.764
                            c0,5.086-4.138,9.224-9.224,9.224s-9.224-4.138-9.224-9.224V65.663z M82.866,56.439c5.086,0,9.224,4.138,9.224,9.224v29.548
                            c0,5.086-4.138,9.224-9.224,9.224c-5.086,0-9.224-4.138-9.224-9.224V80.447c0-0.003,0-0.006,0-0.01s0-0.006,0-0.01V65.663
                            C73.642,60.577,77.779,56.439,82.866,56.439z M53.642,90.438v4.774c0,16.114,13.11,29.224,29.224,29.224
                            c16.114,0,29.224-13.11,29.224-29.224v-4.774h33.642v4.774c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774
                            h33.642v4.774c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774h33.641v4.774
                            c0,16.114,13.11,29.224,29.224,29.224s29.224-13.11,29.224-29.224v-4.774H422v47.738H20V90.438H53.642z M20,385.561V158.175h402
                            v227.386H20z" />
                            <path d="M96.485,204.926H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S102.008,204.926,96.485,204.926z" />
                            <path d="M190.312,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S195.835,204.926,190.312,204.926z" />
                            <path d="M284.14,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S289.663,204.926,284.14,204.926z" />
                            <path d="M377.967,204.926h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S383.49,204.926,377.967,204.926z" />
                            <path d="M96.485,261.375H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S102.008,261.375,96.485,261.375z" />
                            <path d="M190.312,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S195.835,261.375,190.312,261.375z" />
                            <path d="M284.14,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S289.663,261.375,284.14,261.375z" />
                            <path d="M377.967,261.375h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S383.49,261.375,377.967,261.375z" />
                            <path d="M96.485,317.823H63.974c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S102.008,317.823,96.485,317.823z" />
                            <path d="M190.312,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S195.835,317.823,190.312,317.823z" />
                            <path d="M284.14,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S289.663,317.823,284.14,317.823z" />
                            <path d="M377.967,317.823h-32.511c-5.523,0-10,4.477-10,10s4.477,10,10,10h32.511c5.523,0,10-4.477,10-10
                            S383.49,317.823,377.967,317.823z" />
                            </g>
                        </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Months
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="week" data-fieldname="Week">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 32 32" id="svg5" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">

                                <defs id="defs2" />

                                <g id="layer1" transform="translate(36,-196)">

                                <path
                                    d="m -31,199.00586 c -1.644701,0 -3,1.3553 -3,3 v 21 c 0,1.6447 1.355299,3 3,3 h 22 c 1.6447011,0 3,-1.3553 3,-3 v -21 c 0,-1.6447 -1.3552989,-3 -3,-3 z m 0,2 h 22 c 0.5712967,0 1,0.4287 1,1 v 21 c 0,0.5713 -0.4287033,1 -1,1 h -22 c -0.571297,0 -1,-0.4287 -1,-1 v -21 c 0,-0.5713 0.428703,-1 1,-1 z"
                                    id="rect25665"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path d="m -33,206.00586 a 1,1 0 0 0 -1,1 1,1 0 0 0 1,1 h 26 a 1,1 0 0 0 1,-1 1,1 0 0 0 -1,-1 z"
                                    id="path25667"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -29,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                                    id="path25669"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -20,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                                    id="path25671"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -11,197.00586 a 1,1 0 0 0 -1,1 v 5 a 1,1 0 0 0 1,1 1,1 0 0 0 1,-1 v -5 a 1,1 0 0 0 -1,-1 z"
                                    id="path25673"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -14,210.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                                    id="rect25677"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -21,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                                    id="rect25679"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -28,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                                    id="rect25681"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -14,217.00586 c -1.090702,0 -2,0.9093 -2,2 v 2 c 0,1.0907 0.909298,2 2,2 h 2 c 1.090702,0 2,-0.9093 2,-2 v -2 c 0,-1.0907 -0.909298,-2 -2,-2 z m 0,2 h 2 v 2 h -2 z"
                                    id="rect25683"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -25.585937,210.5918 a 1,1 0 0 0 -0.707032,0.29297 l -2.828125,2.82812 a 1,1 0 0 0 0,1.41406 1,1 0 0 0 1.414063,0 l 2.828125,-2.82812 a 1,1 0 0 0 0,-1.41406 1,1 0 0 0 -0.707031,-0.29297 z"
                                    id="path25685"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -28.414062,210.5918 a 1,1 0 0 0 -0.707032,0.29297 1,1 0 0 0 0,1.41406 l 2.828125,2.82812 a 1,1 0 0 0 1.414063,0 1,1 0 0 0 0,-1.41406 l -2.828125,-2.82812 a 1,1 0 0 0 -0.707031,-0.29297 z"
                                    id="path25687"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -19,210.5918 a 1,1 0 0 0 -0.707031,0.29297 l -2.828125,2.82812 a 1,1 0 0 0 0,1.41406 1,1 0 0 0 1.414062,0 l 2.828125,-2.82812 a 1,1 0 0 0 0,-1.41406 A 1,1 0 0 0 -19,210.5918 Z"
                                    id="path25689"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                <path
                                    d="m -21.828125,210.5918 a 1,1 0 0 0 -0.707031,0.29297 1,1 0 0 0 0,1.41406 l 2.828125,2.82812 a 1,1 0 0 0 1.414062,0 1,1 0 0 0 0,-1.41406 l -2.828125,-2.82812 a 1,1 0 0 0 -0.707031,-0.29297 z"
                                    id="path25691"
                                    style="color:#ffffff;fill:#ffffff;fill-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4.1;-inkscape-stroke:none" />

                                </g>

                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Weeks
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="color" data-fieldname="Color">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

                                <defs>

                                <style>
                                    .cls-1 {
                                    fill: none;
                                    stroke: #ffffff;
                                    stroke-miterlimit: 10;
                                    stroke-width: 1.92px;
                                    }
                                </style>

                                </defs>

                                <g id="roll_brush" data-name="roll brush">

                                <circle class="cls-1" cx="5.73" cy="13.45" r="0.48" />

                                <circle class="cls-1" cx="7.65" cy="18.24" r="0.48" />

                                <circle class="cls-1" cx="6.69" cy="8.65" r="0.48" />

                                <circle class="cls-1" cx="10.52" cy="5.78" r="0.48" />

                                <circle class="cls-1" cx="15.32" cy="6.74" r="0.48" />

                                <circle class="cls-1" cx="18.2" cy="10.57" r="0.48" />

                                <path class="cls-1"
                                    d="M22.51,11.86a4.87,4.87,0,0,1-4.86,4.95H16.18a4.28,4.28,0,0,0-3.57,1.91l-1.15,1.72a4.74,4.74,0,0,1-4,2.12h0a4.61,4.61,0,0,1-3.87-2A13.07,13.07,0,0,1,1.41,13.3V12a10.55,10.55,0,0,1,21.1-.15Z" />

                                </g>

                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Color
                            </span>
                        </div>
                    </div>

                    <div class="css-13afdnn field-item" data-fieldtype="button" data-fieldname="Button">
                        <div>
                            <svg class="scfcss" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="none" stroke="#444444" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                <circle cy="5.5" cx="2.5" r=".75"/>
                                <circle cy="5.5" cx="8" r=".75"/>
                                <circle cy="5.5" cx="13.5" r=".75"/>
                                <circle cy="10.5" cx="2.5" r=".75"/>
                                <circle cy="10.5" cx="8" r=".75"/>
                                <circle cy="10.5" cx="13.5" r=".75"/>
                            </svg>
                        </div>
                        <div class="css-j4zpza">
                            <div data-testid="changehistory-icon" class="css-189x95l">
                            <svg class="field-iconSvg" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0" fill="none" width="20" height="20" />
                                <g fill="#ffffff">
                                <path
                                    d="M17 5H3c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm1 7c0 .6-.4 1-1 1H3c-.6 0-1-.4-1-1V7c0-.6.4-1 1-1h14c.6 0 1 .4 1 1v5z" />
                                </g>

                            </svg>
                            </div>
                        </div>
                        <div class="css-xlku5k">
                            <span class="css-fwfbhb">
                            Button
                            </span>
                        </div>
                    </div>

                </div>

                <!-- inside elements -->

            </div>
        </div>
    </div>
</div>