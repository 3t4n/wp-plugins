<?php if ($this->website !== null) { ?>
    <div class="container max-w-4xl mx-auto">
        <div class="flex flex-col overflow-hidden bg-white rounded shadow">
            <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="website" value="<?php echo esc_attr($this->website["id"]); ?>" />
                <?php echo $this->nonce(); ?>
                <div class="flex flex-col px-6 py-4">
                    <div class="flex flex-col mb-2 lg:flex-row lg:items-center">
                        <div><?php echo esc_html($this->website["url"]); ?></div>
                        <div class="py-2 text-xs lg:ml-4">
                            <?php require(plugin_dir_path(dirname(__FILE__)) . "tag/ad-ink-admin-monetization.php"); ?>
                        </div>
                        <div class="py-2 text-xs lg:ml-4">
                            <?php require(plugin_dir_path(dirname(__FILE__)) . "tag/ad-ink-admin-adstxt.php"); ?>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="key" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="text-gray-500 svg-inline--fa fa-key fa-w-16">
                            <path fill="currentColor" d="M512 176.001C512 273.203 433.202 352 336 352c-11.22 0-22.19-1.062-32.827-3.069l-24.012 27.014A23.999 23.999 0 0 1 261.223 384H224v40c0 13.255-10.745 24-24 24h-40v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24v-78.059c0-6.365 2.529-12.47 7.029-16.971l161.802-161.802C163.108 213.814 160 195.271 160 176 160 78.798 238.797.001 335.999 0 433.488-.001 512 78.511 512 176.001zM336 128c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z" class=""></path>
                        </svg>
                        <div class="ml-2"><?php echo $this->website["id"]; ?></div>
                        <div class="flex items-center ml-4">
                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="list-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="ml-4 text-gray-500 svg-inline--fa fa-list-alt fa-w-16">
                                <path fill="currentColor" d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z" class=""></path>
                            </svg>
                            <div class="ml-2"><?php echo esc_attr($this->website["category"]["name"]); ?></div>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-1 text-sm text-gray-600 bg-gray-200">APERÇU</div>
                <?php require(plugin_dir_path(dirname(__FILE__)) . "tag/ad-ink-admin-sample.php"); ?>
                <div class="px-6 py-1 text-sm text-gray-600 bg-gray-200">DETAILS</div>
                <div details>

                    <div class="flex px-6 py-4 -mx-2">
                        <div class="w-1/3 px-2">
                            <div class="text-lg text-gray-800">Contenu</div>
                            <div class="mt-2 text-sm text-gray-500">Thématique de la vidéo.</div>
                        </div>
                        <div class="w-2/3 px-2 text-gray-700">
                            <?php require_once(plugin_dir_path(dirname(__FILE__)) . "tag/ad-ink-admin-categories.php"); ?>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t">
                        <div class="flex -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Contrôles</div>
                                <div class="mt-2 text-sm text-gray-500">Affichez les contrôles du player..</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["player"]["controls"] ? "active" : ""; ?>" switch>
                                    <input type="hidden" name="player_controls" value="<?php echo $this->website["player"]["controls"] ? "1" : "0"; ?>" switch-input />
                                    <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Social</div>
                                <div class="mt-2 text-sm text-gray-500">Partagez l'url de votre page sur les réseaux sociaux.</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["player"]["social"] ? "active" : ""; ?>" switch>
                                    <input type="hidden" name="player_social" value="<?php echo $this->website["player"]["social"] ? "1" : "0"; ?>" switch-input />
                                    <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Style</div>
                                <div class="mt-2 text-sm text-gray-500">Personalisez vos couleurs.</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="mt-4">Barre de chargement</div>
                                <input type="text" placeholder="#17E5EA" name="player_color_foreground" class="mt-1 w-28 form-input" value="<?php echo isset($this->website['player'], $this->website['player']["color_foreground"]) ? esc_html($this->website['player']["color_foreground"]) : ""; ?>">
                                <div class="mt-4">Fond</div>
                                <input type="text" placeholder="#FFFFFF" name="player_color_background" class="mt-1 w-28 form-input" value="<?php echo isset($this->website['player'], $this->website['player']["color_background"]) ? esc_html($this->website['player']["color_background"]) : ""; ?>">
                                <div class="mt-4">Texte</div>
                                <input type="text" placeholder="#4F4F4F" name="player_color_text" class="mt-1 w-28 form-input" value="<?php echo isset($this->website['player'], $this->website['player']["color_text"]) ? esc_html($this->website['player']["color_text"]) : ""; ?>">
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Picture In Picture</div>
                                <div class="mt-2 text-sm text-gray-500">Controlez le positionnement de votre picture in picture.</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="flex">
                                    <div class="overflow-hidden border rounded-lg" mini-player>
                                        <input type="hidden" name="player_mini_player" value="<?php echo esc_attr($this->website['player']['mini_player']); ?>" mini-player-input />
                                        <div class="grid grid-cols-2 border-b">
                                            <div class="flex items-center justify-center w-12 h-12 text-xs text-center transition-all duration-75 <?php echo $this->website['player']['mini_player'] == 1 ? "active" : ""; ?>" mini-player-position="1">Haut Gauche</div>
                                            <div class="flex items-center justify-center w-12 h-12 text-xs text-center transition-all duration-75 border-l <?php echo $this->website['player']['mini_player'] == 2 ? "active" : ""; ?>" mini-player-position="2">Haut Droite</div>
                                            <div class="flex items-center justify-center w-12 h-12 text-xs text-center transition-all duration-75 border-t <?php echo $this->website['player']['mini_player'] == 3 ? "active" : ""; ?>" mini-player-position="3">Bas Gauche</div>
                                            <div class="flex items-center justify-center w-12 h-12 text-xs text-center transition-all duration-75 border-t border-l <?php echo $this->website['player']['mini_player'] == 4 ? "active" : ""; ?>" mini-player-position="4">Bas Droite</div>
                                        </div>
                                        <div class="flex items-center justify-center h-6 text-xs transition-all duration-75 <?php echo $this->website['player']['mini_player'] == 0 ? "active" : ""; ?>" mini-player-position="0">Désactivé</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t">
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Appareils</div>
                                <div class="mt-2 text-sm text-gray-500">Activez le player sur les appareils suivant..</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <label class="flex items-center">
                                    <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["devices"]["desktop"] ? "active" : ""; ?>" switch>
                                        <input type="hidden" name="devices_desktop" value="<?php echo $this->website["devices"]["desktop"] ? "1" : "0"; ?>" switch-input />
                                        <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">Ordinateur</span>
                                </label>
                                <label class="flex items-center mt-2">
                                    <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["devices"]["mobile"] ? "active" : ""; ?>" switch>
                                        <input type="hidden" name="devices_mobile" value="<?php echo $this->website["devices"]["mobile"] ? "1" : "0"; ?>" switch-input />
                                        <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">Smartphone</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">SEO</div>
                                <div class="mt-2 text-sm text-gray-500">Activez les données structurées (VideoObject).</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["seo"] ? "active" : ""; ?>" switch>
                                    <input type="hidden" name="seo" value="<?php echo $this->website["seo"] ? "1" : "0"; ?>" switch-input />
                                    <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Partenaire publicitaire</div>
                                <div class="mt-2 text-sm text-gray-500">Intégrez l'url de votre partenaire publicitaire (VAST/VPAID).</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <input type="text" class="block w-full form-input" name="vast" value="<?php echo esc_attr($this->website["vast"]); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 border-t">
                        <div class="flex -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Activé</div>
                                <div class="mt-2 text-sm text-gray-500">Active le tag.</div>
                            </div>
                            <div class="w-2/3 px-2">
                                <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo $this->website["enabled"] ? "active" : ""; ?>" switch>
                                    <input type="hidden" name="enabled" value="<?php echo $this->website["enabled"] ? "1" : "0"; ?>" switch-input />
                                    <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-4 -mx-2">
                            <div class="w-1/3 px-2">
                                <div class="text-lg text-gray-800">Emplacement</div>
                                <div class="mt-2 text-sm text-gray-500">Sélectionnez le type d'intégration d'ad.ink dans votre site.</div>
                            </div>
                            <div class="w-2/3 px-2" position-wrapper>
                                <?php $position = get_option(self::POSITION_OPTION_NAME, "automatic"); ?>
                                <input type="hidden" name="position" value="<?php echo esc_attr($position); ?>" />
                                <div class="flex" position-tabs>
                                    <div class="pb-1 text-center transition-all duration-75 border-b-2 border-transparent <?php echo $position === "automatic" ? "text-green-500 border-green-500" : "cursor-pointer hover:border-gray-500"; ?>" position="automatic">
                                        Automatique
                                    </div>
                                    <div class="pb-1 ml-4 text-center transition-all duration-75 border-b-2 border-transparent <?php echo $position === "manual" ? "text-green-500 border-green-500" : "cursor-pointer hover:border-gray-500"; ?>" position="manual">
                                        Manuel
                                    </div>
                                </div>
                                <div class="mt-2 <?php echo $position === "automatic" ? "" : "hidden"; ?>" position-content="automatic">
                                    <div class="mt-2 text-sm text-gray-500">Spécifiez les types de pages sur lesquels activer le native :</div>
                                    <?php $actives_post_types = get_option(self::ACTIVE_POST_TYPES_OPTION_NAME, []); ?>
                                    <?php $i = 0; ?>
                                    <?php foreach (get_post_types(['public'   => true], 'objects') as $key => $type) { ?>
                                        <label class="flex items-center <?php echo $i > 0 ? "mt-2" : "mt-4"; ?>">
                                            <div class="relative inline-block w-12 h-6 rounded-full shadow cursor-pointer bg-gray-300 <?php echo in_array($key, $actives_post_types) ? "active" : "0"; ?>" switch>
                                                <input type="hidden" name="post_types[<?php echo $key; ?>]" value="<?php echo in_array($key, $actives_post_types) ? "1" : "0"; ?>" switch-input />
                                                <div class="absolute top-0 w-6 h-full transition-all duration-75 bg-white rounded-full shadow" switch-inner></div>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600"><?php echo esc_html($type->label); ?></span>
                                        </label>
                                        <?php $i++; ?>
                                    <?php } ?>
                                </div>
                                <div class="mt-2 <?php echo $position === "manual" ? "" : "hidden"; ?>" position-content="manual">
                                    <div class="text-sm text-gray-500">
                                        <div>Placez le code à l'endroit où vous souhaitez afficher le native :</div>

                                        <div class="mt-2">Dans vos articles et pages : <div class="font-bold">[ad-ink]</div>
                                        </div>
                                        <div class="mt-2">Dans votre thème : <div class="font-bold">&lt;?php echo do_shortcode(' [ad-ink] '); ?&gt;</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-6 py-4">
                        <button class="px-4 py-2 font-bold text-white uppercase transition-all duration-75 bg-green-500 rounded hover:bg-green-600">
                            Enregistrer
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php } ?>


<script>
    window.adInkVideoSamples = <?php echo json_encode($this->samples); ?>
</script>