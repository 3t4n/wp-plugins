<script>
    var app = new Vue({
        el: '#campaignCreate',
        data () {
            return {
                urlCampaigns: 'admin.php?page=es-plugin-campaigns',
                urlEditCampaigns: 'admin.php?page=es-plugin-campaigns-edit&id=',
                loading:false,
                type_list:'maillist',
                campaign_id:null,

                //mailList
                mailLists: [],
                mailListsOptions: [],
                mailListsSelected:[],
                paginationMailList:[],
                currentPageMailList:1,
                filterPageMailList:'',

                //segments
                segments: [],
                segmentSelected:null,
                paginationSegment:[],
                currentPageSegment:1,
                filterPageSegment:'',

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

                timer:null,

                showSuccess:false,
                msgSuccess: '',

                //deleteContent
                showDetele: false,
                msgDeleteContent: '¿Deseas eliminar este contenido? Ten en cuenta que esta acción no puede deshacerse.'
            }
        },
        methods: {
            //form
            submitForm(event) {
                event.preventDefault();
                this.msgsService.hideErrorsForm(this.$refs);
                this.setMailListsSegmentForm();

                this.loading = true;
                this.campaignsService.create(this.form).then((result) => {
                    let dataCampaign = result.data.data;

                    //show msg
                    this.showSuccess = true;
                    this.msgSuccess = 'La campaña se creó con éxito.';
                    this.campaign_id = dataCampaign.id;
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
                    let mailIds = this.mailListsSelected.map((select) => select.id);
                    this.form.mailListsIds = mailIds;
                } else {
                    this.form.segmentId = this.segmentSelected.id;
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
            saveContent(newContent) {
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
            //remove content modal
            showRemoveContent() {
                this.showDetele = true;
            },
            hideRemoveContent() {
                this.showDetele = false;
            },

            errorNeedSave() {
                this.showMsgToast('Para realizar esta acción es necesario guardar los cambios realizados en la campaña.');
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
                window.location.replace(this.urlEditCampaigns+this.campaign_id);
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlCampaigns);
            }
        },
        async mounted  () {
            this.msgsService = new ESPluginMsgsService();
            this.campaignsService = new ESPluginCampaignsService();
            this.listsService = new ESPluginListsService();
            this.segmentsService = new ESPluginSegmentsService();

            this.changeTypeList();
        }
    })
</script>