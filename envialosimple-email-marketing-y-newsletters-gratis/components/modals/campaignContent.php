<?php global $lang; ?>
<?php global $lang_grapesjs; ?>

<script>
    <?php echo $lang_grapesjs; ?>
    window.pathBaseEsPlugin = '<?php echo ES_PLUGIN_URL_BASE; ?>';
    Vue.component('modal-campaign-content-component', {
        data () {
            return {
                editor: null,
                customfieldsService: null,
                loaded: false,

                showConfirmCancel:false
            }
        },
        watch: {
                // whenever question changes, this function will run
                newcontent: function (newNewcontent, oldNewcontent) {
                    this.editor.setComponents(this.newcontent);
                },
                show: function (newShow, oldShow) {
                    if(newShow) {
                        setTimeout(() => {
                            window.dispatchEvent(new Event('resize'));
                        }, 300);
                    }
                },
        },
        async mounted() {
            //getCustomFields
            this.customfieldsService = new ESPluginCustomfieldsService();
            let customsFields = await this.customfieldsService.getAll({
                page:1,
                orderby:'id',
                order:'asc',
                filter:'',
                limit:100,
            });
            window.selectCF = this.setSelectCF(customsFields.data.data.data);

            // grapesjs equals the grapesjs from the first require line
            this.editor = grapesjs.init({
                container : '#gjs',
                components: '',
                style: '',
                storageManager: false,
                noticeOnUnload: 0,
                fromElement: false,
                plugins: [
                    'gjs-preset-newsletter',
                    'grapesjs-custom-code',
                    'postWordpress',
                    'imagesGallery',
                    'contentCenter',
                    'rteExtended'
                ],
                pluginsOpts: {
                    'gjs-preset-newsletter': langPresetNewsletter,
                    'grapesjs-custom-code': langCustomCode,
                },
                traitManager: {
                    appendTo: '#traitsBlock',
                },
                blockManager: {
                    appendTo: '#blocksMgr',
                }
            });
            
            
            //languaje
            this.editor.I18n.addMessages(langGeneric);
            
            this.editor.on('load', () => {
                this.loaded = true;
                this.editor.Panels.removePanel("views");
                this.editor.DomComponents.getWrapper().set({badgable: false, selectable: false});
                const styleManager = this.editor.StyleManager;

                //create div trait
                let traitOriginal = document.querySelector('#traitsBlock');
                document.querySelector('.gjs-pn-views-container').prepend(traitOriginal);

                //add label top
                let label = document.createElement("div");
                label.className="gjs-traits-label";
                label.innerHTML="Propiedades";
                document.querySelector('.gjs-pn-views-container').prepend(label);

                //fix problem fullscreen
                this.editor.on('run:fullscreen:before', options => {
                    options.target = '.themeEs';
                });
            });
            this.editor.setComponents(this.newcontent);
            
            //remove blocks
            this.editor.BlockManager.remove('link');
            this.editor.BlockManager.remove('link-block');
            this.editor.BlockManager.remove('button');
            this.editor.BlockManager.remove('quote');
            this.editor.BlockManager.remove('text-sect');
            this.editor.BlockManager.remove('divider');
            this.editor.BlockManager.remove('image');

            //fix problem rte toolbar position 
            this.editor.on("rte:enable", () => {
                this.editor.trigger('component:update');
            });

            //fix problem with keyevent "enter"
            var iframeBody = this.editor.Canvas.getBody();
            iframeBody.addEventListener("keydown", (e) => { 
                if (e.keyCode === 13 && e.target.getAttribute('contenteditable')) {
                    e.preventDefault();
                    // insert 2 br tags (if only one br tag is inserted the cursor won't go to the next line)
                    e.target.ownerDocument.execCommand("insertHTML", false, "<br/>");
                    // prevent the default behaviour of return key pressed
                    return false;
                }
            });
        },
        methods: {
            setSelectCF(data) {
                let result = [
                    ['']
                ];
                data.forEach(element => {
                    result.push([element.name,element.code]);
                });
                return result;
            },
            getContent() {
                var html = this.editor.getHtml();
                var css = this.editor.Css;
                return this.editor.runCommand('gjs-get-inlined-html');
            },
            cancelModal() {
                this.editor.setComponents(this.newcontent);
                this.showConfirmCancel = false;
                this.cancel();
            },
            showConfirmCancelModal() {
                this.showConfirmCancel = true;
            },
            hideConfirmCancelModal() {
                this.showConfirmCancel = false;
            }

        },
        props: ['show','save','cancel','newcontent'],
        template: `
            <div class="modalBlock campaignContent" v-bind:class="{ show: show }">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="contentBlock themeEs">
                            <div v-show="!loaded">Cargando...</div>
                            <div class="row">
                                <div class="col-auto p-0 blocksLeft" v-show="loaded" >
                                    <div class="gjs-traits-label" >Bloques</div>
                                    <div id="blocksMgr"></div>
                                </div>
                                <div class="col p-0">
                                    <div id="gjs"></div>
                                </div>
                            </div>
                        </div>
                        <div v-if="showConfirmCancel" class="confirmCancel">
                            <div class="cancelBlock">
                                <span class="btnClose" v-on:click="hideConfirmCancelModal()" ><i class="fa fa-times"></i></span>
                                <p>Ten en cuenta que al hacerlo perderás los cambios hechos en el diseño actual.</p>
                                <div class="btnBlock">
                                    <button class="btn btn-primary btn-lg" v-on:click="cancelModal()">Volver a la campaña</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="traitsBlock"></div>
                    <div class="modal-footer" v-if="!showConfirmCancel">
                        <button type="button" class="btn btn-primary" v-on:click="save(getContent())"><?php echo esc_html($lang['globals']['accept']); ?></button>
                        <button type="button" class="btn" v-on:click="showConfirmCancelModal()"><?php echo esc_html($lang['globals']['cancel']); ?></button>
                    </div>
                </div>
            </div>
        `
    })
</script>
