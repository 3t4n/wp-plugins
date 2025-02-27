<script>
    
    class ESPluginCampaignsService {
        
        getAll(data) {
            return new Promise((resolve, reject) => {
                axios.get(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/getall",true); ?>'+'page='+data.page+
                    '&orderby='+data.orderby+
                    '&order='+data.order+
                    '&filterName='+data.filterName+
                    '&filterStatus='+data.filterStatus+
                    '&limit='+data.limit+
                    '&createDateFrom='+data.createDateFrom+
                    '&createDateTo='+data.createDateTo
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getById(idCampaign) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/getbyid",true); ?>'+'id='+idCampaign).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        delete(id) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/delete",true); ?>'+'id='+id).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        }

        create(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/create"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };

        edit(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/edit"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };

        sendpreview(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/sendpreview"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };

        checkstatus(id) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/checkstatus"); ?>',{id:id}).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };

        send(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/campaigns/send"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
    }
</script>