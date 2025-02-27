<script>
    var app = new Vue({
        el: '#campaignsLists',
        components: {
            vuejsDatepicker
        },
        data () {
            return {
                urlEdit: 'admin.php?page=es-plugin-campaigns-edit&id=',
                campaigns: null,
                pagination: null,
                page:1,

                //filters
                order:'desc',
                orderby:'id',
                filterName: '',
                filterStatus: '',
                limit:10,
                createDateFrom: '',
                createDateTo:'',
                createDateFromDate: '',
                createDateToDate:'',

                loading:false,
                timer: null,
                showToast: false,
                msgToast: '',
                titleToast: '',
                selected:null,
                textConfirm: '',
                limitList: {
                    '10':10,
                    '25':25,
                    '50':50,
                    '100':100
                },
                status_options: {
                    'Draft':'Borrador',
                    'Completed':'Enviada',
                    'Sending':'Enviándose o programada',
                    'Paused':'Pausada',
                    'PendingForApproval':'En revisión',
                    'Stopped':'Detenida'
                },
                lang_datepicker:vdp_translation_es.js,

                timer: null
            }
        },
        methods: {
            filterData: function() {
                this.page = 1;
                this.getData();
            },
            setParameters: function(linkurl) {
                var url = new URL(linkurl);
                this.page = (url.searchParams.get("page"))?url.searchParams.get("page"):1;
                this.getData();
            },
            getData: async function() {
                this.loading = true;
                try {
                    this.createDateFrom = this.formatDate(this.createDateFromDate);
                    this.createDateTo = this.formatDate(this.createDateToDate);
                    let result = await this.campaignsService.getAll(this);
                    let data = result.data.data;
                    this.campaigns = data.data;
                    this.pagination = data.links;
                } catch (error) {
                    let data = error.response;
                    let msg = this.msgsService.getHtmlMgs(data.data.code);
                    let title = this.msgsService.getMsg('generic_title_error_fields');
                    this.showMsgToast(title,msg);
                }
                this.loading = false;
            },
            hideToast: function() {
                this.showToast = '';
                window.clearTimeout(this.timer);
            },
            showMsgToast(title,msg) {
                this.titleToast = title;
                this.msgToast = msg;
                this.showToast = true;

                this.timer = window.setTimeout(() => {
                    this.hideToast();
                },5000);
            },
            editAction(data) {
                this.loading = true;
                window.location.replace(this.urlEdit+data.id);
            },
            deleteAction(contact) {
                this.selected = contact;
                let textConfirm = this.msgsService.getMsg('campaigns_modal_confirm_delete');
                this.textConfirm = '¿'+textConfirm+' "'+this.selected.name+'"'+'?';
            },
            hideModal() {
                this.selected = null;

            },
            async deleteContact() {
                this.loading = true;
                try {
                    let result = await this.campaignsService.delete(this.selected.id);
                    this.getData();
                    let msg = this.msgsService.getMsg('campaigns_delete_ok');
                    let title = '';
                    this.showMsgToast(title,msg);
                } catch (error) {
                    console.log('todo mal',error);
                }
                this.hideModal();
                this.loading = false;
            },
            setLimit: function(value) {
                this.limit = value;
                this.page = 1;
                this.getData();
            },
            formatDate(date) {
                if(date) {
                    var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                    if (month.length < 2) 
                        month = '0' + month;
                    if (day.length < 2) 
                        day = '0' + day;

                    return [year, month, day].join('-');
                } else {
                    return '';
                }

            },
            getStatus(campaing) {
                let status = campaing.status;
                let type = campaing.type_send;
                if(status == 'Sending') {
                    if(type == 'One time scheduled') {
                        return 'Programada';
                    } else {
                        return 'Enviándose';
                    }
                } else {
                    return this.status_options[status];
                }
                
            },
            getSendDate: function (campaign) {
                if (campaign.status !== 'Draft') {
                    if(campaign.schedule_send_date) {
                        return this.getFormatDate(campaign.schedule_send_date);
                    }
                    if(campaign.start_date) {
                        return this.getFormatDate(campaign.start_date);
                    }
                }
                return '';
            },
            getFormatDate: function (date) {
                let nDate = new Date(date);
                if(!isNaN(nDate.getDate())) {
                    return ('0' + nDate.getDate()).slice(-2) + '/'
                        + ('0' + (nDate.getMonth()+1)).slice(-2) + '/'
                        + nDate.getFullYear() +" "
                        + ('0' +nDate.getHours()).slice(-2) + ":"
                        + ('0' +nDate.getMinutes()).slice(-2);
                } else {
                    return '';
                }
            },
            checkStatusCampaign(campaign) {
                switch (campaign.status) {
                    case 'Draft':
                    case 'Stopped':
                    case '':
                        return true;
                        break;
                }
                return false;
            },
            renderTitle(text) {
                // Reemplazo entidades HTML de emojis con el emoji real
                const replaceEmojiEntities = (str) => {
                    return str.replace(/&#(\d+);/g, (match, dec) => String.fromCodePoint(dec));
                };
                let formatedText = replaceEmojiEntities(text);
                return formatedText;
            }

        },
        mounted () {
            this.msgsService = new ESPluginMsgsService();
            this.campaignsService = new ESPluginCampaignsService();
            this.getData();
        }
    })
</script>