<select id="language_dropdown" value="<?= get_option('themoneytizer_data_language') ?>" onChange="saveLanguage()">
    <option <?= get_option('themoneytizer_data_language') == "en" ? "selected" : "" ?> value="en">English</option>
    <option <?= get_option('themoneytizer_data_language') == "fr" ? "selected" : "" ?> value="fr">Français</option>
    <option <?= get_option('themoneytizer_data_language') == "it" ? "selected" : "" ?> value="it">Italiano</option>
    <option <?= get_option('themoneytizer_data_language') == "ru" ? "selected" : "" ?> value="ru">Русский</option>
    <option <?= get_option('themoneytizer_data_language') == "pt" ? "selected" : "" ?> value="pt">Português</option>
    <option <?= get_option('themoneytizer_data_language') == "es" ? "selected" : "" ?> value="es">Español</option>
    <option <?= get_option('themoneytizer_data_language') == "de" ? "selected" : "" ?> value="de">Deutsch</option>
</select>