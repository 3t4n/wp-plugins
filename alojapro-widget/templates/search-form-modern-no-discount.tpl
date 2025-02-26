<div class="alojapro-widget-plugin">
    <form name="frmEngine" action="[@action]" id="frmEngine" method="post">

        <div class="container-fluid advanced alojapro-widget-banner">
            <div class="row alojapro-widget-inner-banner">
                <div class="col-md-6 col-lg-5 alojapro-checkin">
                    <div class="input-container back-white">
                        <div class="input-group d-flex align-items-center inputs">
                            <input id="from" name="from" type="text" placeholder="[@checkin_label]" class="datepicker widget_calendar form-control text-center me-2 mr-2 ml-2 me-2" />
                            <span class="test-class d-flex align-items-center ms-0 me-0"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                            <input id="to" name="to" type="text" placeholder="[@checkout_label]" class="datepicker widget_calendar form-control text-center me-2 mr-2 ml-2 me-2" />
                            <span class="btn-icon-primary"><i class="fa fa-calendar modern-calendar" aria-hidden="true"></i></span>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 alojapro-roomconfig" style="line-height: 1;">
                    <div class="input-container back-white">
                        <div class="input-group d-flex align-items-center inputs">
                            <input id="advanced-filters" type="text" placeholder="2 [@people_label], 1 [@room_label]" class="custom-input form-control me-2 mr-2 ml-2 me-2" />
                            <span class="btn-icon-primary"><i class="fa fa-user modern-user" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 col-lg-3">
                    <div class="input-container back-primary">
                        <div class="input-group d-flex align-items-center">
                            <button type="submit" class="btn btn-widget btn-widget-primary btn-search btn-modern" title="[@button_search_label]">
                                <strong class="btn-submit">[@button_search_label]</strong>
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-center"><strong style="text-align: center;">[@button_search_label]</strong></span>
                                    <span class="text-end"><i class="fa fa-check btn-icon-white" aria-hidden="true"></i></span>
                                </div> -->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--MODAL ADVANCED FILTERS-->
        <div class="modal fade" id="alojaproAdvancedFilters_modal" tabindex="-1" aria-labelledby="alojaproAdvancedFilters_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">[@button_advanced_filter_label]</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row d-flex align-items-center">
                                <!--rooms select-->
                                <label for="rooms-number" class="col-lg-2 col-md-2 col-xs-12 me-4 mb-2">[@rooms_label]</label>
                                <div class="col-lg-2 col-md-2 col-xs-12">
                                    <select id="rooms-number" class="form-control form-select ms-0 pe-1" name="rooms">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <!--ROOM 1-->
                            <div class="row room-options room-box"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-1">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 1
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="adults-select-1" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-1" class="form-control form-select me-2 mr-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="child-1" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-1" class="form-control form-select me-2 mr-2 ml-2" name="child-1">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-2 child-1 dnone">
                                    <hr class="mt-1 mb-3">
                                    <div class="col-md-4 col-sm-12 child-1 mb-2">
                                        <i class="fas fa-child me-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 2-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-1">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 2
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="adults-select-2" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-2" class="form-control form-select me-2 mr-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="child-2" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-2" class="form-control form-select  me-2 mr-2 ml-2" name="child-2">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-2 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-2">
                                        <i class="fas fa-child me-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 3-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-1">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 3
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="adults-select-3" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-3" class="form-control form-select me-2 mr-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="child-3" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-3" class="form-control form-select  me-2 mr-2 ml-2" name="child-3">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-3 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-3">
                                        <i class="fas fa-child me-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 4-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-1">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 4
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="adults-select-4" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-4" class="form-control form-select me-2 mr-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="child-4" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-4" class="form-control form-select  me-2 mr-2 ml-2" name="child-4">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-4 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-4">
                                        <i class="fas fa-child me-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 5-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-1">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 5
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="adults-select-5" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-5" class="form-control form-select me-2 mr-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-1">
                                    <label for="child-5" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-5" class="form-control form-select  me-2 mr-2 ml-2" name="child-5">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-5 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-5">
                                        <i class="fas fa-child me-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--discounts, mail & button-->
                            <div class="row d-flex align-items-center mt-3">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label for="alojapro_modal_coupon_advanced">
                                        [@modal_coupon]
                                        <i name="info_discount_code" class="fa fa-info-circle" data-toggle="tooltip" data-bs-toggle="tooltip" data-placement="auto" data-bs-placement="auto" title="[@info_code_discount]" data-bs-title="[@info_code_discount]"data-arrow="true"></i>
                                    </label>
                                </div>  
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="alojapro_modal_coupon" id="alojapro_modal_coupon_advanced" value="" class="custom-input form-control text ui-widget-content ui-corner-all">
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mt-2">
                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label for="alojapro_modal_email_advanced">
                                        [@modal_email]
                                        <i name="info_discount_mail" class="fa fa-info-circle" data-toggle="tooltip" data-bs-toggle="tooltip" data-placement="auto" data-bs-placement="auto" title="[@info_mail_discount]" data-bs-title="[@info_mail_discount]"data-arrow="true"></i>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="alojapro_modal_email" id="alojapro_modal_email_advanced" value="" class="custom-input form-control text ui-widget-content ui-corner-all">
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mt-4 mb-2">
                                <div class="col-sm-12 col-md-12 col-xl-12">
                                    <button type="button" class="btn btn-widget btn-widget-primary btn-search advanced" title="[@button_search_label]">[@button_search_label]</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="login" id="login" value="[@login]"/>
        <input type="hidden" name="password" id="password" value="[@password]"/>
        <input type="hidden" name="platformId" id="platformId" value="[@platformId]"/>
        <input type="hidden" name="widgetId" id="widgetId" value="[@widgetId]"/>
        <input type="hidden" name="widgetMobileId" id="widgetMobileId" value="[@widgetMobileId]"/>
        <input type="hidden" name="firstSearch" id="firstSearch" value="true"/>
        <input type="hidden" name="roomsCfg" id="roomsCfg" value="1-2-0"/>
        <input type="hidden" name="rooms" id="rooms" value="1"/>
        <input type="hidden" name="language" id="language" value="[@language]"/>
        <input type="hidden" name="discount_mail" id="discount_mail" value=""/>
        <input type="hidden" name="discount_code" id="discount_code" value=""/>

    </form>
</div>

<style>
    [@custom_css]
</style>

<script>

    var inputs = document.querySelectorAll(".childsScript");
    inputs.forEach(function(input) {
        input.addEventListener("input", function() {
            if (this.value > [@maxAge]) {
                this.value = [@maxAge];
            }
        });
    });
</script>
