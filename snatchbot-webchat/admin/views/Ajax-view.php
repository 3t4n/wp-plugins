<div class="wrap">
    <div style="display:flex; justify-content:center; align-items:center; min-height: 90vh;">
        <div style="max-width:700px; width:100%;">
            <h2 style="margin: 5%;"><?php echo get_admin_page_title() ?></h2>
            
            <table id="the-list" style="width: 100%;">
                <thead></thead>
                <tr style="height: 80px;">
                    <td>
                        <div id="specialSnatchForm"> 
                            <div class="myFlexCenter"> 
                                <img src="<?php echo $assetPaths['logo'] ?>">
                            </div>
                            <div class="SnatchAuthentificationBlock" style="display:none">
                                <div id="SnatchAuthentificationBlockDiv">  
                                    <div style="float: right;"> 
                                        <input id="snatchLogout" type="button" value="Log out">  
                                    </div>
                                    <br/>  
                                    <label for="blockClassPlugin2">Logged with account:</label> <?php echo esc_html($wp_esc_user->email) ?>  <br/><br/>
                                    <label for="blockClassPlugin2">Name:</label> <?php echo esc_html($wp_esc_user->full_name) ?>  <br/><br/> 
                                    <h1 style="color: #0079fe; padding: 20px; text-align: center;">Bots</h1> 
                                </div>
                            </div>
                            <div style="display:none" class="SnatchRegisterBlock">
                                <div  class="auth__form">
                                    <div  class="auth__header-box">
                                        <h2>Log In</h2>
                                    </div>
                                    <span  class="auth__header-hr"></span>
                                </div>
                                <form  id="mySnatchForm" class="form-control ng-untouched ng-pristine ng-invalid" name="loginForm">
                                    <div  class="full-width mat-form-field ng-tns-c14-3 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid mat-form-field-has-label">
                                        <div class="mat-form-field-wrapper">
                                            <div class="mat-form-field-flex">
                                                <div class="mat-form-field-infix" style="width:100%; heigth:100%">
                                                    <input id="mySnatchLogin" class="super-snatchbot-origin-inputs protractor-login-email mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid" formcontrolname="email" matinput="" maxlength="150" name="email" type="email" placeholder="Email:" aria-invalid="false" required>
                                                    <span class="mat-form-field-label-wrapper">
                                                        <label class="mat-form-field-label ng-tns-c14-3 mat-empty mat-form-field-empty ng-star-inserted" id="mat-form-field-label-1" for="mat-input-0" aria-owns="mat-input-0">
                                                            <span class="ng-tns-c14-3 ng-star-inserted">Email:</span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        <div class="mat-form-field-underline ng-tns-c14-3 ng-star-inserted">
                                            <span class="mat-form-field-ripple"></span>
                                        </div>
                                        <div class="mat-form-field-subscript-wrapper">
                                            <div class="mat-form-field-hint-wrapper ng-tns-c14-3 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                <div class="mat-form-field-hint-spacer"></div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        <div  class="full-width mat-form-field ng-tns-c14-4 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-invalid mat-form-field-has-label">
                                            <div class="mat-form-field-wrapper">
                                                <div class="mat-form-field-flex">
                                                    <div class="mat-form-field-infix" style="width:100%; heigth:100%">
                                                        <input id="mySnatchPassword" class="super-snatchbot-origin-inputs protractor-login-password mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-invalid" formcontrolname="password" matinput="" maxlength="50" name="password" type="password" placeholder="Password:" aria-invalid="false" required>
                                                        <span class="mat-form-field-label-wrapper">
                                                            <label class="mat-form-field-label ng-tns-c14-4 mat-empty mat-form-field-empty ng-star-inserted" id="mat-form-field-label-3" for="mat-input-1" aria-owns="mat-input-1">
                                                                <span class="ng-tns-c14-4 ng-star-inserted">Password:</span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mat-form-field-underline ng-tns-c14-4 ng-star-inserted">
                                                    <span class="mat-form-field-ripple"></span>
                                                </div>
                                                <div class="mat-form-field-subscript-wrapper">
                                                    <div class="mat-form-field-hint-wrapper ng-tns-c14-4 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                        <div class="mat-form-field-hint-spacer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="full-width">
                                            <div  class="checkbox-remember-me mat-checkbox mat-accent ng-valid ng-dirty ng-touched" formcontrolname="remember" name="remember" id="mat-checkbox-1">
                                                <label class="mat-checkbox-layout" for="mat-checkbox-1-input">
                                                    <div class="mat-checkbox-inner-container">
                                                        <input class="mat-checkbox-input cdk-visually-hidden" type="checkbox" id="mat-checkbox-1-input" name="remember" tabindex="0" aria-checked="false">
                                                        <div class="mat-checkbox-ripple mat-ripple" matripple="">
                                                        <div class="mat-ripple-element mat-checkbox-persistent-ripple"></div>
                                                    </div>
                                                    <div class="mat-checkbox-frame"></div>
                                                        <div class="mat-checkbox-background">
                                                            <svg xml:space="preserve" class="mat-checkbox-checkmark" focusable="false" version="1.1" viewbox="0 0 24 24">
                                                                <path class="mat-checkbox-checkmark-path" d="M4.1,12.7 9,17.6 20.3,6.3" fill="none" stroke="white"></path>
                                                            </svg>
                                                        <div class="mat-checkbox-mixedmark"></div>
                                                    </div>
                                                    </div>
                                                    <span class="mat-checkbox-label">
                                                        <span style="display:none">&nbsp;
                                                    </span>
                                                    <span>Remember me</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div  class="auth__group full-width">
                                            <button class="full-width btn-sign protractor-login-submit mat-stroked-button mat-button-base mat-primary" color="primary" mat-stroked-button="" type="submit">
                                                <span class="mat-button-wrapper">
                                                    <span>Sign In</span>
                                                </span>
                                                <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                                <div class="mat-button-focus-overlay"></div>
                                            </button>
                                        </div>
                                        </form>
                                        <div style="font-size: 16px; font-family: sans-serif;"> 
                                            <span> 
                                                <span style="margin: 10px;">No Account?</span>
                                                <a href="<?php echo "https://account.snatchbot.me/login" ?>" target="_blank">Sign Up</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function($) {
        
        var snatchAcc = {
            userID: null,
            IsAuth: null,
            authToken: null,
            email: null,
            username: null,
            refreshToken: null,
            isRemember: false,
            botLists: [],
            
        }
        let preloaderStyle = {
            position: 'fixed',
            bgColor: 'gray',
        }
        let wp_user = {
            ajax_url: '<?php echo admin_url( "admin-ajax.php" ) ?>',
            preloader_src: '<?php echo $assetPaths["preloader"] ?>',
            img_src: '<?php echo $assetPaths["logo"] ?>', 
            data: {
                email: '<?php echo esc_html($wp_esc_user->email) ?>',
                full_name: '<?php echo esc_html($wp_esc_user->full_name) ?>',
                snatch_user_id: '<?php echo esc_html($wp_esc_user->snatch_user_id) ?>',
                deployed_bot: '<?php echo esc_html($wp_esc_user->bot_id) ?>',
            }
        }

        main()

        function main() {
            document.addEventListener('DOMContentLoaded', function() {
                errorNotificationClose()
                snatchAccStatus()
                eventListenersDeploy()
            });
        }
        function alertShow(alertType, text) {
            let isAlertShowed = $("#mySnatchAlert").length
            if (isAlertShowed) {
                alertClose()
            }
            $("body").append(
                '<div id="mySnatchAlert" class="alert alert-' + alertType + ' myFlexCenter">' +
                    '<p>' + text + '</p>' +
                    '<button id="close-alert" type="button" class="close">' +
                        '<span style="padding: .75rem 1.25rem;">&times;</span>' +
                    '</button>' +
                '</div>'
            )

            $("#close-alert").on("click", (e) => {
                alertClose()
            })
        }
        function alertClose() {
            $("#mySnatchAlert").remove();
        }
        function preloaderShow(elementHTML, preloaderStyle) {
            preloaderName = preloaderStyle.position === 'fixed' ? 'onFullScreen' : 'onTable'
            preloaderWidth = preloaderName === 'onTable' ? '700px' : '100%'
            preloaderHide(preloaderName)
            $(elementHTML).append('<div id="snatchPreloader-'+ preloaderName +'" class="myFlexCenter" style="width: 100%; max-width: '+ preloaderWidth +'; position: '+ preloaderStyle.position +'; top: 0; bottom: 0; background-color: '+ preloaderStyle.bgColor +'; opacity: 0.5;"><div><img src="' + wp_user.preloader_src + '" style="width: 100%;"/></div></div>')
        }
        function preloaderHide(preloaderName) {
            $("#snatchPreloader-" + preloaderName).remove()
        }

        function eventListenersDeploy() {

            $("#mySnatchForm").on("submit", (e) => {
                e.preventDefault()

                preloaderShow('body', preloaderStyle)
                let login = $("#mySnatchLogin").val();
                let password = $("#mySnatchPassword").val();

                let objData = {"email": login, "password": password, "remember": null} 
                let url = wp_user.ajax_url + '?action=login'

                const loginLambda = (response) => {
                    if(response.auth_token) { 
                        preloaderHide('onFullScreen')
                        renderLogic(response)
                        renderUserInfoBlock(response)
                    }
                } 

                myAjax('POST', url, loginLambda, objData)
            })
            
            $("#mat-checkbox-1-input").on("click", (e) => {
                snatchAcc.isRemember = !snatchAcc.isRemember
                if (snatchAcc.isRemember) {
                    $(".mat-checkbox-background").css('background-color', '#005dfe')
                } else {
                    $(".mat-checkbox-background").css('background-color', '')
                }
            })

            $("#snatchLogout").on("click", (e) => {
                logout()
            })
        
        }

        function myAjax( request_type, url, lambda, data ) {
            $.ajax({
                url: url,
                type: request_type,
                data: data,

                success: function( json ){
                    // success
                    let response = JSON.parse(json)
                    if (json[0] !== '{' || typeof response === 'undefined' || !response) {
                        alertShow('danger', 'Server response with Error last operation. Please try again')
                        preloaderHide('onFullScreen')
                        preloaderHide('onTable')
                        errorNotificationShow()
                    } else {
                            if (response.responseText === 'Your authorization token has expired.\n') {
                                refreshSnatchToken()
                            }
                            else if (response.error === 'token_expired') {
                                logout()
                                alertShow('danger', 'Your authorization session expired. Please sign in')
                            }
                            else {
                                lambda(response)
                            }
                    }
                },

                error: function( jqXHR, textStatus, errorThrown ){
                    // set response text
                    preloaderHide('onFullScreen')
                    preloaderHide('onTable')
                    alertShow('danger', 'Invalid Credentials')  
                }
            });
        }

        function stylesBotBlock(botBlock, color, backgroundColor, whatAction) {
            botBlock.css({color:color,backgroundColor:backgroundColor})
            botBlock.find("h4").css('color',color)
            botBlock.find("p").css('color',color)
            botBlock.find("input").css({color:backgroundColor, backgroundColor:color}).val(whatAction)
        }

        function botBlockButtonAction(botID, whatAction) {
            let color = 'white'
            let backgroundColor = '#0079fe'
            let nextAction = 'Disconnect'
            if (whatAction === 'Disconnect') {
                color = '#0079fe'
                backgroundColor = 'white'
                nextAction = 'Deploy'
            }
            const previousBotBlock = $("#botBlock-" + wp_user.data.deployed_bot)
            const currentBotBlock = $("#botBlock-" + botID)
            stylesBotBlock(previousBotBlock, '#0079fe', 'white', 'Deploy')
            stylesBotBlock(currentBotBlock, color, backgroundColor, nextAction)
        }

        function noBotsnotificationClose() {
            const noSnatchBots = $("#noSnatchBots")
            if(noSnatchBots.length) {
                noSnatchBots.remove()
            }
        }

        function noBotsnotificationShow() {
            noBotsnotificationClose()
            $("div.SnatchAuthentificationBlock").append('<div id="noSnatchBots"><h2 style="text-align: center;">No Bots available in this account.</h2></div>')
        }

        function errorNotificationClose() {
            const noSnatchBots = $("#errorNotificationBlock")
            if(noSnatchBots.length) {
                noSnatchBots.remove()
            }
        }

        function errorNotificationShow() {
            errorNotificationClose()
            $("div.SnatchAuthentificationBlock").append('<div id="errorNotificationBlock"><h2 style="text-align: center;">Oops. Something went wrong.</h2></div>')
        }

        function snatchAccStatus() {
            if (wp_user) {
                renderLogic(wp_user.data)
            }
        }

        function renderLogic(response) {
            const mySpecialForm = $("#specialSnatchForm")
            renderMyForm(response)
            renderUserInfoBlock(response)

            if (parseInt(response.snatch_user_id)) {
                document.querySelector("div.SnatchAuthentificationBlock").style = "display:block"
                document.querySelector("div.SnatchRegisterBlock").style = "display:none"
                let token = {authToken: response.auth_token}
                let url = wp_user.ajax_url + '?action=get_bots'
                const getBotsLambda = (response) => {
                    if(typeof response.data !== 'undefined' && response.data.users_bots) {
                        snatchAcc.botLists = response.data.users_bots
                        myRenderBotsTable(snatchAcc.botLists, response.data.deployed_bot_id)      
                    } else if(response.data.users_bots === null) {
                        snatchBotTableHide()
                        preloaderHide('onTable')
                        noBotsnotificationClose()
                        alertShow('danger', 'No Bots available in this account.')
                        noBotsnotificationShow()
                    }
                } 

                myAjax('GET', url, getBotsLambda, token)
            } else {
                document.querySelector("div.SnatchAuthentificationBlock").style = "display:none"
                document.querySelector("div.SnatchRegisterBlock").style = "display:block"
                $("#mySnatchLogin").val('')
                $("#mySnatchPassword").val('')
            }
        }

        function refreshSnatchToken() {
            let url = wp_user.ajax_url + '?action=refresh_access'
            myAjax('GET', url)
        }

        function logout() {
            let url = wp_user.ajax_url + '?action=logout_action'
            snatchBotTableHide()
            noBotsnotificationClose()
            preloaderShow('body', preloaderStyle)
            const logoutLambda = (response) => {
                if(response.data === 'logout_action') { //logout
                    preloaderHide('onFullScreen')   
                    renderLogic({snatch_user_id: false})
                    alertClose()
                }
            } 

            myAjax('GET', url, logoutLambda)
        }

        function deploy(botID, bot_action) {
            let url = wp_user.ajax_url + '?action=deploy_bot'
            if (botID) {
                let snatchBot = {botID: botID, bot_action: bot_action}
                const deployLambda = (response) => {
                    if(response.deploy_action_bot_id) { //deploy_bot
                        preloaderHide('onFullScreen')
                        let text = 'Bot successfully deployed'
                        let deployedBotId = response.deploy_action_bot_id
                        let whatAction = response.what_action
                        if (whatAction === 'disconnect') {
                            text = 'Bot successfully disconnected'
                            deployedBotId = null
                        }
                        botBlockButtonAction(deployedBotId, whatAction)
                        alertShow('primary', text)
                        wp_user.data.deployed_bot = deployedBotId
                    }
                }

                myAjax('GET', url, deployLambda, snatchBot)
            }
        }

        function snatchBotTableHide() {
            const mySnatchBotsTable = $("#mySnatchBotsTableBlock")
            if(mySnatchBotsTable.length) {
                mySnatchBotsTable.remove()
            }
        }

        function myRenderBotsTable(botLists, deployed_bot_id) {
            snatchBotTableHide()
            noBotsnotificationClose()
            preloaderHide('onTable')
            $("div.SnatchAuthentificationBlock").append('<div id="mySnatchBotsTableBlock"></div>')
            botLists.forEach((bot, i) => {
                let isDeployed = deployed_bot_id == bot.id ? true : false
                let deployedBackgroundColor = isDeployed ? '#0079fe' : 'white'
                let deployedColor = isDeployed ? 'white' : '#0079fe'
                $("div#mySnatchBotsTableBlock").append(
                    '<div class="g-col-min-6 g-col-max-6 col-md-3 bot-item ng-star-inserted">' +
                        '<div id="botBlock-'+ bot.id +'" class="bot__box box collaboration_info_box" style="position: relative; background-color:'+ deployedBackgroundColor +'">' +
                            
                            '<div>' +
                            '<div class="bot__body">' +
                            '<div>' +
                            
                            '<div class="bot__avatar avatar" mattooltipposition="right" style="background-image: url(' + bot.custom_img + ');"></div>' +
                            '<div class="bot__title">' +
                                '<h4 style="color:'+ deployedColor +'">' + bot.name + '</h4>' +
                                '<p style="color:'+ deployedColor +'">id:' + (bot.id) + '</p>' +
                                '<p style="color:'+ deployedColor +'">' + bot.created_at + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="bot__actions">' +
                            '<input id="snatchDeployButton-'+ bot.id +'" type="button" value="'+ (isDeployed ? 'Disconnect' : 'Deploy') +'" class="mat-icon-button mat-button-base snatchDeployButton" style="color:'+ deployedBackgroundColor +';background-color:'+ deployedColor +'"/>'+
                                
                            '<div class="mat-button-ripple mat-ripple mat-button-ripple-round"></div>' +
                            '<div class="mat-button-focus-overlay"></div></button>' +
                            '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>' )
                $("#snatchDeployButton-"+ bot.id).on('click', (e) => {
                    deploy(bot.id, e.target.value)
                    preloaderShow('body', preloaderStyle)
                })
            });
        }

        function hideUserInfoBlock() {
            let renderUserInfoBlock = $("#SnatchAuthentificationBlockDiv")
            if (renderUserInfoBlock.length) {
                renderUserInfoBlock.remove()
            }
        }
        function renderUserInfoBlock(response) {
            hideUserInfoBlock()

            $(".SnatchAuthentificationBlock").append(
                '<div id="SnatchAuthentificationBlockDiv">' + 
                    '<h1 style="color: #0079fe; padding: 20px; text-align: center;">Account Information</h1> ' +
                    '<div style="float: right;">' +
                        '<div>' + 
                            '<input id="snatchLogout" class="fa fa-sign-out mat-icon-button mat-button-base snatchDeployButton" style="color: white; background-color:#0079fe; font-size:20px" type="button" value="Log out">' +
                        '</div>' +
                    '</div><br/>' + 
                    '<div class="auth__form">' +
                        '<div class="auth__header-box">' +
                            '<label for="blockClassPlugin2">Logged with account: </label>'+ response.email  + 
                        '</div>' +
                        '<span class="auth__header-hr"></span><br/>' +
                        '<div class="auth__header-box">' +
                            '<label for="blockClassPlugin2">Name: </label>'+ response.full_name +
                        '</div>' +
                        '<span class="auth__header-hr"></span><br/>' +
                    '</div>' +
                    '<h1 style="color: #0079fe; padding: 20px; text-align: center;">Bots</h1>' +
                '</div>'
            )
            if(!$("#mySnatchBotsTable").length) {
                preloaderShow('.SnatchAuthentificationBlock', {position: 'relative', bgColor: 'transparent'})
            }
            $("#snatchLogout").on("click", (e) => {
                logout()
                hideUserInfoBlock()
            })
        }

        function renderMyForm(response) {
            $("div#specialSnatchForm").css('display', 'block')
        }
    })(jQuery);
</script>