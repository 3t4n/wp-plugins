<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="w-100 text-center">
                <img class="w-50" src="<?php echo plugins_url('/img/morepuzzles_tilted.svg', __FILE__) ?>" alt="">
            </div>
            <div class="row mui-panel">
                <h5 class="w-100">In order to use this plugin follow these steps:</h5>
                <div class="col-md-8 mt-3">
                    <div class="mt-1">1. Navigate to <a href="https://morepuzzles.com/home" target="blank">Morepuzzles.com</a> and create an account</div>
                    <div class="mt-1">2. Create a custom puzzle and generate a shared link with wordpress plugin option enabled</div>
                    <div class="mt-1">3. Copy and paste the shared link below in order to generate a shortcode.</div>
                    <div class="col-12 text-right mt-3" id="read_more">
                        <a class="btn btn-primary" href='https://morepuzzles.com/docs/wordpress' target="_blank">Read more</a>
                    </div>
                </div>
                <div class="col-md-4 mt-3 p-0">
                    <div class="col-12 p-0">
                        <img class="w-100" id="wp_gif" src="<?php echo plugins_url('/img/wordpresstutorial.gif', __FILE__) ?>" alt="Morepuzzles plugin tutorial video">
                    </div>
                </div>
            </div>
            <br class="mb-3">
            <div class="row errorDiv" style="display: none;">
                <div class="alert alert-danger w-100 text-left" role="alert">
                    The inserted link does not meet the requirements, please try again..
                </div>
            </div>
            <div class="row mui-panel">
                <div class="w-100">
                    <h5>Shared link</h5>
                    <div class="input-group mb-3 tooltip_div_paste">
                        <input id="crossword_key" type="text" class="form-control dark-theme" placeholder="Paste your shared link here" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        <div class="input-group-append">
                            <button id="paste_btn" type="button" class="btn dark-theme" data-toggle="tooltip" data-placement="top" data-offset="-120%" title="Paste link from clipboard">
                                <img id="myimg" src="<?php echo plugins_url('/img/paste.png', __FILE__) ?>" alt="" style="height:25px">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-100">
                    <div class="col text-center">
                        <button type="button" class="btn btn-primary" id="generate_shortcode">Generate shortcode</button><br>
                    </div>
                </div>
            </div>
            <br class="mb-3">
            <div class="row mui-panel shortcodeDiv">
                <h5>Short code</h5>
                <div class="input-group tooltip_div_copy">
                    <input type="text" id="shortcode" class="form-control dark-theme text-center" value="First create your shortcode" disabled>
                    <div class="input-group-append">
                        <button id="copy_btn" type="button" class="btn dark-theme" data-toggle="tooltip" data-placement="top" data-offset="-100%" title="Copy the shortcode" disabled>
                            <img id="myimg" src="<?php echo plugins_url('/img/copy.png', __FILE__) ?>" alt="" style="height:25px">
                        </button>
                    </div>
                </div>
                <div class="ml-3 mb-0"><small>insert this shortcode to your page</small></div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close mt-4">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
</div>