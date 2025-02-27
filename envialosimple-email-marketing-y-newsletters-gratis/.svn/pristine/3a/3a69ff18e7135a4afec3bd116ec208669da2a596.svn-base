function imagesGallery(editor) {

    // content html in content email
    editor.Components.addType('images-gallery', {
        model: {
            defaults: {
                style: {
                    //background: 'red',
                },
                tagName: 'span',
                components: ``,
                gallery: null,
                current_page:1,
                pages:0
            },
            init() {
                let self = this;
                let nounce = null;
                let page = this.get('current_page');

                getAll({page:page}).then((result) => {
                    nounce = result.data.es_gallery_nounce;
                    this.openModal(nounce);
                    disableBtnShowMore(self);
                    setImagesGallery(self,result.data);
                }).catch((error) => {
                    console.log('error:',error);
                });
            },
            openModal: function(nounce = null) {
                let self = this;
                createModalImages(self, nounce);
            },
            
        },
        view: {
        }
    });

    //block in sidebar
    editor.BlockManager.add('images-gallery-block', {
        label: `
            <div style="text-align:center">
                Imagen
            </div>
        `,
        attributes: {
            class: 'fa fa-file-image-o'
        },
        content: {
            type: 'images-gallery'
        },
        category: 'Extra'
    });
    /*----------------*/
    /*---- Event doble click ----*/
    const domc = editor.DomComponents;
    const defaultType = domc.getType('image');
    const defaultView = defaultType.view;
    domc.addType('image', {
        model: {
            defaults: {
                type: 'image',
                tagName: 'img',
                void: true,
                droppable: 0,
                editable: 1,
                highlightable: 0,
                resizable: { ratioDefault: 1 },
                traits: ['alt'],
                gallery: null,
                current_page:1,
                pages:0,
                idTarget:null
            }
        },
        view: defaultView.extend({
            tagName: 'img',
            events: {
                dblclick: 'showModalGallery',
                click: 'initResize'
            },
            showModalGallery(ev) {
                ev && ev.stopPropagation();
                let self = this.model;
                let page = self.get('current_page');
                self.set('idTarget',ev.target.id);
                getAll({page:page}).then((result) => {
                    setImagesGallery(self,result.data);
                }).catch((error) => {
                    console.log('error:',error);
                });
                createModalImages(self);
            },
        })
    });
    /*----------------*/
    /*---- queries ----*/
    function submitImage(file, esGalleryNounce = null) {
        var form_data = new FormData();
        form_data.append("file",file);
        form_data.append("es_gallery_nounce", esGalleryNounce);
        return fetch("/index.php?rest_route=/envialosimple/v1/gallery/add", {
            "headers": {
                "accept": "application/json, text/plain, */*",
                "accept-language": "en-US,en;q=0.9",
                "cache-control": "no-cache",
                "pragma": "no-cache"
            },
            "referrerPolicy": "strict-origin-when-cross-origin",
            "body": form_data,
            "method": "POST",
            "mode": "cors",
            "credentials": "include"
        }).then(res => res.json()).then(result => result)
        .catch((error) => {
            console.error('Error:', error);
            return error;
        });
    }

    function getAll(data) {
        return fetch("/index.php?rest_route=/envialosimple/v1/gallery/getall", {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            "body": JSON.stringify(data),
            "method": "POST"
        }).then(res => res.json()).then(result => result)
        .catch((error) => {
            console.error('Error:', error);
            return error;
        });
    }
    /*----------------*/

    /*---- functions ----*/
    function scrollTo(element, to, duration) {
        if (duration <= 0) {return;}
        var difference = to - element.scrollTop;
        var perTick = difference / duration * 10;

        setTimeout(() => {
            element.scrollTop = element.scrollTop + perTick;
            if (element.scrollTop === to) {return;}
            scrollTo(element, to, duration - 10);
        }, 10);
    }

    function createModalImages(self, nounce = null) {
        const modal = editor.Modal;
        nounce = nounce === null ? "" : nounce;
        modal.open({
            title: 'Seleccionar una imagen',
            content: `
            <div class="container modalGrapesjs imagesGalleryBlock" style="background:#fff;">
                <div class="content">
                    <ul class="nav nav-tabs" id="tabsOptions">
                        <li class="nav-item">
                            <a class="nav-link active">Subir imagen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Url</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Galeria</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Seleccionar archivo</label>
                                <input type="file" id="formFile" class="form-control" accept="image/png, image/jpeg, image/gif" />
                                <input type="hidden" id="es_gallery_nounce" name="es_gallery_nounce" value="${nounce}" />
                                <div id="invalidFile" class="invalid-feedback d-none"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade">
                            <div class="form-group">
                                <label class="form-label d-block">
                                    <span class="mb-2 d-block">Url de la imagen:</span>
                                    <div class="mb20">
                                        <input id="urlImage" type="text" class="form-control" placeholder="http://www.images.com/images.jpg" />
                                        <div id="invalidUrl" class="invalid-feedback d-none">Por favor, ingresa una URL válida.</div>
                                    </div>
                                    <div>
                                        <button id="btnUrl" class="btn btn-primary w100">Agregar</button>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="galleryBlock">
                            <div class="imagesBlock"></div>
                            <div id="btnBlock" class="mt20">
                                <button class="btn btn-outline-primary btn-lg w100 text-center btnShowMore" >Ver más</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loading d-none" id="loadingModal">
                    <div class="spinner-border text-success" role="status"></div>
                </div>
            </div>
            `,
        });

        //form upload image
        if(document.querySelector('#formFile')) {
            document.querySelector('#formFile').addEventListener('change',(e) => {
                const esGalleryNounce = document.querySelector('#es_gallery_nounce').value;
                let file = e.target.files[0];
                submitImage(file, esGalleryNounce).then((result) => {
                    let invalidFile = document.querySelector('#invalidFile');
                    let formFile = document.querySelector('#formFile');
                    invalidFile.classList.add('d-none');
                    formFile.classList.remove('is-invalid');
                    
                    if(result.status == 'ok') {
                        setImage(self,result.data.url,modal);
                    } else {
                        
                        let msg = 'Error al procesar la imagen, por favor vuelva a intentar más tarde.';
                        switch (result.msg) {
                            case 'file_invalid_mime':
                                msg = 'El formarto del archivo es invalido.'
                                break;
                            case 'file_empty':
                                msg = 'Es necesario seleccionar un archivo.'
                                break;
                            case 'file_size':
                                msg = 'El tamaño del archivo es muy grande.'
                                break;
                        
                            default:
                                break;
                        }
                        invalidFile.classList.remove('d-none');
                        invalidFile.innerHTML = msg;

                        formFile.classList.add('is-invalid');
                    }
                }).catch((error) => {
                    
                });
            });
        }

        //form url
        if(document.querySelector('#btnUrl')) {
            document.querySelector('#btnUrl').addEventListener('click',(e) => {
                let msg = document.querySelector('#invalidUrl');
                let input = document.querySelector('#urlImage');
                let url = input.value;

                if(checkUrlImg(url)) {
                    input.classList.remove('is-invalid');
                    msg.classList.add('d-none');
                    input.classList.remove('is-invalid');
                    setImage(self,url,modal);
                } else {
                    msg.classList.remove('d-none');                    
                    input.classList.add('is-invalid');    
                }
            });
        }

        //click in btn select post
        document.body.onclick = (e) => {
            
            let target = e.target;
            //tabs options
            if (target.className && target.className.indexOf('nav-link') != -1) {
                //remove and add class active
                document.querySelector('#tabsOptions > li a.active').classList.remove("active");
                target.classList.add("active");

                //get index
                let liClicked =  target.parentNode;
                let ulList =  liClicked.parentNode;
                let indexClicked = [].indexOf.call(ulList.children,liClicked);
                
                //hide and show content
                let tabActive = document.querySelector('.imagesGalleryBlock .tab-content .active');
                tabActive.classList.remove('active');
                tabActive.classList.remove('show');
                let newElementSelected = document.querySelector('.imagesGalleryBlock .tab-content > div:nth-child('+(indexClicked+1)+')');
                newElementSelected.classList.add('active');
                newElementSelected.classList.add('show');
            }

            //select image
            if (target.className && target.className.indexOf('selectImageBtn') != -1) {
                let index = target.getAttribute('data-index');
                let gallery = self.get('gallery');
                let imageSelect = gallery[index];
                setImage(self,imageSelect[0],modal);
            }

            //show more
            if (target.className && target.className.indexOf('btnShowMore') != -1) {
                let currentPage = parseInt(self.get('current_page'));;
                disableBtnShowMore();
                getAll({page:( currentPage + 1 )}).then((result) => {
                    setImagesGallery(self,result.data);
                }).catch((error) => {
                    console.log('error:',error);
                });
            }
        }
    }

    function setImage(self,url, modal) {
        let id = self.get('idTarget');
        if(id) {
            self.addAttributes({ src:url });
            self.set({ src:url });
            self.view.render();
            setTimeout(() => {
                window.dispatchEvent(new Event('resize'));
            }, 300);
        } else {
            self.components('<img style="max-width:100%;width:auto;" src="'+url+'" alt="" />');
        }
        
        modal.close();
    }

    function checkUrlImg(url){
        if (typeof url !== 'string') {
            return false;
        }
        return (url.match(/^http[^\?]*.(jpg|jpeg|gif|png|tiff|bmp)(\?(.*))?$/gmi) !== null);
    }

    function setImagesGallery(self,data) {
        enableBtnShowMore();
        showImages(self,data.images);
        self.set('current_page',data.current_page);
        self.set('pages',data.pages);

        if(data.pages <= data.current_page) {
            let btnShowMore = document.querySelector('.btnShowMore');
            btnShowMore.classList.add('d-none');
        }
    }

    function showImages(self,images) {
        let html = '';
        self.set('gallery',images);
        if(images) {
            images.forEach((image,index) => {
                html += `
                    <div class="card border-secondary">
                        <div class="card-body">
                            <img src="`+image[0]+`" />
                            <button class="btn btn-primary selectImageBtn" data-index="`+index+`">Seleccionar</button>
                        </div>
                    </div>
                `;
            });
        }
        let blockImagesNew = document.createElement('div');
        blockImagesNew.innerHTML = html;
        let imagesBlock = document.querySelector('#galleryBlock .imagesBlock');
        imagesBlock.appendChild(blockImagesNew);

        //scroll animation
        let maxScroll =  imagesBlock.scrollHeight;
        scrollTo(imagesBlock,maxScroll,200);
    }

    function disableBtnShowMore() {
        let btnShowMore = document.querySelector('.btnShowMore');
        btnShowMore.setAttribute("disabled", "");
    }

    function enableBtnShowMore() {
        let btnShowMore = document.querySelector('.btnShowMore');
        btnShowMore.removeAttribute("disabled");
    }
    /*----------------*/
}