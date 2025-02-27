# === Integrate Ecomail and Elementor Forms ===
- Contributors: webypolopate
- Donate link: https://webypolopate.cz/
- Tags: elementor, elementor pro, form, ecomail, integration
- Requires at least: 5.2
- Tested up to: 6.5.5
- Stable tag: 1.3.1
- License: GPLv2 or later
- License URI: https://webypolopate.cz/

## == Description ==
Integrate Ecomail and Elementor Forms je plugin, který umožňuje integraci formulářů vytvořených v nástroji Elementor PRO s e-mailovým marketingovým nástrojem Ecomail. S naším pluginem můžete jednoduše propojit své formuláře s vašimi Ecomail seznamy a zautomatizovat váš e-mail marketing.

## == Installation ==
1. Nahrajte adresář pluginu do adresáře `/wp-content/plugins/`
2. Aktivujte plugin pomocí menu 'Plugins' v WordPress
3. Otevřete stránku, kde máte Elementor Pro Formulář.
4. V nastavení formuláře klikněte na kolonku "Actions after submit" a zvolte nově možnost Ecomail.
5. Vyplňte váš API klíč, který získáte z administrace Ecomail. 
6. Zadejte List ID vašeho seznamu v Ecomailu, který najdete v URL adrese daného seznamu.
7. Vyplňte ID pole e-mailu, jména a příjmení. Jediné povinné pole je ID pole e-mailu. (více ve FAQ)
8. Uložte a máte hotovo.

## == Frequently Asked Questions ==
= Jak můžu získat Ecomail API klíč? =
Přihlaste se do administrace vašeho účtu v Ecomailu. V pravo nahoře klikněte na svůj profil -> Správa účtu -> Pro vývojáře -> A hned první box "API Klíč" (viz obrázek č. 4)

= Kde najdu List ID v Ecomailu (neboli seznam, kde se budou ukládat emaily)? =
Přejděte do Ecomail administrace -> Kontakty -> Vytvořte/Klikněte na daný seznam, kam se mají ukládat kontakty z formuláře -> V URL adrese najděte číslo (xxx.ecomailapp.cz/contacts/{LIST_ID}/)

= Co když můj formulář neobsahuje položku Jméno a Příjmení? =
Nic se neděje. Pokud váš formulář neobsahuje tyto položky, jednoduše ID pole jména a příjmení nechte prázdné.

= Můžu si zvolit u každého formuláře jiné List ID? =
Ano, u každého formuláře si musíte nastavit detaily zvlášť. Tímto způsobem si tak můžete zvolit, do jakého seznamu se vám kontakty budou ukládat.

= Jak můžu využít funkcionalitu double opt-in neboli dvojité ověření emailové adresy? =
V nastavení widgetu stačí zaškrtnout tlačítko "Dvojité ověření?". Pro tuto funckionalitu je třeba mít ještě zapnutou možnost dvojitého ověření v nastavení vašeho seznamu v Ecomail (Kontakty -> Daný seznam -> Nastavení -> Nastavení registrace odběratelů -> Zapnout a nastavit "Registrace s potvrzením e-mailu (tzv. double opt-in)". Pokud toto nastavení nemáte aktivováno v Ecomailu, nebude funkcionalita fungovat.

## == Screenshots ==
1. Aktivujte propojení Ecomail v Actions after submit
2. Nastavení propojení formuláře
3. Kde najdete ID jednotlivých polí email/jméno/příjmení
4. Jak získáte API klíč z ecomailu
5. Kde najdete Ecomail List ID

## == Changelog ==
= 1.3.1 (01.07.2024) =
### Added
- Version bump (potvrzení funkčnosti s aktuální verzí WordPress a Elementor PRO)

= 1.3.0 (13.07.2023) =
### Added
- Přidána možnost zvolit double opt-in (skip_confirmation = true/false) pro dvojité ověření emailové adresy skrz potvrzovací email. Pro tuto funckionalitu je třeba mít ještě zapnutou možnost dvojitého ověření v nastavení vašeho seznamu v Ecomail (Kontakty -> Daný seznam -> Nastavení -> Nastavení registrace odběratelů -> Zapnout a nastavit "Registrace s potvrzením e-mailu (tzv. double opt-in)".

= 1.2.1 (14.06.2023) =
### Added
- Přidána možnost aktualizovat již existujícího uživatele, pokud ho již máte v seznamu (update_existing = true/false)
- Přidána možnost znovu přihlásit odhlášeného odběratele (resubscribe = true/false)
- Přepracována funkce odesílání dat (subscriber_data), aby se přes API posílaly jen položky opravdu vyplněné

= 1.2.0 (13.06.2023) =
### Added
- Přidána nová kolonka pro integraci telefonního čísla
- Přidána možnost napsat tagy pro další segmentaci v rámci seznamů v Ecomail

= 1.1.1 (07.06.2023) =
### Added
- Přidána funkcionalita 'trigger_autoresponders' => true, aby se odesílaly automatizace.

= 1.1.0 (22.03.2023) =
### Added
- Přidána možnost specifikovat field ID pro jméno a příjmení.

= 1.0.0 (21.03.2023) =
### Added
- První vydání pluginu Elementor Ecomail Integration
- Základní integrace Ecomailu s widgetem formuláře Elementor Pro
- Přidána možnost nastavit Ecomail integraci v nastavení formuláře Elementor Pro
  - Možnost zadat klíč API Ecomail do pole "Ecomail API Key"
  - Možnost zadat identifikátor seznamu Ecomail (List ID) do pole "Ecomail List ID"
- Přidána Ecomail akce do možností formuláře "Actions After Submit"

## == Upgrade Notice ==
= 1.3.0 (13.07.2023) =
* Přidána možnost zvolit double opt-in (skip_confirmation = true/false) pro dvojité ověření emailové adresy skrz potvrzovací email. Pro tuto funckionalitu je třeba mít ještě zapnutou možnost dvojitého ověření v nastavení vašeho seznamu v Ecomail (Kontakty -> Daný seznam -> Nastavení -> Nastavení registrace odběratelů -> Zapnout a nastavit "Registrace s potvrzením e-mailu (tzv. double opt-in)".

= 1.2.1 (14.06.2023) =
* Přidána možnost aktualizovat již existujícího uživatele, pokud ho již máte v seznamu (update_existing = true/false)
* Přidána možnost znovu přihlásit odhlášeného odběratele (resubscribe = true/false)
* Přepracována funkce odesílání dat (subscriber_data), aby se přes API posílaly jen položky opravdu vyplněné

= 1.2.0 (13.06.2023) =
* Přidána nová kolonka pro integraci telefonního čísla
* Přidána možnost napsat tagy pro další segmentaci v rámci seznamů v Ecomail

= 1.1.1 (07.06.2023) =
* Přidána funkcionalita 'trigger_autoresponders' => true, aby se odesílaly automatizace.

= 1.1.0 =
* Přidána nová funkcionalita: možnost specifikovat field ID pro jméno a příjmení.

= 1.0.0 =
* První vydání.

## == Additional Information ==
Pro více informací navštivte naši [webovou stránku](https://webypolopate.cz) nebo nám napište email na adam@webypolopate.cz.