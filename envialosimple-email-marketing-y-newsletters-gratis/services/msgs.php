<?php global $lang; ?>
<script>
    class ESPluginMsgsService {
        getHtmlMgs = (code) => {
            let msg;
            if(typeof code === 'object' &&
                !Array.isArray(code) &&
                code !== null
            ) {
                msg = '<ul>';
                Object.keys(code).forEach(function(key) {
                    msg += '<li>';
                    msg += '<p><strong>'+key+':</strong></p>';
                    if(Array.isArray(code[key])) {
                        msg += '<ul>';
                        code[key].forEach(function(value) {
                            if(errorsGlobals[value]) {
                                msg += '<li>'+errorsGlobals[value]+'</li>';
                            }
                        });
                        msg += '</ul>';
                    } else {
                        if(errorsGlobals[code[key]]) {
                            msg += '<p>'+errorsGlobals[code[key]]+'</p>';
                        }
                    }
                    msg += '</li>'
                });
                msg += '</ul>';
                
            } else {
                if(errorsGlobals[code]) {
                    msg = errorsGlobals[code];
                } else {
                    msg = errorsGlobals['generic_request_error'];
                }
            }
            return msg;
        };
        hideErrorsForm = (refs) => {
            for (var [key, value] of Object.entries(refs)) {
                let node = (Array.isArray(refs[key]))?refs[key][0]:refs[key];
                if(node !== undefined) {
                    let parentNode = node.parentNode;
                    node.classList.remove('is-invalid');
                    let msgBlock = parentNode.querySelector('.invalid-feedback');
                    if(msgBlock) {
                        msgBlock.remove();
                    }
                }
                
            }
        }
        showErrorsForm = (errorsForm,refs) => {
            if(errorsForm) {
                for (var [key, value] of Object.entries(errorsForm)) {
                    let splitKey = key.split('.');
                    let nameBlock = '';
                    if(splitKey.length > 1) {
                        nameBlock = splitKey[0]+"Block"+splitKey[1];
                    } else {
                        nameBlock = key+"Block";
                    }
                    this.showErrorBlock(key, value,errorsForm,nameBlock,refs);
                }
            }
        };
        showErrorBlock(key, value,errorsForm,nameBlock,refs) {
            if(refs[nameBlock]) {
                let node = (Array.isArray(refs[nameBlock]))?refs[nameBlock][0]:refs[nameBlock];
                let parentNode = node.parentNode;
                node.classList.add('is-invalid');
                let msgError = document.createElement('span');
                msgError.className = "invalid-feedback";
                msgError.innerHTML = '';
                if(Array.isArray(errorsForm[key])) {
                    errorsForm[key].forEach((value) => {
                        msgError.innerHTML += this.getMsg(value) +"<br/>";
                    });
                } else {
                    msgError.innerHTML = this.getMsg(value);
                }
                parentNode.appendChild(msgError);
            }
        }
        showErrorsFormCampaign(errorsForm,refs) {
            let showMsg = false;
            if(errorsForm) {
                let nameBlock;
                for (var [key, value] of Object.entries(errorsForm)) {
                    nameBlock = null;
                    switch (value) {
                        case 'errorMsg_campaignIntegrityFail-subject':
                            nameBlock = 'subjectBlock';
                            break;
                        case 'errorMsg_campaignIntegrityFail-replyTo':
                            nameBlock = 'replyEmailBlock';
                            break;
                        case 'errorMsg_campaignIntegrityFail-fromToName':
                            nameBlock = 'fromAliasBlock';
                            break;
                        case 'errorMsg_campaignIntegrityFail-fromTo':
                        case 'errorMsg_senderDomainNotVerified':
                            nameBlock = 'fromEmailBlock';
                            break;
                        case 'errorMsg_campaignIntegrityFail-content':
                            nameBlock = 'contentBlock';
                            break;
                        default:
                            break;
                    }
                    if(nameBlock) {
                        this.showErrorBlock(key, value,errorsForm,nameBlock,refs);
                        showMsg = true;
                    }
                }
            }
            return showMsg;
        }
        getMsg = (key) => {
            if(errorsGlobals[key]) {
                return errorsGlobals[key];
            } else {
                return errorsGlobals['generic_error'];
            }
        };
    }

    var errorsGlobals = <?php echo json_encode($lang['errorsGlobals']); ?>
</script>