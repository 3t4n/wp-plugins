<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    Asimov
 * @subpackage Asimov/admin/partials
 */
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div style="background-color: #fafafa !important ;">

    <nav class="navbar navbar-expand-lg navbar-light yellow">
        <a class="navbar-brand">
            <img src="<?php echo plugin_dir_url( __FILE__ ) . '../images/logo_asimov_nero_orizz@3x.png'; ?>" height="30px !important" class="asimov-nav-img d-inline-block align-top"
                alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <?php
		    $settings = get_option('asimov_settings', null);
		    if ($settings !== null && !$settings->view_id){
                ?>
                <a target="_blank" href="<?php echo menu_page_url($this->plugin_name.'-wizard', false) . '&ref=' . $settings->user_id . '&sub=' . $settings->subscription_id; ?>" class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> <b><?php _e("ATTENTION", "asimov-plugin"); ?></b>: <?php _e("Remember to complete the configuration of ASIMOV. Click here!", "asimov-plugin"); ?></a>
                <?php
            }
            ?>
        </div>
    </nav>
	<?php
		$settings = get_option('asimov_settings', null);
		if ($settings !== null){
	?>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-auto">
            </div>
            <div class="col col-12">

                <br></br>
                <div id="accordion">
                    <div class="card m-1">
                        <div class="card-header white" id="headingSettings">
                            <h5 class="mb-0">

                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSettings"
                                    aria-expanded="true" aria-controls="collapseSettings">
                                    <h4 class="m-0 text-lavagna"><?php _e("Which audience do you want to impress?", "asimov-plugin"); ?></h4>
                                        
                                </button>
                            </h5>
                        </div>

                        <div id="collapseSettings" class="collapse show" aria-labelledby="headingSettings"
                            data-parent="#accordion">
                            <div class="card-body borders">
                                <div class="container">
                                    <p class="p-3 text_lightgrey"><?php _e("In this area you can select audiences for which the article will be optimized.", "asimov-plugin"); ?></p>
                                    <form>
                                        <div class="col p-0">
                                            <div class="subscription_ok">
                                                <div class="d-flex flex-column align-items-center justify-content-center"> 
                                                    <div class="text-center col-3"><i class="fas fa-lock" style="font-size:12rem;"></i></div>
                                                    <div class="text-center col-3"><a href="">Sblocca Abbonamento</a></div>
                                                <br>
                                                
                                            </div>
                                            </div>
                                            <div class="form-row">
												<?php
                                                    $settings = get_option('asimov_settings', null);
                                                    $pivots = new stdClass();
                                                    $pivots->{"ga:userGender"} = array("male", "female");
                                                    $pivots->{"ga:userAgeBracket"} = array("18-24", "25-34", "55-64", "35-44", "45-54", "65+");
                                                    $pivots->{"ga:deviceCategory"} = array("tablet", "mobile", "desktop");
                                                    $pivots->{"ga:country"} = array();
                                                    if($settings->articles_processed) {
													    $pivots->{"ga:userAgeBracket"} = $settings->sub_data->ga_pivot_distinct_values->{"ga:userAgeBracket"};
													    $pivots->{"ga:country"} = $settings->sub_data->ga_pivot_distinct_values->{"ga:country"};
                                                    }
												?>
                                                <div class="col" <?php echo (true /*count($pivots->{"ga:userGender"}) > 0*/)? '': 'hidden';?>>
                                                    <label for="sesso" class="text-lavagna"><?php _e("Gender", "asimov-plugin"); ?></label> 
                                                    <select class="custom-select" id="sesso">
                                                        <option value="" selected><?php _e("Everyone", "asimov-plugin"); ?></option>
                                                        <?php
															for($i = 0; $i < count($pivots->{"ga:userGender"}); $i++) {
																echo '<option value="' . $pivots->{"ga:userGender"}[$i] .'">';
																echo $pivots->{"ga:userGender"}[$i];
																echo "</option>";
															}
														?>
                                                    </select>
                                                </div>
                                                <div class="col" <?php echo (count($pivots->{"ga:userAgeBracket"}) > 0)? '': 'hidden';?>>
                                                    <label for="eta" class="text-lavagna"><?php _e("Age", "asimov-plugin"); ?></label>
                                                    <select class="custom-select" id="eta" >
                                                        <option value="" selected><?php _e("Every age", "asimov-plugin"); ?></option>
														<?php
															for($i = 0; $i < count($pivots->{"ga:userAgeBracket"}); $i++) {
																echo '<option value="' . $pivots->{"ga:userAgeBracket"}[$i] .'">';
																echo $pivots->{"ga:userAgeBracket"}[$i];
																echo "</option>";
															}
														?>
                                                    </select>
                                                </div>
                                                <div class="col" <?php echo (true /*count($pivots->{"ga:userGender"}) > 0*/)? '': 'hidden';?>>
                                                    <label for="paese" class="text-lavagna"><?php _e("Device", "asimov-plugin"); ?></label>
                                                    <select class="custom-select" id="dispositivi" >
                                                        <option value="" selected><?php _e("Every device", "asimov-plugin"); ?></option>
                                                        <?php
															for($i = 0; $i < count($pivots->{"ga:deviceCategory"}); $i++) {
																echo '<option value="' . $pivots->{"ga:deviceCategory"}[$i] .'">';
																echo $pivots->{"ga:deviceCategory"}[$i];
																echo "</option>";
															}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-row">
												<!---
                                                <div class="col">
                                                    <label for="paese" class="text-lavagna">Continente</label>
                                                    <select class="custom-select" id="continente" >
                                                        <option selected>Tutti i continenti</option>
                                                        <option value="1">Europa</option>
                                                        <option value="2">Asia</option>
                                                        <option value="3">Africa</option>
                                                        <option value="4">America</option>
                                                        <option value="5">Antartide</option>
                                                        <option value="6">Oceania</option>
                                                    </select>
                                                </div>
                                                <div class="col">

                                                    <label for="provincia" class="text-lavagna">Country</label>
                                                    <select class="custom-select" id="country" >
                                                        <option selected>Tutti country</option>
                                                        <option value="1">Italia</option>
                                                        <option value="2">Spagna</option>
                                                        <option value="3">Germania</option>
                                                    </select>
                                                </div>
												--->
                                                <div class="col" <?php echo (count($pivots->{"ga:country"}) > 1)? '': 'hidden';?>>
                                                    <label for="comune" class="text-lavagna"><?php _e("Region", "asimov-plugin"); ?></label>
                                                    <select class="custom-select" id="zone" >
                                                        <option value="" selected><?php _e("Every region", "asimov-plugin"); ?></option>
                                                        <?php
															for($i = 0; $i < count($pivots->{"ga:country"}); $i++) {
																echo '<option value="' . $pivots->{"ga:country"}[$i] .'">';
																echo $pivots->{"ga:country"}[$i];
																echo "</option>";
															}
														?>
                                                    </select>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>
                                    </form>
									<div class="d-flex flex-row-reverse"
                                        style="border-top:1px solid rgb(236, 236, 236);">
                                        <div class="p-2"><button id="pivots-save" class="btn btn-warning"><span id="save-icon"
                                                    class="fas fa-magic mr-1"></span> <?php _e("Save", "asimov-plugin"); ?></button></div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card m-1">
                        <div class="card-header white" id="headingOne">
                            <h5 class="mb-0">
                                <button id="modify-current-metric" class="btn btn-link" data-toggle="collapse"
                                    aria-expanded="false" aria-controls="collapseOne">
                                    <h4 class="m-0 text-lavagna"><?php _e("Which metric to optimize?", "asimov-plugin"); ?> <span id="selected-metric-span" class="badge badge-warning"></span></h4>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body borders">
                                <div class="container">
                                    <p class="p-3 text_lightgrey"><?php _e("In this area you can select the goal you want to achieve with your article. Asimov will tell you if the article you wrote will be successful or not in the chosen metric. When you change this metric, the recommendations will also update.", "asimov-plugin"); ?></p>
                                    <div class="row">
                                        <div id="views-col" class="col-lg-4 col-xs-4 metrics-col">
                                            <label>
                                                <input type="radio" name="metrics" class="card-input-element d-none"
                                                    id="metric-views">
                                                <div
                                                    class="card one card-body bg-light d-flex flex-column justify-content-around align-items-center">
                                                    <div class="d-flex flex-column align-items-center">
														<span style="font-size:0.9rem; font-weight: 200;"><?php _e("IMPROVE ARTICLE FOR:", "asimov-plugin"); ?></span>
                                                        <span style="font-size:2.7rem;"><i class="fas fa-eye"></i> VIEWS
                                                        </span>
														<span id="views-score" style="font-size:1.9rem;">0%</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div id="time-col" class="col-lg-4 col-xs-4 metrics-col">
                                            <label>
                                                <input type="radio" name="metrics" class="card-input-element d-none"
                                                    id="metric-time">
                                                <div
                                                    class="card two card-body bg-light d-flex flex-column justify-content-around align-items-center">
                                                    <div class="d-flex flex-column align-items-center">
														<span style="font-size:0.9rem; font-weight: 200;"><?php _e("IMPROVE ARTICLE FOR:", "asimov-plugin"); ?></span>
                                                        <span style="font-size:2.7rem;"><i
                                                                class="fas fa-hourglass-start"></i> TIME
                                                        </span>
														<span id="time-score" style="font-size:1.9rem;">0%</span>
                                                    </div>
                                                </div>

                                            </label>
                                        </div>
                                        <div id="clicks-col" class="col-lg-4 col-xs-4 metrics-col">
                                            <label>
                                                <input type="radio" name="metrics" class="card-input-element d-none"
                                                    id="metric-clicks">
                                                <div
                                                    class="card three card-body bg-light d-flex flex-column justify-content-around align-items-center">
                                                    <div class="d-flex flex-column align-items-center">
														<span style="font-size:0.9rem; font-weight: 200;"><?php _e("IMPROVE ARTICLE FOR:", "asimov-plugin"); ?></span>
                                                        <span style="font-size:2.7rem;"><i
                                                                class="fas fa-mouse-pointer"></i> CLICKS
                                                        </span>
														<span id="clicks-score" style="font-size:1.9rem;">0%</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>



                                    <div class="d-flex flex-row-reverse"
                                        style="border-top:1px solid rgb(236, 236, 236);">
                                        <div class="p-2"><button id="metrics-save" class="btn btn-warning"><i
                                                    class="fas fa-magic mr-1"></i> <?php _e("Start", "asimov-plugin"); ?></button></div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="card m-1" id="">
                        <div class="card-header white" id="headingTwo">
                            <h5 class="mb-0">
                                <!---<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">--->
                                    <h4 class="m-0 text-lavagna"><?php _e("Dashboard", "asimov-plugin"); ?>
                                    </h4>
                                <!---</button>--->
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body borders">
							    <p class="p-3 text_lightgrey"></p>
								<!--
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>Suggerimento!</strong> qui spiegazione per il suggerimento.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
								-->
                                <div class="row">
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_1" class="contatore"><button style="font-size: 10px;"
                                                id="000000012" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_2" class="contatore"><button style="font-size: 10px;"
                                                id="000000011" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_3" class="contatore"><button style="font-size: 10px;"
                                                id="000000010" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_4" class="contatore"><button style="font-size: 10px;"
                                                id="000000009" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_5" class="contatore"><button style="font-size: 10px;"
                                                id="000000008" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_6" class="contatore"><button style="font-size: 10px;"
                                                id="000000007" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_7" class="contatore"><button style="font-size: 10px;"
                                                id="000000006" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_8" class="contatore"><button style="font-size: 10px;"
                                                id="000000005" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_9" class="contatore"><button style="font-size: 10px;"
                                                id="000000004" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_10" class="contatore"><button style="font-size: 10px;"
                                                id="000000003" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_11" class="contatore"><button style="font-size: 10px;"
                                                id="000000002" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_12" class="contatore"><button style="font-size: 10px;"
                                                id="000000001" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_13" class="contatore"><button style="font-size: 10px;"
                                                id="000000013" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_14" class="contatore"><button style="font-size: 10px;"
                                                id="000000014" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_15" class="contatore"><button style="font-size: 10px;"
                                                id="000000015" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_16" class="contatore"><button style="font-size: 10px;"
                                                id="000000016" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_17" class="contatore"><button style="font-size: 10px;"
                                                id="000000017" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>
                                    <div class="col-lg-2 col-xs-4 col-sm-4" style="margin: 0 !important;">
                                        <div id="contatore_18" class="contatore"><button style="font-size: 10px;"
                                                id="000000018" type="button" class="tooltip-counter btn btn-sm btn-secondary m-1"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Conta quante vocali ci sono e controlla se stai utilizzando il numero corretto">
                                            </button></div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between  p-4"
                                    style="border-top:1px solid rgb(236, 236, 236);">
                                    <div class="p-2"><!---<button class="btn btn-link btn-secondary"><i
                                                class="fas fa-magic mr-1"></i> Indietro</button> ---></div>
                                    <div class="p-2"><button id="dashboard-step-next" class="btn btn-warning"><?php _e("Next","asimov-plugin")?> <i
                                                class="fas fa-magic mr-1"></i></button></div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card m-1" id="">
                        <div class="card-header white" id="headingThree">
                            <h5 class="mb-0">
                                <!---<button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--->
                                    <h4 class="m-0 text-lavagna"><?php _e("Article summary","asimov-plugin")?></h4>
                                <!---</button>--->
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordion">
                            <div class="card-body borders">
                                <p class="p-3 text_lightgrey"><?php _e("Asimov automatically extracts one or more sentences that he considers important in your article. This suggestion can be useful to highlight these sentences or to check what the audience will understand.","asimov-plugin")?></p>
                                <p id="ai-summary-textarea" class="p-3 interpretazione text_darkgrey"
                                    style="border: 1px solid rgb(236, 236, 236); border-top-left-radius:0px; border-top-right-radius:0px; border-bottom-right-radius:13px; border-bottom-left-radius:13px">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                                    terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                    single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                    keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                    craft
                                    beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                    haven't heard of them accusamus labore sustainable VHS.</p>
									<!---
                                <div class="d-flex flex-row-reverse">
                                    <form class="was-validated">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlValidation1" required>
                                            <label class="custom-control-label" for="customControlValidation1">Si
                                                confermo, l'interpretazione di ASIMOV è corretta.</label>
                                        </div>
                                    </form>
                                </div>
								--->
                                <div class="d-flex justify-content-between  p-4"
                                    style="border-top:1px solid rgb(236, 236, 236);">
                                    <div class="p-2"><button id="summary-step-back" class="btn btn-link btn-light"><i
                                                class="fas fa-magic mr-1"></i> <?php _e("Back","asimov-plugin")?></button></div>
                                    <div class="p-2"><button id="summary-step-next" class="btn btn-warning"><?php _e("Next","asimov-plugin")?> <i
                                                class="fas fa-magic mr-1"></i></button></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-1" id="">
                        <div class="card-header white" id="headingFour">
                            <h5 class="mb-0">
                                <!---<button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">--->
                                    <h4 class="m-0 text-lavagna"><?php _e("How trending are your tags?","asimov-plugin")?></h4>
                                <!---</button>--->
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body borders">
                                <p class="p-3 text_lightgrey"><?php _e("Asimov shows you how trending the tags you entered are in the last few hours. The closer the score is to 100, the more that word has great importance at the moment.","asimov-plugin")?></p>

                                <p id="tags-container" class="p-3 interpretazione"
                                    style="border: 1px solid rgb(236, 236, 236); border-top-left-radius:13px; border-top-right-radius:13px; border-bottom-right-radius:13px; border-bottom-left-radius:13px">
                                </p>
                                <div class="d-flex justify-content-between  p-4"
                                    style="border-top:1px solid rgb(236, 236, 236);">
                                    <div id="tags-step-back" class="p-2"><button class="btn btn-link btn-light"><i
                                                class="fas fa-magic mr-1"></i> <?php _e("Back","asimov-plugin")?></button></div>
                                    <div id="tags-step-next" class="p-2"><button class="btn btn-warning"><?php _e("Next","asimov-plugin")?> <i
                                                class="fas fa-magic mr-1"></i></button></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-1" id="">
                        <div class="card-header white" id="headingFive">
                            <h5 class="mb-0">
                                <!---<button class="btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">--->
                                    <h4 class="m-0 text-lavagna"><?php _e("How trending is your content?","asimov-plugin")?></h4>
                                <!---</button>--->
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body borders">
                                <p class="p-3 text_lightgrey"> <?php _e("Asimov extracts from the text some words that he considers particularly representative, and gives you back their trend index. The closer the score is to 100, the more that word has great importance at the moment. This tip is very useful for adding relevant and coherent tags to the article or for finding other keywords to use.","asimov-plugin")?></p>

                                <p id="ai-tags-container" class="p-3 interpretazione"
                                    style="border: 1px solid rgb(236, 236, 236); border-top-left-radius:13px; border-top-right-radius:13px; border-bottom-right-radius:13px; border-bottom-left-radius:13px">
                                </p>
                                <div class="d-flex justify-content-between  p-4"
                                    style="border-top:1px solid rgb(236, 236, 236);">
                                    <div id="ai-tags-step-back" class="p-2"><button class="btn btn-link btn-light"><i
                                                class="fas fa-magic mr-1"></i> <?php _e("Back","asimov-plugin")?></button></div>
                                    <div id="ai-tags-step-next" class="p-2"><button class="btn btn-warning"><?php _e("Next","asimov-plugin")?> <i
                                                class="fas fa-magic mr-1"></i></button></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card m-1" id="">
                        <div class="card-header white" id="headingSix">
                            <h5 class="mb-0">
                                <!---<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix"
                                    aria-expanded="false" aria-controls="collapseSix">--->
                                    <h4 class="m-0 text-lavagna"><?php _e("Go even further beyond","asimov-plugin")?></h4>
                                <!---</button>--->
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body borders">
                                <p class="p-3 text_lightgrey"><?php _e("Asimov suggests, either for your most important tags and for the words extracted, a series of words and topics related to them. This tip can be useful as food for thought both for developing other parts in this article, and for the conception and writing of other articles.","asimov-plugin")?></b></p>

                                <p class="p-3 interpretazione"
                                    style="border: 1px solid rgb(236, 236, 236); border-top-left-radius:13px; border-top-right-radius:13px; border-bottom-right-radius:13px; border-bottom-left-radius:13px">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									  </ul>
									  <div class="tab-content" id="pills-tabContent">
									  </div>

                                </p>
                                <div class="d-flex justify-content-between  p-4"
                                    style="border-top:1px solid rgb(236, 236, 236);">
                                    <div id="correlated-tags-step-back" class="p-2"><button class="btn btn-link btn-light"><i
                                                class="fas fa-magic mr-1"></i> <?php _e("Back","asimov-plugin")?></button></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-auto">
            </div>

            <br><br>
            <div class="text-center p-2"><img src="<?php echo plugin_dir_url( __FILE__ ) . '../images/logo_asimov_nero_orizz@3x.png'; ?>" width="13%"></div>
        </div>
    </div>
	<?php
		} else if($settings !== null) {
	?>
	<br><br>
	<h2> <?php _e("ASIMOV IS ANALYZING YOUR DATA AND OPTIMIZING ITS MODELS FOR A TAILORED EXPERIENCE - PELASE WAIT UP TO 24H","asimov-plugin")?> </h2>
	<?php
		} else {
	?>
	<br><br>
	<h2> <?php _e("PLUGIN NOT CONFIGURED","asimov-plugin")?> </h2>
	<?php
		}
	?>
</div>
