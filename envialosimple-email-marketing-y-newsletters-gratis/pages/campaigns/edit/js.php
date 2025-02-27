<script>
    var app = new Vue({
        el: '#campaignEdit',
        data () {
            return {
                urlCampaigns: 'admin.php?page=es-plugin-campaigns',
                urlEditCampaigns: 'admin.php?page=es-plugin-campaigns-edit&id=',
                loading:false,
                type_list:'maillist',
                idCampaign: null,
                editedContent:false,
                showEmailPreview: false,
                emailPreview:'',
                footerContent: ``,
                showDesigner: true,

                //mailList
                mailLists: [],
                mailListsOptions: [],
                mailListsSelected:[],
                paginationMailList:[],
                currentPageMailList:1,
                filterPageMailList:'',
                requiredMailList:false,
                emptyMailList:false,

                //segments
                segments: [],
                segmentSelected:null,
                paginationSegment:[],
                currentPageSegment:1,
                filterPageSegment:'',
                requiredSegment:false,
                emptySegment:false,

                //form data
                form: {
                    name:'',
                    subject:'',
                    previewText:'',
                    fromAlias:'',
                    fromEmail:'',
                    replyEmail:'',
                    trackLinkClicks:true,
                    trackReads:true,
                    trackAnalitics:true,
                    sendReport:true,
                    publicArchive:false,
                    content:''
                },

                //toast
                showToast: false,
                msgToast: '',
                loading:false,

                //modal
                showContent: false,
                newContent:'',
                showModalSendCampaign: false,

                //success modal
                timer:null,
                showSuccess: false,
                msgSuccess: '',

                //SendModal
                errorsDate:false,
                loadingSend:false,
                responseSendCampaign:null,

                //not found
                notfound:false,
                msgBackList:'Volver al listado de campañas',

                //deleteContent
                showDetele: false,
                msgDeleteContent: '¿Deseas eliminar este contenido? Ten en cuenta que esta acción no puede deshacerse.'
            }
        },
        methods: {
            //get data
            getCampaignData() {
                this.loading = true;
                let urlParams = new URLSearchParams(window.location.search);
                this.idCampaign = urlParams.get('id');

                this.campaignsService.getById(this.idCampaign).then((result)=> {
                    let dataCampaign = result.data.data;
                    this.form = dataCampaign;
                    this.form.id = this.idCampaign;
                    this.setDataForm();
                    this.changeTypeList();
                }).catch((error) => {
                    this.notfound = true;
                }).then(() => {
                    this.loading = false;
                });
            },

            //form
            submitForm(event) {
                event.preventDefault();
                this.msgsService.hideErrorsForm(this.$refs);
                this.setMailListsSegmentForm();

                this.loading = true;
                this.campaignsService.edit(this.form).then((result) => {
                    this.editedContent = false;

                    //show msg
                    this.showSuccess = true;
                    this.msgSuccess = 'La campaña se editó con éxito.';

                }).catch((error)=> {
                    let response = error.response;
                    if(response.status == '422') {
                        this.msgsService.showErrorsForm(response.data.code,this.$refs);
                    }
                    this.showMsgToast('Para poder continuar, por favor revisa los campos con errores.');
                }).then(() => {
                    this.loading = false;
                });
            },
            setMailListsSegmentForm() {
                delete(this.form.mailListsIds);
                delete(this.form.segmentId);
                if(this.type_list == 'maillist') {
                    if(this.mailListsSelected.length > 0) {
                        let mailIds = this.mailListsSelected.map((select) => select.id);
                        this.form.mailListsIds = mailIds;
                    } else {
                        this.form.mailListsIds = '';
                    }
                    
                } else {
                    if(this.segmentSelected && this.segmentSelected.id) {
                        this.form.segmentId = this.segmentSelected.id;
                    } else {
                        this.form.segmentId = '';
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

            //maillist
            getMailLists(filter ='') {
                this.loading = true;
                if(filter !== this.filterPageMailList) {
                    this.filterPageMailList = filter;
                    this.currentPageMailList = 1;
                }
                this.listsService.getAll({
                    page:this.currentPageMailList,
                    orderby:'name',
                    order:'asc',
                    limit:100,
                    filter: this.filterPageMailList
                }).then((result) => {
                    this.paginationMailList = result.data.data;
                    this.mailLists = result.data.data.data;
                    this.updateLists();
                }).catch(() => {

                }).then(() => {
                    this.loading = false;
                });
            },
            addMaillist(option) {
                this.requiredMailList = false;
                this.mailListsSelected.push(option);
                this.updateLists();
            },
            removeMaillist(option) {
                let index = this.mailListsSelected.map(function(e) { return e.name; }).indexOf(option.name);
                if(index >= 0) {
                    this.mailListsSelected.splice(index, 1);
                }
                this.updateLists();
            },
            updateLists() {
                this.mailListsOptions = [];
                this.mailLists.forEach((list) => {
                    let add = true;
                    this.mailListsSelected.forEach((select) => {
                        if(select.id == list.id) {
                            add=false;
                        }
                    });
                    if(add) {
                        this.mailListsOptions.push(list);
                    }
                });
            },
            nextPageMailList() {
                this.currentPageMailList++;
                this.getMailLists(this.filterPageMailList);
            },
            prevPageMailList() {
                this.currentPageMailList--;
                this.getMailLists(this.filterPageMailList);
            },
            addAllMailList() {
                this.requiredMailList = false;
                let allSelected = this.mailListsSelected.map(function(e) { return e.id; });
                this.mailLists.forEach((list) => {
                    if(allSelected.indexOf(list.id) < 0 && list.count > 0) {
                        this.mailListsSelected.push(list);
                    }
                });
                this.updateLists();
            },
            removeAllMailList(removeSelected) {
                removeSelected.forEach((select)=> {
                    this.removeMaillist(select);
                });
                this.updateLists();
            },

            //segments
            getSegments(filter ='') {
                this.loading = true;
                if(filter !== this.filterPageSegment) {
                    this.filterPageSegment = filter;
                    this.currentPageSegment = 1;
                }
                this.segmentsService.getAll({
                    page:this.currentPageSegment,
                    orderby:'name',
                    order:'asc',
                    limit:100,
                    filter: this.filterPageSegment
                }).then((result) => {
                    this.paginationSegment = result.data.data;
                    this.segments = result.data.data.data;
                }).catch(() => {

                }).then(() => {
                    this.loading = false;
                });
            },
            addSegment(option) {
                this.requiredSegment = false;
                this.emptySegment = false;
                this.segmentSelected = option;
            },
            removeSegment() {
                this.segmentSelected = null;
            },
            changeTypeList() {
                if(this.type_list == 'maillist') {
                    this.getMailLists();
                } else {
                    this.getSegments();
                }
            },
            showModalContent() {
                this.newContent = this.form.content;
                this.showContent = true;
            },
            hideModalContent() {
                this.showContent = false;
            },
            hideModalSendCampaign() {
                this.showModalSendCampaign = false;
            },
            saveContent(newContent) {
                this.editedContent = true;
                this.form.content = newContent;
                this.newContent = newContent;
                this.$refs.iframeContent.contentDocument.body.innerHTML = this.newContent;
                this.hideModalContent();
            },
            removeContent() {
                this.form.content = '';
                this.newContent = '';
                this.hideRemoveContent();
            },
            showRemoveContent() {
                this.showDetele = true;
            },
            hideRemoveContent() {
                this.showDetele = false;
            },
            errorNeedSave() {
                this.showMsgToast('Para realizar esta acción es necesario guardar los cambios realizados en la campaña.');
            },
            setDataForm() {
                if(this.form.maillists.length > 0) {
                    this.type_list = 'maillist';
                    this.mailListsSelected = this.form.maillists;
                }
                if(this.form.segments.length > 0) {
                    this.type_list = 'segment';
                    this.segmentSelected = this.form.segments[0];
                }
                
                this.newContent = this.form.content;
                this.form.content = this.form.content;
                this.$refs.iframeContent.contentDocument.body.innerHTML = this.newContent;
            },
            toggleEmailPreview() {
                this.showEmailPreview = !this.showEmailPreview;
            },

            //check fields campaign
            async checkStatusCampaign() {
                this.msgsService.hideErrorsForm(this.$refs);
                this.setMailListsSegmentForm();

                this.loading = true;
                try {
                    if(this.checkLists()) {
                        this.showMsgToast('Para poder continuar, por favor revisa los campos con errores.');
                    } else {
                        let resultSave = await this.campaignsService.edit(this.form);
                        let checkStatus = await this.campaignsService.checkstatus(this.form.id);
                        this.showModalSendCampaign = true;
                    }
                    this.loading = false;
                } catch (error) {
                    this.loading = false;
                    let response = error.response;
                    
                    if(response.status == '422') {
                        this.msgsService.showErrorsForm(response.data.code,this.$refs);
                        this.showMsgToast('Para poder continuar, por favor revisa los campos con errores.');
                    }
                    if(response.status == 400) {
                        let showMsg = this.msgsService.showErrorsFormCampaign(response.data.errors,this.$refs);
                        if(this.checkEmptyLists(response.data.errors)) {
                            this.showMsgToast('Para poder continuar, por favor revisa los campos con errores.');
                        } else {
                            if(showMsg == false) {
                                this.showModalSendCampaign = true;
                                this.loading = false;
                            }
                        }
                    }
                }
            },

            async setSendEmail(data) {
                this.loadingSend = true;
                this.errorsDate = false;
                data.id = this.idCampaign;
                try {
                    let responseSend = await this.campaignsService.send(data);
                    this.responseSendCampaign = responseSend;
                } catch (error) {
                    let response = error.response;
                    if(response.status == 422) {
                        let msg = this.msgsService.getHtmlMgs(response.data.code);
                        this.errorsDate = msg;
                    }
                    if(response.status == 400) {
                        this.responseSendCampaign = response;
                        this.msgsService.showErrorsFormCampaign(response.data.errors,this.$refs);
                        this.checkEmptyLists(response.data.errors);
                    }
                }
                this.loadingSend = false;
            },
            //email preview
            sendEmailPreview() {
                this.loading = true;
                this.campaignsService.sendpreview({
                    id: this.idCampaign,
                    emails: [
                        this.emailPreview
                    ]
                }).then((result) => {
                    this.emailPreview = '';
                    this.showEmailPreview = false;
                    this.showMsgToast('El correo se envió con éxito.');
                }).catch((error)=> {
                    let response = error.response;
                    if(response.status == '422') {
                        this.msgsService.showErrorsForm(response.data.code,this.$refs);
                    }
                    this.showMsgToast('Para poder continuar, por favor revisa los campos con errores.');
                }).then(() => {
                    this.loading = false;
                });
            },
            checkLists() {
                let result = false;
                this.requiredMailList = false;
                this.requiredSegment = false;
                if(this.type_list == 'maillist' && this.mailListsSelected.length == 0) {
                    this.requiredMailList = true;
                    result = true;
                }
                if(this.type_list == 'segment' && (!this.segmentSelected || this.segmentSelected.length == 0)) {
                    this.requiredSegment = true;
                    result = true;
                }
                return result;
            },
            checkEmptyLists(errors) {
                let result = false;
                this.emptySegment = false;
                this.emptyMailList = false;
                if(errors.includes('errorMsg_noContactsInSegments')) {
                    this.emptySegment = true;
                    result = true;
                }
                if(errors.includes('errorMsg_noContactsInMailLists')) {
                    this.emptyMailList = true;
                    result = true;
                }

                return result;
            },
            hideAlertDesigner() {
                this.showDesigner = false;
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlCampaigns);
            },

            //not found action
            backList() {
                window.location.replace(this.urlCampaigns);
            }
            
        },
        mounted() {
            this.msgsService = new ESPluginMsgsService();
            this.campaignsService = new ESPluginCampaignsService();
            this.listsService = new ESPluginListsService();
            this.segmentsService = new ESPluginSegmentsService();
            
            this.getCampaignData();
        }
    })
</script>