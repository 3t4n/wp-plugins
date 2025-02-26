<div class="alojapro-widget-plugin">
    <form name="frmEngine" action="[@action]" id="frmEngine" method="post">

         <div class="container-fluid">
            <div class="row alojapro-widget-inner-banner d-flex align-items-center ">
                <div id="text" class="col-md-12 col-lg-2 mt-2 mb-2  d-flex align-items-center ">
                    <i id="check-icon" class="fa fa-check-circle pe-2"></i>
                    <span class="check_dispo">[@info_label]</span>
                </div>
                <div class="col-md-6 col-lg-2 mt-2 mb-2 alojapro-checkin">
                    <div class="input-group date">
                        <input id="from" name="from" type="text" placeholder="[@checkin_label]" class="datepicker widget_calendar custom-input form-control" autocomplete="off" />
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mt-2 mb-2 alojapro-checkout">
                    <div class="input-group date">
                        <input id="to" name="to" type="text" placeholder="[@checkout_label]" class="datepicker widget_calendar custom-input form-control" autocomplete="off" />
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3 mt-2 mb-2">
                    <button type="button" data-toggle="modal" data-bs-toggle="modal" data-target="#alojaproDiscounts_modal" data-bs-target="#alojaproDiscounts_modal" class="btn btn-widget btn-widget-secondary btn-discounts open-modal-alojapro-discounts" title="[@button_discounts_label]" style="width:100%;">
                        <i class="fa fa-check mr-1 dnone" aria-hidden="true"></i>
                        [@button_discounts_label]
                    </button>
                </div>
                <div class="col-md-12 col-lg-3 mt-2 mb-2">
                    <button type="submit" class="btn btn-widget btn-widget-primary btn-search" title="[@button_search_label]">[@button_search_label]</button>
                </div>
            </div>
        </div>
        
        <!-- MODAL DISCOUNTS -->
        <div class="modal fade" id="alojaproDiscounts_modal" tabindex="-1" aria-labelledby="alojaproDiscounts_ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">[@button_discounts_label]</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <label for="alojapro_modal_coupon" class="form-label mb-2">
                                        [@modal_coupon]
                                        <i name="info_discount_code" class="fa fa-info-circle" data-toggle="tooltip" data-bs-toggle="tooltip" data-placement="auto" data-bs-placement="auto" title="[@info_code_discount]" data-bs-title="[@info_code_discount]"data-arrow="true"></i>
                                    </label>
                                    <input type="text" name="alojapro_modal_coupon" id="alojapro_modal_coupon" value="" class="custom-input form-control mb-2">
                                </div>
                                <div class="col-12">
                                    <label for="alojapro_modal_email" class="form-label mt-2 mb-2">
                                        [@modal_email]
                                        <i name="info_discount_mail" class="fa fa-info-circle" data-toggle="tooltip" data-bs-toggle="tooltip" data-placement="auto" data-bs-placement="auto" title="[@info_mail_discount]" data-bs-title="[@info_mail_discount]"data-arrow="true"></i>
                                    </label>
                                    <input type="text" name="alojapro_modal_email" id="alojapro_modal_email" value="" class="custom-input form-control mb-2">
                                </div>
                                <div class="col-12 mt-3 mb-2">
                                    <button type="button" id="alojaproDiscounts_accept" class="btn btn-widget btn-widget-primary" title="[@modal_accept]">[@modal_accept]</button>
                                </div>
                            </div>
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
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 1
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center">
                                    <label for="adults-select-1" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-1" class="form-control form-select ms-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center">
                                    <label for="child-1" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-1" class="form-control form-select ms-2 ml-2" name="child-1">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-2 child-1 dnone">
                                    <hr class="mt-2">
                                    <div class="col-md-4 col-sm-12 child-1">
                                        <i class="fas fa-child me-2 mr-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 2-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-2">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 2
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="adults-select-2" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-2" class="form-control form-select ms-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="child-2" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-2" class="form-control form-select  ms-2 ml-2" name="child-2">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-2 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-2">
                                        <i class="fas fa-child me-2 mr-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 3-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-2">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 3
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="adults-select-3" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-3" class="form-control form-select ms-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="child-3" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-3" class="form-control form-select  ms-2 ml-2" name="child-3">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-3 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-3">
                                        <i class="fas fa-child me-2 mr-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 4-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-2">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 4
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="adults-select-4" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-4" class="form-control form-select ms-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="child-4" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-4" class="form-control form-select  ms-2 ml-2" name="child-4">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-4 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-4">
                                        <i class="fas fa-child me-2 mr-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--ROOM 5-->
                            <div class="row room-options room-box dnone"> 
                                <div class="col-md-4 col-sm-12 text-uppercase d-flex align-items-center mb-2">
                                    <!--room number-->
                                    <i class="fas fa-bed me-2 mr-2"></i>[@room_label] 5
                                </div>
                                <!--room adults-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="adults-select-5" class="me-2 mr-2">[@adults_label]</label>
                                    <select id="adults-select-5" class="form-control form-select ms-2 ml-2" name="adults">
                                        [@adultDropDown]
                                    </select>
                                </div>
                                <!--room childs-->
                                <div class="form-group col-md-3 col-sm-12 d-flex align-items-center mb-2">
                                    <label for="child-5" class="me-2 mr-2">[@children_label]</label>
                                    <select id="child-5" class="form-control form-select  ms-2 ml-2" name="child-5">
                                        [@childDropDown]
                                    </select>
                                </div>
                                <!--childs ages-->
                                <div class="row d-flex align-items-center mt-3 child-5 dnone">
                                    <hr>
                                    <div class="col-md-4 col-sm-12 mb-2 child-5">
                                        <i class="fas fa-child me-2 mr-2"></i> [@children_ages_label]
                                    </div>
                                    [@childAgeInputs]
                                </div> 
                                <!--end row childs ages-->
                            </div> <!--end row-->
                            <!--discounts, mail & button-->
                            <div class="row d-flex align-items-center mt-3">
                                <div class="col-sm-12 col-md-6">
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
                                <div class="col-sm-12 col-md-6">
                                    <label for="alojapro_modal_email_advanced">
                                        [@modal_email]
                                        <i name="info_discount_mail" class="fa fa-info-circle" data-toggle="tooltip" data-bs-toggle="tooltip" data-placement="auto" data-bs-placement="auto" title="[@info_mail_discount]" data-bs-title="[@info_mail_discount]"data-arrow="true"></i>
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" name="alojapro_modal_email" id="alojapro_modal_email_advanced" value="" class="custom-input form-control text ui-widget-content ui-corner-all">
                                </div>
                            </div>
                            <div class="row d-flex align-items-center mt-2">
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
