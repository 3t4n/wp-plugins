<template id="pricing_table_panel">
    <div>
        <ul>
            <li>
                <a href="javascript:" class="button" @click="add_table()"><?php _e( 'Add Table', 'wppt' ); ?></a>
            </li>
            <li>
                <?php _e( 'Spacing between tables', 'wppt' ); ?>
                <input type="number" v-model="settings.s.spacing" @change="change_settings()">
            </li>
            <li>
                <?php _e( 'Table width', 'wppt' ); ?>
                <input type="number" v-model="settings.s.col_width" @change="change_settings()">
            </li>
        </ul>
    </div>
</template>
<template id="wppt_sonam">
    <div>
        <div class="pricing pricing--sonam">
            <template v-for="( table_data, id ) in t_data">
                <div :id="id" class="pricing__item"
                @mouseover="removable_table = id"
                @mouseout="removable_table = ''"
                     :style="pricing_item_style"
                >
                    <template v-if="removable_table == id">
                        <div class="editable-table_data-panel">
                            <a href="javascript:" class="button" @click="remove_table(id)"><?php _e( 'X', 'wppt' ); ?></a>
                        </div>
                    </template>
                    <div class="pricing--inner_item">
                        <h3 class="pricing__title"
                            :id="table_data.header.data.title.id"
                            @mouseover="editable_data = table_data.header.data.title.id"
                            @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.title.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.title.id || ( editable_scope && editing_id == table_data.header.data.title.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_title(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                        <a href="javascript:"
                                           @click="save_title(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_title()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </h3>
                        <div class="pricing__price"
                             :id="table_data.header.data.subtitle.id"
                             @mouseover="editable_data = table_data.header.data.subtitle.id"
                             @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.subtitle.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.subtitle.id || ( editable_scope && editing_id == table_data.header.data.subtitle.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_subtitle(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                        <a href="javascript:"
                                           @click="save_subtitle( table_data )">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_subtitle()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <p class="pricing__sentence"
                           :id="table_data.body.data.description.id"
                           @mouseover="editable_data = table_data.body.data.description.id"
                           @mouseout="editable_data = ''"
                        >
                            {{ table_data.body.data.description.value  }}
                            <template>
                                <div class="editable-data-panel" v-if="editable_data == table_data.body.data.description.id || ( editable_scope && editing_id == table_data.body.data.description.id )">
                                    <textarea cols="30" rows="10" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id"></textarea>
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_description(table_data)"
                                           v-if="!editable_scope"><?php _e( 'Edit Description', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id">
                                            <a href="javascript:"
                                               @click="save_description(table_data)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_description()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </p>
                        <ul class="pricing__feature-list"
                            @mouseover="property_hover = true"
                            @mouseout="property_hover = false">
                            <div class="editable-pricing__feature-list-panel"
                                 v-if="property_hover == true"
                            >
                                <a href="javascript:"
                                   class="button"
                                   @click="add_property( id )"
                                ><?php _e( '+', 'wppt' ); ?></a>
                            </div>
                            <li class="pricing__feature"
                                :id="property.id"
                                @mouseover="editable_data = property.id"
                                @mouseout="editable_data = ''"
                                v-for="( property, key ) in table_data.body.data.properties" :data-property="property.id">
                                {{ property.value }}
                                <div class="editable-data-panel" v-if="editable_data == property.id || ( editable_scope && editing_id == property.id )">
                                    <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == property.id">
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_property(table_data,property)"
                                           v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                        <a href="javascript:"
                                           @click="remove_property(id,key)"
                                           v-if="!editable_scope"
                                        >
                                            <?php _e( 'Remove', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:" @click="move_property('up',id,key)"><?php _e( 'Up', 'wppt' ); ?></a>
                                        <a href="javascript:" @click="move_property('down',id,key)"><?php _e( 'Down', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == property.id">
                                            <a href="javascript:"
                                               @click="save_property(property)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_property()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <label :href="table_data.footer.data.button.url" class="pricing__action"
                               :id="table_data.footer.data.button.id"
                               @mouseover="editable_data = table_data.footer.data.button.id"
                               @mouseout="editable_data = ''"
                        >
                            {{ table_data.footer.data.button.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.footer.data.button.id || ( editable_scope && editing_id == table_data.footer.data.button.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_button_label(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit Label', 'wppt' ); ?></a>
                                    <a href="javascript:"
                                       @click="edit_button_url(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit URL', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_label(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_label()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                    <template v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_url(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_url()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </template>
            <template v-if="!t_data">
                <div class="pricing__item">
                    <h3 class="pricing__title">Startup</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>9.90</div>
                    <p class="pricing__sentence">Small business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">40MB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Standard</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>29,90</div>
                    <p class="pricing__sentence">Medium business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">10 hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">1GB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Professional</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>59,90</div>
                    <p class="pricing__sentence">Gigantic business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">Unlimited hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">Anaylitcs integration</li>
                        <li class="pricing__feature">Unlimited storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
            </template>
        </div>
    </div>
</template>
<template id="wppt_jinpa">
    <div>
        <div class="pricing pricing--jinpa">
            <template v-for="( table_data, id ) in t_data">
                <div :id="id" class="pricing__item"
                     @mouseover="removable_table = id"
                     @mouseout="removable_table = ''"
                     :style="pricing_item_style"
                >
                    <div class="pricing--inner_item">
                        <template v-if="removable_table == id">
                            <div class="editable-table_data-panel">
                                <a href="javascript:" class="button" @click="remove_table(id)"><?php _e( 'X', 'wppt' ); ?></a>
                            </div>
                        </template>

                        <h3 class="pricing__title"
                            :id="table_data.header.data.title.id"
                            @mouseover="editable_data = table_data.header.data.title.id"
                            @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.title.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.title.id || ( editable_scope && editing_id == table_data.header.data.title.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_title(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                        <a href="javascript:"
                                           @click="save_title(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_title()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </h3>

                        <div class="pricing__price"
                             :id="table_data.header.data.subtitle.id"
                             @mouseover="editable_data = table_data.header.data.subtitle.id"
                             @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.subtitle.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.subtitle.id || ( editable_scope && editing_id == table_data.header.data.subtitle.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_subtitle(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                        <a href="javascript:"
                                           @click="save_subtitle( table_data )">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_subtitle()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <p class="pricing__sentence"
                           :id="table_data.body.data.description.id"
                           @mouseover="editable_data = table_data.body.data.description.id"
                           @mouseout="editable_data = ''"
                        >
                            {{ table_data.body.data.description.value  }}
                            <template>
                                <div class="editable-data-panel" v-if="editable_data == table_data.body.data.description.id || ( editable_scope && editing_id == table_data.body.data.description.id )">
                                    <textarea cols="30" rows="10" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id"></textarea>
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_description(table_data)"
                                           v-if="!editable_scope"><?php _e( 'Edit Description', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id">
                                            <a href="javascript:"
                                               @click="save_description(table_data)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_description()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </p>

                        <ul class="pricing__feature-list"
                            @mouseover="property_hover = true"
                            @mouseout="property_hover = false">
                            <div class="editable-pricing__feature-list-panel"
                                 v-if="property_hover == true"
                            >
                                <a href="javascript:"
                                   class="button"
                                   @click="add_property( id )"
                                ><?php _e( '+', 'wppt' ); ?></a>
                            </div>
                            <li class="pricing__feature"
                                :id="property.id"
                                @mouseover="editable_data = property.id"
                                @mouseout="editable_data = ''"
                                v-for="( property, key ) in table_data.body.data.properties" :data-property="property.id">
                                {{ property.value }}
                                <div class="editable-data-panel" v-if="editable_data == property.id || ( editable_scope && editing_id == property.id )">
                                    <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == property.id">
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_property(table_data,property)"
                                           v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                        <a href="javascript:"
                                           @click="remove_property(id,key)"
                                           v-if="!editable_scope"
                                        >
                                            <?php _e( 'Remove', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:" @click="move_property('up',id,key)"><?php _e( 'Up', 'wppt' ); ?></a>
                                        <a href="javascript:" @click="move_property('down',id,key)"><?php _e( 'Down', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == property.id">
                                            <a href="javascript:"
                                               @click="save_property(property)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_property()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <label :href="table_data.footer.data.button.url" class="pricing__action"
                               :id="table_data.footer.data.button.id"
                               @mouseover="editable_data = table_data.footer.data.button.id"
                               @mouseout="editable_data = ''"
                        >
                            {{ table_data.footer.data.button.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.footer.data.button.id || ( editable_scope && editing_id == table_data.footer.data.button.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_button_label(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit Label', 'wppt' ); ?></a>
                                    <a href="javascript:"
                                       @click="edit_button_url(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit URL', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_label(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_label()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                    <template v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_url(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_url()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </template>
        </div>
        <template v-if="!t_data">
            <div class="pricing pricing--jinpa">
                <div class="pricing__item">
                    <h3 class="pricing__title">Startup</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>9.90</div>
                    <p class="pricing__sentence">Small business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">40MB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Medium</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>29,90</div>
                    <p class="pricing__sentence">Medium business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">10 hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">1GB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Large</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>59,90</div>
                    <p class="pricing__sentence">Gigantic business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">Unlimited hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">Anaylitcs integration</li>
                        <li class="pricing__feature">Unlimited storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
            </div>
        </template>
    </div>
</template>
<template id="wppt_tenzin">
    <div>
        <div class="pricing pricing--tenzin">
            <template v-for="( table_data, id ) in t_data">
                <div :id="id" class="pricing__item"
                     @mouseover="removable_table = id"
                     @mouseout="removable_table = ''"
                     :style="pricing_item_style"
                >
                    <div class="pricing--inner_item">
                        <template v-if="removable_table == id">
                            <div class="editable-table_data-panel">
                                <a href="javascript:" class="button" @click="remove_table(id)"><?php _e( 'X', 'wppt' ); ?></a>
                            </div>
                        </template>

                        <h3 class="pricing__title"
                            :id="table_data.header.data.title.id"
                            @mouseover="editable_data = table_data.header.data.title.id"
                            @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.title.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.title.id || ( editable_scope && editing_id == table_data.header.data.title.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_title(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                        <a href="javascript:"
                                           @click="save_title(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_title()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </h3>

                        <div class="pricing__price"
                             :id="table_data.header.data.subtitle.id"
                             @mouseover="editable_data = table_data.header.data.subtitle.id"
                             @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.subtitle.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.subtitle.id || ( editable_scope && editing_id == table_data.header.data.subtitle.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_subtitle(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                        <a href="javascript:"
                                           @click="save_subtitle( table_data )">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_subtitle()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <p class="pricing__sentence"
                           :id="table_data.body.data.description.id"
                           @mouseover="editable_data = table_data.body.data.description.id"
                           @mouseout="editable_data = ''"
                        >
                            {{ table_data.body.data.description.value  }}
                            <template>
                                <div class="editable-data-panel" v-if="editable_data == table_data.body.data.description.id || ( editable_scope && editing_id == table_data.body.data.description.id )">
                                    <textarea cols="30" rows="10" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id"></textarea>
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_description(table_data)"
                                           v-if="!editable_scope"><?php _e( 'Edit Description', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id">
                                            <a href="javascript:"
                                               @click="save_description(table_data)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_description()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </p>

                        <ul class="pricing__feature-list"
                            @mouseover="property_hover = true"
                            @mouseout="property_hover = false">
                            <li class="editable-pricing__feature-list-panel"
                                 v-if="property_hover == true"
                            >
                                <a href="javascript:"
                                   class="button"
                                   @click="add_property( id )"
                                ><?php _e( '+', 'wppt' ); ?></a>
                            </li>
                            <li class="pricing__feature"
                                :id="property.id"
                                @mouseover="editable_data = property.id"
                                @mouseout="editable_data = ''"
                                v-for="( property, key ) in table_data.body.data.properties" :data-property="property.id">
                                {{ property.value }}
                                <div class="editable-data-panel" v-if="editable_data == property.id || ( editable_scope && editing_id == property.id )">
                                    <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == property.id">
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_property(table_data,property)"
                                           v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                        <a href="javascript:"
                                           @click="remove_property(id,key)"
                                           v-if="!editable_scope"
                                        >
                                            <?php _e( 'Remove', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:" @click="move_property('up',id,key)"><?php _e( 'Up', 'wppt' ); ?></a>
                                        <a href="javascript:" @click="move_property('down',id,key)"><?php _e( 'Down', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == property.id">
                                            <a href="javascript:"
                                               @click="save_property(property)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_property()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <label :href="table_data.footer.data.button.url" class="pricing__action"
                               :id="table_data.footer.data.button.id"
                               @mouseover="editable_data = table_data.footer.data.button.id"
                               @mouseout="editable_data = ''"
                        >
                            {{ table_data.footer.data.button.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.footer.data.button.id || ( editable_scope && editing_id == table_data.footer.data.button.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_button_label(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit Label', 'wppt' ); ?></a>
                                    <a href="javascript:"
                                       @click="edit_button_url(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit URL', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_label(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_label()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                    <template v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_url(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_url()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </template>
        </div>
        <template v-if="!t_data">
            <div class="pricing pricing--tenzin">
                <div class="pricing__item">
                    <h3 class="pricing__title">Startup</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>9.90</div>
                    <p class="pricing__sentence">Small business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">40MB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Medium</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>29,90</div>
                    <p class="pricing__sentence">Medium business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">10 hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">1GB of storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Large</h3>
                    <div class="pricing__price"><span class="pricing__currency">$</span>59,90</div>
                    <p class="pricing__sentence">Gigantic business solution</p>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited calls</li>
                        <li class="pricing__feature">Free hosting</li>
                        <li class="pricing__feature">Unlimited hours of support</li>
                        <li class="pricing__feature">Social media integration</li>
                        <li class="pricing__feature">Anaylitcs integration</li>
                        <li class="pricing__feature">Unlimited storage space</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
            </div>
        </template>
    </div>
</template>
<template id="wppt_yama">
    <div>
        <div class="pricing pricing--yama">
            <template v-for="( table_data, id ) in t_data">
                <div :id="id" class="pricing__item"
                     @mouseover="removable_table = id"
                     @mouseout="removable_table = ''"
                     :style="pricing_item_style"
                >
                    <div class="pricing--inner_item">
                        <template v-if="removable_table == id">
                            <div class="editable-table_data-panel">
                                <a href="javascript:" class="button" @click="remove_table(id)"><?php _e( 'X', 'wppt' ); ?></a>
                            </div>
                        </template>

                        <h3 class="pricing__title"
                            :id="table_data.header.data.title.id"
                            @mouseover="editable_data = table_data.header.data.title.id"
                            @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.title.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.title.id || ( editable_scope && editing_id == table_data.header.data.title.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_title(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.title.id">
                                        <a href="javascript:"
                                           @click="save_title(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_title()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </h3>
                        <!--<h3 class="pricing__title">Cafés <span class="pricing__amp">&amp;</span> Nightclubs</h3>-->
                        <p class="pricing__sentence"
                           :id="table_data.body.data.description.id"
                           @mouseover="editable_data = table_data.body.data.description.id"
                           @mouseout="editable_data = ''"
                        >
                            {{ table_data.body.data.description.value  }}
                            <template>
                                <div class="editable-data-panel" v-if="editable_data == table_data.body.data.description.id || ( editable_scope && editing_id == table_data.body.data.description.id )">
                                    <textarea cols="30" rows="10" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id"></textarea>
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_description(table_data)"
                                           v-if="!editable_scope"><?php _e( 'Edit Description', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == table_data.body.data.description.id">
                                            <a href="javascript:"
                                               @click="save_description(table_data)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_description()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </p>
                        <!--<p class="pricing__sentence">Perfect for a café or bar</p>-->
                        <div class="pricing__price"
                             :id="table_data.header.data.subtitle.id"
                             @mouseover="editable_data = table_data.header.data.subtitle.id"
                             @mouseout="editable_data = ''"
                        >
                            {{ table_data.header.data.subtitle.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.header.data.subtitle.id || ( editable_scope && editing_id == table_data.header.data.subtitle.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_subtitle(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.header.data.subtitle.id">
                                        <a href="javascript:"
                                           @click="save_subtitle( table_data )">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_subtitle()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <!--<div class="pricing__price"><span class="pricing__currency">$</span>199<span class="pricing__period">/month</span></div>-->
                        <ul class="pricing__feature-list"
                            @mouseover="property_hover = true"
                            @mouseout="property_hover = false">
                            <li class="editable-pricing__feature-list-panel"
                                v-if="property_hover == true"
                            >
                                <a href="javascript:"
                                   class="button"
                                   @click="add_property( id )"
                                ><?php _e( '+', 'wppt' ); ?></a>
                            </li>
                            <li class="pricing__feature"
                                :id="property.id"
                                @mouseover="editable_data = property.id"
                                @mouseout="editable_data = ''"
                                v-for="( property, key ) in table_data.body.data.properties" :data-property="property.id">
                                {{ property.value }}
                                <div class="editable-data-panel" v-if="editable_data == property.id || ( editable_scope && editing_id == property.id )">
                                    <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == property.id">
                                    <div>
                                        <a href="javascript:"
                                           @click="edit_property(table_data,property)"
                                           v-if="!editable_scope"><?php _e( 'Edit', 'wppt' ); ?></a>
                                        <a href="javascript:"
                                           @click="remove_property(id,key)"
                                           v-if="!editable_scope"
                                        >
                                            <?php _e( 'Remove', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:" @click="move_property('up',id,key)"><?php _e( 'Up', 'wppt' ); ?></a>
                                        <a href="javascript:" @click="move_property('down',id,key)"><?php _e( 'Down', 'wppt' ); ?></a>
                                        <template v-if="editable_scope == 'value' && editing_id == property.id">
                                            <a href="javascript:"
                                               @click="save_property(property)">
                                                <?php _e( 'Save', 'wppt' ); ?>
                                            </a>
                                            <a href="javascript:"
                                               @click="cancel_property()">
                                                <?php _e( 'Cancel', 'wppt' ); ?>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!--<ul class="pricing__feature-list">
                            <li class="pricing__feature">Up to 5 employees</li>
                            <li class="pricing__feature">Support at $25/hour</li>
                            <li class="pricing__feature">Small social media package</li>
                        </ul>-->
                        <label :href="table_data.footer.data.button.url" class="pricing__action"
                               :id="table_data.footer.data.button.id"
                               @mouseover="editable_data = table_data.footer.data.button.id"
                               @mouseout="editable_data = ''"
                        >
                            {{ table_data.footer.data.button.value }}
                            <div class="editable-data-panel" v-if="editable_data == table_data.footer.data.button.id || ( editable_scope && editing_id == table_data.footer.data.button.id )">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                <input type="text" v-model="tmp_editing_data" v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                <div>
                                    <a href="javascript:"
                                       @click="edit_button_label(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit Label', 'wppt' ); ?></a>
                                    <a href="javascript:"
                                       @click="edit_button_url(table_data)"
                                       v-if="!editable_scope"><?php _e( 'Edit URL', 'wppt' ); ?></a>
                                    <template v-if="editable_scope == 'value' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_label(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_label()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                    <template v-if="editable_scope == 'url' && editing_id == table_data.footer.data.button.id">
                                        <a href="javascript:"
                                           @click="save_button_url(table_data)">
                                            <?php _e( 'Save', 'wppt' ); ?>
                                        </a>
                                        <a href="javascript:"
                                           @click="cancel_button_url()">
                                            <?php _e( 'Cancel', 'wppt' ); ?>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </template>

        </div>
        <template v-if="!t_data">
            <div class="pricing pricing--yama">
                <div class="pricing__item">
                    <h3 class="pricing__title">Cafés <span class="pricing__amp">&amp;</span> Nightclubs</h3>
                    <p class="pricing__sentence">Perfect for a café or bar</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>199<span class="pricing__period">/month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Up to 5 employees</li>
                        <li class="pricing__feature">Support at $25/hour</li>
                        <li class="pricing__feature">Small social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">Diners <span class="pricing__amp">&amp;</span> Restaurants</h3>
                    <p class="pricing__sentence">Great for restaurant owners</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>350<span class="pricing__period">/month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Up to 15 employees</li>
                        <li class="pricing__feature">Free support</li>
                        <li class="pricing__feature">Full social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
                <div class="pricing__item">
                    <h3 class="pricing__title">BBs <span class="pricing__amp">&amp;</span> Pensions</h3>
                    <p class="pricing__sentence">Suitable for BBs and Pensions</p>
                    <div class="pricing__price"><span class="pricing__currency">$</span>899<span class="pricing__period">/month</span></div>
                    <ul class="pricing__feature-list">
                        <li class="pricing__feature">Unlimited employees</li>
                        <li class="pricing__feature">Free support</li>
                        <li class="pricing__feature">Full social media package</li>
                    </ul>
                    <button class="pricing__action">Choose plan</button>
                </div>
            </div>
        </template>
    </div>
</template>