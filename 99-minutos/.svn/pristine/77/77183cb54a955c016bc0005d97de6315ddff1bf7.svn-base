<?php

if(!defined('ABSPATH')){
    die;
}

class Minutos_View99
{
    //Vista principal del plugin
    public function noventayNueveMinutos(){
        return $this->viewNoventayNueveMinutos();
    }

    private function viewNoventayNueveMinutos(){ ?>

        <section class="ShipmentMethod">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
            <div class="positionTitle">
                <div class="titleMethod">
                    <strong>99minutos.com</strong>
                    <small>¡Atención! Las siguientes órdenes no generaron una guía en 99 minutos</small>
                </div>
            </div>
    <!--SECCIÓN DONDE SE MUESTRAN LOS MÉTODOS DE ENVÍO-->

                <section class="bodyShopify">
                    <div class="table-wrapper">
                    <strong>Envíos NO generados</strong>
                        <table class="fl-table">
                            <thead>
                            <tr>
                                <th>N° de orden</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Motivo</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            global $wpdb;
                            $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
                            $orders = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
                            foreach($orders as $row) : ?>
                            <?php if($row->reason != "Creado") : ?>
                            <tr>
                                <td><?=$row->orderid?></td>
                                <td><?=$row->sellerName?></td>
                                <td><?=$row->time?></td>
                                <td><?=$row->reason?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </section>
        </section>
    <!--Responsive-->
        <section class="shipmentsResponsive">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
            <div class="positionTitleResponsive">
                <div class="titleMethodResponsive">
                    <strong>99minutos.com</strong>
                    <small>¡Atención! Las siguientes órdenes no generaron una guía en 99 minutos</small>
                </div>
            </div>
            <?php
                global $wpdb;
                $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
                $orders = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
                foreach($orders as $row) : ?>
                <?php if($row->reason != "Creado") : ?>
                <div class="cardResponsive">
                    <div id="containerResponsiveCard">
                        <label>Envío NO generado</label>
                        <label id="NoShip">Pedido <?=$row->orderid?></label>
                        <label><strong>Counter: <?=$row->reason?></strong></label>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach ?>
        </section>
    <!--Termina responsive-->
    <?php
    }
    //Termina Vista principal del plugin

    //Vista para el submenú Métodos de envío
    public function subMenuShippingMethods(){
        return $this->viewsubMenuShippingMethods();
    }

