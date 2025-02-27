<script>
    class ESPluginContactsService {
        getAll(data) {
            return new Promise((resolve, reject) => {
                axios.get(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/getall",true); ?>'+'page='+data.page+
                    '&orderby='+data.orderby+
                    '&order='+data.order+
                    '&filterContact='+data.filter+
                    '&limit='+data.limit+
                    ((data.maillist)?'&listId='+data.maillist:'')
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        create(data) {
            return new Promise((resolve, reject) => {
                axios.post(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/create"); ?>',data, this.formData
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        edit(data) {
            return new Promise((resolve, reject) => {
                axios.post(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/edit"); ?>',data, this.formData
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        deleteOne(id) {
            return new Promise((resolve, reject) => {
                axios.post(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/delete"); ?>',{
                        'contactsIds[]': id
                    }
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        suscribe(contactId,maillistId) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/suscribe"); ?>', {
                    'contactsIds[]':contactId,
                    'listId':maillistId
                }).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getById(id) {
            return new Promise((resolve, reject) => {
                axios.get(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contacts/getbyid",true); ?>'+'id='+id
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
    }
</script>