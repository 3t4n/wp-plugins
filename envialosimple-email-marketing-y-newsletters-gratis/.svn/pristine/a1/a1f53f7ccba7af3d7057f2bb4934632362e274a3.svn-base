<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#contactsEdit',
        data () {
            return {
                urlContacts: 'admin.php?page=es-plugin-contacts',
                showToast: false,
                msgToast: '',
                loading:false,
                customfields: [],
                formData: {
                    email:'',
                    customFields: {}
                },
                customFieldsValues: {},
                contactData: null,
                mailListsSelected:'',

                timer: null,

                showSuccess:false,
                msgSuccess: '',

                //not found
                notfound:false,
                msgBackList:'Volver al listado de contactos'
            }
        },
        methods: {
            submitForm() {
                this.msgsService.hideErrorsForm(this.$refs);
                this.setValuesFields(this.customfields);

                this.loading = true;
                this.contactsService.edit(this.formData).then(response => {
                    this.loading = false;

                    //show msg
                    this.showSuccess = true;
                    this.msgSuccess = 'El contacto se editó con éxito.';
                    
                }).catch((error) => {
                    let response = error.response;
                    if(response.status == '422') {
                        this.msgsService.showErrorsForm(response.data.code,this.$refs);
                        this.showMsgToast('<?php echo esc_html($lang['globals']['error_form']); ?>');
                    } else {
                        this.showMsgToast(this.msgsService.getHtmlMgs(response.data.code));
                    }
                }).then(() => {
                    this.loading = false;
                });
            },
            setValuesFields(fields) {
                this.formData.customFields = JSON.parse(JSON.stringify(this.customFieldsValues));
                fields.forEach((field) => {
                    if(field.type == "Check box") {
                        this.formData.customFields[field.id] = this.customFieldsValues[field.id].toString();
                    }
                    if(field.type == "Anual Date") {
                        if(this.customFieldsValues[field.id][0] && this.customFieldsValues[field.id][1]) {
                            this.formData.customFields[field.id] = ('0' + this.customFieldsValues[field.id][0]).slice(-2)+"-"+('0' +this.customFieldsValues[field.id][1]).slice(-2);
                        } else {
                            if(this.customFieldsValues[field.id][0] || this.customFieldsValues[field.id][1]) {
                                this.formData.customFields[field.id] = '-';
                            } else {
                                this.formData.customFields[field.id] = '';
                            }
                        }   
                    }
                });
            },
            isNumber(e) {
                let char = String.fromCharCode(e.keyCode);
                if (/^[0-9]+$/.test(char)) return true;
                else e.preventDefault();
            },

            //get data
            getContactData() {
                let urlParams = new URLSearchParams(window.location.search);
                this.idContact = urlParams.get('id');

                this.contactsService.getById(this.idContact).then((result)=> {
                    let dataContact = result.data.data;
                    this.formData.id = this.idContact;
                    this.formData.customFields = dataContact.customFields;
                    this.contactData = dataContact;
                    dataContact.customFields.forEach(customField => {
                        this.customFieldsValues[customField.id] = this.checkTypesFields(customField);
                    });
                    this.mailListsSelected = dataContact.mailLists.map((mailList) => mailList.name).join(', ');
                    
                }).catch((error) => {
                    this.notfound = true;
                }).then(() => {
                    this.loading = false;
                });
            },
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
            
            //customFields
            getCustomFields() {
                this.loading = true;
                this.customfieldsService.getAll({
                    page:1,
                    orderby:'id',
                    order:'asc',
                    limit:100,
                    filter: ''
                }).then((result) => {
                    let data = result.data.data.data;
                    this.customfields = data;
                    this.setDefaultValueFields(data);
                    this.getContactData();
                }).catch((error) => {
                    console.log('error:',error);
                }).then(() => {
                    //this.loading = false;
                });
            },
            getValuesFields(customfield) {
                return customfield.options_values.split(',');
            },
            setDefaultValueFields(fields) {
                fields.forEach((field) => {
                    if(field.type == "Check box") {
                        this.customFieldsValues[field.id] = [];
                    }
                    if(field.type == "Drop list") {
                        this.customFieldsValues[field.id] = '';
                    }
                    if(field.type == "Anual Date") {
                        this.customFieldsValues[field.id] = [];
                        this.customFieldsValues[field.id][0] = '';
                    }
                });
            },
            checkTypesFields(field) {
                if(field.type == "Check box") {
                    if(field.value) {
                        return field.value.split(',');
                    } else {
                        return [];
                    }
                }
                if(field.type == "Anual Date") {
                    if(field.value) {
                        let value = field.value.split('-');
                        value[0] = parseInt(value[0]);
                        return value;
                    } else {
                        let value = [];
                        value[0] = '';
                        return value;
                    }
                    
                }

                return field.value;
            },
            getFormatedDate(date) {
                let nDate = new Date(date);
                if(date && !isNaN(nDate.getDate())) {
                    return ('0' + nDate.getDate()).slice(-2) + '/'
                        + ('0' + (nDate.getMonth()+1)).slice(-2) + '/'
                        + nDate.getFullYear() +" "
                        + ('0' +nDate.getHours()).slice(-2) + ":"
                        + ('0' +nDate.getMinutes()).slice(-2);
                } else {
                    return '-';
                }
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlContacts);
            },

            //not found action
            backList() {
                window.location.replace(this.urlContacts);
            }
        },
        mounted () {
            this.msgsService = new ESPluginMsgsService();
            this.customfieldsService = new ESPluginCustomfieldsService();
            this.listsService = new ESPluginListsService();
            this.contactsService = new ESPluginContactsService();

            this.getCustomFields();
            
        }
    })
</script>