    private function viewsubMenuShippingMethods(){ ?>

    <?php
        //Configuración para la vista de los métodos de envío
        if(isset($_POST['submitSaveShippingMethods']))
        {
            $active99 = sanitize_text_field( $_POST['active99'] );
            $xs_99 = sanitize_text_field( $_POST['xs-99'] );
            $s_99 = sanitize_text_field( $_POST['s-99'] );
            $m_99 = sanitize_text_field( $_POST['m-99'] );
            $l_99 = sanitize_text_field( $_POST['l-99'] );
            $activeSameDay = sanitize_text_field( $_POST['activeSameDay'] );
            $xs_same = sanitize_text_field( $_POST['xs-same'] );
            $s_same = sanitize_text_field( $_POST['s-same'] );
            $m_same = sanitize_text_field( $_POST['m-same'] );
            $l_same = sanitize_text_field( $_POST['l-same'] );
            $xl_same = sanitize_text_field( $_POST['xl-same'] );
            $activeNextDay = sanitize_text_field( $_POST['activeNextDay'] );
            $xs_next = sanitize_text_field( $_POST['xs-next'] );
            $s_next = sanitize_text_field( $_POST['s-next'] );
            $m_next = sanitize_text_field( $_POST['m-next'] );
            $l_next = sanitize_text_field( $_POST['l-next'] );
            $xl_next = sanitize_text_field( $_POST['xl-next'] );
            $activeCO2 = sanitize_text_field( $_POST['activeCO2'] );
            $xs_CO2 = sanitize_text_field( $_POST['xs-CO2'] );
            $s_CO2 = sanitize_text_field( $_POST['s-CO2'] );
            $m_CO2 = sanitize_text_field( $_POST['m-CO2'] );
            $l_CO2 = sanitize_text_field( $_POST['l-CO2'] );
            $xl_CO2 = sanitize_text_field( $_POST['xl-CO2'] );
            $name_99 = sanitize_text_field( $_POST['name-99'] );
            $name_same = sanitize_text_field( $_POST['name-same'] );
            $name_next = sanitize_text_field( $_POST['name-next'] );
            $name_CO2 = sanitize_text_field( $_POST['name-CO2'] );

            global $wpdb;
            $table_name = $wpdb->prefix . '99minutos_shippingmethods';
            $wpdb->get_results( "UPDATE $table_name SET  active99 = $active99,
                                                         xs_99 = $xs_99,
                                                         s_99 = $s_99,
                                                         m_99 = $m_99,
                                                         l_99 = $l_99,
                                                         activeSameDay = $activeSameDay,
                                                         xs_same = $xs_same,
                                                         s_same = $s_same,
                                                         m_same = $m_same,
                                                         l_same = $l_same,
                                                         xl_same = $xl_same,
                                                         activeNextDay = $activeNextDay,
                                                         xs_next = $xs_next,
                                                         s_next = $s_next,
                                                         m_next = $m_next,
                                                         l_next = $l_next,
                                                         xl_next = $xl_next,
                                                         activeCO2 = $activeCO2,
                                                         xs_CO2 = $xs_CO2,
                                                         s_CO2 = $s_CO2,
                                                         m_CO2 = $m_CO2,
                                                         l_CO2 = $l_CO2,
                                                         xl_CO2 = $xl_CO2,
                                                         name_99 = '$name_99',
                                                         name_same = '$name_same',
                                                         name_next = '$name_next',
                                                         name_CO2 = '$name_CO2'");

        }
    ?>
    <!-- metodos  de envio -->
    <section class="ShipmentMethod">
    <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
            <div class="positionTitle">
                <div class="titleMethod">
                    <strong>Métodos de envío</strong>
                    <small>Aquí podrás editar todo lo referente a precios de tue envíos  por tamaño y modalidad</small>
                </div>
            </div>

    <?php
        //Recuperamos los precios de la base de datos:
        global $wpdb;
        $table_name = $wpdb->prefix . '99minutos_shippingmethods';
        $shippingCosts = $wpdb->get_results( "SELECT * FROM $table_name");
        foreach($shippingCosts as $row)
        {
            $active99 = $row->active99;
            $xs_99 = $row->xs_99;
            $s_99 = $row->s_99;
            $m_99 = $row->m_99;
            $l_99 = $row->l_99;
            $activeSameDay = $row->activeSameDay;
            $xs_same = $row->xs_same;
            $s_same = $row->s_same;
            $m_same = $row->m_same;
            $l_same = $row->l_same;
            $xl_same = $row->xl_same;
            $activeNextDay = $row->activeNextDay;
            $xs_next = $row->xs_next;
            $s_next = $row->s_next;
            $m_next = $row->m_next;
            $l_next = $row->l_next;
            $xl_next = $row->xl_next;
            $activeCO2 = $row->activeCO2;
            $xs_CO2 = $row->xs_CO2;
            $s_CO2 = $row->s_CO2;
            $m_CO2 = $row->m_CO2;
            $l_CO2 = $row->l_CO2;
            $xl_CO2 = $row->xl_CO2;
            $name_99 = $row->name_99;
            $name_same = $row->name_same;
            $name_next = $row->name_next;
            $name_CO2 = $row->name_CO2;
        }
    ?>
    <!--99 MINUTOS-->
        <form method="POST">
            <div class="positionEditButtons">
                <div>
                    <label>99 Minutos </label><small style="font-weight:200; font-size:12px;color:#85c440;margin:0px 12px;"> <?=$name_99?> </small>

                    <?php if($active99 == 1) :?>
                        <span class="dashicons dashicons-yes-alt"></span>
                    <?php endif; ?>

                    <?php if($active99 == 0) :?>
                        <span class="dashicons dashicons-dismiss"></span>
                    <?php endif; ?>
                </div>
                <button class="editButton" type="submit" name="submitSaveShippingMethods">Guardar</button>
            </div>

            <section class="grid99">
                <div>
                    <p>Activo</p>
                    <select class="selectActive" name="active99" required>
                        <option value="<?=$active99?>">Selecciona una opción</option>
                        <option value=1>Sí</option>
                        <option value=0>No</option>
                    </select>
                </div>
                <div>
                    <p>Precio del tamaño extra chico</p>
                    <input type="number" name="xs-99" value="<?=$xs_99?>" placeholder="<?=$xs_99?>" />
                </div>
                <div>
                    <p>Precio del tamaño chico</p>
                    <input type="number" name="s-99" value="<?=$s_99?>" placeholder="<?=$s_99?>"/>
                </div>
                <div>
                    <p>Precio del tamaño mediano</p>
                    <input type="number" name="m-99" value="<?=$m_99?>" placeholder="<?=$m_99?>"/>
                </div>
                <div>
                    <p>Precio del tamaño grande</p>
                    <input type="number" name="l-99" value="<?=$l_99?>" placeholder="<?=$l_99?>"/>
                </div>
                <div>
                    <p>Nombre</p>
                    <input type="text" name="name-99" value="<?=$name_99?>" placeholder="<?=$name_99?>"/>
                </div>
            </section>
            <br>
            <br>
            <br>

    <!--SAME DAY-->

            <div class="positionEditButtons">
                <div>
                    <label>Same day </label> <small style="font-weight:200; font-size:12px; color:#85c440;margin:0px 12px;"> <?=$name_same?> </small>
                    <?php if($activeSameDay == 1) :?>
                        <span class="dashicons dashicons-yes-alt"></span>
                    <?php endif; ?>

                    <?php if($activeSameDay == 0) :?>
                        <span class="dashicons dashicons-dismiss"></span>
                    <?php endif; ?>
                </div>
            </div>

            <section class="gridSameDay">
                <div>
                    <p>Activo</p>
                    <select class="selectActive"  name="activeSameDay" required>
                        <option value="<?=$activeSameDay?>">Selecciona una opción</option>
                        <option value=1>Sí</option>
                        <option value=0>No</option>
                    </select>
                </div>
                <div>
                    <p>Precio del tamaño extra chico</p>
                    <input type="number" name="xs-same" value="<?=$xs_same?>" placeholder="<?=$xs_same?>"/>
                </div>
                <div>
                    <p>Precio del tamaño chico</p>
                    <input type="number" name="s-same" value="<?=$s_same?>" placeholder="<?=$s_same?>"/>
                </div>
                <div>
                    <p>Precio del tamaño mediano</p>
                    <input type="number" name="m-same" value="<?=$m_same?>" placeholder="<?=$m_same?>"/>
                </div>
                <div>
                    <p>Precio del tamaño grande</p>
                    <input type="number" name="l-same" value="<?=$l_same?>" placeholder="<?=$l_same?>"/>
                </div>
                <div>
                    <p>Precio del tamaño extra grande</p>
                    <input type="number" name="xl-same" value="<?=$xl_same?>" placeholder="<?=$xl_same?>"/>
                </div>
                <div>
                    <p>Nombre</p>
                    <input type="text" name="name-same" value="<?=$name_same?>" placeholder="<?=$name_same?>"/>
                </div>
            </section>
            <br>
            <br>
            <br>

    <!--NEXT DAY-->

            <div class="positionEditButtons">
                <div>
                    <label>Next day </label> <small style="font-weight:200; font-size:12px;color:#85c440;margin:0px 12px;"> <?=$name_next?> </small>
                    <?php if($activeNextDay == 1) :?>
                        <span class="dashicons dashicons-yes-alt"></span>
                    <?php endif; ?>

                    <?php if($activeNextDay == 0) :?>
                        <span class="dashicons dashicons-dismiss"></span>
                    <?php endif; ?>
                </div>
            </div>

            <section class="gridNextDay">
                <div>
                    <p>Activo</p>
                    <select class="selectActive"  name="activeNextDay" required>
                        <option value="<?=$activeNextDay?>">Selecciona una opción</option>
                        <option value=1>Sí</option>
                        <option value=0>No</option>
                    </select>
                </div>
                <div>
                    <p>Precio del tamaño extra chico</p>
                    <input type="number" name="xs-next" value="<?=$xs_next?>" placeholder="<?=$xs_next?>"/>
                </div>
                <div>
                    <p>Precio del tamaño chico</p>
                    <input type="number" name="s-next" value="<?=$s_next?>" placeholder="<?=$s_next?>"/>
                </div>
                <div>
                    <p>Precio del tamaño mediano</p>
                    <input type="number" name="m-next" value="<?=$m_next?>" placeholder="<?=$m_next?>"/>
                </div>
                <div>
                    <p>Precio del tamaño grande</p>
                    <input type="number" name="l-next" value="<?=$l_next?>" placeholder="<?=$l_next?>"/>
                </div>
                <div>
                    <p>Precio del tamaño extra grande</p>
                    <input type="number" name="xl-next" value="<?=$xl_next?>" placeholder="<?=$xl_next?>"/>
                </div>
                <div>
                    <p>Nombre</p>
                    <input type="text" name="name-next" value="<?=$name_next?>" placeholder="<?=$name_next?>"/>
                </div>
            </section>
            <br>
            <br>
            <br>

    <!--CO2 FREE-->

            <div class="positionEditButtons">
                <div>
                    <label>CO2 free </label><small style="font-weight:200; font-size:12px;color:#85c440;margin:0px 12px;"> <?=$name_CO2?> </small>
                    <?php if($activeCO2 == 1) :?>
                        <span class="dashicons dashicons-yes-alt"></span>
                    <?php endif; ?>

                    <?php if($activeCO2 == 0) :?>
                        <span class="dashicons dashicons-dismiss"></span>
                    <?php endif; ?>
                </div>
            </div>

            <section class="grid99">
                <div>
                    <p>Activo</p>
                    <select class="selectActive"  name="activeCO2" required>
                        <option value="<?=$activeCO2?>">Selecciona una opción</option>
                        <option value=1>Sí</option>
                        <option value=0>No</option>
                    </select>
                </div>
                <div>
                    <p>Precio del tamaño extra chico</p>
                    <input type="number" name="xs-CO2" value="<?=$xs_CO2?>" placeholder="<?=$xs_CO2?>"/>
                </div>
                <div>
                    <p>Precio del tamaño chico</p>
                    <input type="number" name="s-CO2" value="<?=$s_CO2?>" placeholder="<?=$s_CO2?>"/>
                </div>
                <div>
                    <p>Precio del tamaño mediano</p>
                    <input type="number" name="m-CO2" value="<?=$m_CO2?>" placeholder="<?=$m_CO2?>"/>
                </div>
                <div>
                    <p>Precio del tamaño grande</p>
                    <input type="number" name="l-CO2" value="<?=$l_CO2?>" placeholder="<?=$l_CO2?>"/>
                </div>
                <div>
                    <p>Precio del tamaño extra grande</p>
                    <input type="number" name="xl-CO2" value="<?=$xl_CO2?>" placeholder="<?=$xl_CO2?>"/>
                </div>
                <div>
                    <p>Nombre</p>
                    <input type="text" name="name-CO2" value="<?=$name_CO2?>" placeholder="<?=$name_CO2?>"/>
                </div>
            </section>
        </form>
    </section>
    <?php
    }
    //Termina Vista para el submenú Métodos de envío

    //Vista para el submenú Métodos de envío
    public function subMenuOrders(){
        return $this->viewsubMenuOrders();
    }

    private function viewsubMenuOrders(){  ?>
    <!--Sección de órdenes-->
        <section class="bodyShopify wrap">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
            <strong class="title">Tus envíos</strong>
            <br/>
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Vendedor</th>
                        <th>N° Orden</th>
                        <th>Counter 99</th>
                        <th>Tracking id 99</th>
                    </tr>
                    </thead>

                    <?php
                    global $wpdb;
                    $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
                    $orders = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
                    foreach($orders as $row) : ?>
                    <?php if($row->reason == "Creado") :?>
                        <tbody>
                            <tr>
                                <td><?=$row->time?></td>
                                <td><?=$row->sellerName?></td>
                                <td><?=$row->orderid?></td>
                                <td><?=$row->counter99?></td>
                                <td><?=$row->tracking99?></td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </section>
    <!--Termina sección de órdenes-->
    <!--Sección de órdenes responsive-->
        <section class="shipmentsResponsive">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
                <strong class="title">Tus envíos</strong>

                <?php
                    global $wpdb;
                    $table_name = $wpdb->prefix . '99minutos_ordersnsettings';
                    $orders = $wpdb->get_results("SELECT * FROM $table_name");
                    foreach($orders as $row) : ?>

                  <div class="cardResponsive">
                      <div id="containerResponsiveCard">
                        <label id="NoShip">Número de orden <?=$row->orderid?></label>
                        <label><strong>Counter: </strong> <?=$row->counter99?> </label>
                        <label><strong>Rastreo: </strong> <?=$row->tracking99?> </label>
                        <label><strong>Cliente: </strong> <?=$row->sellerid?> </label>
                      </div>
                  </div>

                <?php endforeach; ?>

        </section>
    <!--Termina sección de órdenes responsive-->
    <?php
    }
    //Termina Vista para el submenú Métodos de envío

    //Vista para el submenú Métodos de envío
    public function noventayNueveMinutosPlaces(){
        return $this->viewNoventayNueveMinutosPlaces();
    }

    private function viewNoventayNueveMinutosPlaces(){ ?>
    <!--Sección para registrar distintos almacenes-->
    <?php
        //Funcionalidad para el formulario de registro de direcciones.

        if(isset($_POST['submitButtonRegister']))
        {
            $email = sanitize_text_field($_POST['Email']);
            $apikey = sanitize_text_field($_POST['apiKey']);
            $storeName = sanitize_text_field($_POST['storeName']);
            $sellerName = sanitize_text_field($_POST['sellerName']);
            $sellerLastName = sanitize_text_field($_POST['sellerLastName']);
            $phone = sanitize_text_field($_POST['Phone']);
            $originAddress = sanitize_text_field($_POST['originAddress']);
            $originNumber = sanitize_text_field($_POST['originNumber']);
            $zipCode = sanitize_text_field($_POST['zipCode']);
            $country = sanitize_text_field($_POST['Country']);
            $errorZipCode = '';
            $errorApiKey = '';

            if(strlen($apikey) != 40)
            {
                $errorApiKey = '¡Esta Apikey no es de 99 minutos!';
            }

            $url = "https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/cat/coveage";

            $payload = array(
                    "coverage" => $zipCode
            );

            $body = json_encode($payload);

            $options = [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer '.$apikey
                ]
            ];

            $response = wp_remote_retrieve_body(wp_remote_post($url, $options));

            $jsonResponse = json_decode($response, true);

            $coverage = $jsonResponse['coverage']['message'];

            if($coverage != false)
            {
            global $wpdb;
            $table_name = $wpdb->prefix . '99minutos_vendors';
            $sql = "INSERT INTO $table_name (business, sellerName, sellerLastName, Phone, Email, originAddress, originNumber, zipCode, Country, apikey)
                    VALUES ('$storeName', '$sellerName', '$sellerLastName', '$phone', '$email', '$originAddress', '$originNumber', '$zipCode', '$country', '$apikey')";
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql );
            } else
            {
                $errorZipCode = 'Lo sentimos, no tenemos cobertura en este código postal';
            }
        }
    ?>
         <section class="registerView wrap">
         <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
         <form role="form" method="POST">
            <strong>Añadir dirección de recolección</strong><br>
            <label>Añade una nueva dirección donde recogeremos tus paquetes</label>
            <div class="positionRegister">
                <div>
                    <label>Correo eletrónico</label>
                    <input type="text" name="Email" required>
                    <p style="margin:0 0; color:red; font-size:11px;">¡Usa el mismo correo que en wordpress!</p>
                </div>
                <div>

