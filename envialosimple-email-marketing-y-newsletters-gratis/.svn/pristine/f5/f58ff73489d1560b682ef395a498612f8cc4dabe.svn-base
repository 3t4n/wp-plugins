function postWordpress(editor) {

    // content html in content email
    editor.Components.addType('post-wordpress', {
        model: {
            defaults: {
                style: {
                    //background: 'red',
                },
                tagName: 'div',
                components: ``,
                posts: null
            },
            init() {
                this.openModal();
            },
            getDataForm(e) {
                const formData = new FormData(e.target);
                return Object.fromEntries(formData.entries());
            },
            openModal: function() {
                const modal = editor.Modal;
                modal.open({
                  title: 'Seleccionar un post',
                  content: `
                    <div class="container modalGrapesjs postWordpress">
                        <div class="form-group searchBlock">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="searchValue" placeholder="Buscar" />
                                <button class="btn btn-primary" type="button" id="btnSearch">Buscar</button>
                            </div>
                        </div>
                        <div id="tablePosts" class="table-responsive d-none">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width:1px;">Id</th>
                                        <th scope="">Nombre</th>
                                        <th style="width:160px;text-align:center">Diseño</th>
                                    </tr>
                                </thead>
                                <tbody id="postsList">
                                </tbody>
                            </table>
                        </div>
                        <div id="emptyTable" class="pb-3 d-none">
                            <div class="bs-component">
                                <div class="alert alert-dismissible alert-info">
                                    No se encontraron posts con el texto ingresado.
                                </div>
                            </div>
                        </div>
                        <div class="loading d-none" id="loadingModal">
                            <div class="spinner-border text-success" role="status"></div>
                        </div>
                    </div>
                    `,
                });
                if(document.querySelector('#selectPost')) {
                    document.querySelector('#selectPost').addEventListener('submit', (e) => {
                        e.preventDefault();
                        let formData = this.getDataForm(e);
                        this.components('<h4>'+formData.url+'</h4>');
                        modal.close();
                    });
                }
                if(document.querySelector('#cancelModal')) {
                    document.querySelector('#cancelModal').addEventListener('click',() => {
                        modal.close();
                    });
                }
                //btn search
                document.querySelector('#btnSearch').addEventListener('click',() => {
                    this.searchPosts();
                });

                //event key press in btn search
                document.querySelector("#searchValue").addEventListener("keyup", (event) => {
                    event.preventDefault();
                    if (event.keyCode === 13) {
                        this.searchPosts();
                    }                
                });

                //click in btn select post
                document.body.onclick = (e) => {
                    let target = e.target;
                    if (target.className && target.className.indexOf('btnSelectPostV') != -1) {
                        let index = target.getAttribute('data-index');
                        let posts = this.get('posts');
                        let postSelect = posts[index];
                        this.setTemplateV(postSelect,modal);
                    }
                    if (target.className && target.className.indexOf('btnSelectPostH') != -1) {
                        let index = target.getAttribute('data-index');
                        let posts = this.get('posts');
                        let postSelect = posts[index];
                        this.setTemplateH(postSelect,modal);
                    }
                }
            },
            searchPosts() {
                let searchValue = document.querySelector('#searchValue').value;
                let tablePost = document.querySelector('#tablePosts');
                let loadingModal = document.querySelector('#loadingModal');
                let emptyTable = document.querySelector('#emptyTable');
                tablePost.classList.add('d-none');
                emptyTable.classList.add('d-none');
                loadingModal.classList.remove('d-none');

                getPosts(searchValue).then((response) => {
                    let html = '';
                    response.forEach((post,index) => {
                        html += `
                            <tr>
                                <th scope="row">`+post.id+`</th>
                                <td>`+post.title+`</td>
                                <td class="text-center">
                                    <span class="btn btn-outline-primary btnSelectPostV btn-xs mr10" data-index="`+index+`">
                                        <img src="`+window.pathBaseEsPlugin+`/assets/img/post_vertical.svg" style="width:25px;pointer-events: none;" />
                                    </span>
                                    <span class="btn btn-outline-primary btnSelectPostH btn-xs" data-index="`+index+`">
                                        <img src="`+window.pathBaseEsPlugin+`/assets/img/post_horizontal.svg" style="width:25px;pointer-events: none;" />
                                    </span>
                                </td>
                            </tr>
                        `;
                    });
                    if(html !== '') {
                        tablePost.classList.remove('d-none');
                    } else {
                        emptyTable.classList.remove('d-none');
                    }
                    document.querySelector('#postsList').innerHTML = html;
                    this.set('posts',response);
                    loadingModal.classList.add('d-none');
                });
            },
            setTemplateH(postData,modal) {
                this.components(`
                    <table style="box-sizing: border-box;">
                        <tbody style="box-sizing: border-box;">
                            <tr style="box-sizing: border-box;">
                                <td style="box-sizing: border-box;">
                                    <img src="`+postData.image+`" alt="Image" style="box-sizing: border-box;max-width:150px;">
                                </td>
                                <td style="box-sizing: border-box;">
                                    <h1 style="box-sizing: border-box;">`+postData.title+`</h1>
                                    <p style="box-sizing: border-box;">`+postData.content+`</p>
                                    <p style="text-align:right;">
                                        <a href="`+postData.url+`" >Ver más</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `);
                modal.close();
            },
            setTemplateV(postData,modal) {
                this.components(`
                    <table style="box-sizing: border-box;">
                        <tbody style="box-sizing: border-box;">
                            <tr style="box-sizing: border-box;">
                                <td style="box-sizing: border-box;">
                                    <div style="text-align:center;"><img src="`+postData.image+`" alt="Image" style="box-sizing: border-box;max-width:250px;"></div>
                                    <table style="box-sizing: border-box;">
                                        <tbody style="box-sizing: border-box;">
                                            <tr style="box-sizing: border-box;">
                                                <td style="box-sizing: border-box;">
                                                    <h1 style="box-sizing: border-box;">`+postData.title+`</h1>
                                                    <p style="box-sizing: border-box;">`+postData.content+`</p>
                                                    <div>
                                                        <p style="text-align:right;">
                                                        &nbsp;<a href="`+postData.url+`" >Ver más</a>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `);
                modal.close();
            }
            
        },
        view: {
        }
    });

    //block in sidebar
    editor.BlockManager.add('posts-wordpress-block', {
        label: `
            <div style="text-align:center">
                Posts Wordpress
            </div>
        `,
        attributes: {
            class: 'fa fa-wordpress'
        },
        content: {
            type: 'post-wordpress'
        },
        category: 'Extra'
    });

    function getPosts(value) {
        let searchText= '';
        if(value) {
            searchText = '&filter='+value
        }
        return fetch("/index.php?rest_route=/envialosimple/v1/posts/getall"+searchText, {
            "headers": {
                "accept": "application/json, text/plain, */*",
                "accept-language": "en-US,en;q=0.9",
                "cache-control": "no-cache",
                "pragma": "no-cache"
            },
            "referrerPolicy": "strict-origin-when-cross-origin",
            "body": null,
            "method": "GET",
            "mode": "cors",
            "credentials": "include"
        }).then(res => res.json())
        .catch((error) => {
            console.error('Error:', error)
        })
    }
}