<?php

global $wppt_pricing_tables_array;

$wppt_pricing_tables_array = apply_filters( 'wppt_pricing_tables_array', array(
    'wppt_sonam' => array(
        'public' => function( $data ) {
            ?>
            <div class="pricing pricing--sonam">
                <?php
                foreach ( $data['tables'] as $id => $table_data ) {
                    ?>
                    <div id="<?php echo $id; ?>" class="pricing__item">
                    <div class="pricing--inner_item">
                    <?php
                    if( isset($table_data['header']['data']['title'] ) ) {
                        ?>
                    <h3 class="pricing__title" id="<?php echo $table_data['header']['data']['title']['id']; ?>">
                        <?php echo $table_data['header']['data']['title']['value']; ?>
                    </h3>
                        <?php
                    }
                    ?>
                    <?php
                    if( isset( $table_data['header']['data']['subtitle'] ) ) {
                        ?>
                        <div class="pricing__price"
                         id="<?php echo $table_data['header']['data']['subtitle']['id']; ?>">
                        <?php echo $table_data['header']['data']['subtitle']['value']; ?>
                    </div>
                        <?php
                    }
                    ?>
                    <?php
                    if( isset( $table_data['body']['data']['description'] ) ) {
                        ?>
                        <p class="pricing__sentence"
                           id="<?php echo $table_data['body']['data']['description']['id']; ?>">
                            <?php echo $table_data['body']['data']['description']['value']  ?>
                        </p>
                        <?php
                    }
                     ?>
                     <?php
                        if( isset( $table_data['body']['data']['properties'] ) ) {
                            ?>
                    <ul class="pricing__feature-list">
                        <?php
                        foreach ( $table_data['body']['data']['properties'] as $k => $property ) {
                            ?>
                            <li class="pricing__feature"
                            id="<?php echo $property['id']; ?>"
                            data-property="<?php echo $property['id']; ?>">
                            <?php echo $property['value'] ?>
                        </li>
                            <?php
                        }

                    ?>
                    </ul>
                            <?php
                        }
                     ?>
                     <?php
                     if( isset( $table_data['footer']['data']['button'] ) ) {
                         ?>
                    <a href="<?php echo $table_data['footer']['data']['button']['url']; ?>" class="pricing__action" id="<?php echo $table_data['footer']['data']['button']['id']; ?>">
                        <?php echo $table_data['footer']['data']['button']['value'] ?>
                    </a>
                         <?php
                     }
                     ?>
                    </div>
                </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }
    ),
    'wppt_jinpa' => array(
        'public' => function( $data ) {

            ?>
            <div class="pricing pricing--jinpa">
                <?php
                foreach ( $data['tables'] as $id => $table_data ) {
                    ?>
                    <div id="<?php echo $id; ?>" class="pricing__item">
                        <?php
                        if( isset($table_data['header']['data']['title'] ) ) {
                            ?>
                            <h3 class="pricing__title" id="<?php echo $table_data['header']['data']['title']['id']; ?>">
                                <?php echo $table_data['header']['data']['title']['value']; ?>
                            </h3>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['header']['data']['subtitle'] ) ) {
                            ?>
                            <div class="pricing__price"
                                 id="<?php echo $table_data['header']['data']['subtitle']['id']; ?>">
                                <?php echo $table_data['header']['data']['subtitle']['value']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['description'] ) ) {
                            ?>
                            <p class="pricing__sentence"
                               id="<?php echo $table_data['body']['data']['description']['id']; ?>">
                                <?php echo $table_data['body']['data']['description']['value']  ?>
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['properties'] ) ) {
                            ?>
                            <ul class="pricing__feature-list">
                                <?php
                                foreach ( $table_data['body']['data']['properties'] as $k => $property ) {
                                    ?>
                                    <li class="pricing__feature"
                                        id="<?php echo $property['id']; ?>"
                                        data-property="<?php echo $property['id']; ?>">
                                        <?php echo $property['value'] ?>
                                    </li>
                                    <?php
                                }

                                ?>
                            </ul>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['footer']['data']['button'] ) ) {
                            ?>
                            <a href="<?php echo $table_data['footer']['data']['button']['url']; ?>" class="pricing__action" id="<?php echo $table_data['footer']['data']['button']['id']; ?>">
                                <?php echo $table_data['footer']['data']['button']['value'] ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    ),
    'wppt_tenzin' => array(
        'public' => function( $data ) {
            ?>
            <div class="pricing pricing--tenzin">
                <?php
                foreach ( $data['tables'] as $id => $table_data ) {
                    ?>
                    <div id="<?php echo $id; ?>" class="pricing__item">
                        <?php
                        if( isset($table_data['header']['data']['title'] ) ) {
                            ?>
                            <h3 class="pricing__title" id="<?php echo $table_data['header']['data']['title']['id']; ?>">
                                <?php echo $table_data['header']['data']['title']['value']; ?>
                            </h3>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['header']['data']['subtitle'] ) ) {
                            ?>
                            <div class="pricing__price"
                                 id="<?php echo $table_data['header']['data']['subtitle']['id']; ?>">
                                <?php echo $table_data['header']['data']['subtitle']['value']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['description'] ) ) {
                            ?>
                            <p class="pricing__sentence"
                               id="<?php echo $table_data['body']['data']['description']['id']; ?>">
                                <?php echo $table_data['body']['data']['description']['value']  ?>
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['properties'] ) ) {
                            ?>
                            <ul class="pricing__feature-list">
                                <?php
                                foreach ( $table_data['body']['data']['properties'] as $k => $property ) {
                                    ?>
                                    <li class="pricing__feature"
                                        id="<?php echo $property['id']; ?>"
                                        data-property="<?php echo $property['id']; ?>">
                                        <?php echo $property['value'] ?>
                                    </li>
                                    <?php
                                }

                                ?>
                            </ul>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['footer']['data']['button'] ) ) {
                            ?>
                            <a href="<?php echo $table_data['footer']['data']['button']['url']; ?>" class="pricing__action" id="<?php echo $table_data['footer']['data']['button']['id']; ?>">
                                <?php echo $table_data['footer']['data']['button']['value'] ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    ),
    'wppt_yama' => array(
        'public' => function( $data ) {
            ?>
            <div class="pricing pricing--yama">
                <?php
                foreach ( $data['tables'] as $id => $table_data ) {
                    ?>
                    <div id="<?php echo $id; ?>" class="pricing__item">
                        <?php
                        if( isset($table_data['header']['data']['title'] ) ) {
                            ?>
                            <h3 class="pricing__title" id="<?php echo $table_data['header']['data']['title']['id']; ?>">
                                <?php echo $table_data['header']['data']['title']['value']; ?>
                            </h3>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['description'] ) ) {
                            ?>
                            <p class="pricing__sentence"
                               id="<?php echo $table_data['body']['data']['description']['id']; ?>">
                                <?php echo $table_data['body']['data']['description']['value']  ?>
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['header']['data']['subtitle'] ) ) {
                            ?>
                            <div class="pricing__price"
                                 id="<?php echo $table_data['header']['data']['subtitle']['id']; ?>">
                                <?php echo $table_data['header']['data']['subtitle']['value']; ?>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['body']['data']['properties'] ) ) {
                            ?>
                            <ul class="pricing__feature-list">
                                <?php
                                foreach ( $table_data['body']['data']['properties'] as $k => $property ) {
                                    ?>
                                    <li class="pricing__feature"
                                        id="<?php echo $property['id']; ?>"
                                        data-property="<?php echo $property['id']; ?>">
                                        <?php echo $property['value'] ?>
                                    </li>
                                    <?php
                                }

                                ?>
                            </ul>
                            <?php
                        }
                        ?>
                        <?php
                        if( isset( $table_data['footer']['data']['button'] ) ) {
                            ?>
                            <a href="<?php echo $table_data['footer']['data']['button']['url']; ?>" class="pricing__action" id="<?php echo $table_data['footer']['data']['button']['id']; ?>">
                                <?php echo $table_data['footer']['data']['button']['value'] ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    )
));