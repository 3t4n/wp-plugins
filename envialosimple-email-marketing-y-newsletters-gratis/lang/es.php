<?php
    $lang = [
        'globals' => [
            'create' => 'Crear',
            'titlePlugin' => 'ES marketing',
            'orderBy' => 'Ordenar por',
            'id' => 'ID',
            'email' => 'Correo',
            'name' => 'Nombre',
            'asc' => 'Asc',
            'desc' => 'Desc',
            'edit' => 'Editar',
            'delete' => 'Eliminar',
            'accept' => 'Aceptar',
            'cancel' => 'Cancelar',
            'actions' => 'Acciones',
            'manage' => 'Gestionar',
            'back_list' => 'Volver',
            'error_form' => 'Para poder continuar, por favor revisa los campos con errores.',
            'save' => 'Guardar'
        ],
        'menu' =>  [
            'welcome' => 'Bienvenido',
            'config' => 'Configuración',
            'contacts' => 'Contactos',
            'listContacts' => 'Listas de contactos',
            'campaigns' => 'Campañas',
            'contactForm7' => 'Vincular Formularios'
        ],
        'pages'=> [
            'welcome' => [
                'title' => 'Te damos la bienvenida al plugin de EnvíaloSimple',
                'intro' => 'Integra tus herramientas y conecta rápidamente con tus clientes.',
                'intro2' => '¡Dale potencia a tu negocio!',
                'list' => [
                    [
                        'text' => 'Vincula campañas y contactos con tu cuenta de EnvíaloSimple.'
                    ],
                    [
                        'text' => 'Diseña newsletters en minutos a partir de tus posteos.'
                    ],
                    [
                        'text' => 'Gestiona y enriquece tus listas de contactos.'
                    ],
                    [
                        'text' => 'Vincula tus formularios de Contact Form 7 con las listas de EnvíaloSimple e incrementa tu audiencia.'
                    ]
                ],
                'links' => [
                    '1' => [
                        'url' => get_site_url().'/wp-admin/admin.php?page=es-plugin-config',
                        'text' => 'Vincular con EnvíaloSimple'
                    ],
                    '2' => [
                        'url' => get_site_url().'/wp-admin/admin.php?page=es-plugin-campaigns-create',
                        'text' => 'Crear una nueva campaña'
                    ]
                ],
                'create' => [
                    'text' => '¿Aún no tienes una cuenta? ',
                    'link' =>  [
                        'url' => 'https://envialosimple.donweb.com/es-ar/cuenta',
                        'text' => 'Súmate a EnvíaloSimple'
                    ]
                ]
            ],
            'config' => [
                'title' => 'Configuración de la cuenta',
                'connected' => 'Conectado',
                'disconnected' => 'Desconectado',
                'text_1' => 'El siguiente paso es conectar tu cuenta de EnvíaloSimple con WordPress.',
                'text_2' => 'Para hacerlo, necesitas una clave API de EnvíaloSimple. ',
                'text_3' => 'Obtener clave API.',
                'input_placeholder' => 'Copia y pega aquí tu clave API',
                'error_key' => 'La clave ingresada es incorrecta. Por favor, verifique el valor ingresado y que la clave esté Activa.',
                'profile' => [
                    'title' => 'Datos de tu cuenta de EnvíaloSimple',
                    'username' => 'Usuario',
                    'id' => 'ID de la cuenta',
                    'type' => 'Tipo de cuenta',
                ],
                'types' => [
                    'Prepaid' => 'Prepaga',
                    'Monthly' => 'Mensual',
                    'default' => 'Free'
                ]
            ],
            'contacts' => [
                'title' => 'Contactos',
                'title_customFields' => 'Campos personalizados',
                'title_create' => 'Crear contacto',
                'title_edit' => 'Editar contacto',
                'title_data' => 'Datos de contacto',
                'title_select_maillist' => 'Lista para suscribir al contacto',
                'title_resume' => 'Resumen de actividad del contacto',
                'filter_email' => 'Filtrar por correo:',
                'filter_maillist' => 'Filtrado por lista:',
                'create_date' => 'Fecha de creación del contacto',
                'list_maillists' => 'Listas a las que está suscripto',
                'fields_list' => [
                    'id' => 'ID',
                    'email' => 'Correo',
                    'created' => 'Fecha creación',
                    'subscriptions' => 'Cantidad de listas',
                    'actions' => 'Acciones',
                ],
                'fields' => [
                    'optional' => '(opcional)',
                    'month' => 'Mes',
                    'day' => 'Día',
                    'select_option' => 'Seleccione un valor',
                    'email' => 'Correo electrónico',
                    'months' => [
                        'Enero',
                        'Febrero',
                        'Marzo',
                        'Abril',
                        'Mayo',
                        'Junio',
                        'Julio',
                        'Agosto',
                        'Septiembre',
                        'Octubre',
                        'Noviembre',
                        'Diciembre'
                    ]
                ]
            ],
            'mailLists' => [
                'title' => 'Lista de contactos',
                'create' => 'Crear lista',
                'fields' => [
                    'id' => 'ID',
                    'name' => 'Nombre',
                    'count' => 'Cantidad de contactos',
                    'lastSend' => 'Último envío',
                ],
                'filter_name' => 'Filtrar por nombre:'
            ],
            'campaigns' => [
                'title' => 'Campañas',
                'fields' => [
                    'id' => 'ID',
                    'name' => 'Nombre',
                    'created' => 'Fecha creación',
                    'status' => 'Estado',
                    'send_date' => 'Fecha de envío',
                    'actions' => 'Acciones',
                ],
                'create' => 'Crear campaña',
                'filter_name' => 'Filtrar por nombre:',
                'filter_maillist' => 'Filtro por Lista de contactos:',
                'filter_createDateFrom' => 'Fecha de creación desde',
                'filter_createDateTo' => 'Fecha de creación hasta',
                'filter_status' => 'Estado',
            ],
            'campaign_create_edit' => [
                'title_create' => 'Crear campaña',
                'title_edit' => 'Editar campaña',
                'fields' => [
                    'name' => 'Nombre de la campaña',
                    'name_sub' => 'Este nombre no es visible para los destinatarios',
                    'subject' => 'Asunto',
                    'text_preview' => 'Texto de vista previa',
                    'sub_text_preview' => 'Este fragmento de texto aparecerá en la bandeja de entrada luego del asunto del correo.',
                    'from_alias' => 'Nombre del remitente',
                    'from_email' => 'Desde',
                    'reply_email' => 'Responder a',
                    'maillists' => 'Listas',
                    'segment' => 'Segmento',
                ],
                'placeholder_example_email' => 'Ej: nombre@dominio.com',
                'title_general' => 'Configuración general',
                'title_from' => 'Datos del remitente',
                'title_remitter' => 'Datos del remitente',
                'title_maillist' => 'Destinatarios',
                'title_content' => 'Contenido',
                'advances_options' => [
                    'title' => 'Opciones avanzadas',
                    'options' => [
                        [
                            'title' => 'Seguir enlaces',
                            'text' => 'Conoce cuáles fueron los enlaces de tu campaña que más clics recibieron y quiénes los hicieron.'
                        ],
                        [
                            'title' => 'Contar aperturas',
                            'text' => 'Descubre desde cuáles dispositivos se abrió tu campaña. La ubicación, los días y los horarios de esas aperturas.'
                        ],
                        [
                            'title' => 'Vincular con Google Analytics',
                            'text' => 'Analiza el impacto de tu campaña en tu sitio web.'
                        ],
                        [
                            'title' => 'Enviar informe',
                            'text' => 'Recibe en tu correo un reporte completo al finalizar tu campaña.'
                        ],
                        [
                            'title' => 'Agregar al archivo público',
                            'text' => 'Suma tu campaña al archivo público para que pueda ser indexada por los motores de búsqueda, como Google.'
                        ]
                    ]
                ],
                'content_text' => 'Crea un correo profesional que se adapta a dispositivos móviles utilizando el editor gráfico. También puedes elegir el modo programador del editor para realizar tu contenido.',
                'content_btn' => 'Crear contenido'
            ],
            'maillists' => [
                'title_create' => 'Crear lista de contactos',
                'title_edit' => 'Editar lista de contactos',
                'fields' => [
                    'name' => 'Nombre'
                ],
                'btns' => [
                    'create' => 'Crear lista'
                ]
            ],
            'contactForm7' => [
                'title' => 'Vinculación de formularios',
                'subtitle' => 'Tienes configurados algunos formularios Contact Form 7 en tu blog y puedes aprovecharlos para enriquecer tus listas de contactos de EnvíaloSimple. <br/>En caso de presentarse un error en la vinculación de los campos personalizados, se enviará un correo electrónico con los valores que intentó registrar el contacto. El correo electrónico del contacto siempre se registrará.',
                'subtitle2' => ' <b>Correo de confirmación de suscripción</b>. Le enviaremos uno a cada contacto que complete este formulario. Este mail asegura que tus campañas sean recibidas por las personas correctas y te protege de suscripciones indeseadas. Te invitamos a leer los beneficios del mismo ',
                'subtitle3' => 'Recuerda que <b>debes contar</b> con el servicio de SMTP de WordPress o con algún plugin especifico para que se realicen los envíos. En <b>EnvíaloSimple</b> disponemos con un plugin que te ayudará a que consigas contactos deseados. Puedes explorar más detalles haciendo clic en ',
                'subtitle2_link' => 'https://faqs.envialosimple.com/contactos-y-listas/formularios',
                'subtitle2_link_text' => 'aquí.',
                'subtitle3_link' => 'https://es-ar.wordpress.org/plugins/envialosimple-transaccional/',
                'subtitle3_link_text' => 'ver.',
                'title_edit' => 'Editar formulario de contacto',
                'title_create' => 'Vincular formulario de contacto',
                'filter_name' => 'Filtrar por nombre:',
                'fields_list' => [
                    'id' => 'ID',
                    'contactForm7' => 'Formulario Contact Form 7',
                    'formES' => 'Lista EnvíaloSimple',
                    'action' => 'Acciones',
                ],
                'labels' => [
                    'contactform7' => 'Selecciona el formulario del que quieres tomar datos',
                    'maillist' => 'Selecciona la lista a la que suscribirás a los contactos',
                    'fields_contactForm' => 'Campo formulario Contact Form 7',
                    'fields_customField' => 'Campo Personalizado EnvíaloSimple'
                ],
                'title_fields' => 'Ahora por favor selecciona que datos deseas sincronizar con EnvíaloSimple',
                'required_email' => 'Es necesario asociar el campo "Email" de "Campo Personalizado EnvíaloSimple" con algún campo de Contact Form 7 para poder continuar',
                'save_ok' => 'La vinculación fue exitosa.',

                'btns' => [
                    'create' => 'Vincular formularios'
                ]
            ]
        ],
        'components' => [
            'singlelist' => [
                'maillists_options' => 'Listas disponibles',
                'maillists_selected' => 'Lista seleccionada',
                'required_maillist' => 'Es obligatorio seleccionar una lista.'
            ]
        ],
        'errorsGlobals' => [
            //422
            'is_not_accepted'       => 'El campo debe ser aceptado.',
            'invalid_url'           => 'El campo no es una URL válida.',
            'invalid_date'          => 'La fecha ingresada es incorrecta.',
            'invalid_alpha_format'                => 'El campo sólo debe contener letras.',
            'invalid_alpha_dash_format'           => 'El campo sólo debe contener letras, números, guiones y guiones bajos.',
            'invalid_alpha_num_format'            => 'El campo sólo debe contener letras y números.',
            'invalid_array_format'                => 'El campo debe ser un array.',
            'attached'             => 'Este campo ya se adjuntó.',
            'before_date'               => 'El campo debe ser una fecha anterior.',
            'before_or_equal_date'      => 'El campo debe ser una fecha anterior o igual.',
            'invalid_between_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_between_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_between_number' => 'El valor ingresado es incorrecto.',
            'invalid_between_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_boolean'              => 'El campo debe tener un valor verdadero o falso.',
            'invalid_value_confirmed'            => 'La confirmación no coincide.',
            'invalid_date_format'                 => 'Ingrese una fecha válida.',
            'invalid_date_equal'          => 'La fecha ingresada es incorrecta.',
            'invalid_value_different'            => 'El campo debe ser diferente.',
            'invalid_value_digits'               => 'La cantidad de digitos es incorrecto.',
            'invalid_value_digits_between'       => 'La cantidad de digitos es incorrecto.',
            'invalid_image_dimensions'           => 'Las dimensiones de la imagen no son válidas.',
            'value_duplicate'             => 'El campo contiene un valor duplicado.',
            'invalid_email_format'                => 'El formato del email es incorrecto.',
            'invalid_velue_ends_with'            => 'El valor ingresado es incorrecto.',
            'not_exists'               => 'El campo es inválido.',
            'is_not_file'                 => 'El campo debe ser un archivo.',
            'not_empty'               => 'El campo es obligatorio.',
            'invalid_gt_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_gt_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_gt_numeric' => 'El valor ingresado es incorrecto.',
            'invalid_gt_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_gte_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_gte_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_gte_numeric' => 'El valor ingresado es incorrecto.',
            'invalid_gte_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_image'                => 'El campo debe ser una imagen.',
            'invalid_value_in'                   => 'El valor ingresado es inválido.',
            'invalid_value_in_array'             => 'El valor ingresado es inválido.',
            'invalid_value_integer'              => 'El campo debe ser un número entero.',
            'invalid_value_ip'                   => 'El campo debe ser una dirección IP válida.',
            'invalid_ipv4_format'                 => 'El campo debe ser una dirección IPv4 válida.',
            'invalid_ipv6_format'                 => 'El campo debe ser una dirección IPv6 válida.',
            'invalid_json_format'                 => 'El campo El campo debe ser una cadena JSON válida.',
            'invalid_lt_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_lt_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_lt_numeric' => 'El valor ingresado es incorrecto.',
            'invalid_lt_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_lte_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_lte_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_lte_numeric' => 'El valor ingresado es incorrecto.',
            'invalid_lte_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_max_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_max_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_max_numeric' => 'El valor ingresado supera el valor maximo permitido.',
            'invalid_max_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_mimes'                => 'El formato del archivo es incorrecto.',
            'invalid_mimetypes'            => 'El formato del archivo es incorrecto.',
            'invalid_min_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_min_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_min_numeric' => 'El valor ingresado es incorrecto.',
            'invalid_min_characters'  => 'La cantidad de caracteres es incorrecto.',
            'multiple_of'          => 'El valor ingresado es incorrecto',
            'invalid_format'            => 'El campo posee un valor incorrecto.',
            'only_numeric'              => 'El campo debe ser numérico.',
            'invalid_password'             => 'La contraseña es incorrecta.',
            'is_not_present'              => 'El campo debe estar presente.',
            'prohibited'           => 'El campo está prohibido.',
            'prohibited_if'        => 'El campo está prohibido.',
            'prohibited_unless'    => 'El campo está prohibido.',
            'relatable'            => 'El campo no se puede asociar con este recurso',
            'required'             => 'El campo es obligatorio.',
            'is_not_same_that'                 => 'El campo deben coincidir.',
            'invalid_count_elements'   => 'La cantidad de elementos es incorrecto.',
            'invalid_size_file'    => 'El tamaño del archivo es incorrecto.',
            'invalid_size_number' => 'El valor ingresado es incorrecto.',
            'invalid_count_characters'  => 'La cantidad de caracteres es incorrecto.',
            'invalid_value'          => 'El valor posee caracteres no permitidos.',
            'only_characters'               => 'El campo debe ser una cadena de caracteres.',
            'invalid_timezone'             => 'El campo debe ser una zona válida.',
            'is_used'               => 'Ya existe un registro con ese nombre.',
            'error_upload_file'             => 'Error al subir el archivo.',
            'invalid_url_format'                  => 'El formato tipo url del campo es inválido.',
            'invalid_uuid_format'                 => 'El campo debe ser un UUID válido.',
    
            //errors backend
            'errorMsg_mailListNotFound'=> 'No se encontró lista con el ID informado.',
            'errorMsg_contactListNotFound'=> 'No existe lista con el ID informado.',
            'errorMsg_contactAlreadyExist'=> 'Ya existe un contacto con el mismo correo.',
            'errorMsg_senderDomainNotVerified'=> 'El dominio debe estar verificado.',
    
            //generics
            'generic_error'=> 'Ha ocurrido un error al procesar la información. Por favor, vuelva a intentar más tarde.',
            'generic_request_error'=> 'Ha ocurrido un error al procesar la información. Por favor, vuelva a intentar más tarde.',
            'generic_title_error_fields'=> 'Error con los siguentes campos:',
    
            //contacts
            'contacts_delete_ok'=> 'El contacto se eliminó con éxito.',
            'contacts_modal_confirm_delete'=> 'Está seguro que desea eliminar el contacto:',
    
            //forms
            'forms_modal_confirm_delete'=> 'Está seguro que desea eliminar la vinculación con el formulario:',
    
            //mailList
            'mailList_delete_ok'=> 'La lista se eliminó con éxito.',
            'mailList_modal_confirm_delete'=> 'Está seguro que desea eliminar la lista:',
    
            //contacts
            'campaigns_delete_ok'=> 'La campaña se eliminó con éxito.',
            'campaigns_modal_confirm_delete'=> 'Está seguro que desea eliminar la campaña:',
    
            //campaign check status
            'errorMsg_campaignIntegrityFail-subject'=> 'El campo es obligatorio.',
            'errorMsg_campaignIntegrityFail-replyTo'=> 'El campo es obligatorio.',
            'errorMsg_campaignIntegrityFail-fromToName'=> 'El campo es obligatorio.',
            'errorMsg_campaignIntegrityFail-fromTo'=> 'El campo es obligatorio.',
            'errorMsg_campaignIntegrityFail-content'=> 'Debes crear contenido para tu campaña.',
        ]
    ];