<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#es-contactform7-list',
        data () {
            return {
                urlForms: 'admin.php?page=es-plugin-contactform7',
                urlFormsEdit: 'admin.php?page=es-plugin-contactform7-edit&id=',

                forms: null,
                formSelected: '',
                configForm:false,
                loading:false,
                config: {
                    mailList: null,
                    associatedFields: {}
                },
                contactFormFields:  {
                },
                customFields: {

                },
                //toast
                showToast: false,
                msgToast: '',
                loading:false,

                //maillists
                maillists: [],
                maillistSelected:null,
                paginationMaillist:[],
                currentPageMaillist:1,
                filterPageMaillist:'',
                requiredMailList: false,

                timer:null,

                //modal success
                showSuccess:false,
                msgSuccess: ''
            }
        },
        methods: {
            //get all form contactform 7
            getForms: function() {
                this.loading = true;
                this.contactsform7Service.getForms().then((response)=> {
                    this.forms = response.data;
                    this.loading = false;
                }).catch((error) => {
                    this.loading = false;
                    console.log('getForms - error:',error);
                })
            },

            //get fields contactform 7
            getFieldsById: function() {
                this.loading = true;
                this.contactsform7Service.getFieldsById(this.formSelected).then((response)=> {
                    this.contactFormFields = response.data;
                }).catch((error) => {
                    console.log('getFieldsById - error:',error);
                }).then(() => {
                    this.loading = false;
                });
            },
            //event after select contactform 7
            selectContactForm: function(data) {
                if(data.target.value) {
                    this.getConfig();
                    this.getFieldsById();
                    this.getMaillists();
                }
            },

            //endpoints config wordpress
            getConfig: async function() {
                if(this.formSelected) {
                    this.loading = true;
                    let responseConfig = await this.contactsform7Service.getConfig(this.formSelected);
                    this.config.mailList = (responseConfig.data && responseConfig.data.mailList)?responseConfig.data.mailList:null;
                    this.config.associatedFields = (responseConfig.data && !Array.isArray(responseConfig.data.associatedFields))?responseConfig.data.associatedFields:{};
                    this.loading = false;
                }
            },
            setConfig: function() {
                if(this.formSelected) {
                    if(this.checkEmailField()) {
                        this.loading = true;
                        this.contactsform7Service.setConfig(
                            this.formSelected,
                            this.config
                        ).then((response)=> {
                            //show msg
                            this.showSuccess = true;
                            this.msgSuccess = '<?php echo esc_html($lang['pages']['contactForm7']['save_ok']); ?>';
                        }).catch((error) => {
                            console.log('setConfig - error:',error);
                        }).then(() => {
                            this.loading = false;
                        });
                    } else {
                        this.showMsgToast('<?php echo esc_html($lang['pages']['contactForm7']['required_email']); ?>');
                    }
                }
            },


            //toast
            hideToast: function() {
                this.showToast = '';
                window.clearTimeout(this.timer);
            },
            showMsgToast: function(msg) {
                this.msgToast = msg;
                this.showToast = true;
                this.timer = window.setTimeout(() => {
                    this.hideToast();
                },5000);
            },

            //maillists
            getMaillists(filter ='') {
                this.loading = true;
                if(filter !== this.filterPageMaillist) {
                    this.filterPageMaillist = filter;
                    this.currentPageMaillist = 1;
                }
                this.listsService.getAll({
                    page:this.currentPageMaillist,
                    orderby:'name',
                    order:'asc',
                    limit:100,
                    filter: this.filterPageMaillist
                }).then((result) => {
                    this.paginationMaillist = result.data.data;
                    this.maillists = result.data.data.data;
                }).catch(() => {

                }).then(() => {
                    this.loading = false;
                });
            },
            addMaillist(option) {
                this.config.mailList = option;
            },
            removeMaillist() {
                this.config.mailList = null;
                this.config.associatedFields = {};
            },

            //customfields
            getCustomFields() {
                this.customfieldsService.getAll({
                    page:1,
                    orderby:'id',
                    order:'asc',
                    limit:100,
                    filter: ''
                }).then((response) => {
                    this.customFields = response.data.data.data;
                }).catch((error) => {
                    console.log('getCustomFields - error:',error);
                });
            },
            checkEmailField() {
                let result = false;
                if(this.config.mailList !== null) {
                    Object.entries(this.config.associatedFields).forEach(([key, value]) => {
                        if(value == 'emailbase') {
                            result = true;
                        }
                    });
                    return result;
                } else {
                    return true;
                }
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';

                window.location.replace(this.urlFormsEdit+this.formSelected);
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlForms);
            }
        },
        mounted () {
            this.contactsform7Service = new ESPluginContactsform7Service();
            this.listsService = new ESPluginListsService();
            this.customfieldsService = new ESPluginCustomfieldsService();

            this.getForms();
            this.getCustomFields();
        }
    })
</script>