# Changelog

Tutti i cambiamenti fatti al modulo devono essere scritti su questo file

Il formato è basato su [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
e questo progetto aderisce al [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### ✨ Added

### 💥 Changed

### 🐛 Fixed

## [2.3.3]

### 🐛 Fixed

- Fixed a bug that in some cases doesn't full resync products

### ✨ Added

- Added a new cdn url replacement

## [2.3.2]

### 🐛 Fixed

- Fixed the combination dimension that was not correctly calculated

## [2.3.1]

### 🐛 Fixed

- Fixed a bug of the category association
- Fixed a bug of a missing product length

## [2.3.0]

### ✨ Added

- Added a new page that show products that are not available anymore on ActionWear but still present on WooCommerce
- Added multiple checkbox selection on import page after completing the onboarding
- Added a flag under the resync products that let you to choose if you want to resync all products or only missing in WooCommerce
- Added a new task that let you to resync all images of products
- Added a new product delete task to combinations that have price 0

### 💥 Changed

- Changed the task failure post-action to retry the task instead of delete it
- Changed timeout to 90 seconds to get all actionwear skus on onboarding and differential product import
- Chnaged verbosity for some log messages

### 🐛 Fixed

- Fixed a bug that doesn't show the task queue lists in some cases

## [2.2.1]

### 💥 Changed

- Changed the timeout time of task queue from 50 to 110 seconds to prevent duplicated tasks

### 🐛 Fixed

- Fixed a bug of camac placeholder image that doesn't show up on frontend
- Fixed a bug that sometimes show others plugins queue tasks on plugin dashboard

## [2.2.0]

### ✨ Added

- Added a new Queue view on dashboard to show tasks in progress and delete them if needed
- Added a Circuit Breaker during every API call to show a notice if API is not reachable
- Created a new task to update prices programmatically on all products
- Added a new post meta to track original product price before price markup
- Added a new trigger in advanced settings to reapply price recharge on demand
- Added the possibility to filter synced / not synced products on sku selection

### 💥 Changed

- Improved module security
- Changed some logs with additional details to help debugging
- Changed brand_id from M2 to the brand_id present during product creation
- Changed the way that establish how many products are synced

### 🐛 Fixed

- Fixed a bug that doesn't apply price recharge

## [2.1.7]

### 🐛 Fixed

- Fixed a bug that doesn't associate product images where sku has more than 3 parts

## [2.1.6]

### 🐛 Fixed

- Fixed a bug that show products count as 0 on dashboard even if there are actionwear products
- Fixed a bug that duplicate categories on associations view

## [2.1.5]

### ✨ Added

- 6.4 compatibility

## [2.1.4]

### 🐛 Fixed

- Fixed supplier_availability default view setting
- Fixed a scenario when a supplier view table doesn't shown up on frontend
- Prevent sku of actionwear_products table to be duplicated on product differential sync

## [2.1.3]

### 🐛 Fixed

- Fixed cronjob differential timing
- Added log on attribute creation

## [2.1.2]

### 🐛 Fixed

- Full products resync doesn't occur even if resync button was pressed
- Exception generated during images import

## [2.1.1]

### 🐛 Fixed

- Product doesn't delete/edit cover image even the option is enabled
- Log on terms error

## [2.1.0]

### ✨ Added

- Added notice if wp-json is not reachable or rewrite rules are not working
- Added log if pricesall is empty

### 💥 Changed

- Disabled notion faqs on pre-release process

### 🐛 Fixed

- Hard reset not working properly
- Attributes skipping if camac_color_group is empty
- Mismatch between real wordpress url and site url
- Missing full path on images cause an error if wordpress is installed on a subfolder

## [2.0.1]

### ✨ Added

- WP 6.2.2 compatibility

## [2.0.0]

### ✨ Added

- Facultative selection of all CAMAC attributes to make them taxonomies on a new OnBoarding 4 step
- Products import by languages: IT, EN, FR, ES on a new OnBoarding 4 step
- Attribute camac_color_group is now a taxonomy by default
- Plugin multilanguage support: IT, EN
- New dashboard pages: Attributes, Language
- Trigger to resyncronize only categories associations
- Setting to temporarily freeze all syncronizations
- Setting to toggle products images modification
- Setting to toggle Differential Price Sync
- Setting to toggle Price Markup Tables
- Database versioning and migration system
- Deleted products from Action-Wear.com API are now automatically deleted from plugin sync and your website database
- Info modal is now triggered when pressing 'Reset settings'
- Button in backoffice product page to resync a specific single product
- Hard reset button in plugins page

### 💥 Changed

- Background products processing is now handled by a queue system which automatically adapts to you server's capabilities
- Setting to choose how many products to import per process removed
- Unlock Cronjob setting removed
- Label 'Usa immagini del configurabile' is now 'Usa immagini del prodotto indossato'
- Debug Mode is now false by default

### 🐛 Fixed

- Products images when 'Usa immagini del prodotto indossato' setting is disabled -- bugfix
- Url redirecting -- bugfix
- Interface general fixes

## [1.1.27]

### 🐛 Fixed

- Differential price schema

## [1.1.24]

### 🐛 Fixed

- Product categories association fixed

## [1.1.22]

### 🐛 Fixed

- Assets file inclusion

## [1.1.21]

### ✨ Added

- Github wordpress publish action

### 💥 Changed

- Node update faqs and pdf creation from node file to npx command

## [1.1.9]

### ✨ Added

- Created Docker image where run tests
- Codeception Tests suite
- Workflow that run tests on docker image that install WP, WooCommerce, ActionWear and run tests
- giorniconsegnafornitore to wp metas

### 💥 Changed

- Standard Product attributes to real WooCommerce Attributes that works with taxonomies
- Supplier and Actionwear quantities frontend views and content

### 🐛 Fixed

- Db Tests

## [1.1.0]

### ✨ Added

- Controllo su stato logged delle API json del modulo in modo da prevenire chiamate esterne non da backend

### 🐛 Fixed

- Visualizzazione detailed su prodotti con tante varianti
- Replica immagini delle taglie su sku contenente il simbolo "+"

## [1.0.80] - 2022-02-10

### ✨ Added

- Pagina prodotti dove è possibile selezionare in qualsiasi momento i prodotti che si intendono rimuovere/aggiungere alla sincronizzazione
- Sezione in Home del plugin con i due plugin consigliati
- Banner sincronizzato con vostre API esterne
- Trigger che mostra un avviso se presente una invalidations da vostra api esterna, chiede di risincronizzare i prodotti e si può avviare il resync totale dei prodotti (non vengono eliminati e ricreati ma semplicemente aggiornati)
- Polling su pagina Registri per avere la view sempre aggiornata
- Implementazione del listino pubblico, impostando di default il ricarico a 150 (2,5)
- Configurazione per preferenza su immagini del configurabile (copyright sui modelli) + automazione lato import. Aggiunto anche in fase di onboarding.
- Procedura di sincronizzazione differenziale sulla base delle vostre API. Attualmente le sync si aggiornano ogni 5 minuti per le quantità e ogni ora per i prezzi.
- Preferenza su mostrare/nascondere disponibilità fornitore + scelta del tipo di vista.
- Implementazione lato frontend della vista delle disponibilità
- Controlli preliminari per rilevamento configurazioni non adatte o obbligatorie lato server
- Controllo sull'esistenza di WC anche in fase di attivazione del plugin
- Pulsante di esportazione in formato .csv per gli ordini e dei soli prodotti di ActionWear
- Avviso che permette il resync se almeno una delle chiamate API di ActionWear fallisce
- Resize dinamico immagine in base a contesto

### 💥 Changed

- Sincronizzazione prodotti adesso non rimuove le entità ma le aggiorna
- Assegnazione automatica alla taglia che contiene l'immagine, alle altre taglie corrispondenti

### 🐛 Fixed

- Chiamata API pricesall e listino

## [1.0.2] - 2022-09-11

### Changed

- Typo

## [1.0.1] - 2022-09-11

### Changed

- Test release

## [1.0.0] - 2022-09-11

### Added

- Tutti i file della repository