                    <label>API KEY</label>
                    <input type="text" name="apiKey" required>
                    <a href="https://client.99minutos.com" style="font-size: 11px;">Obten tu api key</a>
                    <p style="margin:0 0; color:red; font-size:11px;"><?=$errorApiKey?></p>
                </div>


                <div>
                    <label>Nombre de la tienda</label>
                    <input type="text" name="storeName" required>
                </div>
                <div>

                    <label>Nombre del vendedor</label>
                    <input type="text" name="sellerName" required>
                </div>
                <div>

                    <label>Apellido del vendedor</label>
                    <input type="text" name="sellerLastName" required>
                </div>
                <div>

                    <label>Teléfono</label>
                    <input type="text" name="Phone" required>
                </div>
                <div>
                    <label>Dirección</label>
                    <input type="text" name="originAddress" required>
                </div>
                <div>
                    <label>Número</label>
                    <input type="text" name="originNumber" required>
                </div>
                <div>

                    <label>Código postal</label>
                    <input type="text" name="zipCode" required>
                    <p style="margin:0 0; color:red; font-size:11px;"><?=$errorZipCode?></p>
                </div>
                <div>
                    <label>País</label>
                    <select class="selectCountry" name="Country" required>
                        <option value="MEX">Selecciona un país</option>
                        <option value="MEX">México</option>
                        <option value="CHL">Chile</option>
                    </select>
                </div>
                <section class="positionBUttonRegister">
                    <button class="buttonCreateAccount" type="submit" name="submitButtonRegister">Crear</button>
                </section>
            </div>
        </form>
        </section>
    <!--Termina sección para registrar distintos almacenes-->
    <?php
    }
    //Termina Vista para el submenú Métodos de envío

    public function addLocation(){
        return $this->viewAddLocation();
    }

    private function viewAddLocation(){
        ?>

        <?php
            global $wpdb;
            if(isset($_POST['registerDelete']))
            {
                $email = sanitize_text_field($_POST['registerDelete']);
                $table_name = $wpdb->prefix . '99minutos_vendors';
                $wpdb->get_results( "DELETE FROM $table_name WHERE Email = '$email'");
            }

        ?>

        <!--Sección de órdenes-->
        <section class="bodyShopify wrap">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
            <strong class="title">Tus direcciones registradas</strong>
            <br/>
            <div class="table-wrapper">
                <table class="fl-table">
                    <thead>
                    <tr>
                        <th>Tienda</th>
                        <th>Calle</th>
                        <th>Número</th>
                        <th>Código postal</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . '99minutos_vendors';
                $results = $wpdb->get_results( "SELECT * FROM $table_name");
                foreach($results as $row): ?>
                    <tr>
                      <td><?= $row->business ?></td>
                      <td><?= $row->originAddress ?></td>
                      <td><?= $row->originNumber ?></td>
                      <td><?= $row->zipCode ?></td>
                      <td><?= $row->Phone ?></td>
                      <td><?= $row->Email ?></td>
                      <td>
                        <form method="POST">
                            <button id="delete" name="registerDelete" value="<?= $row->Email ?>"><a style="color:white;"> Borrar </a></button>
                        </form>
                      </td>
                    </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    <!--Termina sección de órdenes-->
    <!--Sección de órdenes responsive-->
        <section class="shipmentsResponsive">
        <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
                <strong class="title">Tus envíos</strong>
                  <div class="cardResponsive">
                      <div id="containerResponsiveCard">
                        <label id="NoShip">Pedido</label>
                        <label><strong>Counter:  </strong></label>
                        <label><strong>Rastreo: </strong></label>
                        <label><strong>Cliente: </strong></label>
                      </div>
                  </div>
        </section>
    <!--Termina sección de órdenes responsive-->

    <?php
    }

    public function shippingPDF(){
        return $this->privateshippingPDF();
    }

    private function privateshippingPDF(){
        ?>
        <!--  Imprime guías  -->
            <section class="trackingView">
            <?php require_once plugin_dir_path( __DIR__ ) . '/navBar.php'; ?>
                <strong class="title">Rastrear envío</strong>

                <div class="subtitle">
                    <label>Por favor ingresa el counter para generar tu guía</label>
                    <small>Puedes encontrar el counter en la sección 99 minutos -> Órdenes -> Counter 99</small>
                </div>

                <form role="form" method="POST">
                    <div class="searchOrder">
                        <input style="width: 300px;padding:5px;padding-left: 10px;color:#929191;border: none;margin-right: 20px;-webkit-box-shadow: -1px 0px 9px 0px rgba(222,218,222,1);-moz-box-shadow: -1px 0px 9px 0px rgba(222,218,222,1); box-shadow: -1px 0px 9px 0px rgba(222,218,222,1);border-radius: 10px;" id="trackInput" type="text" name="orderPDF" required/>
                        <button type="submit" name="pdfButton">Generar guía</button>
                    </div>
                </form>

                <?php
                //Sección donde se genera la guía a través de la llamada de API hacia 99minutos
                if(isset($_POST['pdfButton'])){

                    $path2view = plugin_dir_path( __DIR__ );
                    $path2main = substr($path2view, 0, -5);

                    require_once $path2main . 'model/classes/getVendorData.php';

                    $vendorData = new Minutos_getVendorData;

                    $vendorData->orderPDF();

                    $api = $vendorData->apikeyPDF;

                    $urlPdf = "https://prd-dot-precise-line-76299minutos.appspot.com/api/v1/guide/order";

                    $miJson = array();
                    $miJson['counter'] = [sanitize_text_field($_POST['orderPDF'])];
                    $miJson['base64'] = true;
                    $miJson['size'] = 'letter';

                    $payload = json_encode( $miJson );

                    $options = [
                        'body' => $payload,
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Bearer ' . $api
                        ]
                    ];
                    $response = wp_remote_retrieve_body(wp_remote_post($urlPdf, $options));

                    $json = json_decode($response, true);

                    $pdfjson = $json['pdf'];

                    $nicepdf = substr($pdfjson, 2, -1);
                ?>

                <div class="pdfContainer" style="object-fit: cover;">
                    <object style="margin:20px; width: 80vw; height: 80vh;" data="data:application/pdf;base64,<?=$nicepdf?>" type="application/pdf">
                        <embed style="width: 80vw;" src="data:application/pdf;base64,<?=$nicepdf?>"  type="application/pdf" />
                    </object>
                </div>

                <?php
                }
                ?>
            </section>
        <?php
    }
}
