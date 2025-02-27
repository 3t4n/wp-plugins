<?php global $lang; ?>
<script>
    Vue.component('modal-send-campaign-component', {
        data () {
            return {
                option: 'sendNow',
                sendDate: '01/17/2022',
                minDate: null,
                hour:'',
                min:'',
                urlCampaigns: 'admin.php?page=es-plugin-campaigns',
                code: 'errorMsg_contactListFilter'
            }
        },
        methods: {
            toggle: function() {
                this.show = !this.show;
            },
            acceptAction: function() {
                let data = {
                    sendNow:(this.option == 'sendNow')?1:0,
                }
                if(this.option !== 'sendNow') {
                    data.sendDate = this.getSendDate();
                }
                this.accept(data);
            },
            cancelAction: function() {
                this.cancel();
            },
            isNumber(e) {
                let char = String.fromCharCode(e.keyCode);
                if (/^[0-9]+$/.test(char)) return true;
                else e.preventDefault();
            },
            checkNumber(e,min,max) {
                if(e.target.value < min) {
                    this[e.target.name] = min; 
                }
                if(e.target.value > max) {
                    this[e.target.name] = max; 
                }
            },
            setDates() {
                let myCurrentDate = new Date();
                let myPastDate = new Date(myCurrentDate);
                myPastDate.setDate(myPastDate.getDate());
                this.minDate = this.getDate(myPastDate);

                let hour = myCurrentDate.getHours();
                let min = myCurrentDate.getMinutes();
                
                if(hour<10){
                    hour='0'+hour;
                } 
                if(min<10){
                    min='0'+min;
                }
                this.min = min;
                this.hour = hour;
            },
            getDate(date) {
                var dd = date.getDate();
                var mm = date.getMonth()+1;
                var yyyy = date.getFullYear();
                if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                }
                return yyyy+'-'+mm+'-'+dd;
            },
            getSendDate() {
                return this.sendDate+' '+this.getHourFormatted(this.hour,this.min)+':00';
            },
            getDateFormatted() {
                let date = new Date(this.sendDate+'T00:00:00');
                var dd = date.getDate();
                var mm = date.getMonth()+1;
                var yyyy = date.getFullYear();
                if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                }
                return dd+'/'+mm+'/'+yyyy;
            },
            setDefaultDate() {
                let date = new Date();
                this.sendDate =  date.toISOString().substring(0,10);
            },
            getHourFormatted(hour,min) {
                if(hour && hour<10){
                    hour='0'+parseInt(hour)
                } 
                if(min && min<10){
                    min='0'+parseInt(min)
                }
                if(hour && hour) {
                    return hour+':'+min;
                }
                return '';
            },
            backList() {
                window.location.replace(this.urlCampaigns);
            },
            getMsgError() {
                let msg = 'Por una cuestión de seguridad no podemos enviar tu campaña. ';
                if(this.option !== 'sendNow') {
                    msg = 'Por una cuestión de seguridad no podemos dejar programada tu campaña. ';
                }
                if(this.responsesend.code) {
                    code = this.responsesend.code;
                }
                if(this.responsesend.data && this.responsesend.data.code) {
                    code = this.responsesend.data.code;
                }
                if(Array.isArray(code)) {
                    code = code[0];
                }
                switch (code) {
                    case 'errorMsg_campaignPaused':
                        msg += '<strong>Parece que tu campaña está pausada.</strong>';
                        break;
                    case 'errorMsg_campaignSending':
                        msg += '<strong>Parece que tu campaña está enviándose o programada.</strong>';
                        break;
                    case 'errorMsg_campaignCompleted':
                        msg += '<strong>Parece que tu campaña ya fue enviada.</strong>';
                        break;
                    case 'errorMsg_campaignNotFound':
                        msg += '<strong>No existe campaña con el ID informado.</strong>';
                        break;
                    case 'errorMsg_maxSimultaneousCampaignLimitExceeded':
                        msg += '<strong>Alcanzó el limite máximo de campañas enviándose simultáneamente.</strong>';
                        break;
                    case 'errorMsg_senderDomainNotVerified':
                        msg += '<strong>El dominio no está verificado.</strong>';
                        break;
                    case 'errorMsg_noContactsInMailLists':
                        msg += '<strong>Alguna de las listas no poseen contactos.</strong>';
                        break;
                    case 'errorMsg_noContactsInSegments':
                        msg += '<strong>El segmento no posee contactos.</strong>';
                        break;
                    case 'errorMsg_spamRateErrorThreshold':
                        msg += '<strong>La campaña no pasó el chequeo de SPAM.</strong>';
                        break;
                    case 'errorMsg_invalidMaillistsSelected':
                        msg += '<strong>Alguna de las listas asociadas a la campaña no existe.</strong>';
                        break;
                    case 'errorMsg_contactListFilter':
                        msg += '<strong>Parece que tu cuenta se encuentra suspendida.</strong> Por favor ponte en en contacto con nuestra Mesa de ayuda para resolver la situación.';
                        break;
                    default:
                        break;
                }
                this.code = code;
                return msg;
            }
        },
        watch: {
                show: function (newShow, oldShow) {
                    if(newShow) {
                        setTimeout(() => {
                            this.setDates();
                            this.setDefaultDate();
                        }, 300);
                    }
                },
        },
        mounted() {
            //set min date
			this.setDates();
            this.setDefaultDate();
        },
        props: ['show','accept','cancel','errors','loading','responsesend'],
        template: `
            <div class="modalBlock sendCampaign show" v-if="show">
                <div class="modal-content">
                    <div class="modal-body">
                        <div v-if="!loading && !responsesend">
                            <h4 class="mb20">¿Cuándo deseas enviar esta campaña?</h4>
                            <fieldset class="mb20">
                                <div class="mb10">
                                    <label class="form-check-label">
                                        <input type="radio" v-model="option" name="optionsSend" id="optionsRadios1" value="sendNow" checked="">
                                        Ahora mismo
                                    </label>
                                </div>
                                <div class="">
                                    <label class="form-check-label">
                                        <input type="radio" v-model="option"  name="optionsSend" id="optionsRadios2" value="date">
                                        En fecha y hora programadas <small class="text-muted">(La fecha y hora debe ser superior a la actual)</small>
                                    </label>
                                </div>
                            </fieldset>

                            <div class="selectDate" v-if="option == 'date'">
                                <div class="dateSendBlock" ref="sendDateBlock" v-bind:class="{ 'is-invalid': errors }">
                                    <div class="mb20 row pt-2">
                                        <label for="staticEmail" class="col-sm-2 col-form-label text-end">Fecha:</label>
                                        <div class="col-sm-8">
                                            <input type="date" v-model="sendDate" :min="minDate" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="mb20 row pt-2">
                                        <label for="staticEmail" class="col-sm-2 col-form-label text-end">Hora:</label>
                                        <div class="col-sm-8">
                                            <input type="number" v-model="hour" name="hour" class="inputDate form-control" v-on:keypress="isNumber($event)" @change="checkNumber($event,0,23)" /> :
                                            <input type="number" v-model="min" name="min" class="inputDate form-control" v-on:keypress="isNumber($event)" @change="checkNumber($event,0,59)" />
                                        </div>
                                    </div>
                                    <div class="row" v-if="errors">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm invalid-feedback errorsMsgSendBlock d-block" v-html="errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loadingBlock" v-if="loading && !responsesend">
                            <div class="text-center mb20">
                                <img class="logo" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/checking-campaign.svg'; ?>" />
                            </div>
                            <p v-if="option == 'sendNow'">Necesitamos hacer algunos chequeos antes de enviar tu campaña. Esto puede tardar unos segundos.</p>
                            <p v-if="option == 'date'">Necesitamos hacer algunos chequeos antes de dejar programada tu campaña. Esto puede tardar unos segundos.</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="sendOk" v-if="responsesend && responsesend.data && responsesend.data.status == 'ok'">
                            <div v-if="responsesend.data.data.campaign.status !== 'PendingForApproval'">
                                <div class="text-center mb20">
                                    <img class="logo" v-if="option == 'sendNow'" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/sending-campaign.svg'; ?>" />
                                    <img class="logo" v-if="option == 'date'" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/schedule-campaign.svg'; ?>" />
                                </div>
                                <p class="" v-if="option == 'sendNow'">
                                    <i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;<strong>¡Listo! Tu campaña se está enviando</strong>
                                </p>
                                <div v-if="option == 'date'">
                                    <p class=""><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;<strong>¡Listo! Tu campaña fue programada con éxito</strong></p>
                                    <p class="">La misma se enviará el {{getDateFormatted()}} a las {{getHourFormatted(hour,min)}} horas</p>
                                </div>            
                            </div>
                            <div v-if="responsesend.data.data.campaign.status == 'PendingForApproval'">
                                <div class="text-center mb20">
                                    <img class="logo" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/spam-campaign.svg'; ?>" />
                                </div>
                                <p class=""><strong>Tu campaña necesita una revisión extra</strong></p>
                                <p>No te preocupes, en breve estará lista.</p>
                            </div>
                        </div>
                        <div class="sendError" v-if="responsesend && responsesend.data && responsesend.data.status == 'error'">
                            <div class="text-center mb20">
                                <img class="logo" v-if="code == 'errorMsg_contactListFilter'" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/banned-campaign.svg'; ?>" />
                                <img class="logo" v-else-if="code == 'errorMsg_spamRateErrorThreshold'" src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/spam-campaign.svg'; ?>" />
                                <img class="logo" v-else src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/banned-campaign.svg'; ?>" />
                            </div>
                            <p class="" >
                                <i class="fa fa-times-circle-o" v-if="code == 'errorMsg_contactListFilter'"></i>
                                <i class="fa fa-exclamation-triangle" v-else-if="code == 'errorMsg_spamRateErrorThreshold'"></i>
                                <i class="fa fa-exclamation-triangle" v-else></i>
                                &nbsp;&nbsp;
                                <strong v-if="option == 'sendNow'">No podemos enviar tu campaña</strong>
                                <strong v-if="option == 'date'">No podemos dejar programada tu campaña</strong>
                            </p>
                            <p v-html="getMsgError()"></p>
                        </div>
                    </div>
                    <div class="modal-footer" v-if="!loading && !responsesend">
                        <button type="button" v-if="this.cancel" class="btn btn-link" v-on:click="cancelAction"><?php echo esc_html($lang['globals']['cancel']); ?></button>
                        <button type="button" v-if="this.accept" class="btn btn-primary" v-on:click="acceptAction">Continuar con el envío</button>
                    </div>
                    <div class="modal-footer" v-if="responsesend">
                        <button type="button" v-if="this.accept" class="btn btn-primary" v-on:click="backList">Volver a campañas</button>
                    </div>
                </div>
            </div>
        `
    })
</script>
